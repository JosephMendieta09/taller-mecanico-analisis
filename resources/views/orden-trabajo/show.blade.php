@extends('layouts.app')
@section('title', 'Detalle de Orden de Trabajo')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Orden de Trabajo #{{ $ordenTrabajo->id }}</h6>
    </div>
    <div class="crud-form-card">

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-car-front me-1"></i> Vehículo
                </p>
                @if($ordenTrabajo->diagnostico?->vehiculo)
                    <span class="badge-placa me-2">{{ $ordenTrabajo->diagnostico->vehiculo->placa }}</span>
                    {{ $ordenTrabajo->diagnostico->vehiculo->marca }}
                    {{ $ordenTrabajo->diagnostico->vehiculo->modelo }}
                @else
                    <span class="text-muted fst-italic">Sin vehículo</span>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-flag me-1"></i> Estado
                </p>
                <span class="badge-estado badge-estado--{{ strtolower(str_replace(' ', '-', $ordenTrabajo->estado)) }}">
                    {{ $ordenTrabajo->estado }}
                </span>
            </div>
            <div class="col-12 col-md-4">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-calendar-event me-1"></i> Fecha Inicio
                </p>
                <p class="fw-semibold">{{ $ordenTrabajo->fecha_inicio->format('d/m/Y') }}</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-calendar-check me-1"></i> Fecha Final
                </p>
                <p class="fw-semibold">{{ $ordenTrabajo->fecha_final->format('d/m/Y') }}</p>
            </div>
            <div class="col-12 col-md-4">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-currency-dollar me-1"></i> Costo
                </p>
                <p class="fw-semibold fs-5 text-naranja">$ {{ number_format($ordenTrabajo->costo, 2) }}</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-journal-text me-1"></i> Notas
                </p>
                <p class="fw-semibold">{{ $ordenTrabajo->notas }}</p>
            </div>
        </div>

        <hr>

        {{-- Repuestos utilizados --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="fw-semibold mb-0">
                <i class="bi bi-box-seam me-1 text-naranja"></i> Repuestos utilizados
            </p>
            <a href="{{ route('detalle-repuestos.create', ['orden_trabajo_id' => $ordenTrabajo->id]) }}"
               class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                <i class="bi bi-plus-lg"></i> Agregar repuesto
            </a>
        </div>

        @forelse($ordenTrabajo->detallesRepuesto as $detalle)
            <div class="detalle-card">
                <div class="d-flex align-items-center justify-content-between gap-2">
                    <div>
                        <div class="fw-semibold">{{ $detalle->repuesto->nombre }}</div>
                        <div class="text-muted small">
                            Cantidad: {{ $detalle->cantidad }} ×
                            $ {{ number_format($detalle->repuesto->precio_unitario, 2) }}
                        </div>
                    </div>
                    <div class="fw-bold text-naranja">
                        $ {{ number_format($detalle->monto, 2) }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted fst-italic">No hay repuestos registrados en esta orden.</p>
        @endforelse

        @if($ordenTrabajo->detallesRepuesto->count())
            <div class="text-end mt-2 fw-bold">
                Total repuestos:
                <span class="text-naranja fs-5">
                    $ {{ number_format($ordenTrabajo->detallesRepuesto->sum('monto'), 2) }}
                </span>
            </div>
        @endif

        <hr class="mt-4">

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('orden-trabajos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('orden-trabajos.edit', $ordenTrabajo) }}"
               class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection
