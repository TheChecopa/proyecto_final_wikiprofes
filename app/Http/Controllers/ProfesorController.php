<?php

namespace App\Http\Controllers;

use App\Mail\ProfesorMail;
use App\Models\Profesor;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfesorController extends Controller
{

    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index')->with(['profesores' => $profesores]);
    }

    public function create()
    {
        return view('profesores.editView');
    }

    public function store(Request $request)
    {

        $request->validate(['nombre'=>'required']);
        $profesor = new Profesor();
        if(isset($request->id)){
            $profesor = Profesor::find($request->id);
        }
        $profesor->nombre = $request->nombre;
        $profesor->departamento = $request->departamento;
        $profesor->contacto = $request->contacto;
        $profesor->save();

        return redirect()->route('profesorIndex');
    }

    public function edit(int $id)
    {
        $profesor = Profesor::find($id);
        return view('profesores.editView')->with(['profesor' => $profesor]);
    }

    public function delete(int $id)
    {
        Profesor::destroy($id);
        return redirect()->route('profesorIndex');
    }

    public function sendMail($id)
    {
        $profesor = Profesor::find($id);
        if(isset($profesor->contacto)){
            Mail::to($profesor->contacto)->send(new ProfesorMail($id));
            $correoMessage = "Correo enviado con exito";
        } else {
            $correoMessage = "No hay correo vinculado a este profesor";
        }
        return redirect()->route('profesorIndex')->with(['mensaje' => $correoMessage]);
    }
}
