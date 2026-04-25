@extends('layouts.app')
@section('title', 'Editar Problema')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Editar Problema</h6>
    </div>
    <div class="crud-form-card">
        <form method="POST" action="{{ route('problemas.update', $problema) }}">
            @csrf @method('PUT')
            @include('problemas.form')
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('problemas.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Actualizar Problema
                </button>
            </div>
        </form>
    </div>
@endsection