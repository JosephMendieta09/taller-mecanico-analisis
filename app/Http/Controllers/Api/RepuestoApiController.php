<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Repuesto;
use Illuminate\Http\Request;

class RepuestoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Repuesto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $repuesto = Repuesto::create($request->all());
        return response()->json($repuesto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(Repuesto::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $repuesto = Repuesto::findOrFail($id);
        $repuesto->update($request->all());
        return response()->json($repuesto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Repuesto::destroy($id);
        return response()->json(['message' => 'Repuesto eliminado']);
    }
}
