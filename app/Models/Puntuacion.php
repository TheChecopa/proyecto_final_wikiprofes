<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puntuacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'puntuaciones';
    public $timestamps = false;

    public function profesor()
    {
        return $this->hasOne(Profesor::class);
    }

    public function calificacion()
    {
        return $this->belongsTo(Calificacion::class);
    }
}
