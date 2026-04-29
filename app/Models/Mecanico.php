<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mecanico
 *
 * @property $id
 * @property $nombre
 * @property $cedula
 * @property $email
 * @property $telefono
 * @property $direccion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mecanico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'cedula', 'email', 'telefono', 'direccion', 'estado'];


}
