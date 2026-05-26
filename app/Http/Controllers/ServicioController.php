<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ServicioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $servicios = Servicio::paginate();

        return view('servicio.index', compact('servicios'))
            ->with('i', ($request->input('page', 1) - 1) * $servicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $servicio = new Servicio();

        return view('servicio.create', compact('servicio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicioRequest $request): RedirectResponse
    {
        Servicio::create($request->validated());

        return Redirect::route('servicios.index')
            ->with('success', 'Servicio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $servicio = Servicio::find($id);

        return view('servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $servicio = Servicio::find($id);

        return view('servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicioRequest $request, Servicio $servicio): RedirectResponse
    {
        $servicio->update($request->validated());

        return Redirect::route('servicios.index')
            ->with('success', 'Servicio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Servicio::find($id)->delete();

        return Redirect::route('servicios.index')
            ->with('success', 'Servicio deleted successfully');
    }
}
