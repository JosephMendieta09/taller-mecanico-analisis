<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
 
        $clientes = Cliente::when($search, function ($query, $search) {
                $query->where('nombre', 'like', "%{$search}%")
                      ->orWhere('cedula', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('telefono', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();
 
        return view('cliente.index', compact('clientes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cliente = new Cliente();

        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request): RedirectResponse
    {
        Cliente::create($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $cliente->load('vehiculos');
 
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $cliente->update($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
