@extends('layouts.app')
@section('title', 'Detalle de Diagnóstico')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Diagnóstico #{{ $diagnostico->id }}</h6>
    </div>
    <div class="crud-form-card">

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-car-front me-1"></i> Vehículo
                </p>
                @if($diagnostico->vehiculo)
                    <span class="badge-placa me-2">{{ $diagnostico->vehiculo->placa }}</span>
                    {{ $diagnostico->vehiculo->marca }} {{ $diagnostico->vehiculo->modelo }}
                @else
                    <span class="text-muted fst-italic">Sin vehículo</span>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-flag me-1"></i> Estado
                </p>
                <span class="badge-estado badge-estado--{{ strtolower(str_replace(' ', '-', $diagnostico->estado)) }}">
                    {{ $diagnostico->estado }}
                </span>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-text-paragraph me-1"></i> Descripción
                </p>
                <p class="fw-semibold">{{ $diagnostico->descripcion }}</p>
            </div>
        </div>

        <hr>

        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="fw-semibold mb-0">
                <i class="bi bi-list-ul me-1 text-naranja"></i> Problemas detectados
            </p>
            <a href="{{ route('detalle-diagnosticos.create', ['diagnostico_id' => $diagnostico->id]) }}"
               class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                <i class="bi bi-plus-lg"></i> Agregar detalle
            </a>
        </div>

        @forelse($diagnostico->detalles as $detalle)
            <div class="detalle-card">
                <div class="d-flex align-items-start justify-content-between gap-2">
                    <div>
                        <div class="fw-semibold">{{ $detalle->problema->descripcion }}</div>
                        <div class="text-muted small">{{ $detalle->observacion }}</div>
                    </div>
                    <span class="badge-prioridad badge-prioridad--{{ strtolower($detalle->prioridad) }}">
                        {{ $detalle->prioridad }}
                    </span>
                </div>
            </div>
        @empty
            <p class="text-muted fst-italic">No hay problemas registrados en este diagnóstico.</p>
        @endforelse

        <hr class="mt-4">

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('diagnosticos.edit', $diagnostico) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection