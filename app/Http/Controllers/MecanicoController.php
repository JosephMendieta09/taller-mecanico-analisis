<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MecanicoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
 
        $mecanicos = Mecanico::when($search, function ($query, $search) {
                $query->where('nombre', 'like', "%{$search}%")
                      ->orWhere('cedula', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('estado', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();
 
        return view('mecanico.index', compact('mecanicos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mecanico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MecanicoRequest $request): RedirectResponse
    {
        Mecanico::create($request->validated());

        return Redirect::route('mecanicos.index')
            ->with('success', 'Mecánico registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mecanico $mecanico)
    {
        return view('mecanicos.show', compact('mecanico'));
    }
 
    public function edit(Mecanico $mecanico)
    {
        return view('mecanico.edit', compact('mecanico'));
    }
 
    public function update(MecanicoRequest $request, Mecanico $mecanico)
    {
        $mecanico->update($request->validated());
 
        return redirect()->route('mecanicos.index')
                         ->with('success', 'Mecánico actualizado correctamente.');
    }
 
    public function destroy(Mecanico $mecanico)
    {
        $mecanico->delete();
 
        return redirect()->route('mecanicos.index')
                         ->with('success', 'Mecánico eliminado correctamente.');
    }
}
