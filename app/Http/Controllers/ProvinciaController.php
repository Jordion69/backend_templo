<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

/**
 * Class ProvinciaController
 * @package App\Http\Controllers
 */
class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincia::orderBy('provincia', 'asc')->paginate();

        return view('provincia.index', compact('provincias'))
            ->with('i', (request()->input('page', 1) - 1) * $provincias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincia = new Provincia();
        return view('provincia.create', compact('provincia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provincia::$rules);

        $provincia = Provincia::create($request->all());

        return redirect()->route('provincias.index')
            ->with('success', 'Provincia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provincia = Provincia::find($id);

        return view('provincia.show', compact('provincia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provincia = Provincia::find($id);

        return view('provincia.edit', compact('provincia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provincia $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia)
    {
        request()->validate(Provincia::$rules);

        $provincia->update($request->all());

        return redirect()->route('provincias.index')
            ->with('success', 'Provincia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provincia = Provincia::find($id)->delete();

        return redirect()->route('provincias.index')
            ->with('success', 'Provincia deleted successfully');
    }

    public function getComunidadAutonoma($provinciaId)
    {
        dd("hola");
        // Recupera la provincia según $provinciaId
        $provincia = Provincia::find($provinciaId);

        if (!$provincia) {
            return response()->json(['error' => 'Provincia no encontrada'], 404);
        }

        // Obtiene la comunidad autónoma asociada a la provincia
        $comunidadAutonoma = $provincia->comunidadAutonoma;

        if (!$comunidadAutonoma) {
            return response()->json(['error' => 'Comunidad Autónoma no encontrada para esta provincia'], 404);
        }

        return response()->json(['comunidad_autonoma' => $comunidadAutonoma->comunidad]);
    }
    public function getProvinceList()
    {
        $provincias = Provincia::orderBy('provincia', 'asc')->get();
        return response()->json($provincias);
    }
}
