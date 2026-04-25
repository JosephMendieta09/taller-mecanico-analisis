@extends('layouts.app')

@section('title', 'Problemas')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Catálogo de Problemas</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('problemas.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por descripción, categoría o gravedad..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('problemas.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('problemas.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Problema
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Gravedad</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($problemas as $problema)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $problema->id }}</td>
                        <td>{{ $problema->descripcion }}</td>
                        <td>{{ $problema->categoria }}</td>
                        <td>
                            <span class="badge-gravedad badge-gravedad--{{ strtolower($problema->gravedad) }}">
                                {{ $problema->gravedad }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('problemas.edit', $problema) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('problemas.destroy', $problema) }}"
                                      onsubmit="return confirm('¿Eliminar este problema?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="bi bi-exclamation-circle display-6 d-block mb-2"></i>
                            No se encontraron problemas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($problemas->hasPages())
        <div class="d-flex justify-content-end mt-3">{{ $problemas->links() }}</div>
    @endif

@endsection
