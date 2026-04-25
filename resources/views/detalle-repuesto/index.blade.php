@extends('layouts.app')
@section('title', 'Detalle de Repuestos')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Detalle de Repuestos por Orden</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('detalle-repuestos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por repuesto o placa..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('detalle-repuestos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('detalle-repuestos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Detalle
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Orden / Vehículo</th>
                    <th>Repuesto</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Monto</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($detalles as $detalle)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $detalle->id }}</td>
                        <td>
                            <div class="fw-semibold">Orden #{{ $detalle->ordenTrabajo->id }}</div>
                            @if($detalle->ordenTrabajo->diagnostico?->vehiculo)
                                <span class="badge-placa">
                                    {{ $detalle->ordenTrabajo->diagnostico->vehiculo->placa }}
                                </span>
                            @endif
                        </td>
                        <td>{{ $detalle->repuesto->nombre }}</td>
                        <td>{{ $detalle->fecha->format('d/m/Y') }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td class="fw-semibold">$ {{ number_format($detalle->monto, 2) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('detalle-repuestos.edit', $detalle) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('detalle-repuestos.destroy', $detalle) }}"
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
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-box-seam display-6 d-block mb-2"></i>
                            No se encontraron detalles de repuestos.
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
