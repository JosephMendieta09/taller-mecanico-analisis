<?php

namespace App\Http\Controllers;

use App\Models\EspecialidadMecanico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadMecanicoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EspecialidadMecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $especialidadMecanicos = EspecialidadMecanico::paginate();

        return view('especialidad-mecanico.index', compact('especialidadMecanicos'))
            ->with('i', ($request->input('page', 1) - 1) * $especialidadMecanicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $especialidadMecanico = new EspecialidadMecanico();

        return view('especialidad-mecanico.create', compact('especialidadMecanico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecialidadMecanicoRequest $request): RedirectResponse
    {
        EspecialidadMecanico::create($request->validated());

        return Redirect::route('especialidad-mecanicos.index')
            ->with('success', 'EspecialidadMecanico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $especialidadMecanico = EspecialidadMecanico::find($id);

        return view('especialidad-mecanico.show', compact('especialidadMecanico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $especialidadMecanico = EspecialidadMecanico::find($id);

        return view('especialidad-mecanico.edit', compact('especialidadMecanico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EspecialidadMecanicoRequest $request, EspecialidadMecanico $especialidadMecanico): RedirectResponse
    {
        $especialidadMecanico->update($request->validated());

        return Redirect::route('especialidad-mecanicos.index')
            ->with('success', 'EspecialidadMecanico updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EspecialidadMecanico::find($id)->delete();

        return Redirect::route('especialidad-mecanicos.index')
            ->with('success', 'EspecialidadMecanico deleted successfully');
    }
}
