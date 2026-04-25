<div class="mb-3">
    <label for="vehiculo_id" class="form-label fw-semibold">
        <i class="bi bi-car-front me-1 text-naranja"></i> Vehículo
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-car-front"></i></span>
        <select id="vehiculo_id" name="vehiculo_id"
                class="form-select @error('vehiculo_id') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona un vehículo —</option>
            @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}"
                    {{ old('vehiculo_id', $diagnostico->vehiculo_id ?? '') == $vehiculo->id ? 'selected' : '' }}>
                    {{ $vehiculo->placa }} — {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                    @if($vehiculo->cliente) ({{ $vehiculo->cliente->nombre }}) @endif
                </option>
            @endforeach
        </select>
        @error('vehiculo_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label fw-semibold">
        <i class="bi bi-text-paragraph me-1 text-naranja"></i> Descripción
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-text-paragraph"></i></span>
        <textarea id="descripcion" name="descripcion" rows="3"
                  class="form-control @error('descripcion') is-invalid @enderror"
                  placeholder="Describe el diagnóstico del vehículo..." required>{{ old('descripcion', $diagnostico->descripcion ?? '') }}</textarea>
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
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
                    {{ old('estado', $diagnostico->estado ?? '') === $opcion ? 'selected' : '' }}>
                    {{ $opcion }}
                </option>
            @endforeach
        </select>
        @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
