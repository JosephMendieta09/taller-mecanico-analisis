@extends('layouts.app')
@section('title', 'Diagnósticos')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Gestión de Diagnósticos</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('diagnosticos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por placa, descripción o estado..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('diagnosticos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('diagnosticos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Diagnóstico
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vehículo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Detalles</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diagnosticos as $diagnostico)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $diagnostico->id }}</td>
                        <td>
                            @if($diagnostico->vehiculo)
                                <span class="badge-placa">{{ $diagnostico->vehiculo->placa }}</span>
                                <div class="text-muted small">{{ $diagnostico->vehiculo->marca }} {{ $diagnostico->vehiculo->modelo }}</div>
                            @else
                                <span class="text-muted fst-italic">Sin vehículo</span>
                            @endif
                        </td>
                        <td class="text-truncate" style="max-width: 200px;">
                            {{ $diagnostico->descripcion }}
                        </td>
                        <td>
                            <span class="badge-estado badge-estado--{{ strtolower(str_replace(' ', '-', $diagnostico->estado)) }}">
                                {{ $diagnostico->estado }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('detalle-diagnosticos.index', ['diagnostico' => $diagnostico->id]) }}"
                               class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1 w-fit">
                                <i class="bi bi-list-ul"></i>
                                {{ $diagnostico->detalles_count ?? $diagnostico->detalles->count() }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('diagnosticos.edit', $diagnostico) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('diagnosticos.destroy', $diagnostico) }}"
                                      onsubmit="return confirm('¿Eliminar este diagnóstico?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-clipboard2-x display-6 d-block mb-2"></i>
                            No se encontraron diagnósticos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($diagnosticos->hasPages())
        <div class="d-flex justify-content-end mt-3">{{ $diagnosticos->links() }}</div>
    @endif

@endsection
