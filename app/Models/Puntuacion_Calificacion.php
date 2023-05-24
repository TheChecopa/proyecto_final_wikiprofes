<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puntuacion_Calificacion extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    protected $table = "puntuaciones_calificaciones";
}
