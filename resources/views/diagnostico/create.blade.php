@extends('layouts.app')
@section('title', 'Nuevo Diagnóstico')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Nuevo Diagnóstico</h6>
    </div>
    <div class="crud-form-card">
        <form method="POST" action="{{ route('diagnosticos.store') }}">
            @csrf
            @include('diagnosticos.form')
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Guardar Diagnóstico
                </button>
            </div>
        </form>
    </div>
@endsection