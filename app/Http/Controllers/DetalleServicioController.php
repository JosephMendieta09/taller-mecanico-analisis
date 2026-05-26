<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleServicioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detalleServicios = DetalleServicio::paginate();

        return view('detalle-servicio.index', compact('detalleServicios'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detalleServicio = new DetalleServicio();

        return view('detalle-servicio.create', compact('detalleServicio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleServicioRequest $request): RedirectResponse
    {
        DetalleServicio::create($request->validated());

        return Redirect::route('detalle-servicios.index')
            ->with('success', 'DetalleServicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detalleServicio = DetalleServicio::find($id);

        return view('detalle-servicio.show', compact('detalleServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detalleServicio = DetalleServicio::find($id);

        return view('detalle-servicio.edit', compact('detalleServicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleServicioRequest $request, DetalleServicio $detalleServicio): RedirectResponse
    {
        $detalleServicio->update($request->validated());

        return Redirect::route('detalle-servicios.index')
            ->with('success', 'DetalleServicio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetalleServicio::find($id)->delete();

        return Redirect::route('detalle-servicios.index')
            ->with('success', 'DetalleServicio deleted successfully');
    }
}
