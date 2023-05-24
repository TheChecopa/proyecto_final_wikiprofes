<?php

namespace App\Http\Controllers;

use App\Models\Puntuacion;
use App\Models\Profesor;
use Illuminate\Http\Request;

class PuntuacionController extends Controller
{
    public function index()
    {
        $puntuaciones = Puntuacion::all();
        $profesores = Profesor::all();
        return view('puntuaciones.indexView')->with(['puntuaciones' => $puntuaciones,
                                                        'profesores' => $profesores]);
    }

    public function view(int $id)
    {
        $puntuacion = Puntuacion::find($id);
        if($puntuacion != null) {
            return $puntuacion->toJson();
        }
        else {
            return json_encode((object) null);
        }
    }

    public function create()
    {
        return view('puntuaciones.editView');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nombre' => 'required',
            'nrc' => 'required|numeric|min:1'
        ]);
        $puntuacion = new Puntuacion();
        $puntuacion->nombre = $req->nombre;
        $puntuacion->nrc = $req->nrc;
        if($req->idProfesor != 'null'){
            $puntuacion->id_profesor = $req->idProfesor;
        } else {
            $puntuacion->id_profesor = 0;
        }
        $puntuacion->save();
        return redirect()->route('PuntuacionIndex');
    }

    public function edit(int $id)
    {
        $puntuacion = Puntuacion::find($id);
        $profesores = Profesor::all();
        return view('puntuaciones.editView')->with(['puntuacion' => $puntuacion,
            'profesores' => $profesores]);
    }

    public function update(Request $req)
    {
        $req->validate([
            'nombre' => 'required',
            'nrc' => 'required|numeric|min:0'
        ]);
        $puntuacion = Puntuacion::find($req->id);
        $puntuacion->nombre = $req->nombre;
        $puntuacion->nrc = $req->nrc;
        if($req->idProfesor != 'null'){
            $puntuacion->id_profesor = $req->idProfesor;
        } else {
            $puntuacion->id_profesor = 0;
        }
        $puntuacion->save();
        return redirect()->route('PuntuacionIndex');
    }

    public function delete(int $id)
    {
        Puntuacion::destroy($id);
        return redirect()->route('PuntuacionIndex');
    }
}
