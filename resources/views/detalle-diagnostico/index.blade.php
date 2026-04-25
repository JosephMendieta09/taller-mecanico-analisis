@extends('layouts.app')
@section('title', 'Detalle de Diagnósticos')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Detalle de Diagnósticos</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('detalle-diagnosticos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por placa, problema, observación o prioridad..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('detalle-diagnosticos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('detalle-diagnosticos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Detalle
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Diagnóstico</th>
                    <th>Problema</th>
                    <th>Observación</th>
                    <th>Prioridad</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($detalles as $detalle)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $detalle->id }}</td>
                        <td>
                            <div class="fw-semibold">Diagnóstico #{{ $detalle->diagnostico->id }}</div>
                            @if($detalle->diagnostico->vehiculo)
                                <span class="badge-placa">{{ $detalle->diagnostico->vehiculo->placa }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $detalle->problema->descripcion }}</div>
                            <div class="text-muted small">{{ $detalle->problema->categoria }}</div>
                        </td>
                        <td class="text-truncate" style="max-width: 180px;">
                            {{ $detalle->observacion }}
                        </td>
                        <td>
                            <span class="badge-prioridad badge-prioridad--{{ strtolower($detalle->prioridad) }}">
                                {{ $detalle->prioridad }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('detalle-diagnosticos.edit', $detalle) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('detalle-diagnosticos.destroy', $detalle) }}"
                                      onsubmit="return confirm('¿Eliminar este detalle?')">
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
                            No se encontraron detalles.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($detalles->hasPages())
        <div class="d-flex justify-content-end mt-3">{{ $detalles->links() }}</div>
    @endif

@endsection