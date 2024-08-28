<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Propiedade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero_unidad',
        'ubicacion',
        'id_personas',
        'id_coutas',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_personas' => 'integer',
        'id_coutas' => 'integer',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_personas');
    }

    public function cuota()
    {
        return $this->belongsTo(Cuota::class, 'id_cuotas');
    }
}
