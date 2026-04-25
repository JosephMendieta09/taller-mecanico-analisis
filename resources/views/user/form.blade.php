

{{-- Nombre --}}
<div class="mb-3">
    <label for="name" class="form-label fw-semibold">
        Nombre completo
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text"
               id="name"
               name="name"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Nombre completo"
               value="{{ old('name', $user->name ?? '') }}"
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Correo --}}
<div class="mb-3">
    <label for="email" class="form-label fw-semibold">
        Correo electrónico
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
        <input type="email"
               id="email"
               name="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="correo@ejemplo.com"
               value="{{ old('email', $user->email ?? '') }}"
               required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Contraseña --}}
<div class="mb-3">
    <label for="password" class="form-label fw-semibold">
        Contraseña
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-lock"></i></span>
        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Mínimo 8 caracteres"
               {{ isset($user) ? '' : 'required' }}>
        <button type="button" class="btn btn-outline-secondary toggle-pass" data-target="password">
            <i class="bi bi-eye"></i>
        </button>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Confirmar contraseña --}}
<div class="mb-4">
    <label for="password_confirmation" class="form-label fw-semibold">
        Confirmar contraseña
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
        <input type="password"
               id="password_confirmation"
               name="password_confirmation"
               class="form-control"
               placeholder="Repite la contraseña"
               {{ isset($user) ? '' : 'required' }}>
        <button type="button" class="btn btn-outline-secondary toggle-pass" data-target="password_confirmation">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>