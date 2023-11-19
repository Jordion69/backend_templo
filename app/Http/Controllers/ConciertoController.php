<?php

namespace App\Http\Controllers;

use App\Models\Concierto;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

/**
 * Class ConciertoController
 * @package App\Http\Controllers
 */
class ConciertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $conciertos = Concierto::paginate();

        // return view('concierto.index', compact('conciertos'))
        //     ->with('i', (request()->input('page', 1) - 1) * $conciertos->perPage());
        $searchTerm = $request->input('search');

        $query = Concierto::query();

        if ($searchTerm) {
            $query->where('nombre', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('banda_principal', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('sala', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('poblacion', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('provincia', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('fecha_evento', 'LIKE', '%' . $searchTerm . '%');
            // Agrega aquí más condiciones de búsqueda si es necesario
        }

        $conciertos = $query->paginate();

         return view('concierto.index', compact('conciertos'))
            ->with('i', (request()->input('page', 1) - 1) * $conciertos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $concierto = new Concierto();
        $provincias = Provincia::orderBy('provincia', 'asc')->pluck('provincia', 'id');
        return view('concierto.create', compact('concierto', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $concierto = request()->except('_token');
        $concierto['provincia'] = Provincia::find($concierto['provincia'])->provincia;
        try {
            $validator = Validator::make($concierto, Concierto::$rules);
            // $noticia->validate(Noticia::$rules);

            if ($request->hasFile('imagen')) {
                $concierto['imagen'] = $request->file('imagen')->store('uploads', 'public');
            }
            $currrentTime = now();
            $concierto['created_at'] = $currrentTime;
            $concierto['updated_at'] = $currrentTime;
            Concierto::insert($concierto);
            return redirect()->route('conciertos.index')
                ->with('success', 'Concierto created successfully.');
        } catch (\Throwable $th) {
            dump($th);
        }


        // request()->validate(Concierto::$rules);
        // $concierto = request()->except('_token');
        // if ($request->hasFile('imagen')) {
        //     $concierto['imagen']=$request->file('imagen')->store('uploads', 'public');
        // }
        // Concierto::insert($concierto);
        // // $concierto = Concierto::create($request->all());
        // return redirect()->route('conciertos.index')
        //     ->with('success', 'Concierto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concierto = Concierto::find($id);

        return view('concierto.show', compact('concierto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concierto = Concierto::find($id);

        return view('concierto.edit', compact('concierto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Concierto $concierto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Concierto::$rules);
        $concierto = request()->except(['_token', '_method']);
        if ($request->hasFile('imagen')) {
            $concierto1 = Concierto::findOrFail($id);
            Storage::delete('public/' . $concierto1->imagen);
            $concierto['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Concierto::where('id', '=', $id)->update($concierto);
        $concierto1 = Concierto::findOrFail($id);

        // $concierto->update($request->all());

        return redirect()->route('conciertos.index')
            ->with('success', 'Concierto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $concierto1 = Concierto::findOrFail($id);
        if (Storage::delete('public/' .  $concierto1->imagen)) {
            $concierto = Concierto::find($id)->delete();
        }
        return redirect()->route('conciertos.index')
            ->with('success', 'Concierto deleted successfully');
    }

    public function getFirstTenUpcoming()
    {
        $currentDate = Carbon::now();

        $conciertos = Concierto::with('teloneros')
            ->where('fecha_evento', '>=', $currentDate)
            ->orderBy('fecha_evento')
            ->take(10)
            ->get();

        return response()->json(['conciertos' => $conciertos]);
    }

    public function getAllFromToday()
    {
        $currentDate = Carbon::now();

        $conciertos = Concierto::with('teloneros')
            ->where('fecha_evento', '>=', $currentDate)
            ->orderBy('fecha_evento')
            ->get();

        return response()->json(['conciertos' => $conciertos]);
    }
    public function getLastWeekUpdates()
    {
        $currentDate = Carbon::now();
        $sevenDaysAgo = $currentDate->subDays(7);

        $result = Concierto::select('id', 'updated_at')
            ->where('updated_at', '>=', $sevenDaysAgo)
            ->orWhereHas('teloneros', function ($query) use ($sevenDaysAgo) {
                $query->where('updated_at', '>=', $sevenDaysAgo);
            })
            ->orderBy('updated_at', 'desc')
            ->union(
                Concierto::select('id', 'updated_at')
                    ->whereIn('id', function ($query) use ($sevenDaysAgo) {
                        $query->select('concierto_id')
                            ->from('teloneros')
                            ->where('updated_at', '>=', $sevenDaysAgo);
                    })
            )
            ->orderBy('updated_at', 'desc')
            ->get();

        $concertIds = $result->pluck('id');
        $concerts = Concierto::whereIn('id', $concertIds)->with('teloneros')->get();

        return response()->json(['data' => $concerts]);
    }
}
