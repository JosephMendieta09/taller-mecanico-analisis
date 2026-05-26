<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NotificacionCliente
 *
 * @property $id
 * @property $notificacion_id
 * @property $cliente_id
 * @property $leido
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Notificacione $notificacione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NotificacionCliente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['notificacion_id', 'cliente_id', 'leido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificacione()
    {
        return $this->belongsTo(\App\Models\Notificacione::class, 'notificacion_id', 'id');
    }
    
}
