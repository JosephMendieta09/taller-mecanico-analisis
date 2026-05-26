<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleServicio
 *
 * @property $id
 * @property $orden_trabajo_id
 * @property $pago_servicio_id
 * @property $monto_pagado
 * @property $metodo_pago
 * @property $created_at
 * @property $updated_at
 *
 * @property OrdenTrabajo $ordenTrabajo
 * @property PagoServicio $pagoServicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleServicio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['orden_trabajo_id', 'pago_servicio_id', 'monto_pagado', 'metodo_pago'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenTrabajo()
    {
        return $this->belongsTo(\App\Models\OrdenTrabajo::class, 'orden_trabajo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pagoServicio()
    {
        return $this->belongsTo(\App\Models\PagoServicio::class, 'pago_servicio_id', 'id');
    }
    
}
