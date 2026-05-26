<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PagoServicio;
use Illuminate\Http\Request;

class PagoServicioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(PagoServicio::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $pagoservicio = PagoServicio::create($request->all());
        return response()->json($pagoservicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(PagoServicio::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pagoservicio = PagoServicio::findOrFail($id);
        $pagoservicio->update($request->all());
        return response()->json($pagoservicio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PagoServicio::destroy($id);
        return response()->json(['message' => 'Pago se Servicio eliminado']);
    }
}
