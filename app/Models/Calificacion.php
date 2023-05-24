<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calificacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $table = 'calificaciones';

    public function puntuaciones()
    {
        return $this->belongsToMany(Puntuacion::class, 'puntuaciones_calificaciones')
        ->withPivot('cant_usa');
    }
}
