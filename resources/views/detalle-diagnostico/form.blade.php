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
                    {{ old('diagnostico_id', $detalleDiagnostico->diagnostico_id ?? request('diagnostico_id')) == $diagnostico->id ? 'selected' : '' }}>
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

{{-- Problema --}}
<div class="mb-3">
    <label for="problema_id" class="form-label fw-semibold">
        <i class="bi bi-exclamation-circle me-1 text-naranja"></i> Problema
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-exclamation-circle"></i></span>
        <select id="problema_id" name="problema_id"
                class="form-select @error('problema_id') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona un problema —</option>
            @foreach($problemas as $problema)
                <option value="{{ $problema->id }}"
                    {{ old('problema_id', $detalleDiagnostico->problema_id ?? '') == $problema->id ? 'selected' : '' }}>
                    {{ $problema->descripcion }} ({{ $problema->categoria }} — {{ $problema->gravedad }})
                </option>
            @endforeach
        </select>
        @error('problema_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Observación --}}
<div class="mb-3">
    <label for="observacion" class="form-label fw-semibold">
        <i class="bi bi-chat-text me-1 text-naranja"></i> Observación
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-chat-text"></i></span>
        <textarea id="observacion" name="observacion" rows="3"
                  class="form-control @error('observacion') is-invalid @enderror"
                  placeholder="Detalles adicionales del problema encontrado..." required>{{ old('observacion', $detalleDiagnostico->observacion ?? '') }}</textarea>
        @error('observacion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Prioridad --}}
<div class="mb-4">
    <label for="prioridad" class="form-label fw-semibold">
        <i class="bi bi-sort-up me-1 text-naranja"></i> Prioridad
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-sort-up"></i></span>
        <select id="prioridad" name="prioridad"
                class="form-select @error('prioridad') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona la prioridad —</option>
            @foreach(['Baja', 'Media', 'Alta'] as $opcion)
                <option value="{{ $opcion }}"
                    {{ old('prioridad', $detalleDiagnostico->prioridad ?? '') === $opcion ? 'selected' : '' }}>
                    {{ $opcion }}
                </option>
            @endforeach
        </select>
        @error('prioridad')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>