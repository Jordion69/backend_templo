<?php

namespace App\Http\Controllers;

use App\Models\Garito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class GaritoController
 * @package App\Http\Controllers
 */
class GaritoController extends Controller
{
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
        return view('garito.create', compact('garito'));
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
        if ($request->hasFile('imagen')) {
            $garito['imagen']=$request->file('imagen')->store('uploads', 'public');
        }
        Garito::insert($garito);

        return redirect()->route('garitos.index')
            ->with('success', 'Garito created successfully.');
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

        return view('garito.edit', compact('garito'));
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
        if ($request->hasFile('imagen')) {
            $garito1 = Garito::findOrFail($id);
            Storage::delete('public/' . $garito1->imagen);
            $garito['imagen']=$request->file('imagen')->store('uploads', 'public');
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
}
