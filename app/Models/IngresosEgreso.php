<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IngresosEgreso extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento',
        'valor',
        'fecha',
        'descripcion',
        'id_metodo_pago',
        'id_propiedades',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor' => 'float',
        'fecha' => 'timestamp',
        'id_metodo_pago' => 'integer',
        'id_propiedades' => 'integer',
    ];

    public function idMetodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class);
    }

    public function idPropiedades(): BelongsTo
    {
        return $this->belongsTo(Propiedade::class);
    }
}
