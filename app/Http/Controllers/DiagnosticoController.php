<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Vehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiagnosticoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $diagnosticos = Diagnostico::with('vehiculo')
            ->when($search, function ($query, $search) {
                $query->where('descripcion', 'like', "%{$search}%")
                      ->orWhere('estado', 'like', "%{$search}%")
                      ->orWhereHas('vehiculo', fn($q) => $q->where('placa', 'like', "%{$search}%"));
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('diagnosticos.index', compact('diagnosticos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehiculos = Vehiculo::orderBy('placa')->get();

        return view('diagnosticos.create', compact('vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiagnosticoRequest $request): RedirectResponse
    {
        Diagnostico::create($request->validated());

        return redirect()->route('diagnosticos.index')
                         ->with('success', 'Diagnóstico registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnostico $diagnostico)
    {
        $diagnostico->load('vehiculo', 'detalles.problema');

        return view('diagnosticos.show', compact('diagnostico'));
    }

    public function edit(Diagnostico $diagnostico)
    {
        $vehiculos = Vehiculo::orderBy('placa')->get();

        return view('diagnosticos.edit', compact('diagnostico', 'vehiculos'));
    }

    public function update(DiagnosticoRequest $request, Diagnostico $diagnostico)
    {
        $diagnostico->update($request->validated());

        return redirect()->route('diagnosticos.index')
                         ->with('success', 'Diagnóstico actualizado correctamente.');
    }

    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();

        return redirect()->route('diagnosticos.index')
                         ->with('success', 'Diagnóstico eliminado correctamente.');
    }
}
