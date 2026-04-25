@extends('layouts.app')
@section('title', 'Órdenes de Trabajo')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Órdenes de Trabajo</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('orden-trabajos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por placa, estado o notas..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('orden-trabajos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('orden-trabajos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nueva Orden
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vehículo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Costo</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ordenes as $orden)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $orden->id }}</td>
                        <td>
                            @if($orden->diagnostico?->vehiculo)
                                <span class="badge-placa">{{ $orden->diagnostico->vehiculo->placa }}</span>
                                <div class="text-muted small">
                                    {{ $orden->diagnostico->vehiculo->marca }}
                                    {{ $orden->diagnostico->vehiculo->modelo }}
                                </div>
                            @else
                                <span class="text-muted fst-italic">Sin vehículo</span>
                            @endif
                        </td>
                        <td>{{ $orden->fecha_inicio->format('d/m/Y') }}</td>
                        <td>{{ $orden->fecha_final->format('d/m/Y') }}</td>
                        <td class="fw-semibold">$ {{ number_format($orden->costo, 2) }}</td>
                        <td>
                            <span class="badge-estado badge-estado--{{ strtolower(str_replace(' ', '-', $orden->estado)) }}">
                                {{ $orden->estado }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('orden-trabajos.edit', $orden) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('orden-trabajos.destroy', $orden) }}"
                                      onsubmit="return confirm('¿Eliminar esta orden de trabajo?')">
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
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-clipboard2-x display-6 d-block mb-2"></i>
                            No se encontraron órdenes de trabajo.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($ordenes->hasPages())
        <div class="d-flex justify-content-end mt-3">{{ $ordenes->links() }}</div>
    @endif

@endsection
