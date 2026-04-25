
@extends('layouts.app')

@section('title', 'Editar Roles')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Editar Roles de {{ $user->name }}</h6>
    </div>

    <div class="crud-form-card">
        <form method="POST" action="{{ route('user-roles.update', $user) }}">
            @csrf
            @method('PUT')

            @include('user-roles.form')

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('user-roles.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-shield-plus"></i> Actualizar
                </button>
            </div>
        </form>
    </div>

@endsection