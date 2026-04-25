{{-- resources/views/users/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle de Usuario')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    {{-- Título --}}
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Detalle de Usuario</h6>
    </div>

    <div class="crud-form-card">

        {{-- Avatar + nombre --}}
        <div class="text-center mb-4">
            <div class="user-avatar-lg mx-auto mb-3">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
            <p class="text-muted mb-0">{{ $user->email }}</p>
        </div>

        <hr>

        {{-- Datos --}}
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-hash me-1"></i> ID
                </p>
                <p class="fw-semibold">{{ $user->id }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="mb-1 text-muted small fw-semibold text-uppercase">
                    <i class="bi bi-calendar me-1"></i> Registrado
                </p>
                <p class="fw-semibold">{{ $user->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <hr>

        {{-- Botones --}}
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('users.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>

    </div>

@endsection