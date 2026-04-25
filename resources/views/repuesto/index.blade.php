@extends('layouts.app')
@section('title', 'Repuestos')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Inventario de Repuestos</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('repuestos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por nombre..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('repuestos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('repuestos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Repuesto
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Stock Actual</th>
                    <th>Stock Mínimo</th>
                    <th>Estado Stock</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($repuestos as $repuesto)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $repuesto->id }}</td>
                        <td class="fw-semibold">{{ $repuesto->nombre }}</td>
                        <td>$ {{ number_format($repuesto->precio_unitario, 2) }}</td>
                        <td>{{ $repuesto->stock_actual }}</td>
                        <td>{{ $repuesto->stock_minimo }}</td>
                        <td>
                            @if($repuesto->stockBajo())
                                <span class="badge-estado badge-estado--pendiente">
                                    <i class="bi bi-exclamation-triangle me-1"></i>Stock bajo
                                </span>
                            @else
                                <span class="badge-estado badge-estado--completado">
                                    <i class="bi bi-check-circle me-1"></i>OK
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('repuestos.edit', $repuesto) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('repuestos.destroy', $repuesto) }}"
                                      onsubmit="return confirm('¿Eliminar el repuesto {{ addslashes($repuesto->nombre) }}?')">
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
                            No se encontraron repuestos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($repuestos->hasPages())
        <div class="d-flex justify-content-end mt-3">{{ $repuestos->links() }}</div>
    @endif

@endsection