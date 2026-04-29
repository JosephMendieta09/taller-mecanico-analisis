
<div class="mb-3">
    <label for="nombre" class="form-label fw-semibold">
        Nombre completo
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" id="nombre" name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               placeholder="Nombre completo del mecánico"
               value="{{ old('nombre', $mecanico->nombre ?? '') }}" required>
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="cedula" class="form-label fw-semibold">
        Cédula
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
        <input type="text" id="cedula" name="cedula"
               class="form-control @error('cedula') is-invalid @enderror"
               placeholder="Número de cédula o documento"
               value="{{ old('cedula', $mecanico->cedula ?? '') }}" required>
        @error('cedula')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-semibold">
        Correo electrónico
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
        <input type="email" id="email" name="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="correo@ejemplo.com"
               value="{{ old('email', $mecanico->email ?? '') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="telefono" class="form-label fw-semibold">
        Teléfono
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
        <input type="text" id="telefono" name="telefono"
               class="form-control @error('telefono') is-invalid @enderror"
               placeholder="Número de teléfono"
               value="{{ old('telefono', $mecanico->telefono ?? '') }}" required>
        @error('telefono')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="direccion" class="form-label fw-semibold">
        Dirección
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
        <textarea id="direccion" name="direccion" rows="2"
                  class="form-control @error('direccion') is-invalid @enderror"
                  placeholder="Dirección del mecánico">{{ old('direccion', $mecanico->direccion ?? '') }}</textarea>
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label for="estado" class="form-label fw-semibold">
        Estado
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-toggle-on"></i></span>
        <select id="estado" name="estado"
                class="form-select @error('estado') is-invalid @enderror" required>
            <option value="disponible"
                {{ old('estado', $mecanico->estado ?? 'disponible') === 'disponible' ? 'selected' : '' }}>
                Disponible
            </option>
            <option value="ocupado"
                {{ old('estado', $mecanico->estado ?? '') === 'ocupado' ? 'selected' : '' }}>
                Ocupado
            </option>
        </select>
        @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>