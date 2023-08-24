<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\EmailContacto;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $data['nombre'] = $request->nombre;
        $data['email'] = $request->email;
        $data['asunto'] = $request->asunto;
        $data['mensaje'] = $request->mensaje;

        Mail::send('emails.correo', $data, function ($message) use ($data) {
            $message->to('templedelmetal@gmail.com', $data['nombre'], $data['email'], $data['mensaje'])
            ->subject($data['asunto']);
        });
        return response()->json([
        'Success' => 'Excelente email enviado..',
        'code' => '200',
        ], 200);
    }
}
