<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleDiagnosticoController;
use App\Http\Controllers\DetalleServicioController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\EspecialidadMecanicoController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\NotificacionClienteController;
use App\Http\Controllers\NotificacioneController;
use App\Http\Controllers\OrdenMecanicoController;
use App\Http\Controllers\OrdenServicioController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\PagoServicioController;
use App\Http\Controllers\PagoVentaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepuestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaRepuestoController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:administrador'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::resource('user-roles', UserRoleController::class)->except(['show'])->parameters(['user-roles' => 'user']);
    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::resource('role-permissions', RolePermissionController::class)->except(['show'])->parameters(['role-permissions' => 'role']);
    Route::resource('clientes', ClienteController::class)->except(['show']);
    Route::resource('vehiculos', VehiculoController::class)->except(['show']);
    Route::get('vehiculos/{vehiculo}/assign-cliente', [VehiculoController::class, 'assignClienteForm'])->name('vehiculos.assign-cliente');
    Route::post('vehiculos/{vehiculo}/assign-cliente', [VehiculoController::class, 'assignCliente'])->name('vehiculos.assign-cliente.store');
    Route::resource('diagnosticos', DiagnosticoController::class)->except(['show']);
    Route::resource('problemas', ProblemaController::class)->except(['show']);
    Route::resource('detalle-diagnosticos', DetalleDiagnosticoController::class)->except(['show']);
    Route::resource('orden-trabajos', OrdenTrabajoController::class)->except(['show']);
    Route::resource('repuestos', RepuestoController::class)->except(['show']);
    Route::resource('mecanicos', MecanicoController::class)->except(['show']);
    Route::resource('especialidades', EspecialidadeController::class);
    Route::resource('especialidad-mecanicos', EspecialidadMecanicoController::class);
    Route::resource('notificaciones', NotificacioneController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('notificacion-clientes', NotificacionClienteController::class);
    Route::resource('orden-mecanicos', OrdenMecanicoController::class);
    Route::resource('pago-ventas', PagoVentaController::class);
    Route::resource('pago-servicios', PagoServicioController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('venta-repuestos', VentaRepuestoController::class);
    Route::resource('detalle-ventas', DetalleVentaController::class);
    Route::resource('detalle-servicios', DetalleServicioController::class);
    Route::resource('orden-servicios', OrdenServicioController::class);
});

require __DIR__ . '/auth.php';
