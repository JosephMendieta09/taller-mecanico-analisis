
@extends('layouts.app')

@section('title', 'Asignación de Permisos')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    {{-- Título --}}
    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Asignación de Permisos a Roles</h6>
    </div>

    {{-- Alerta --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" permission="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Toolbar --}}
    <div class="crud-toolbar">
        <form method="GET" action="{{ route('role-permissions.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Buscar por nombre de rol..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('role-permissions.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>

        <a href="{{ route('role-permissions.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Asignar Permisos
        </a>
    </div>

    {{-- Tabla --}}
    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Roles</th>
                    <th>Permisos Asignados</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $role->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div>
                                    <div class="fw-semibold">{{ $role->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @forelse($role->permissions as $permission)
                                <span class="badge-rol">{{ $permission->name }}</span>
                            @empty
                                <span class="text-muted fst-italic small">Sin permisos</span>
                            @endforelse
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('role-permissions.edit', $role) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1"
                                   title="Editar permisos">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('role-permissions.destroy', $role) }}"
                                      onsubmit="return confirm('¿Quitar todos los permisos de {{ addslashes($role->name) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                                            title="Quitar permisos">
                                        <i class="bi bi-trash"></i> Quitar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            <i class="bi bi-shield-x display-6 d-block mb-2"></i>
                            No se encontraron roles.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    @if($roles->hasPages())
        <div class="d-flex justify-content-end mt-3">
            {{ $roles->links() }}
        </div>
    @endif

@endsection