<x-guest-layout>
    <h4 class="text-center mb-4">¿OLVIDASTE TU CONTRASEÑA?</h4>

    <x-auth-session-status class="mb-3 text-center text-success" :status="session('status')" />

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('No hay problema. Solo ingrese su correo electrónico para enviarle un enlace y pueda restablecer su contraseña.') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="label-custom">Correo Electrónico</label>
            <div class="input-container">
                <span class="input-icon">📧</span>
                <input type="email" name="email"
                    class="input-custom"
                    placeholder="Ingrese su correo"
                    value="{{ old('email') }}"
                    required autofocus>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger text-center" />
        </div>

        <br>

        <div class="text-center">
            <button type="submit" class="btn-orange">
                📩 Enviar enlace
            </button>
        </div>
    </form>
</x-guest-layout>
