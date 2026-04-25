@extends('layouts.app')

@section('title', 'Permisos')

@push('styles')
@vite('resources/css/cruds.css')
@endpush

@section('content')
{{-- Título --}}
<div class="dash-section-title">
    <div class="bar"></div>
    <h6>Administrar Permisos</h6>
</div>

{{-- Alertas --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" permission="alert">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Barra: búsqueda + botón nuevo --}}
<div class="crud-toolbar">
    <form method="GET" action="{{ route('permissions.index') }}" class="crud-search">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text"
                name="search"
                class="form-control"
                placeholder="Buscar por nombre del permiso..."
                value="{{ $search ?? '' }}">
            <button class="btn btn-naranja" type="submit">
                <i class="bi bi-search me-1"></i> Buscar
            </button>
            @if($search)
            <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-lg"></i>
            </a>
            @endif
        </div>
    </form>

    <a href="{{ route('permissions.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> Nuevo Permiso
    </a>
</div>

{{-- Tabla --}}
<div class="crud-wrapper">
    <table class="table table-crud">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del Permiso</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $permission)
            <tr>
                <td class="text-muted fw-semibold">{{ $permission->id }}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        {{ $permission->name }}
                    </div>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('permissions.edit', $permission) }}"
                            class="btn btn-sm btn-success d-flex align-items-center gap-1"
                            title="Editar">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form method="POST" action="{{ route('permissions.destroy', $permission) }}"
                            onsubmit="return confirm('¿Eliminar el permiso {{ addslashes($permission->name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                                title="Eliminar">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-4 text-muted">
                    <i class="bi bi-people display-6 d-block mb-2"></i>
                    No se encontraron permisos.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Paginación --}}
@if($permissions->hasPages())
<div class="d-flex justify-content-end mt-3">
    {{ $permissions->links() }}
</div>
@endif
@endsection
