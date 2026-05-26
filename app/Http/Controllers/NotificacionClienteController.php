<?php

namespace App\Http\Controllers;

use App\Models\NotificacionCliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NotificacionClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NotificacionClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $notificacionClientes = NotificacionCliente::paginate();

        return view('notificacion-cliente.index', compact('notificacionClientes'))
            ->with('i', ($request->input('page', 1) - 1) * $notificacionClientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $notificacionCliente = new NotificacionCliente();

        return view('notificacion-cliente.create', compact('notificacionCliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificacionClienteRequest $request): RedirectResponse
    {
        NotificacionCliente::create($request->validated());

        return Redirect::route('notificacion-clientes.index')
            ->with('success', 'NotificacionCliente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $notificacionCliente = NotificacionCliente::find($id);

        return view('notificacion-cliente.show', compact('notificacionCliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $notificacionCliente = NotificacionCliente::find($id);

        return view('notificacion-cliente.edit', compact('notificacionCliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificacionClienteRequest $request, NotificacionCliente $notificacionCliente): RedirectResponse
    {
        $notificacionCliente->update($request->validated());

        return Redirect::route('notificacion-clientes.index')
            ->with('success', 'NotificacionCliente updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        NotificacionCliente::find($id)->delete();

        return Redirect::route('notificacion-clientes.index')
            ->with('success', 'NotificacionCliente deleted successfully');
    }
}
