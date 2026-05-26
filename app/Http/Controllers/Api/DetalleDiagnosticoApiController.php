<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleDiagnostico;
use Illuminate\Http\Request;

class DetalleDiagnosticoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(DetalleDiagnostico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $detallediagnostico = DetalleDiagnostico::create($request->all());
        return response()->json($detallediagnostico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(DetalleDiagnostico::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $detallediagnostico = DetalleDiagnostico::findOrFail($id);
        $detallediagnostico->update($request->all());
        return response()->json($detallediagnostico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DetalleDiagnostico::destroy($id);
        return response()->json(['message' => 'Detelle de Diagnóstico eliminado']);
    }
}
