{{-- resources/views/users/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Usuario')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    {{-- Título --}}
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Editar Usuario</h6>
    </div>

    {{-- Tarjeta del formulario --}}
    <div class="crud-form-card">
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            @include('user.form')

            {{-- Botones --}}
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Actualizar
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/cruds.js')
@endpush