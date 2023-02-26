<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'integer'],
            'message' => ['required']


        ]);

        $contacto = Contacto::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'message' => $request['message']
        ]);
// NO OLVIDARME DE VER LA CLASE DEL PROFE ROMERO DEL 3/11 PARA ARMAR AQUI LA ESTRUCTURA PARA ENVIAR MAIL
        $details = [
            'title' => 'Contacto: ' . $contacto->name,
            'body1' => 'email: ' . $contacto->email,
            'body2' => 'phone: ' . $contacto->phone,
            'body3' => 'message: ' . $contacto->message
            
            ];
            \Mail::to('martinmiguelinga@gmail.com')->send(new \App\Mail\sendPost($details));
// HASTA AQUÍ PARA MANTENER TODO ORDENADO - ATENTO QUE PUSE 2 BODY MAS
        return response()->json([
            'mensaje' => 'Se Agrego Correctamente el Contacto',
            'data' => $contacto,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
