<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EL GARAGE') }} - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Barlow+Condensed:wght@700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body>

    {{-- ══════════════ SIDEBAR ══════════════ --}}
    @include('layouts.navigation')

    {{-- ══════════════ OVERLAY (mobile) ══════════════ --}}
    <div id="sidebarOverlay"></div>

    {{-- ══════════════ TOPBAR ══════════════ --}}
    <header id="topbar">
        <button id="toggleSidebar" title="Menú">
            <i class="bi bi-list"></i>
        </button>

        <div class="topbar-brand" id="topbarBrand">
            <span class="or">EL G</span><span class="bk">AR</span><span class="or">AGE</span>
        </div>

        <div class="topbar-spacer"></div>

        <div class="topbar-user dropdown">
            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Usuario' }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end mt-1 shadow-sm">
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-gear" style="color:var(--naranja)"></i> Editar Perfil
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item d-flex align-items-center gap-2 text-danger" type="submit">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </header>

    {{-- ══════════════ MAIN ══════════════ --}}
    <main id="mainContent">
        <div class="content-area">
            @yield('content')
        </div>

        {{-- ══════════════ FOOTER ══════════════ --}}
        <footer id="mainFooter">
            &copy; {{ date('Y') }} <span>EL GARAGE</span> — Todos los derechos reservados.
        </footer>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>