<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleServicio;
use Illuminate\Http\Request;

class DetalleServicioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(DetalleServicio::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $detalleservicio = DetalleServicio::create($request->all());
        return response()->json($detalleservicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(DetalleServicio::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $detalleservicio = DetalleServicio::findOrFail($id);
        $detalleservicio->update($request->all());
        return response()->json($detalleservicio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DetalleServicio::destroy($id);
        return response()->json(['message' => 'Detalle del Servicio eliminado']);
    }
}
