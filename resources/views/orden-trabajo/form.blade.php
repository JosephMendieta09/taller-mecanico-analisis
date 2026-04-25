<div class="mb-3">
    <label for="diagnostico_id" class="form-label fw-semibold">
        <i class="bi bi-clipboard2 me-1 text-naranja"></i> Diagnóstico
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-clipboard2"></i></span>
        <select id="diagnostico_id" name="diagnostico_id"
                class="form-select @error('diagnostico_id') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona un diagnóstico —</option>
            @foreach($diagnosticos as $diagnostico)
                <option value="{{ $diagnostico->id }}"
                    {{ old('diagnostico_id', $ordenTrabajo->diagnostico_id ?? '') == $diagnostico->id ? 'selected' : '' }}>
                    #{{ $diagnostico->id }}
                    @if($diagnostico->vehiculo) — {{ $diagnostico->vehiculo->placa }} @endif
                    — {{ Str::limit($diagnostico->descripcion, 40) }}
                </option>
            @endforeach
        </select>
        @error('diagnostico_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-12 col-md-6">
        <label for="fecha_inicio" class="form-label fw-semibold">
            <i class="bi bi-calendar-event me-1 text-naranja"></i> Fecha de Inicio
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
            <input type="date" id="fecha_inicio" name="fecha_inicio"
                   class="form-control @error('fecha_inicio') is-invalid @enderror"
                   value="{{ old('fecha_inicio', isset($ordenTrabajo) ? $ordenTrabajo->fecha_inicio->format('Y-m-d') : '') }}"
                   required>
            @error('fecha_inicio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <label for="fecha_final" class="form-label fw-semibold">
            <i class="bi bi-calendar-check me-1 text-naranja"></i> Fecha Final
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
            <input type="date" id="fecha_final" name="fecha_final"
                   class="form-control @error('fecha_final') is-invalid @enderror"
                   value="{{ old('fecha_final', isset($ordenTrabajo) ? $ordenTrabajo->fecha_final->format('Y-m-d') : '') }}"
                   required>
            @error('fecha_final')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="costo" class="form-label fw-semibold">
        <i class="bi bi-currency-dollar me-1 text-naranja"></i> Costo
    </label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" id="costo" name="costo"
               class="form-control @error('costo') is-invalid @enderror"
               placeholder="0.00" step="0.01" min="0"
               value="{{ old('costo', $ordenTrabajo->costo ?? '') }}" required>
        @error('costo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="estado" class="form-label fw-semibold">
        <i class="bi bi-flag me-1 text-naranja"></i> Estado
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-flag"></i></span>
        <select id="estado" name="estado"
                class="form-select @error('estado') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona el estado —</option>
            @foreach(['Pendiente', 'En proceso', 'Completado'] as $opcion)
                <option value="{{ $opcion }}"
                    {{ old('estado', $ordenTrabajo->estado ?? '') === $opcion ? 'selected' : '' }}>
                    {{ $opcion }}
                </option>
            @endforeach
        </select>
        @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label for="notas" class="form-label fw-semibold">
        <i class="bi bi-journal-text me-1 text-naranja"></i> Notas
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
        <textarea id="notas" name="notas" rows="3"
                  class="form-control @error('notas') is-invalid @enderror"
                  placeholder="Observaciones o instrucciones de la orden..." required>{{ old('notas', $ordenTrabajo->notas ?? '') }}</textarea>
        @error('notas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>