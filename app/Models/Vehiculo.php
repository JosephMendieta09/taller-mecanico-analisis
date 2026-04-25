<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 *
 * @property $id
 * @property $cliente_id
 * @property $placa
 * @property $marca
 * @property $modelo
 * @property $color
 * @property $kilometraje
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehiculo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cliente_id', 'placa', 'marca', 'modelo', 'color', 'kilometraje'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    
}
