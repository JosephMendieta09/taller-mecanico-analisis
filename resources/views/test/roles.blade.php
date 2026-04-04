<x-app-layout>
    <div class="container">
        <h1>Prueba de Roles - Spatie</h1>
        @role('administrador')
            <p style="color: green; font-weight: bold;">
                Soy ADMIN
            </p>
        @endrole
        @role('mecanico')
            <p style="color: green; font-weight: bold;">
                Soy MECANICO
            </p>
        @endrole

        @hasanyrole('administrador\mecanico')
            <p>Tengo al menos un rol</p>
        @endhasanyrole
        @unlessrole('administrador')
            <p>No soy administrador</p>
        @endunlessrole
    </div>
</x-app-layout>