@extends('layouts.app')
@section('title', 'Detalle de Repuesto')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Repuesto #{{ $detalleRepuesto->id }}</h6>
    </div>
    <div class="crud-form-card">
        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-clipboard2-check me-1"></i> Orden de Trabajo
                </p>
                <p class="fw-semibold">
                    Orden #{{ $detalleRepuesto->ordenTrabajo->id }}
                    @if($detalleRepuesto->ordenTrabajo->diagnostico?->vehiculo)
                        — <span class="badge-placa">{{ $detalleRepuesto->ordenTrabajo->diagnostico->vehiculo->placa }}</span>
                    @endif
                </p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-calendar me-1"></i> Fecha
                </p>
                <p class="fw-semibold">{{ $detalleRepuesto->fecha->format('d/m/Y') }}</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-box-seam me-1"></i> Repuesto
                </p>
                <p class="fw-semibold mb-0">{{ $detalleRepuesto->repuesto->nombre }}</p>
                <p class="text-muted small">
                    Precio unitario: $ {{ number_format($detalleRepuesto->repuesto->precio_unitario, 2) }}
                </p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-hash me-1"></i> Cantidad
                </p>
                <p class="fw-semibold">{{ $detalleRepuesto->cantidad }} unidades</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-currency-dollar me-1"></i> Monto Total
                </p>
                <p class="fw-bold fs-5 text-naranja">$ {{ number_format($detalleRepuesto->monto, 2) }}</p>
            </div>
        </div>
        <hr>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('detalle-repuestos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('detalle-repuestos.edit', $detalleRepuesto) }}"
               class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection
