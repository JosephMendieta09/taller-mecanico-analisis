<?php

namespace App\Http\Controllers;

use App\Models\OrdenServicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrdenServicioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrdenServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ordenServicios = OrdenServicio::paginate();

        return view('orden-servicio.index', compact('ordenServicios'))
            ->with('i', ($request->input('page', 1) - 1) * $ordenServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ordenServicio = new OrdenServicio();

        return view('orden-servicio.create', compact('ordenServicio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdenServicioRequest $request): RedirectResponse
    {
        OrdenServicio::create($request->validated());

        return Redirect::route('orden-servicios.index')
            ->with('success', 'OrdenServicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ordenServicio = OrdenServicio::find($id);

        return view('orden-servicio.show', compact('ordenServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ordenServicio = OrdenServicio::find($id);

        return view('orden-servicio.edit', compact('ordenServicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdenServicioRequest $request, OrdenServicio $ordenServicio): RedirectResponse
    {
        $ordenServicio->update($request->validated());

        return Redirect::route('orden-servicios.index')
            ->with('success', 'OrdenServicio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OrdenServicio::find($id)->delete();

        return Redirect::route('orden-servicios.index')
            ->with('success', 'OrdenServicio deleted successfully');
    }
}
