<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\VehiculoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
 
        $vehiculos = Vehiculo::with('cliente')
            ->when($search, function ($query, $search) {
                $query->where('placa', 'like', "%{$search}%")
                      ->orWhere('marca', 'like', "%{$search}%")
                      ->orWhere('modelo', 'like', "%{$search}%")
                      ->orWhere('color', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();
 
        return view('vehiculo.index', compact('vehiculos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clientes = Cliente::orderBy('nombre')->get();
 
        return view('vehiculo.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {
        Vehiculo::create($request->validated());

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        $vehiculo->load('cliente');
 
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $vehiculo->load('cliente');
 
        return view('vehiculos.edit', compact('vehiculo', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, Vehiculo $vehiculo): RedirectResponse
    {
        $vehiculo->update($request->validated());

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
 
        return redirect()->route('vehiculos.index')
             ->with('success', 'Vehículo eliminado correctamente.');
    }

    public function assignClienteForm(Vehiculo $vehiculo)
    {
        $clientes = Cliente::orderBy('nombre')->get();
 
        return view('vehiculos.assign-cliente', compact('vehiculo', 'clientes'));
    }
 
    public function assignCliente(VehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update(['cliente_id' => $request->cliente_id]);
 
        return redirect()->route('vehiculos.index')
             ->with('success', "Cliente asignado al vehículo {$vehiculo->placa} correctamente.");
    }
}
