@extends('layouts.app')
 
@section('title', 'Detalle de Vehículo')
 
@push('styles')
    @vite('resources/css/cruds.css')
@endpush
 
@section('content')
 
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Vehículo</h6>
    </div>
 
    <div class="crud-form-card">
 
        <div class="text-center mb-4">
            <div class="vehiculo-avatar mx-auto mb-3">
                <i class="bi bi-car-front"></i>
            </div>
            <h5 class="fw-bold mb-0">{{ $vehiculo->placa }}</h5>
            <p class="text-muted mb-0">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</p>
        </div>
 
        <hr>
 
        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-palette me-1"></i> Color
                </p>
                <p class="fw-semibold">{{ ucfirst($vehiculo->color) }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-speedometer2 me-1"></i> Kilometraje
                </p>
                <p class="fw-semibold">{{ number_format($vehiculo->kilometraje, 0, ',', '.') }} km</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-person me-1"></i> Cliente
                </p>
                @if($vehiculo->cliente)
                    <p class="fw-semibold">
                        {{ $vehiculo->cliente->nombre }}
                        <span class="text-muted fw-normal">— {{ $vehiculo->cliente->cedula }}</span>
                    </p>
                @else
                    <span class="badge bg-warning text-dark">Sin cliente asignado</span>
                @endif
            </div>
        </div>
 
        <hr>
 
        <div class="d-flex gap-2 justify-content-end flex-wrap">
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            @unless($vehiculo->cliente)
                <a href="{{ route('vehiculos.assign-cliente', $vehiculo) }}"
                   class="btn btn-warning d-flex align-items-center gap-2">
                    <i class="bi bi-person-plus"></i> Asignar Cliente
                </a>
            @endunless
            <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
 
    </div>
 
@endsection