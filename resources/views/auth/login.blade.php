<x-guest-layout>

    <h4 class="text-center mb-4">INICIAR SESIÓN</h4>

    <x-auth-session-status class="mb-3 text-center text-success" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label class="label-custom">Correo Electrónico</label>

            <div class="input-container">
                <span class="input-icon">👤</span>
                <input type="email" name="email"
                    class="input-custom"
                    placeholder="Ingrese su correo"
                    value="{{ old('email') }}"
                    required>
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger text-center" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="label-custom">Contraseña</label>

            <div class="input-container">
                <span class="input-icon">🔒</span>
                <input type="password" name="password"
                    class="input-custom"
                    placeholder="Ingrese su contraseña"
                    required>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger text-center" />
        </div>

        <!-- Remember + Forgot -->
        <div class="d-flex justify-content-between align-items-center mb-3 px-4">
            <label class="d-flex align-items-center">
                <input type="checkbox" name="remember" class="me-2">
                <span class="text-muted">Recordar</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-muted text-decoration-none">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Botón -->
        <div class="text-center">
            <button type="submit" class="btn-orange">
                🔐 Iniciar Sesión
            </button>
        </div>

    </form>

</x-guest-layout>