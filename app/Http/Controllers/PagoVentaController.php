<?php

namespace App\Http\Controllers;

use App\Models\PagoVenta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PagoVentaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pagoVentas = PagoVenta::paginate();

        return view('pago-venta.index', compact('pagoVentas'))
            ->with('i', ($request->input('page', 1) - 1) * $pagoVentas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pagoVenta = new PagoVenta();

        return view('pago-venta.create', compact('pagoVenta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagoVentaRequest $request): RedirectResponse
    {
        PagoVenta::create($request->validated());

        return Redirect::route('pago-ventas.index')
            ->with('success', 'PagoVenta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pagoVenta = PagoVenta::find($id);

        return view('pago-venta.show', compact('pagoVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pagoVenta = PagoVenta::find($id);

        return view('pago-venta.edit', compact('pagoVenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagoVentaRequest $request, PagoVenta $pagoVenta): RedirectResponse
    {
        $pagoVenta->update($request->validated());

        return Redirect::route('pago-ventas.index')
            ->with('success', 'PagoVenta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PagoVenta::find($id)->delete();

        return Redirect::route('pago-ventas.index')
            ->with('success', 'PagoVenta deleted successfully');
    }
}
