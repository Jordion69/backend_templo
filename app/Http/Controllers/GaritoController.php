<?php

namespace App\Http\Controllers;

use App\Models\Garito;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

/**
 * Class GaritoController
 * @package App\Http\Controllers
 */
class GaritoController extends Controller
{
    // Resto del código de tu componente
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garitos = Garito::paginate();
        return view('garito.index', compact('garitos'))
            ->with('i', (request()->input('page', 1) - 1) * $garitos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $garito = new Garito();
        $provincias = Provincia::orderBy('provincia', 'asc')->pluck('provincia', 'id');
        return view('garito.create', compact('garito', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $garito = request()->except('_token');
        $garito['comunidad_autonoma'] = Provincia::find($garito['provincia'])->comunidadesAutonoma->comunidad;
        $garito['provincia'] = Provincia::find($garito['provincia'])->provincia;
        try {
            $validator = Validator::make($garito, Garito::$rules);
            // $noticia->validate(Noticia::$rules);

            if ($request->hasFile('imagen')) {
                $garito['imagen'] = $request->file('imagen')->store('uploads', 'public');
            }
            $garito['created_at'] = now();
            Garito::insert($garito);
            return redirect()->route('garitos.index')
                ->with('success', 'Garito created successfully.');
        } catch (\Throwable $th) {
            dump($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $garito = Garito::find($id);

        return view('garito.show', compact('garito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $garito = Garito::find($id);
        $provincias = Provincia::orderBy('provincia', 'asc')->pluck('provincia', 'id');
        return view('garito.edit', compact('garito', 'provincias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Garito $garito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $garito = request()->except(['_token', '_method']);
        $garito['comunidad_autonoma'] = Provincia::find($garito['provincia'])->comunidadesAutonoma->comunidad;
        if ($request->hasFile('imagen')) {
            $garito1 = Garito::findOrFail($id);
            Storage::delete('public/' . $garito1->imagen);
            $garito['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Garito::where('id', '=', $id)->update($garito);
        $garito1 = Garito::findOrFail($id);
        return redirect()->route('garitos.index')
            ->with('success', 'Garito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $garito1 = Garito::findOrFail($id);
        if (Storage::delete('public/' .  $garito1->imagen)) {
            $garito = Garito::find($id)->delete();
        }
        return redirect()->route('garitos.index')
            ->with('success', 'Garito deleted successfully');
    }

    public function getRandomSeven()
    {
        $garitos = Garito::inRandomOrder()
        ->take(7)
        ->get();

        return response()->json(['garitos' => $garitos]);
    }
    public function getRandomFromCities()
    {
        $cities = ['barcelona', 'madrid', 'bilbao', 'Panplona'];

        $garitos = collect([]);

        foreach ($cities as $city) {
            $garito = Garito::where('provincia', $city)
                            ->inRandomOrder()
                            ->first();
            if ($garito) {
                $garitos->push($garito);
            }
        }

        return response()->json(['garitos' => $garitos]);
    }
    public function getAllByProvince()
    {
        $garitos = Garito::orderBy('provincia')
                        ->get();

        return response()->json(['garitos' => $garitos]);
    }
}
