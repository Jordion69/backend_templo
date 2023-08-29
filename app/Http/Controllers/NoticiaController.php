<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

/**
 * Class NoticiaController
 * @package App\Http\Controllers
 */
class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::paginate();

        return view('noticia.index', compact('noticias'))
            ->with('i', (request()->input('page', 1) - 1) * $noticias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticia = new Noticia();
        return view('noticia.create', compact('noticia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        request()->validate(Noticia::$rules);

        $noticia = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $noticia['imagen']=$request->file('imagen')->store('uploads', 'public');
        }
        Noticia::insert($noticia);

        // $noticia = Noticia::create($request->all());

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);

        return view('noticia.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);

        return view('noticia.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Noticia $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Noticia::$rules);

        $noticia = request()->except(['_token', '_method']);
        if ($request->hasFile('imagen')) {
            $noticia1 = Noticia::findOrFail($id);
            Storage::delete('public/' . $noticia1->imagen);
            $noticia['imagen']=$request->file('imagen')->store('uploads', 'public');
        }
        Noticia::where('id', '=', $id)->update($noticia);
        $noticia1 = Noticia::findOrFail($id);

        // $noticia->update($request->all());

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $noticia1 = Garito::findOrFail($id);
        if (Storage::delete('public/' .  $noticia1->imagen)) {
            $noticia = Noticia::find($id)->delete();
        }

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia deleted successfully');
    }
    public function firstSeven()
    {
        $noticias = Noticia::orderBy('update_date', 'desc')
                        ->take(7)
                        ->get();

        return response()->json(['noticias' => $noticias]);
    }
    public function getFirstThree()
    {
        $noticias = Noticia::orderBy('update_date', 'desc')
                        ->take(3)
                        ->get();

        return response()->json(['noticias' => $noticias]);
    }
    public function getFromFourthToEnd()
    {
        $noticias = Noticia::orderBy('update_date', 'desc')
                        ->skip(3)
                        ->get();

        return response()->json(['noticias' => $noticias]);
    }
}
