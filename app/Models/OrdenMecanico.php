<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdenMecanico
 *
 * @property $id
 * @property $orden_trabajo_id
 * @property $mecanico_id
 * @property $fecha_asignacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Mecanico $mecanico
 * @property OrdenTrabajo $ordenTrabajo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenMecanico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['orden_trabajo_id', 'mecanico_id', 'fecha_asignacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mecanico()
    {
        return $this->belongsTo(\App\Models\Mecanico::class, 'mecanico_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenTrabajo()
    {
        return $this->belongsTo(\App\Models\OrdenTrabajo::class, 'orden_trabajo_id', 'id');
    }
    
}
