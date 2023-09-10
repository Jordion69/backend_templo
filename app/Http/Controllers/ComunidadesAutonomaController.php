<?php

namespace App\Http\Controllers;

use App\Models\ComunidadesAutonoma;
use Illuminate\Http\Request;

/**
 * Class ComunidadesAutonomaController
 * @package App\Http\Controllers
 */
class ComunidadesAutonomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunidadesAutonomas = ComunidadesAutonoma::paginate();

        return view('comunidades-autonoma.index', compact('comunidadesAutonomas'))
            ->with('i', (request()->input('page', 1) - 1) * $comunidadesAutonomas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunidadesAutonoma = new ComunidadesAutonoma();
        return view('comunidades-autonoma.create', compact('comunidadesAutonoma'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ComunidadesAutonoma::$rules);

        $comunidadesAutonoma = ComunidadesAutonoma::create($request->all());

        return redirect()->route('comunidades-autonomas.index')
            ->with('success', 'ComunidadesAutonoma created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comunidadesAutonoma = ComunidadesAutonoma::find($id);

        return view('comunidades-autonoma.show', compact('comunidadesAutonoma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comunidadesAutonoma = ComunidadesAutonoma::find($id);

        return view('comunidades-autonoma.edit', compact('comunidadesAutonoma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ComunidadesAutonoma $comunidadesAutonoma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComunidadesAutonoma $comunidadesAutonoma)
    {
        request()->validate(ComunidadesAutonoma::$rules);

        $comunidadesAutonoma->update($request->all());

        return redirect()->route('comunidades-autonomas.index')
            ->with('success', 'ComunidadesAutonoma updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comunidadesAutonoma = ComunidadesAutonoma::find($id)->delete();

        return redirect()->route('comunidades-autonomas.index')
            ->with('success', 'ComunidadesAutonoma deleted successfully');
    }
}
