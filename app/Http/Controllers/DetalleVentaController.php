<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleVentaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detalleVentas = DetalleVenta::paginate();

        return view('detalle-venta.index', compact('detalleVentas'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleVentas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detalleVenta = new DetalleVenta();

        return view('detalle-venta.create', compact('detalleVenta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleVentaRequest $request): RedirectResponse
    {
        DetalleVenta::create($request->validated());

        return Redirect::route('detalle-ventas.index')
            ->with('success', 'DetalleVenta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detalleVenta = DetalleVenta::find($id);

        return view('detalle-venta.show', compact('detalleVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detalleVenta = DetalleVenta::find($id);

        return view('detalle-venta.edit', compact('detalleVenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleVentaRequest $request, DetalleVenta $detalleVenta): RedirectResponse
    {
        $detalleVenta->update($request->validated());

        return Redirect::route('detalle-ventas.index')
            ->with('success', 'DetalleVenta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetalleVenta::find($id)->delete();

        return Redirect::route('detalle-ventas.index')
            ->with('success', 'DetalleVenta deleted successfully');
    }
}
