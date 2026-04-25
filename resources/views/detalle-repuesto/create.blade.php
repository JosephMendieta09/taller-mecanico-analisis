@extends('layouts.app')
@section('title', 'Nuevo Detalle de Repuesto')
@push('styles') @vite('resources/css/cruds.css') @endpush

@section('content')
    <div class="dash-section-title mb-4">
        <div class="bar"></div>
        <h6>Nuevo Detalle de Repuesto</h6>
    </div>
    <div class="crud-form-card">
        <form method="POST" action="{{ route('detalle-repuestos.store') }}">
            @csrf
            @include('detalle-repuestos.form')
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('detalle-repuestos.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-naranja d-flex align-items-center gap-2">
                    <i class="bi bi-floppy"></i> Guardar Detalle
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    const repuestoSelect = document.getElementById('repuesto_id');
    const cantidadInput  = document.getElementById('cantidad');
    const montoPreview   = document.getElementById('monto_preview');

    function calcularMonto() {
        const precio   = parseFloat(repuestoSelect.selectedOptions[0]?.dataset.precio || 0);
        const cantidad = parseInt(cantidadInput.value || 0);
        montoPreview.value = (precio * cantidad).toFixed(2);
    }

    repuestoSelect.addEventListener('change', calcularMonto);
    cantidadInput.addEventListener('input', calcularMonto);
</script>
@endpush
