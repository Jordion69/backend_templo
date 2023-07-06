<?php

namespace App\Http\Controllers;

use App\Models\Telonero;
use App\Models\Concierto;
use Illuminate\Http\Request;

/**
 * Class TeloneroController
 * @package App\Http\Controllers
 */
class TeloneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teloneros = Telonero::paginate();

        return view('telonero.index', compact('teloneros'))
            ->with('i', (request()->input('page', 1) - 1) * $teloneros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $telonero = new Telonero();
        $conciertos = Concierto::pluck('nombre', 'id');
        return view('telonero.create', compact('telonero', 'conciertos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Telonero::$rules);

        $telonero = Telonero::create($request->all());

        return redirect()->route('teloneros.index')
            ->with('success', 'Telonero created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telonero = Telonero::find($id);

        return view('telonero.show', compact('telonero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telonero = Telonero::find($id);
        $conciertos = Concierto::pluck('nombre', 'id');
        return view('telonero.edit', compact('telonero', 'conciertos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Telonero $telonero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telonero $telonero)
    {
        request()->validate(Telonero::$rules);

        $telonero->update($request->all());

        return redirect()->route('teloneros.index')
            ->with('success', 'Telonero updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $telonero = Telonero::find($id)->delete();

        return redirect()->route('teloneros.index')
            ->with('success', 'Telonero deleted successfully');
    }
}
