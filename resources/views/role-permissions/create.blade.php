
@extends('layouts.app')

@section('title', 'Asignar Permiso')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Asignar Permisos a Roles</h6>
    </div>

    <div class="crud-form-card">
        <form method="POST" action="{{ route('role-permissions.store') }}">
            @csrf

            @include('role-permissions.form')

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('role-permissions.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-shield-plus"></i> Asignar
                </button>
            </div>
        </form>
    </div>

@endsection