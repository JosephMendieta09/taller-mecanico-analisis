@extends('layouts.app')
@section('title', 'Editar Orden de Trabajo')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Editar Orden de Trabajo #{{ $ordenTrabajo->id }}</h6>
    </div>
    <div class="crud-form-card">
        <form method="POST" action="{{ route('orden-trabajos.update', $ordenTrabajo) }}">
            @csrf @method('PUT')
            @include('orden-trabajos.form')
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('orden-trabajos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Actualizar Orden
                </button>
            </div>
        </form>
    </div>
@endsection
