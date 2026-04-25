<?php

namespace App\Http\Controllers;

use App\Models\DetalleDiagnostico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Diagnostico;
use App\Models\Problema;
use App\Http\Requests\DetalleDiagnosticoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $detalles = DetalleDiagnostico::with('diagnostico.vehiculo', 'problema')
            ->when($search, function ($query, $search) {
                $query->where('observacion', 'like', "%{$search}%")
                      ->orWhere('prioridad', 'like', "%{$search}%")
                      ->orWhereHas('problema', fn($q) => $q->where('descripcion', 'like', "%{$search}%"))
                      ->orWhereHas('diagnostico.vehiculo', fn($q) => $q->where('placa', 'like', "%{$search}%"));
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('detalle-diagnosticos.index', compact('detalles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diagnosticos = Diagnostico::with('vehiculo')->orderBy('id', 'desc')->get();
        $problemas    = Problema::orderBy('descripcion')->get();

        return view('detalle-diagnosticos.create', compact('diagnosticos', 'problemas'));
    }

    public function store(DetalleDiagnosticoRequest $request)
    {
        DetalleDiagnostico::create($request->validated());

        return redirect()->route('detalle-diagnosticos.index')
                         ->with('success', 'Detalle de diagnóstico registrado correctamente.');
    }

    public function show(DetalleDiagnostico $detalleDiagnostico)
    {
        $detalleDiagnostico->load('diagnostico.vehiculo', 'problema');

        return view('detalle-diagnosticos.show', compact('detalleDiagnostico'));
    }

    public function edit(DetalleDiagnostico $detalleDiagnostico)
    {
        $diagnosticos = Diagnostico::with('vehiculo')->orderBy('id', 'desc')->get();
        $problemas    = Problema::orderBy('descripcion')->get();

        return view('detalle-diagnosticos.edit', compact('detalleDiagnostico', 'diagnosticos', 'problemas'));
    }

    public function update(DetalleDiagnosticoRequest $request, DetalleDiagnostico $detalleDiagnostico)
    {
        $detalleDiagnostico->update($request->validated());

        return redirect()->route('detalle-diagnosticos.index')
                         ->with('success', 'Detalle de diagnóstico actualizado correctamente.');
    }

    public function destroy(DetalleDiagnostico $detalleDiagnostico)
    {
        $detalleDiagnostico->delete();

        return redirect()->route('detalle-diagnosticos.index')
                         ->with('success', 'Detalle de diagnóstico eliminado correctamente.');
    }
}
