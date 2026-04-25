@isset($roles)
<div class="mb-4">
    <label for="role_id" class="form-label fw-semibold">
        <i class="bi bi-person me-1 text-naranja"></i> Rol
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
        <select id="role_id"
                name="role_id"
                class="form-select @error('role_id') is-invalid @enderror"
                required>
            <option value="" disabled selected>— Selecciona un rol —</option>
            @foreach($roles as $r)
                <option value="{{ $r->id }}" {{ old('role_id') == $r->id ? 'selected' : '' }}>
                    {{ $r->name }}
                </option>
            @endforeach
        </select>
        @error('role_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
@endisset
 
{{-- Rol fijo en edit (no editable) --}}
@isset($role)
<div class="mb-4">
    <label class="form-label fw-semibold">
        <i class="bi bi-shield-lock me-1 text-naranja"></i> Rol
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
        <input type="text"
               class="form-control"
               value="{{ $role->name }}"
               disabled>
    </div>
    <div class="form-text">El rol no puede cambiarse. Para asignar a otro, crea una nueva asignación.</div>
</div>
@endisset
 
{{-- Checkboxes de permisos --}}
<div class="mb-4">
    <label class="form-label fw-semibold">
        <i class="bi bi-key me-1 text-naranja"></i> Permisos a asignar
    </label>
 
    @error('permissions')
        <div class="alert alert-danger py-2 px-3 mb-2">
            <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
        </div>
    @enderror
 
    <div class="roles-grid">
        @forelse($roles as $role)
            <label class="role-checkbox-card {{ in_array($permission->name, old('permissions', $assignedPermissionIds ?? [])) ? 'selected' : '' }}">
                <input type="checkbox"
                       name="permissions[]"
                       value="{{ $permission->id }}"
                       {{ in_array($permission->id, old('permissions', $assignedPermissionIds ?? [])) ? 'checked' : '' }}>
                <div class="role-card-body">
                    <i class="bi bi-key role-card-icon"></i>
                    <span class="role-card-name">{{ $permission->name }}</span>
                </div>
            </label>
        @empty
            <p class="text-muted">No hay permisos disponibles.</p>
        @endforelse
    </div>
</div>