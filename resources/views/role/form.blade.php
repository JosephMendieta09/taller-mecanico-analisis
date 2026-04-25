{{-- Nombre --}}
<div class="mb-3">
    <label for="name" class="form-label fw-semibold">
        Nombre de rol
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
        <input type="text"
               id="name"
               name="name"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Nombre de rol"
               value="{{ old('name', $role->name ?? '') }}"
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Guard name --}}
<div class="mb-3">
    <label for="guard_name" class="form-label fw-semibold">
        Guard Name
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
        <input type="text"
               id="guard_name"
               name="guard_name"
               class="form-control @error('guard_name') is-invalid @enderror"
               placeholder="Guard Name"
               value="{{ old('guard_name', $role?->guard_name) }}"
               required>
        {!! $errors->first('guard_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
</div>