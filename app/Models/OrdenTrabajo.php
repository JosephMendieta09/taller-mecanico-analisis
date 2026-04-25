<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdenTrabajo
 *
 * @property $id
 * @property $diagnostico_id
 * @property $fecha_inicio
 * @property $fecha_final
 * @property $notas
 * @property $costo
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Diagnostico $diagnostico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenTrabajo extends Model
{
    
    protected $perPage = 20;

    protected $table = 'orden_trabajos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['diagnostico_id', 'fecha_inicio', 'fecha_final', 'notas', 'costo', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_final'  => 'date',
    ];

    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class);
    }

    public function detallesRepuesto()
    {
        return $this->hasMany(DetalleRepuesto::class);
    }

    public function repuestos()
    {
        return $this->belongsToMany(Repuesto::class, 'detalle_repuestos')
                    ->withPivot('fecha', 'cantidad', 'monto')
                    ->withTimestamps();
    }
    
}
