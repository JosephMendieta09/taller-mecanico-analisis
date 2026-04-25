
@extends('layouts.app')

@section('title', 'Usuarios')

@push('styles')
@vite('resources/css/cruds.css')
@endpush

@section('content')

{{-- Título --}}
<div class="dash-section-title">
    <div class="bar"></div>
    <h6>Administrar Usuarios</h6>
</div>

{{-- Alertas --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Barra: búsqueda + botón nuevo --}}
<div class="crud-toolbar">
    <form method="GET" action="{{ route('users.index') }}" class="crud-search">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text"
                name="search"
                class="form-control"
                placeholder="Buscar por nombre o correo..."
                value="{{ $search ?? '' }}">
            <button class="btn btn-naranja" type="submit">
                <i class="bi bi-search me-1"></i> Buscar
            </button>
            @if($search)
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-lg"></i>
            </a>
            @endif
        </div>
    </form>

    <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> Nuevo Usuario
    </a>
</div>

{{-- Tabla --}}
<div class="crud-wrapper">
    <table class="table table-crud">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td class="text-muted fw-semibold">{{ $user->id }}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div class="user-avatar-sm">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        {{ $user->name }}
                    </div>
                </td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('users.edit', $user) }}"
                            class="btn btn-sm btn-success d-flex align-items-center gap-1"
                            title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form method="POST" action="{{ route('users.destroy', $user) }}"
                            onsubmit="return confirm('¿Eliminar al usuario {{ addslashes($user->name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                                title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-4 text-muted">
                    <i class="bi bi-people display-6 d-block mb-2"></i>
                    No se encontraron usuarios.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Paginación --}}
@if($users->hasPages())
<div class="d-flex justify-content-end mt-3">
    {{ $users->links() }}
</div>
@endif

@endsection