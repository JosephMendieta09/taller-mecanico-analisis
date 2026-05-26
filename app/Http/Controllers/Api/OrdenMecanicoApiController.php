<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdenMecanico;
use Illuminate\Http\Request;

class OrdenMecanicoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(OrdenMecanico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ordenmecanico = OrdenMecanico::create($request->all());
        return response()->json($ordenmecanico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(OrdenMecanico::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ordenmecanico = OrdenMecanico::findOrFail($id);
        $ordenmecanico->update($request->all());
        return response()->json($ordenmecanico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        OrdenMecanico::destroy($id);
        return response()->json(['message' => 'Orden del Mecanico eliminada']);
    }
}
