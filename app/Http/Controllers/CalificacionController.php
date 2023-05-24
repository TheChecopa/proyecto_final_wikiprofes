<?php

namespace App\Http\Controllers;

use App\Models\Puntuacion;
use App\Models\Calificacion;
use App\Models\Puntuacion_Calificacion;
use Illuminate\Http\Request;
use App\Models\TiposMat;
use Illuminate\Support\Facades\Storage;

class CalificacionController extends Controller
{
    public function index()
    {
        $calificaciones = Calificacion::all();
        return view('calificaciones.indexView')->with(['calificaciones' => $calificaciones]);
    }

    public function create()
    {
        $puntuaciones = Puntuacion::all();
        $tipoMats = TiposMat::all();
        return view('calificaciones.editView')->with(['puntuaciones' => $puntuaciones,
                                                'tipoMat' => $tipoMats]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'calificacion_name' => 'required',
            'calificacion_puntualidad' => 'required|min:0|max:100',
            'calificacion_dificultad' => 'required|min:0|max:100',
            'calificacion_aprendizaje' => 'required|min:0|max:100',
            'calificacion_planeacion' => 'required|min:0|max:100',
            'calificacion_evaluacion' => 'required|min:0|max:100'
        ]);
        $calificacion = new Calificacion();
        if(isset($request->id)){
            $calificacion = Calificacion::find($request->id);
        }
        $calificacion->nombre = $request->calificacion_name;
        $calificacion->descripcion = $request->descripcion;
        $calificacion->puntualidad = $request->calificacion_puntualidad;
        $calificacion->dificultad = $request->calificacion_dificultad;
        $calificacion->aprendizaje = $request->calificacion_aprendizaje;
        $calificacion->planeacion = $request->calificacion_planeacion;
        $calificacion->evaluacion = $request->calificacion_evaluacion;
        if($calificacion->puntuaciones->count() >= 1){
            $calificacion->puntuaciones()->detach();
        }
        $calificacion->save();
        //Puntuaciones
        if(isset($request->Puntuacion_id)){
            for ($i=0; $i < count($request->Puntuacion_id); $i++) {
                //guardar id de puntuacion y calificacion en tbla
                $puntuacion_calificacion = new Puntuacion_Calificacion();
                $puntuacion_calificacion->calificacion_id = $calificacion->id;
                $puntuacion_calificacion->Puntuacion_id = $request->Puntuacion_id[$i];
                $puntuacion_calificacion->cant_usa = $request->Puntuacion_cant_usa[$i];
                $puntuacion_calificacion->save();
            }
        }
        return redirect()->route('calificacionIndex');
    }

    public function view(int $id)
    {
        $calificacion = Calificacion::find($id);
        return $calificacion;
    }


    public function edit(int $id)
    {
        $puntuaciones = Puntuacion::all();
        $tipoMats = TiposMat::all();
        $calificacion = Calificacion::find($id);
        return view('calificaciones.editView')->with(['calificacion' => $calificacion,
                                                'puntuaciones' => $puntuaciones,
                                                'tipoMat' => $tipoMats]);
    }

    public function delete(int $id)
    {
        $calificacion = new Calificacion();
        $calificacion = Calificacion::find($id);
        if($calificacion->puntuaciones->count() >= 1){
            $calificacion->puntuaciones()->detach();
        }
        $calificacion->delete();
        return redirect()->route('calificacionIndex');
    }
}
