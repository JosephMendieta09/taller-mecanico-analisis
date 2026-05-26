@extends('layouts.app')

@section('title', 'Mecánicos')

@push('styles')
    @vite('resources/css/cruds.css')
@endpush

@section('content')

    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Administrar Mecánicos</h6>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="crud-toolbar">
        <form method="GET" action="{{ route('mecanicos.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por nombre, cédula, correo o estado..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('mecanicos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('mecanicos.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Mecánico
        </a>
    </div>

    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mecanicos as $mecanico)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $mecanico->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar-sm">
                                    {{ strtoupper(substr($mecanico->nombre, 0, 1)) }}
                                </div>
                                {{ $mecanico->nombre }}
                            </div>
                        </td>
                        <td>{{ $mecanico->cedula }}</td>
                        <td>{{ $mecanico->email }}</td>
                        <td>{{ $mecanico->telefono }}</td>
                        <td>
                            @if($mecanico->estado === 'disponible')
                                <span class="badge-estado badge-estado--completado">
                                    <i class="bi bi-check-circle me-1"></i>Disponible
                                </span>
                            @else
                                <span class="badge-estado badge-estado--en-proceso">
                                    <i class="bi bi-wrench me-1"></i>Ocupado
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('mecanicos.edit', $mecanico) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i>Editar
                                </a>
                                <form method="POST" action="{{ route('mecanicos.destroy', $mecanico) }}"
                                      onsubmit="return confirm('¿Eliminar al mecánico {{ addslashes($mecanico->nombre) }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                        <i class="bi bi-trash"></i>Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="bi bi-person-workspace display-6 d-block mb-2"></i>
                            No se encontraron mecánicos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($mecanicos->hasPages())
        <div class="d-flex justify-content-end mt-3">{{ $mecanicos->links() }}</div>
    @endif

@endsection