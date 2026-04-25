<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EL GARAGE</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/guest.css'])

    @stack('styles')
</head>

<body>

    <div class="auth-card">

        <!-- HEADER -->
        <div class="auth-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>

        <!-- BODY -->
        <div class="auth-body">
            {{ $slot }}
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>