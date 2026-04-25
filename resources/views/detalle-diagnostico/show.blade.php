@extends('layouts.app')
@section('title', 'Detalle de Diagnóstico')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Diagnóstico #{{ $detalleDiagnostico->id }}</h6>
    </div>
    <div class="crud-form-card">

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-clipboard2 me-1"></i> Diagnóstico
                </p>
                <p class="fw-semibold">
                    #{{ $detalleDiagnostico->diagnostico->id }}
                    @if($detalleDiagnostico->diagnostico->vehiculo)
                        — <span class="badge-placa">{{ $detalleDiagnostico->diagnostico->vehiculo->placa }}</span>
                    @endif
                </p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-sort-up me-1"></i> Prioridad
                </p>
                <span class="badge-prioridad badge-prioridad--{{ strtolower($detalleDiagnostico->prioridad) }}">
                    {{ $detalleDiagnostico->prioridad }}
                </span>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-exclamation-circle me-1"></i> Problema
                </p>
                <p class="fw-semibold mb-0">{{ $detalleDiagnostico->problema->descripcion }}</p>
                <p class="text-muted small">
                    {{ $detalleDiagnostico->problema->categoria }} —
                    <span class="badge-gravedad badge-gravedad--{{ strtolower($detalleDiagnostico->problema->gravedad) }}">
                        {{ $detalleDiagnostico->problema->gravedad }}
                    </span>
                </p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-chat-text me-1"></i> Observación
                </p>
                <p class="fw-semibold">{{ $detalleDiagnostico->observacion }}</p>
            </div>
        </div>

        <hr>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('detalle-diagnosticos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('detalle-diagnosticos.edit', $detalleDiagnostico) }}"
               class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection
