<div class="mb-3">
    <label for="nombre" class="form-label fw-semibold">
        Nombre
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" id="nombre" name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               placeholder="Nombre completo del cliente"
               value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
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
               placeholder="Número de carnet"
               value="{{ old('cedula', $cliente->cedula ?? '') }}" required>
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
               value="{{ old('email', $cliente->email ?? '') }}" required>
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
               value="{{ old('telefono', $cliente->telefono ?? '') }}" required>
        @error('telefono')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
 
<div class="mb-4">
    <label for="direccion" class="form-label fw-semibold">
        Dirección
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
        <textarea id="direccion" name="direccion" rows="2"
                  class="form-control @error('direccion') is-invalid @enderror"
                  placeholder="Direccion del cliente">{{ old('direccion', $cliente->direccion ?? '') }}</textarea>
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>