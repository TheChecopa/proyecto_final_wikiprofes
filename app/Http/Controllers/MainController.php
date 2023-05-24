<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $calificaciones = Calificacion::all();
        return view('main.indexView')->with(['calificaciones' => $calificaciones]);
    }
}
