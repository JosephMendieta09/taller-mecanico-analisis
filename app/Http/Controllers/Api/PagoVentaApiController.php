<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PagoVenta;
use Illuminate\Http\Request;

class PagoVentaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(PagoVenta::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $pagoventa = PagoVenta::create($request->all());
        return response()->json($pagoventa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(PagoVenta::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pagoventa = PagoVenta::findOrFail($id);
        $pagoventa->update($request->all());
        return response()->json($pagoventa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PagoVenta::destroy($id);
        return response()->json(['message' => 'Pago de Venta eliminado']);
    }
}
