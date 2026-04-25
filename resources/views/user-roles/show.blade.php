
@extends('layouts.app')

@section('title', 'Roles de Usuario')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Roles de {{ $user->name }}</h6>
    </div>

    <div class="crud-form-card">

        {{-- Avatar + datos --}}
        <div class="text-center mb-4">
            <div class="user-avatar-lg mx-auto mb-3">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
            <p class="text-muted mb-0">{{ $user->email }}</p>
        </div>

        <hr>

        {{-- Roles asignados --}}
        <p class="fw-semibold mb-2">
            <i class="bi bi-shield-lock me-1 text-naranja"></i> Roles asignados:
        </p>

        @forelse($user->roles as $role)
            <span class="badge-rol me-1 mb-1">{{ $role->name }}</span>
        @empty
            <p class="text-muted fst-italic">Este usuario no tiene roles asignados.</p>
        @endforelse

        <hr class="mt-4">

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('user-roles.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('user-roles.edit', $user) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar Roles
            </a>
        </div>

    </div>

@endsection