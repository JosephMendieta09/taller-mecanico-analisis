<?php

namespace App\Http\Controllers;

use App\Models\OrdenMecanico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrdenMecanicoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrdenMecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ordenMecanicos = OrdenMecanico::paginate();

        return view('orden-mecanico.index', compact('ordenMecanicos'))
            ->with('i', ($request->input('page', 1) - 1) * $ordenMecanicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ordenMecanico = new OrdenMecanico();

        return view('orden-mecanico.create', compact('ordenMecanico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdenMecanicoRequest $request): RedirectResponse
    {
        OrdenMecanico::create($request->validated());

        return Redirect::route('orden-mecanicos.index')
            ->with('success', 'OrdenMecanico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ordenMecanico = OrdenMecanico::find($id);

        return view('orden-mecanico.show', compact('ordenMecanico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ordenMecanico = OrdenMecanico::find($id);

        return view('orden-mecanico.edit', compact('ordenMecanico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdenMecanicoRequest $request, OrdenMecanico $ordenMecanico): RedirectResponse
    {
        $ordenMecanico->update($request->validated());

        return Redirect::route('orden-mecanicos.index')
            ->with('success', 'OrdenMecanico updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OrdenMecanico::find($id)->delete();

        return Redirect::route('orden-mecanicos.index')
            ->with('success', 'OrdenMecanico deleted successfully');
    }
}
