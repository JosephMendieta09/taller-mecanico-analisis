<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProblemaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProblemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $problemas = Problema::when($search, function ($query, $search) {
                $query->where('descripcion', 'like', "%{$search}%")
                      ->orWhere('categoria', 'like', "%{$search}%")
                      ->orWhere('gravedad', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('problemas.index', compact('problemas', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('problemas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProblemaRequest $request): RedirectResponse
    {
         Problema::create($request->validated());

        return redirect()->route('problemas.index')
                         ->with('success', 'Problema registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Problema $problema)
    {
        return view('problemas.show', compact('problema'));
    }

    public function edit(Problema $problema)
    {
        return view('problemas.edit', compact('problema'));
    }

    public function update(ProblemaRequest $request, Problema $problema)
    {
        $problema->update($request->validated());

        return redirect()->route('problemas.index')
                         ->with('success', 'Problema actualizado correctamente.');
    }

    public function destroy(Problema $problema)
    {
        $problema->delete();

        return redirect()->route('problemas.index')
                         ->with('success', 'Problema eliminado correctamente.');
    }
}
