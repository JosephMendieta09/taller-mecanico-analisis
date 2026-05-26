<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mecanico;
use Illuminate\Http\Request;

class MecanicoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Mecanico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $mecanico = Mecanico::create($request->all());
        return response()->json($mecanico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(Mecanico::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $mecanico = Mecanico::findOrFail($id);
        $mecanico->update($request->all());
        return response()->json($mecanico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Mecanico::destroy($id);
        return response()->json(['message' => 'Mecanico eliminado']);
    }
}
