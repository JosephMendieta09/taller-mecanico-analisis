<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleDiagnosticoController;
use App\Http\Controllers\DetalleRepuestoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepuestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\VehiculoController;

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
    Route::resource('detalle-repuestos', DetalleRepuestoController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
