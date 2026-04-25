@extends('layouts.app')
 
@section('title', 'Detalle de Cliente')
 
@push('styles')
    @vite('resources/css/cruds.css')
@endpush
 
@section('content')
 
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Cliente</h6>
    </div>
 
    <div class="crud-form-card">
 
        <div class="text-center mb-4">
            <div class="user-avatar-lg mx-auto mb-3">
                {{ strtoupper(substr($cliente->nombre, 0, 1)) }}
            </div>
            <h5 class="fw-bold mb-0">{{ $cliente->nombre }}</h5>
            <p class="text-muted mb-0">{{ $cliente->email }}</p>
        </div>
 
        <hr>
 
        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-card-text me-1"></i> Cédula
                </p>
                <p class="fw-semibold">{{ $cliente->cedula }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-telephone me-1"></i> Teléfono
                </p>
                <p class="fw-semibold">{{ $cliente->telefono }}</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-geo-alt me-1"></i> Dirección
                </p>
                <p class="fw-semibold">{{ $cliente->direccion }}</p>
            </div>
        </div>
 
        <hr>
 
        {{-- Vehículos del cliente --}}
        <p class="fw-semibold mb-2">
            <i class="bi bi-car-front me-1 text-naranja"></i> Vehículos registrados
        </p>
 
        @forelse($cliente->vehiculos as $vehiculo)
            <div class="vehiculo-mini-card">
                <div>
                    <span class="fw-bold">{{ $vehiculo->placa }}</span>
                    <span class="text-muted ms-2">{{ $vehiculo->marca }} {{ $vehiculo->modelo }} — {{ $vehiculo->color }}</span>
                </div>
                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-pencil"></i>
                </a>
            </div>
        @empty
            <p class="text-muted fst-italic">Este cliente no tiene vehículos registrados.</p>
        @endforelse
 
        <hr class="mt-4">
 
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
 
    </div>
 
@endsection