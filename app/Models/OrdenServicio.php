<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdenServicio
 *
 * @property $id
 * @property $orden_trabajo_id
 * @property $servicio_id
 * @property $precio_servicio
 * @property $mano_obra
 * @property $created_at
 * @property $updated_at
 *
 * @property OrdenTrabajo $ordenTrabajo
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenServicio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['orden_trabajo_id', 'servicio_id', 'precio_servicio', 'mano_obra'];


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
    public function servicio()
    {
        return $this->belongsTo(\App\Models\Servicio::class, 'servicio_id', 'id');
    }
    
}
