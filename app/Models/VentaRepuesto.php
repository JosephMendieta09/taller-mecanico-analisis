<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VentaRepuesto
 *
 * @property $id
 * @property $repuesto_id
 * @property $venta_id
 * @property $cantidad
 * @property $subtotal
 * @property $created_at
 * @property $updated_at
 *
 * @property Repuesto $repuesto
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VentaRepuesto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['repuesto_id', 'venta_id', 'cantidad', 'subtotal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repuesto()
    {
        return $this->belongsTo(\App\Models\Repuesto::class, 'repuesto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venta()
    {
        return $this->belongsTo(\App\Models\Venta::class, 'venta_id', 'id');
    }
    
}
