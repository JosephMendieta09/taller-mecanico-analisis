<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RepuestoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
       $search = $request->input('search');

        $repuestos = Repuesto::when($search, function ($query, $search) {
                $query->where('nombre', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('repuestos.index', compact('repuestos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       return view('repuestos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RepuestoRequest $request): RedirectResponse
    {
        Repuesto::create($request->validated());

        return redirect()->route('repuestos.index')
                         ->with('success', 'Repuesto registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Repuesto $repuesto)
    {
        return view('repuestos.show', compact('repuesto'));
    }

    public function edit(Repuesto $repuesto)
    {
        return view('repuestos.edit', compact('repuesto'));
    }

    public function update(RepuestoRequest $request, Repuesto $repuesto)
    {
        $repuesto->update($request->validated());

        return redirect()->route('repuestos.index')
                         ->with('success', 'Repuesto actualizado correctamente.');
    }

    public function destroy(Repuesto $repuesto)
    {
        $repuesto->delete();

        return redirect()->route('repuestos.index')
                         ->with('success', 'Repuesto eliminado correctamente.');
    }
}
