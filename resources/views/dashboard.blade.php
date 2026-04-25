{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    @vite('resources/css/dashboard.css')
@endpush

@section('content')

    {{-- ── HERO IMAGE ── --}}
    <div class="dash-hero">
        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=1400&q=80"
             alt="Taller EL GARAGE">
        <div class="dash-hero-overlay">
            <div class="dash-hero-text">
                <h1><span>EL GARAGE</span></h1>
                <p>Sistema de Gestión Automotriz</p>
            </div>
        </div>
    </div>

    {{-- ── WELCOME ── --}}
    <div class="dash-welcome">
        <div class="dash-welcome-icon">
            <i class="bi bi-hand-wave"></i>
        </div>
        <div>
            <h5>¡Bienvenido, {{ auth()->user()->name ?? 'Administrador' }}!</h5>
            <p>Tienes acceso completo al sistema. Usa el menú lateral para navegar entre los módulos.</p>
        </div>
    </div>

    {{-- ── ACCESO Y SEGURIDAD ── --}}
    <div class="dash-section-title">
        <div class="bar"></div>
        <h6>Acceso y Seguridad</h6>
    </div>

    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('users.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-people"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Usuarios
                </div>
                <p class="dash-card-desc">Gestiona los usuarios del sistema, sus datos y accesos.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('roles.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-shield-lock"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Roles
                </div>
                <p class="dash-card-desc">Define y administra los roles de acceso al sistema.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('permissions.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-key"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Permisos
                </div>
                <p class="dash-card-desc">Controla qué acciones puede realizar cada rol.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

    </div>

    {{-- ── PARAMETRIZACIÓN ── --}}
    <div class="dash-section-title">
        <div class="bar"></div>
        <h6>Parametrización</h6>
    </div>

    <div class="row g-3">

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('clientes.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-person-badge"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Clientes
                </div>
                <p class="dash-card-desc">Registra y administra la información de los clientes.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('vehiculos.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-car-front"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Vehículos
                </div>
                <p class="dash-card-desc">Gestiona los vehículos registrados en el taller.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('problemas.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-tools"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Servicios
                </div>
                <p class="dash-card-desc">Catálogo de servicios que ofrece el taller.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('repuestos.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-box-seam"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Repuestos
                </div>
                <p class="dash-card-desc">Inventario y control de repuestos disponibles.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('diagnosticos.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-person-workspace"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Mecánicos
                </div>
                <p class="dash-card-desc">Administra el personal técnico del taller.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <a href="{{ route('orden-trabajos.index') }}" class="dash-card">
                <div class="dash-card-icon"><i class="bi bi-clipboard2-check"></i></div>
                <div class="dash-card-title">
                    <div class="mini-bar"></div> Órdenes de Trabajo
                </div>
                <p class="dash-card-desc">Registro y seguimiento de órdenes de servicio.</p>
                <span class="dash-card-link">Ir al módulo <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

    </div>

@endsection