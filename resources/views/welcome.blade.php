<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EL GARAGE</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/welcome.css'])

    @stack('styles')
</head>

<body>

    <div class="welcome-box">

        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">

        <!-- Mensaje -->
        <h1>Bienvenido al Taller Mecánico EL GARAGE</h1>
        <p>Especialistas en electrónica y mecánica automotriz</p>

        <!-- Botones Breeze -->
        <div class="mt-4">
            @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-light">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-orange me-2">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-outline-orange">Registrarse</a>
            @endauth
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>