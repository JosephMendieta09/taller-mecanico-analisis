<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PagoVenta
 *
 * @property $id
 * @property $fecha_pago
 * @property $monto_total
 * @property $tipo_pago
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PagoVenta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha_pago', 'monto_total', 'tipo_pago', 'observacion'];


}
