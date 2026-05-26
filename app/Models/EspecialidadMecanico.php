<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EspecialidadMecanico
 *
 * @property $id
 * @property $especialidad_id
 * @property $mecanico_id
 * @property $fecha_asignacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Especialidade $especialidade
 * @property Mecanico $mecanico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EspecialidadMecanico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['especialidad_id', 'mecanico_id', 'fecha_asignacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especialidade()
    {
        return $this->belongsTo(\App\Models\Especialidade::class, 'especialidad_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mecanico()
    {
        return $this->belongsTo(\App\Models\Mecanico::class, 'mecanico_id', 'id');
    }
    
}
