@isset($users)
<div class="mb-4">
    <label for="user_id" class="form-label fw-semibold">
        <i class="bi bi-person me-1 text-naranja"></i> Usuario
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <select id="user_id"
                name="user_id"
                class="form-select @error('user_id') is-invalid @enderror"
                required>
            <option value="" disabled selected>— Selecciona un usuario —</option>
            @foreach($users as $u)
                <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                    {{ $u->name }} ({{ $u->email }})
                </option>
            @endforeach
        </select>
        @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
@endisset
 
{{-- Usuario fijo en edit (no editable) --}}
@isset($user)
<div class="mb-4">
    <label class="form-label fw-semibold">
        <i class="bi bi-person me-1 text-naranja"></i> Usuario
    </label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person-check"></i></span>
        <input type="text"
               class="form-control"
               value="{{ $user->name }} ({{ $user->email }})"
               disabled>
    </div>
    <div class="form-text">El usuario no puede cambiarse. Para asignar a otro, crea una nueva asignación.</div>
</div>
@endisset
 
{{-- Checkboxes de roles --}}
<div class="mb-4">
    <label class="form-label fw-semibold">
        <i class="bi bi-shield-lock me-1 text-naranja"></i> Roles a asignar
    </label>
 
    @error('roles')
        <div class="alert alert-danger py-2 px-3 mb-2">
            <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
        </div>
    @enderror
 
    <div class="roles-grid">
        @forelse($roles as $role)
            <label class="role-checkbox-card {{ in_array($role->name, old('roles', $assignedRoleIds ?? [])) ? 'selected' : '' }}">
                <input type="checkbox"
                       name="roles[]"
                       value="{{ $role->id }}"
                       {{ in_array($role->id, old('roles', $assignedRoleIds ?? [])) ? 'checked' : '' }}>
                <div class="role-card-body">
                    <i class="bi bi-shield-check role-card-icon"></i>
                    <span class="role-card-name">{{ $role->name }}</span>
                </div>
            </label>
        @empty
            <p class="text-muted">No hay roles disponibles.</p>
        @endforelse
    </div>
</div>