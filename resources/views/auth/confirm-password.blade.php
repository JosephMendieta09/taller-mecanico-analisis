<x-guest-layout>
    <h4 class="text-center mb-4">CONFIRMA TU CONTRASEÑA</h4>

    <x-auth-session-status class="mb-3 text-center text-success" :status="session('status')" />
    <div class="text-center mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Este es un sitio seguro de la aplicación. Por favor confirma tu contraseña para seguir.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

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
        <br>
        <div class="text-center">
            <button type="submit" class="btn-orange">
                🔐 Confirmar
            </button>
        </div>
    </form>
</x-guest-layout>
