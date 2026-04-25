@extends('layouts.app')
@section('title', 'Detalle de Repuesto')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Repuesto</h6>
    </div>
    <div class="crud-form-card">
        <div class="row g-3 mb-3">
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-box-seam me-1"></i> Nombre
                </p>
                <p class="fw-semibold fs-5">{{ $repuesto->nombre }}</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-currency-dollar me-1"></i> Precio Unitario
                </p>
                <p class="fw-semibold">$ {{ number_format($repuesto->precio_unitario, 2) }}</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-archive me-1"></i> Stock Actual
                </p>
                <p class="fw-semibold">{{ $repuesto->stock_actual }} unidades</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-exclamation-triangle me-1"></i> Stock Mínimo
                </p>
                <p class="fw-semibold">{{ $repuesto->stock_minimo }} unidades</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">Estado de stock</p>
                @if($repuesto->stockBajo())
                    <span class="badge-estado badge-estado--pendiente">
                        <i class="bi bi-exclamation-triangle me-1"></i> Stock bajo
                    </span>
                @else
                    <span class="badge-estado badge-estado--completado">
                        <i class="bi bi-check-circle me-1"></i> Stock OK
                    </span>
                @endif
            </div>
        </div>
        <hr>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('repuestos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('repuestos.edit', $repuesto) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection
