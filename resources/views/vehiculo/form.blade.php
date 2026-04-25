<div class="mb-3">
    <label for="cliente_id" class="form-label fw-semibold">
        Cliente
        <small class="text-muted fw-normal">(opcional)</small>
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <select id="cliente_id" name="cliente_id"
                class="form-select @error('cliente_id') is-invalid @enderror">
            <option value="">— Sin cliente asignado —</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}"
                    {{ old('cliente_id', $vehiculo->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }} — {{ $cliente->cedula }}
                </option>
            @endforeach
        </select>
        @error('cliente_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
 
{{-- Placa --}}
<div class="mb-3">
    <label for="placa" class="form-label fw-semibold">
        Placa
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-upc"></i></span>
        <input type="text" id="placa" name="placa"
               class="form-control text-uppercase @error('placa') is-invalid @enderror"
               placeholder="Ej: ABC-1234"
               value="{{ old('placa', $vehiculo->placa ?? '') }}" required>
        @error('placa')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
 
{{-- Marca y Modelo en la misma fila --}}
<div class="row g-3 mb-3">
    <div class="col-12 col-md-6">
        <label for="marca" class="form-label fw-semibold">
            Marca
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-car-front"></i></span>
            <input type="text" id="marca" name="marca"
                   class="form-control @error('marca') is-invalid @enderror"
                   placeholder="Ej: Toyota"
                   value="{{ old('marca', $vehiculo->marca ?? '') }}" required>
            @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <label for="modelo" class="form-label fw-semibold">
            Modelo
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-card-list"></i></span>
            <input type="text" id="modelo" name="modelo"
                   class="form-control @error('modelo') is-invalid @enderror"
                   placeholder="Ej: Corolla 2020"
                   value="{{ old('modelo', $vehiculo->modelo ?? '') }}" required>
            @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
 
{{-- Color y Kilometraje en la misma fila --}}
<div class="row g-3 mb-4">
    <div class="col-12 col-md-6">
        <label for="color" class="form-label fw-semibold">
            Color
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-palette"></i></span>
            <input type="text" id="color" name="color"
                   class="form-control @error('color') is-invalid @enderror"
                   placeholder="Ej: Blanco"
                   value="{{ old('color', $vehiculo->color ?? '') }}" required>
            @error('color')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <label for="kilometraje" class="form-label fw-semibold">
            Kilometraje
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-speedometer2"></i></span>
            <input type="number" id="kilometraje" name="kilometraje"
                   class="form-control @error('kilometraje') is-invalid @enderror"
                   placeholder="Ej: 45000"
                   min="0"
                   value="{{ old('kilometraje', $vehiculo->kilometraje ?? '') }}" required>
            <span class="input-group-text">km</span>
            @error('kilometraje')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>