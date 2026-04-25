<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleDiagnostico
 *
 * @property $id
 * @property $diagnostico_id
 * @property $problema_id
 * @property $observacion
 * @property $prioridad
 * @property $created_at
 * @property $updated_at
 *
 * @property Diagnostico $diagnostico
 * @property Problema $problema
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleDiagnostico extends Model
{
    
    protected $perPage = 20;

    protected $table = 'detalle_diagnosticos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['diagnostico_id', 'problema_id', 'observacion', 'prioridad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function problema()
    {
        return $this->belongsTo(Problema::class);
    }
    
}
