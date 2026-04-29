
@extends('layouts.app')
@section('title', 'Detalle de Mecánico')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Mecánico</h6>
    </div>
    <div class="crud-form-card">

        <div class="text-center mb-4">
            <div class="user-avatar-lg mx-auto mb-3">
                {{ strtoupper(substr($mecanico->nombre, 0, 1)) }}
            </div>
            <h5 class="fw-bold mb-1">{{ $mecanico->nombre }}</h5>
            <p class="text-muted mb-2">{{ $mecanico->email }}</p>
            @if($mecanico->estado === 'disponible')
                <span class="badge-estado badge-estado--completado">
                    <i class="bi bi-check-circle me-1"></i>Disponible
                </span>
            @else
                <span class="badge-estado badge-estado--en-proceso">
                    <i class="bi bi-wrench me-1"></i>Ocupado
                </span>
            @endif
        </div>

        <hr>

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-card-text me-1"></i> Cédula
                </p>
                <p class="fw-semibold">{{ $mecanico->cedula }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-telephone me-1"></i> Teléfono
                </p>
                <p class="fw-semibold">{{ $mecanico->telefono }}</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-geo-alt me-1"></i> Dirección
                </p>
                <p class="fw-semibold">{{ $mecanico->direccion }}</p>
            </div>
        </div>

        <hr>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('mecanicos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('mecanicos.edit', $mecanico) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>

    </div>
@endsection