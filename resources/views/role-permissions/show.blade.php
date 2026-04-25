
@extends('layouts.app')

@section('title', 'Permisos del Rol')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Permisos de {{ $role->name }}</h6>
    </div>

    <div class="crud-form-card">

        {{-- Avatar + datos --}}
        <div class="text-center mb-4">
            <h5 class="fw-bold mb-0">{{ $role->name }}</h5>
        </div>

        <hr>

        {{-- Roles asignados --}}
        <p class="fw-semibold mb-2">
            <i class="bi bi-shield-lock me-1 text-naranja"></i> Permisos asignados:
        </p>

        @forelse($role->permissions as $permission)
            <span class="badge-rol me-1 mb-1">{{ $permission->name }}</span>
        @empty
            <p class="text-muted fst-italic">Este rol no tiene permisos asignados.</p>
        @endforelse

        <hr class="mt-4">

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('role-permissions.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="{{ route('role-permissions.edit', $role) }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-pencil"></i> Editar Permisos
            </a>
        </div>

    </div>

@endsection