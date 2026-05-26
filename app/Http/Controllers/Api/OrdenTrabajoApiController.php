<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

class OrdenTrabajoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(OrdenTrabajo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ordenTrabajo = OrdenTrabajo::create($request->all());
        return response()->json($ordenTrabajo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(OrdenTrabajo::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ordenTrabajo = OrdenTrabajo::findOrFail($id);
        $ordenTrabajo->update($request->all());
        return response()->json($ordenTrabajo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        OrdenTrabajo::destroy($id);
        return response()->json(['message' => 'Orden de trabajo eliminada']);
    }
}
