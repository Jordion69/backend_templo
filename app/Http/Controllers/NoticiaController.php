<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $query = Noticia::query();

        if ($searchTerm) {
            $query->where('titular_inicial', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('texto_inicial', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('titular', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('texto1', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('texto2', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('texto3', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('texto4', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('palabras_clave', 'LIKE', '%' . $searchTerm . '%');
            // Agrega aquí más condiciones de búsqueda si es necesario
        }
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
        $noticia = request()->except('_token');
        try {
            $validator = Validator::make($noticia, Noticia::$rules);
            // $noticia->validate(Noticia::$rules);

            if ($request->hasFile('foto_inicio')) {
                $noticia['foto_inicio'] = $request->file('foto_inicio')->store('uploads', 'public');
            }
            $currrentTime = now();
            $noticia['created_at'] = $currrentTime;
            $noticia['updated_at'] = $currrentTime;
            Noticia::insert($noticia);
            return redirect()->route('noticias.index')
                ->with('success', 'Noticia created successfully.');
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
        if ($request->hasFile('foto_inicio')) {
            $noticia1 = Noticia::findOrFail($id);
            Storage::delete('public/' . $noticia1->foto_inicio);
            $noticia['foto_inicio'] = $request->file('foto_inicio')->store('uploads', 'public');
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
        $noticia1 = Noticia::findOrFail($id);
        if (Storage::delete('public/' .  $noticia1->foto_inicio)) {
            $noticia = Noticia::find($id)->delete();
        }
        return redirect()->route('noticias.index')
            ->with('success', 'Noticia deleted successfully');
    }
    public function firstSeven()
    {
        $noticias = Noticia::orderBy('updated_at', 'desc')
                        ->take(7)
                        ->get();

        return response()->json(['noticias' => $noticias]);
    }
    public function getFirstThree()
    {
        $noticias = Noticia::orderBy('updated_at', 'desc')
                        ->take(3)
                        ->get();

        return response()->json(['noticias' => $noticias]);
    }
    public function getFromFourthToEnd()
    {
        $noticias = Noticia::orderBy('updated_at', 'desc')
                        ->skip(3)
                        ->take(1000)
                        ->get();

        return response()->json(['noticias' => $noticias]);
    }
}
