<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVenta
 *
 * @property $id
 * @property $venta_id
 * @property $pago_venta_id
 * @property $monto_pagado
 * @property $metodo_pago
 * @property $created_at
 * @property $updated_at
 *
 * @property PagoVenta $pagoVenta
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleVenta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['venta_id', 'pago_venta_id', 'monto_pagado', 'metodo_pago'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pagoVenta()
    {
        return $this->belongsTo(\App\Models\PagoVenta::class, 'pago_venta_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venta()
    {
        return $this->belongsTo(\App\Models\Venta::class, 'venta_id', 'id');
    }
    
}
