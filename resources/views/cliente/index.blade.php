@extends('layouts.app')
 
@section('title', 'Clientes')
 
@push('styles')
    @vite('resources/css/cruds.css')
@endpush
 
@section('content')
 
    <div class="dash-section-title mb-3">
        <div class="bar"></div>
        <h6>Administrar Clientes</h6>
    </div>
 
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
 
    <div class="crud-toolbar">
        <form method="GET" action="{{ route('clientes.index') }}" class="crud-search">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control"
                       placeholder="Buscar por nombre, cédula, correo o teléfono..."
                       value="{{ $search ?? '' }}">
                <button class="btn btn-naranja" type="submit">
                    <i class="bi bi-search me-1"></i> Buscar
                </button>
                @if($search)
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Nuevo Cliente
        </a>
    </div>
 
    <div class="crud-wrapper">
        <table class="table table-crud">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $cliente->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar-sm">
                                    {{ strtoupper(substr($cliente->nombre, 0, 1)) }}
                                </div>
                                {{ $cliente->nombre }}
                            </div>
                        </td>
                        <td>{{ $cliente->cedula }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('clientes.edit', $cliente) }}"
                                   class="btn btn-sm btn-success d-flex align-items-center gap-1" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('clientes.destroy', $cliente) }}"
                                      onsubmit="return confirm('¿Eliminar al cliente {{ addslashes($cliente->nombre) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1" title="Eliminar">
                                        <i class="bi bi-trash"></i> 
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-people display-6 d-block mb-2"></i>
                            No se encontraron clientes.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
 
    @if($clientes->hasPages())
        <div class="d-flex justify-content-end mt-3">
            {{ $clientes->links() }}
        </div>
    @endif
 
@endsection