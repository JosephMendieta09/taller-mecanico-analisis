<x-guest-layout>
    <h4 class="text-center mb-4">CAMBIAR CONTRASEÑA</h4>

    <x-auth-session-status class="mb-3 text-center text-success" :status="session('status')" />
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label class="label-custom">Correo Electrónico</label>

            <div class="input-container">
                <span class="input-icon">📧</span>
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

        <!-- Confirm Password -->
        <div class="mb-3">
            <label class="label-custom">Confirmar contraseña</label>
            <div class="input-container">
                <span class="input-icon">🔐</span>
                <input type="password" name="password_confirmation"
                    class="input-custom"
                    placeholder="Confirme su contraseña"
                    required>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-danger text-center" />
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn-orange">
                🔄 Restablecer contraseña
            </button>
        </div>
    </form>
</x-guest-layout>
