@extends('layouts.app')
@section('title', 'Detalle de Problema')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Problema</h6>
    </div>
    <div class="crud-form-card">
        <div class="row g-3 mb-3">
            <div class="col-12">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-text-paragraph me-1"></i> Descripción
                </p>
                <p class="fw-semibold">{{ $problema->descripcion }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-tag me-1"></i> Categoría
                </p>
                <p class="fw-semibold">{{ $problema->categoria }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-exclamation-triangle me-1"></i> Gravedad
                </p>
                <span class="badge-gravedad badge-gravedad--{{ strtolower($problema->gravedad) }}">
                    {{ $problema->gravedad }}
                </span>
            </div>
        </div>
        <hr>
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('problemas.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('problemas.edit', $problema) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection
