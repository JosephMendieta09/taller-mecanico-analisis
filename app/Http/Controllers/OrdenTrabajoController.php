<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Diagnostico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrdenTrabajoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
         $search = $request->input('search');

        $ordenes = OrdenTrabajo::with('diagnostico.vehiculo')
            ->when($search, function ($query, $search) {
                $query->where('estado', 'like', "%{$search}%")
                      ->orWhere('notas', 'like', "%{$search}%")
                      ->orWhereHas('diagnostico.vehiculo', fn($q) =>
                            $q->where('placa', 'like', "%{$search}%")
                      );
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('orden-trabajos.index', compact('ordenes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $diagnosticos = Diagnostico::with('vehiculo')
            ->doesntHave('ordenTrabajo')
            ->orderBy('id', 'desc')
            ->get();

        return view('orden-trabajos.create', compact('diagnosticos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdenTrabajoRequest $request): RedirectResponse
    {
        OrdenTrabajo::create($request->validated());

        return redirect()->route('orden-trabajos.index')
                         ->with('success', 'Orden de trabajo creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->load('diagnostico.vehiculo', 'detallesRepuesto.repuesto');

        return view('orden-trabajos.show', compact('ordenTrabajo'));
    }

    public function edit(OrdenTrabajo $ordenTrabajo)
    {
        // En edit incluimos el diagnóstico actual aunque ya tenga orden
        $diagnosticos = Diagnostico::with('vehiculo')
            ->where(function ($q) use ($ordenTrabajo) {
                $q->doesntHave('ordenTrabajo')
                  ->orWhere('id', $ordenTrabajo->diagnostico_id);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('orden-trabajos.edit', compact('ordenTrabajo', 'diagnosticos'));
    }

    public function update(OrdenTrabajoRequest $request, OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->update($request->validated());

        return redirect()->route('orden-trabajos.index')
                         ->with('success', 'Orden de trabajo actualizada correctamente.');
    }

    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        $ordenTrabajo->delete();

        return redirect()->route('orden-trabajos.index')
                         ->with('success', 'Orden de trabajo eliminada correctamente.');
    }
}
