<?php

namespace App\View\Components;

use App\Models\Calificacion;
use Illuminate\View\Component;

class CalificacionCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $nombre;
    public $descripcion;
    public $puntualidad;
    public $dificultad;
    public $aprendizaje;
    public $planeacion;
    public $evaluacion;

    public function __construct($nombre, $descripcion, $puntualidad, $dificultad, $aprendizaje, $planeacion, $evaluacion)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->puntualidad = $puntualidad;
        $this->dificultad = $dificultad;
        $this->aprendizaje = $aprendizaje;
        $this->planeacion = $planeacion;
        $this->evaluacion = $evaluacion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calificacion-card');
    }
}
