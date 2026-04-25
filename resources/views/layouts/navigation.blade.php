{{-- resources/views/layouts/navigation.blade.php --}}

<nav id="sidebar">

    {{-- ── Logo ── --}}
    <div class="sidebar-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    </div>

    {{-- ── Links ── --}}
    <div class="sidebar-nav">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}" class="sidebar-item">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <div class="sidebar-divider"></div>

        {{-- ══ GRUPO: ACCESO Y SEGURIDAD ══ --}}
        <div class="sidebar-group" id="group-acceso">

            <button class="sidebar-group-toggle" data-group="acceso">
                <div class="sgt-left">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Acceso y Seguridad</span>
                </div>
                <i class="bi bi-chevron-down sgt-chevron"></i>
            </button>

            <div class="sidebar-submenu" id="submenu-acceso">
                <a href="{{ route('users.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-people"></i>
                    <span>Usuarios</span>
                </a>
                <a href="{{ route('roles.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-shield-check"></i>
                    <span>Roles</span>
                </a>
                <a href="{{ route('user-roles.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-key"></i>
                    <span>Asignar Rol a Usuario</span>
                </a>
            </div>
        </div>

        <div class="sidebar-divider"></div>

        {{-- ══ GRUPO: PARAMETRIZACIÓN ══ --}}
        <div class="sidebar-group" id="group-parametros">

            <button class="sidebar-group-toggle" data-group="parametros">
                <div class="sgt-left">
                    <i class="bi bi-sliders2"></i>
                    <span>Parametrización</span>
                </div>
                <i class="bi bi-chevron-down sgt-chevron"></i>
            </button>

            <div class="sidebar-submenu" id="submenu-parametros">
                <a href="{{ route('clientes.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-person-badge"></i>
                    <span>Clientes</span>
                </a>
                <a href="{{ route('vehiculos.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-car-front"></i>
                    <span>Vehículos</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-car-front"></i>
                    <span>Mecánicos</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-car-front"></i>
                    <span>Epecialidades</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-person-workspace"></i>
                    <span>Asignar Especialidad a Mecánico</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-car-front"></i>
                    <span>Servicios</span>
                </a>
                <a href="{{ route('repuestos.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-person-workspace"></i>
                    <span>Repuestos</span>
                </a>
                <a href="{{ route('problemas.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-box-seam"></i>
                    <span>Problemas</span>
                </a>
            </div>
        </div>

        <div class="sidebar-divider"></div>

        {{-- ══ GRUPO: TRANSACCIONALES ══ --}}
        <div class="sidebar-group" id="group-transaccional">

            <button class="sidebar-group-toggle" data-group="transaccional">
                <div class="sgt-left">
                    <i class="bi bi-sliders2"></i>
                    <span>Transaccionales</span>
                </div>
                <i class="bi bi-chevron-down sgt-chevron"></i>
            </button>

            <div class="sidebar-submenu" id="submenu-transaccional">
                <a href="{{ route('diagnosticos.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-tools"></i>
                    <span>Diagnosticos</span>
                </a>
                <a href="{{ route('orden-trabajos.index') }}" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>Órdenes de Trabajo</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-tools"></i>
                    <span>Pagos</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>Notificaciones</span>
                </a>
            </div>
        </div>

        <div class="sidebar-divider"></div>

        {{-- ══ GRUPO: REPORTES ══ --}}
        <div class="sidebar-group" id="group-reportes">

            <button class="sidebar-group-toggle" data-group="reportes">
                <div class="sgt-left">
                    <i class="bi bi-sliders2"></i>
                    <span>Reportes</span>
                </div>
                <i class="bi bi-chevron-down sgt-chevron"></i>
            </button>

            <div class="sidebar-submenu" id="submenu-reportes">
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-person-badge"></i>
                    <span>Trabajos por Mecanico</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-car-front"></i>
                    <span>Diagnósticos Realizados</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-tools"></i>
                    <span>Mantenimientos por Vehículo</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-box-seam"></i>
                    <span>Servicios por Vehículo</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-box-seam"></i>
                    <span>Stock de Repuestos</span>
                </a>
            </div>
        </div>
        
        <div class="sidebar-divider"></div>

        {{-- ══ GRUPO: ESTADISTICAS ══ --}}
        <div class="sidebar-group" id="group-estadistica">

            <button class="sidebar-group-toggle" data-group="estadistica">
                <div class="sgt-left">
                    <i class="bi bi-sliders2"></i>
                    <span>Estadisticas</span>
                </div>
                <i class="bi bi-chevron-down sgt-chevron"></i>
            </button>

            <div class="sidebar-submenu" id="submenu-estadistica">
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-person-badge"></i>
                    <span>Relaciones</span>
                </a>
                <a href="#" class="sidebar-item sidebar-subitem">
                    <i class="bi bi-car-front"></i>
                    <span>Automoviles</span>
                </a>
            </div>
        </div>
    </div>

</nav>