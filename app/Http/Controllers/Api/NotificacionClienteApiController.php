<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NotificacionCliente;
use Illuminate\Http\Request;

class NotificacionClienteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(NotificacionCliente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $notificacioncliente = NotificacionCliente::create($request->all());
        return response()->json($notificacioncliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(NotificacionCliente::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $notificacioncliente = NotificacionCliente::findOrFail($id);
        $notificacioncliente->update($request->all());
        return response()->json($notificacioncliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        NotificacionCliente::destroy($id);
        return response()->json(['message' => 'Notificacion para el Cliente eliminado']);
    }
}
