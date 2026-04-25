<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diagnostico
 *
 * @property $id
 * @property $vehiculo_id
 * @property $descripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Diagnostico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['vehiculo_id', 'descripcion', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleDiagnostico::class);
    }

    public function problemas()
    {
        return $this->belongsToMany(Problema::class, 'detalle_diagnosticos')
                    ->withPivot('observacion', 'prioridad')
                    ->withTimestamps();
    }
}
