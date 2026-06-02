<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\DetalleDiagnosticoApiController;
use App\Http\Controllers\Api\DetalleServicioApiController;
use App\Http\Controllers\Api\DetalleVentaApiController;
use App\Http\Controllers\Api\DiagnosticoApiController;
use App\Http\Controllers\Api\EspecialidadeApiController;
use App\Http\Controllers\Api\EspecialidadMecanicoApiController;
use App\Http\Controllers\Api\MecanicoApiController;
use App\Http\Controllers\Api\NotificacionClienteApiController;
use App\Http\Controllers\Api\NotificacioneApiController;
use App\Http\Controllers\Api\OrdenMecanicoApiController;
use App\Http\Controllers\Api\OrdenServicioApiController;
use App\Http\Controllers\Api\OrdenTrabajoApiController;
use App\Http\Controllers\Api\PagoServicioApiController;
use App\Http\Controllers\Api\PagoVentaApiController;
use App\Http\Controllers\Api\ProblemaApiController;
use App\Http\Controllers\Api\RepuestoApiController;
use App\Http\Controllers\Api\ServicioApiController;
use App\Http\Controllers\Api\VehiculoApiController;
use App\Http\Controllers\Api\VentaApiController;
use App\Http\Controllers\Api\VentaRepuestoApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('clientes', ClienteApiController::class);
Route::apiResource('vehiculos', VehiculoApiController::class);
Route::apiResource('mecanicos', MecanicoApiController::class);
Route::apiResource('repuestos', RepuestoApiController::class);
Route::apiResource('problemas', ProblemaApiController::class);
Route::apiResource('diagnosticos', DiagnosticoApiController::class);
Route::apiResource('especialidades', EspecialidadeApiController::class);
Route::apiResource('notificaciones', NotificacioneApiController::class);
Route::apiResource('orden_trabajos', OrdenTrabajoApiController::class);
Route::apiResource('servicios', ServicioApiController::class);
Route::apiResource('detalle_diagnosticos', DetalleDiagnosticoApiController::class);
Route::apiResource('detalle_servicios', DetalleServicioApiController::class);
Route::apiResource('detalle_ventas', DetalleVentaApiController::class);
Route::apiResource('especialidad_mecanicos', EspecialidadMecanicoApiController::class);
Route::apiResource('notificacion_clientes', NotificacionClienteApiController::class);
Route::apiResource('notificaciones', NotificacioneApiController::class);
Route::apiResource('orden_mecanicos', OrdenMecanicoApiController::class);
Route::apiResource('orden_servicios', OrdenServicioApiController::class);
Route::apiResource('pago_servicios', PagoServicioApiController::class);
Route::apiResource('pago_ventas', PagoVentaApiController::class);
Route::apiResource('ventas', VentaApiController::class);
Route::apiResource('venta_repuestos', VentaRepuestoApiController::class);

Route::middleware('auth:sanctum')->get('/perfil', function(Request $request){
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('clientes', ClienteApiController::class);
});