<x-guest-layout>
    <h4 class="text-center mb-4">REGÍSTRATE</h4>
    <x-auth-session-status class="mb-3 text-center text-success" :status="session('status')" />
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <div class="input-container">
                <span class="input-icon">👤</span>
                <input type="name" name="name"
                    class="input-custom"
                    placeholder="Ingrese su nombre completo"
                    value="{{ old('name') }}"
                    required>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-danger text-center" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <div class="input-container">
                <span class="input-icon">📧</span>
                <input type="email" name="email"
                    class="input-custom"
                    placeholder="Ingrese su correo electrónico"
                    value="{{ old('email') }}"
                    required>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger text-center" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="input-container">
                <span class="input-icon">🔒</span>
                <input type="password" name="password"
                    class="input-custom"
                    placeholder="Ingrese su contraseña"
                    required>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger text-center" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <div class="input-container">
                <span class="input-icon">🔐</span>
                <input type="password" name="password_confirmation"
                    class="input-custom"
                    placeholder="Confirme su contraseña"
                    required>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-danger text-center" />
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 px-4">
            <a href="{{ route('login') }}" class="text-muted text-decoration-none">
                ¿Ya estas registrado?
            </a>
        </div>
        <div class="text-center">
            <button type="submit" class="btn-orange">
                📝 Registrarse
            </button>
        </div>
    </form>
</x-guest-layout>
