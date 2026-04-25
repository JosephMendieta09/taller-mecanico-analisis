<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repuesto
 *
 * @property $id
 * @property $nombre
 * @property $precio_unitario
 * @property $stock_actual
 * @property $stock_minimo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Repuesto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'precio_unitario', 'stock_actual', 'stock_minimo'];

    public function detallesRepuesto()
    {
        return $this->hasMany(DetalleRepuesto::class);
    }

    public function ordenesTrabajo()
    {
        return $this->belongsToMany(OrdenTrabajo::class, 'detalle_repuestos')
                    ->withPivot('fecha', 'cantidad', 'monto')
                    ->withTimestamps();
    }

    /* Indica si el stock está bajo el mínimo */
    public function stockBajo(): bool
    {
        return $this->stock_actual <= $this->stock_minimo;
    }
}
