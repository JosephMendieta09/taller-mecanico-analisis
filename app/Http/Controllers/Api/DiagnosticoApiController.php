<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Diagnostico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $diagnostico = Diagnostico::create($request->all());
        return response()->json($diagnostico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(Diagnostico::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->update($request->all());
        return response()->json($diagnostico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Diagnostico::destroy($id);
        return response()->json(['message' => 'Diagnóstico eliminado']);
    }
}
