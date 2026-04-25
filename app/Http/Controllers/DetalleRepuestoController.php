<?php

namespace App\Http\Controllers;

use App\Models\DetalleRepuesto;
use App\Models\OrdenTrabajo;
use App\Models\Repuesto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleRepuestoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleRepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $detalles = DetalleRepuesto::with('ordenTrabajo.diagnostico.vehiculo', 'repuesto')
            ->when($search, function ($query, $search) {
                $query->whereHas('repuesto', fn($q) => $q->where('nombre', 'like', "%{$search}%"))
                      ->orWhereHas('ordenTrabajo.diagnostico.vehiculo', fn($q) =>
                            $q->where('placa', 'like', "%{$search}%")
                      );
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('detalle-repuestos.index', compact('detalles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ordenes   = OrdenTrabajo::with('diagnostico.vehiculo')->orderBy('id', 'desc')->get();
        $repuestos = Repuesto::orderBy('nombre')->get();

        return view('detalle-repuestos.create', compact('ordenes', 'repuestos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleRepuestoRequest $request): RedirectResponse
    {
        $repuesto = Repuesto::findOrFail($request->repuesto_id);
        $monto    = $request->cantidad * $repuesto->precio_unitario;

        DetalleRepuesto::create([
            ...$request->validated(),
            'monto' => $monto,
        ]);

        return redirect()->route('detalle-repuestos.index')
                         ->with('success', 'Detalle de repuesto registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleRepuesto $detalleRepuesto)
    {
        $detalleRepuesto->load('ordenTrabajo.diagnostico.vehiculo', 'repuesto');

        return view('detalle-repuestos.show', compact('detalleRepuesto'));
    }

    public function edit(DetalleRepuesto $detalleRepuesto)
    {
        $ordenes   = OrdenTrabajo::with('diagnostico.vehiculo')->orderBy('id', 'desc')->get();
        $repuestos = Repuesto::orderBy('nombre')->get();

        return view('detalle-repuestos.edit', compact('detalleRepuesto', 'ordenes', 'repuestos'));
    }

    public function update(DetalleRepuestoRequest $request, DetalleRepuesto $detalleRepuesto)
    {
        $repuesto = Repuesto::findOrFail($request->repuesto_id);
        $monto    = $request->cantidad * $repuesto->precio_unitario;

        $detalleRepuesto->update([
            ...$request->validated(),
            'monto' => $monto,
        ]);

        return redirect()->route('detalle-repuestos.index')
                         ->with('success', 'Detalle de repuesto actualizado correctamente.');
    }

    public function destroy(DetalleRepuesto $detalleRepuesto)
    {
        $detalleRepuesto->delete();

        return redirect()->route('detalle-repuestos.index')
                         ->with('success', 'Detalle de repuesto eliminado correctamente.');
    }
}
