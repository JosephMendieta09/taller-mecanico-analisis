<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Problema
 *
 * @property $id
 * @property $descripcion
 * @property $categoria
 * @property $gravedad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Problema extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripcion', 'categoria', 'gravedad'];

   public function detalles()
    {
        return $this->hasMany(DetalleDiagnostico::class);
    }

    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class, 'detalle_diagnosticos')
                    ->withPivot('observacion', 'prioridad')
                    ->withTimestamps();
    }

}
