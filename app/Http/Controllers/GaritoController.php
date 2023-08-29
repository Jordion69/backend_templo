<?php

namespace App\Http\Controllers;

use App\Models\Garito;
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
        $validator = Validator::make($request->all(), [
            'nombre_garito'      => 'required|max:255',
            'nombre_duenyo'      => 'required|max:255',
            'mail'               => 'nullable|email|max:255',
            'direccion'          => 'required|max:255',
            'poblacion'          => 'required|max:255',
            'codigo_postal'      => 'required|numeric',
            'comunidad_autonoma' => 'required|max:255',
            'provincia'          => 'required|max:255',
            'telefono'           => 'nullable|numeric',
            'telefono2'          => 'nullable|numeric',
            'facebook'           => 'nullable|max:255',
            'instagram'          => 'nullable|max:255',
            'frase'              => 'nullable|max:255',
            'sentence'           => 'nullable|max:255',
            'visitado'           => 'nullable|boolean',
            'ratio_colaboracion' => 'nullable|numeric',
            'imagen'             => 'nullable|image|max:2048',
            'alt_imagen'         => 'nullable|max:255',
            'latitud'            => 'nullable|numeric',
            'longitud'           => 'nullable|numeric',
            'tendencia'          => 'nullable|max:255',
            // Agrega más reglas de validación para otros campos según tus necesidades
        ]);

        if ($validator->fails()) {
            return redirect()->route('garitos.create')
                ->withErrors($validator)
                ->withInput();
        }

        //LLAMADA A LA FUNCION QUE NO FUNCIONA
        // $this->validateForm($requestData);
        $garito = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $garito['imagen'] = $request->file('imagen')->store('uploads', 'public');
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


    public function getRandomFromCities()
    {
        $cities = ['barcelona', 'madrid', 'bilbao', 'logroño'];

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




    //Esta fiuncion esta por implementar
    // public function validateForm($request)
    // {
    //     $validator = Validator::make($request, [
    //         'nombre_garito'      => 'required|max:255',
    //         'nombre_duenyo'      => 'required|max:255',
    //         'mail'               => 'nullable|email|max:255',
    //         'direccion'          => 'required|max:255',
    //         'poblacion'          => 'required|max:255',
    //         'codigo_postal'      => 'required|numeric',
    //         'comunidad_autonoma' => 'required|max:255',
    //         'provincia'          => 'required|max:255',
    //         'telefono'           => 'nullable|numeric',
    //         'telefono2'          => 'nullable|numeric',
    //         'facebook'           => 'nullable|max:255',
    //         'instagram'          => 'nullable|max:255',
    //         'frase'              => 'nullable|max:255',
    //         'sentence'           => 'nullable|max:255',
    //         'visitado'           => 'nullable|boolean',
    //         'ratio_colaboracion' => 'nullable|numeric',
    //         'imagen'             => 'nullable|image|max:2048',
    //         'alt_imagen'         => 'nullable|max:255',
    //         'latitud'            => 'nullable|numeric',
    //         'longitud'           => 'nullable|numeric',
    //         'tendencia'          => 'nullable|max:255',
    //         // Agrega más reglas de validación para otros campos según tus necesidades
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('garitos.create')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }
    // }
}
