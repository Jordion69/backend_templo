<?php

namespace App\Http\Controllers;

use App\Models\Concierto;
use Illuminate\Http\Request;
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
    public function index()
    {
        $conciertos = Concierto::paginate();

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
        return view('concierto.create', compact('concierto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Concierto::$rules);
        $concierto = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $concierto['imagen']=$request->file('imagen')->store('uploads', 'public');
        }
        Concierto::insert($concierto);
        // $concierto = Concierto::create($request->all());
        return redirect()->route('conciertos.index')
            ->with('success', 'Concierto created successfully.');
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
            $concierto1 = Garito::findOrFail($id);
            Storage::delete('public/' . $concierto1->imagen);
            $concierto['imagen']=$request->file('imagen')->store('uploads', 'public');
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
            ->where('fecha', '>', $currentDate)
            ->orderBy('fecha')
            ->take(10)
            ->get();

        return response()->json(['conciertos' => $conciertos]);
    }

    public function getAllFromToday()
    {
        $currentDate = Carbon::now();

        $conciertos = Concierto::with('teloneros')
            ->where('fecha', '>=', $currentDate)
            ->orderBy('fecha')
            ->get();

        return response()->json(['conciertos' => $conciertos]);
    }
}
