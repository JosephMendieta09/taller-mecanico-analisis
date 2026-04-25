@extends('layouts.app')
 
@section('title', 'Nuevo Vehículo')
 
@push('styles')
    @vite('resources/css/cruds.css')
@endpush
 
@section('content')
 
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Nuevo Vehículo</h6>
    </div>
 
    <div class="crud-form-card">
        <form method="POST" action="{{ route('vehiculos.store') }}">
            @csrf
            @include('vehiculo.form')
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Guardar Vehículo
                </button>
            </div>
        </form>
    </div>
 
@endsection