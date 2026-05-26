<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VentaRepuesto;
use Illuminate\Http\Request;

class VentaRepuestoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(VentaRepuesto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ventarepuesto = VentaRepuesto::create($request->all());
        return response()->json($ventarepuesto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(VentaRepuesto::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ventarepuesto = VentaRepuesto::findOrFail($id);
        $ventarepuesto->update($request->all());
        return response()->json($ventarepuesto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        VentaRepuesto::destroy($id);
        return response()->json(['message' => 'Venta de Repuesto eliminada']);
    }
}
