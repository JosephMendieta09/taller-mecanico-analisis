@extends('layouts.app')
 
@section('title', 'Vehículos')
 
@push('styles')
    @vite('resources/css/cruds.css')
@endpush
 
@section('content')
 
    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Administrar Vehículos</h6>
    </div>
 
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
 
    <div class="crud-toolbar">
        <form method="GET" action="{{ route('vehiculos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por placa, marca, modelo o color..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Vehículo
        </a>
    </div>
 
    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Marca / Modelo</th>
                    <th>Color</th>
                    <th>Km</th>
                    <th>Cliente</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $vehiculo)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $vehiculo->id }}</td>
                        <td>
                            <span class="badge-placa">{{ $vehiculo->placa }}</span>
                        </td>
                        <td>{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</td>
                        <td>{{ ucfirst($vehiculo->color) }}</td>
                        <td>{{ number_format($vehiculo->kilometraje, 0, ',', '.') }} km</td>
                        <td>
                            @if($vehiculo->cliente)
                                <span class="fw-semibold">{{ $vehiculo->cliente->nombre }}</span>
                            @else
                                <span class="badge bg-warning text-dark">Sin cliente</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
 
                                {{-- Botón asignar cliente (solo si no tiene) --}}
                                @unless($vehiculo->cliente)
                                    <a href="{{ route('vehiculos.assign-cliente', $vehiculo) }}"
                                       class="btn btn-sm btn-warning d-flex align-items-center gap-1"
                                       title="Asignar cliente">
                                        <i class="bi bi-person-plus"></i>
                                    </a>
                                @endunless
 
                                <a href="{{ route('vehiculos.edit', $vehiculo) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('vehiculos.destroy', $vehiculo) }}"
                                      onsubmit="return confirm('¿Eliminar el vehículo {{ addslashes($vehiculo->placa) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-car-front display-6 d-block mb-2"></i>
                            No se encontraron vehículos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
 
    @if($vehiculos->hasPages())
        <div class="d-flex justify-content-end mt-3">
            {{ $vehiculos->links() }}
        </div>
    @endif
 
@endsection