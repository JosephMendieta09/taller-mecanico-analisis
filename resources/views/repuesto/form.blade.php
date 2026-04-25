<div class="mb-3">
    <label for="nombre" class="form-label fw-semibold">
        <i class="bi bi-box-seam me-1 text-naranja"></i> Nombre
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
        <input type="text" id="nombre" name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               placeholder="Nombre del repuesto"
               value="{{ old('nombre', $repuesto->nombre ?? '') }}" required>
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="precio_unitario" class="form-label fw-semibold">
        <i class="bi bi-currency-dollar me-1 text-naranja"></i> Precio Unitario
    </label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" id="precio_unitario" name="precio_unitario"
               class="form-control @error('precio_unitario') is-invalid @enderror"
               placeholder="0.00" step="0.01" min="0"
               value="{{ old('precio_unitario', $repuesto->precio_unitario ?? '') }}" required>
        @error('precio_unitario')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-md-6">
        <label for="stock_actual" class="form-label fw-semibold">
            <i class="bi bi-archive me-1 text-naranja"></i> Stock Actual
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-archive"></i></span>
            <input type="number" id="stock_actual" name="stock_actual"
                   class="form-control @error('stock_actual') is-invalid @enderror"
                   placeholder="0" min="0"
                   value="{{ old('stock_actual', $repuesto->stock_actual ?? '') }}" required>
            @error('stock_actual')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <label for="stock_minimo" class="form-label fw-semibold">
            <i class="bi bi-exclamation-triangle me-1 text-naranja"></i> Stock Mínimo
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-exclamation-triangle"></i></span>
            <input type="number" id="stock_minimo" name="stock_minimo"
                   class="form-control @error('stock_minimo') is-invalid @enderror"
                   placeholder="0" min="0"
                   value="{{ old('stock_minimo', $repuesto->stock_minimo ?? '') }}" required>
            @error('stock_minimo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-text">Al llegar a este nivel se marcará como stock bajo.</div>
    </div>
</div>
