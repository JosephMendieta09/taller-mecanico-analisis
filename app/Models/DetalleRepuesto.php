<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleRepuesto
 *
 * @property $id
 * @property $orden_trabajo_id
 * @property $repuesto_id
 * @property $fecha
 * @property $cantidad
 * @property $monto
 * @property $created_at
 * @property $updated_at
 *
 * @property OrdenTrabajo $ordenTrabajo
 * @property Repuesto $repuesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleRepuesto extends Model
{
    
    protected $perPage = 20;

    protected $table = 'detalle_repuestos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['orden_trabajo_id', 'repuesto_id', 'fecha', 'cantidad', 'monto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     protected $casts = [
        'fecha' => 'date',
    ];

    public function ordenTrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }

    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class);
    }
    
}
