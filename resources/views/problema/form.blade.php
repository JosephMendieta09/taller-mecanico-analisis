<div class="mb-3">
    <label for="descripcion" class="form-label fw-semibold">
        <i class="bi bi-text-paragraph me-1 text-naranja"></i> Descripción
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-text-paragraph"></i></span>
        <textarea id="descripcion" name="descripcion" rows="2"
                  class="form-control @error('descripcion') is-invalid @enderror"
                  placeholder="Descripción del problema">{{ old('descripcion', $problema->descripcion ?? '') }}</textarea>
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="categoria" class="form-label fw-semibold">
        <i class="bi bi-tag me-1 text-naranja"></i> Categoría
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-tag"></i></span>
        <input type="text" id="categoria" name="categoria"
               class="form-control @error('categoria') is-invalid @enderror"
               placeholder="Ej: Motor, Frenos, Eléctrico..."
               value="{{ old('categoria', $problema->categoria ?? '') }}" required>
        @error('categoria')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label for="gravedad" class="form-label fw-semibold">
        <i class="bi bi-exclamation-triangle me-1 text-naranja"></i> Gravedad
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-exclamation-triangle"></i></span>
        <select id="gravedad" name="gravedad"
                class="form-select @error('gravedad') is-invalid @enderror" required>
            <option value="" disabled>— Selecciona la gravedad —</option>
            @foreach(['Leve', 'Moderado', 'Grave'] as $opcion)
                <option value="{{ $opcion }}"
                    {{ old('gravedad', $problema->gravedad ?? '') === $opcion ? 'selected' : '' }}>
                    {{ $opcion }}
                </option>
            @endforeach
        </select>
        @error('gravedad')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
