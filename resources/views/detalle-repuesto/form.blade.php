{{-- Orden de Trabajo --}}
<div class="mb-3">
    <label for="orden_trabajo_id" class="form-label fw-semibold">
        <i class="bi bi-clipboard2-check me-1 text-naranja"></i> Orden de Trabajo
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-clipboard2-check"></i></span>
        <select id="orden_trabajo_id" name="orden_trabajo_id"
                class="form-select @error('orden_trabajo_id') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona una orden —</option>
            @foreach($ordenes as $orden)
                <option value="{{ $orden->id }}"
                    {{ old('orden_trabajo_id', $detalleRepuesto->orden_trabajo_id ?? request('orden_trabajo_id')) == $orden->id ? 'selected' : '' }}>
                    Orden #{{ $orden->id }}
                    @if($orden->diagnostico?->vehiculo)
                        — {{ $orden->diagnostico->vehiculo->placa }}
                    @endif
                    ({{ $orden->estado }})
                </option>
            @endforeach
        </select>
        @error('orden_trabajo_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Repuesto --}}
<div class="mb-3">
    <label for="repuesto_id" class="form-label fw-semibold">
        <i class="bi bi-box-seam me-1 text-naranja"></i> Repuesto
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
        <select id="repuesto_id" name="repuesto_id"
                class="form-select @error('repuesto_id') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona un repuesto —</option>
            @foreach($repuestos as $repuesto)
                <option value="{{ $repuesto->id }}"
                        data-precio="{{ $repuesto->precio_unitario }}"
                    {{ old('repuesto_id', $detalleRepuesto->repuesto_id ?? '') == $repuesto->id ? 'selected' : '' }}>
                    {{ $repuesto->nombre }} — $ {{ number_format($repuesto->precio_unitario, 2) }}
                    (Stock: {{ $repuesto->stock_actual }})
                </option>
            @endforeach
        </select>
        @error('repuesto_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-3 mb-3">
    {{-- Fecha --}}
    <div class="col-12 col-md-4">
        <label for="fecha" class="form-label fw-semibold">
            <i class="bi bi-calendar me-1 text-naranja"></i> Fecha
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
            <input type="date" id="fecha" name="fecha"
                   class="form-control @error('fecha') is-invalid @enderror"
                   value="{{ old('fecha', isset($detalleRepuesto) ? $detalleRepuesto->fecha->format('Y-m-d') : '') }}"
                   required>
            @error('fecha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Cantidad --}}
    <div class="col-12 col-md-4">
        <label for="cantidad" class="form-label fw-semibold">
            <i class="bi bi-hash me-1 text-naranja"></i> Cantidad
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-hash"></i></span>
            <input type="number" id="cantidad" name="cantidad"
                   class="form-control @error('cantidad') is-invalid @enderror"
                   placeholder="0" min="1"
                   value="{{ old('cantidad', $detalleRepuesto->cantidad ?? '') }}"
                   required>
            @error('cantidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Monto (calculado automáticamente) --}}
    <div class="col-12 col-md-4">
        <label for="monto_preview" class="form-label fw-semibold">
            <i class="bi bi-currency-dollar me-1 text-naranja"></i> Monto (calculado)
        </label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text" id="monto_preview"
                   class="form-control bg-light"
                   value="{{ isset($detalleRepuesto) ? number_format($detalleRepuesto->monto, 2) : '0.00' }}"
                   disabled readonly>
        </div>
        <div class="form-text">Se calcula automáticamente: cantidad × precio unitario.</div>
    </div>
</div>