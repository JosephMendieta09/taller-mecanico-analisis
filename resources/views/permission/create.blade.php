@extends('layouts.app')

@section('title', 'Nuevo Permiso')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    {{-- Título --}}
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Nuevo Permiso</h6>
    </div>

    {{-- Tarjeta del formulario --}}
    <div class="crud-form-card">
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf

            @include('permission.form')

            {{-- Botones --}}
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Registrar Permiso
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/cruds.js')
@endpush
