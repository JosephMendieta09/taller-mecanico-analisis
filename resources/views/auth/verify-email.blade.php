<x-guest-layout>
    <h4 class="text-center mb-4">VERIFICACIÓN DE CORREO</h4>

    <x-auth-session-status class="mb-3 text-center text-success" :status="session('status')" />
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico en el enlace que te acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="text-center">
                <button type="submit" class="btn-orange">
                    📩 Reenviar correo
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-primary">
                Cerrar Sesión
            </button>
        </form>
    </div>
</x-guest-layout>
