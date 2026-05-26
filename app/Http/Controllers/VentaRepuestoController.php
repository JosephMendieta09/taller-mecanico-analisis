<?php

namespace App\Http\Controllers;

use App\Models\VentaRepuesto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VentaRepuestoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VentaRepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ventaRepuestos = VentaRepuesto::paginate();

        return view('venta-repuesto.index', compact('ventaRepuestos'))
            ->with('i', ($request->input('page', 1) - 1) * $ventaRepuestos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ventaRepuesto = new VentaRepuesto();

        return view('venta-repuesto.create', compact('ventaRepuesto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VentaRepuestoRequest $request): RedirectResponse
    {
        VentaRepuesto::create($request->validated());

        return Redirect::route('venta-repuestos.index')
            ->with('success', 'VentaRepuesto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ventaRepuesto = VentaRepuesto::find($id);

        return view('venta-repuesto.show', compact('ventaRepuesto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ventaRepuesto = VentaRepuesto::find($id);

        return view('venta-repuesto.edit', compact('ventaRepuesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VentaRepuestoRequest $request, VentaRepuesto $ventaRepuesto): RedirectResponse
    {
        $ventaRepuesto->update($request->validated());

        return Redirect::route('venta-repuestos.index')
            ->with('success', 'VentaRepuesto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VentaRepuesto::find($id)->delete();

        return Redirect::route('venta-repuestos.index')
            ->with('success', 'VentaRepuesto deleted successfully');
    }
}
