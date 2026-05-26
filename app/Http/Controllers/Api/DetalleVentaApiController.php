<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(DetalleVenta::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $detalleventa = DetalleVenta::create($request->all());
        return response()->json($detalleventa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(DetalleVenta::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $detalleventa = DetalleVenta::findOrFail($id);
        $detalleventa->update($request->all());
        return response()->json($detalleventa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DetalleVenta::destroy($id);
        return response()->json(['message' => 'Detalle de Venta eliminado']);
    }
}
