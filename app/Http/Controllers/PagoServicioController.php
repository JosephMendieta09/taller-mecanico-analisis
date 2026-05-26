<?php

namespace App\Http\Controllers;

use App\Models\PagoServicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PagoServicioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pagoServicios = PagoServicio::paginate();

        return view('pago-servicio.index', compact('pagoServicios'))
            ->with('i', ($request->input('page', 1) - 1) * $pagoServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pagoServicio = new PagoServicio();

        return view('pago-servicio.create', compact('pagoServicio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagoServicioRequest $request): RedirectResponse
    {
        PagoServicio::create($request->validated());

        return Redirect::route('pago-servicios.index')
            ->with('success', 'PagoServicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pagoServicio = PagoServicio::find($id);

        return view('pago-servicio.show', compact('pagoServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pagoServicio = PagoServicio::find($id);

        return view('pago-servicio.edit', compact('pagoServicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagoServicioRequest $request, PagoServicio $pagoServicio): RedirectResponse
    {
        $pagoServicio->update($request->validated());

        return Redirect::route('pago-servicios.index')
            ->with('success', 'PagoServicio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PagoServicio::find($id)->delete();

        return Redirect::route('pago-servicios.index')
            ->with('success', 'PagoServicio deleted successfully');
    }
}
