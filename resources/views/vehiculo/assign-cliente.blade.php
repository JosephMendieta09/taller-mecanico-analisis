@extends('layouts.app')
 
@section('title', 'Asignar Cliente')
 
@push('styles')
    @vite('resources/css/cruds.css')
@endpush
 
@section('content')
 
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Asignar Cliente al Vehículo</h6>
    </div>
 
    <div class="crud-form-card">
 
        {{-- Datos del vehículo (solo lectura) --}}
        <div class="assign-vehiculo-info mb-4">
            <div class="vehiculo-avatar-sm">
                <i class="bi bi-car-front"></i>
            </div>
            <div>
                <p class="mb-0 text-muted small fw-semibold text-uppercase">Vehículo seleccionado</p>
                <h5 class="mb-0 fw-bold">{{ $vehiculo->placa }}</h5>
                <p class="mb-0 text-muted">{{ $vehiculo->marca }} {{ $vehiculo->modelo }} — {{ ucfirst($vehiculo->color) }}</p>
            </div>
        </div>
 
        <hr>
 
        <form method="POST" action="{{ route('vehiculos.assign-cliente.store', $vehiculo) }}">
            @csrf
 
            @if($clientes->isEmpty())
 
                {{-- Sin clientes registrados --}}
                <div class="alert alert-warning d-flex align-items-center gap-3">
                    <i class="bi bi-exclamation-triangle fs-4"></i>
                    <div>
                        <strong>No hay clientes registrados.</strong><br>
                        Debes crear un cliente antes de poder asignarlo.
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <a href="{{ route('clientes.create') }}" class="btn btn-naranja d-flex align-items-center gap-2">
                        <i class="bi bi-person-plus"></i> Crear Cliente
                    </a>
                </div>
 
            @else
 
                {{-- Select de cliente --}}
                <div class="mb-4">
                    <label for="cliente_id" class="form-label fw-semibold">
                        <i class="bi bi-person me-1 text-naranja"></i> Seleccionar Cliente
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <select id="cliente_id" name="cliente_id"
                                class="form-select @error('cliente_id') is-invalid @enderror" required>
                            <option value="" disabled selected>— Elige un cliente —</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}"
                                    {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombre }} — {{ $cliente->cedula }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-text">
                        ¿No encuentras el cliente?
                        <a href="{{ route('clientes.create') }}" class="text-naranja fw-semibold">
                            Crear nuevo cliente
                        </a>
                    </div>
                </div>
 
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                        <i class="bi bi-person-check"></i> Asignar Cliente
                    </button>
                </div>
 
            @endif
        </form>
 
    </div>
 
@endsection