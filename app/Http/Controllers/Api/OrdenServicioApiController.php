<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdenServicio;
use Illuminate\Http\Request;

class OrdenServicioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(OrdenServicio::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ordenservicio = OrdenServicio::create($request->all());
        return response()->json($ordenservicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(OrdenServicio::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ordenservicio = OrdenServicio::findOrFail($id);
        $ordenservicio->update($request->all());
        return response()->json($ordenservicio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        OrdenServicio::destroy($id);
        return response()->json(['message' => 'Orden de Servicio eliminada']);
    }
}
