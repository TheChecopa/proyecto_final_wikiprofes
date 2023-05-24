<x-principal-layout>
    <x-nav-bar />

    <div class="container" style="background: #ffffff;border-radius: 8px;">
        <div class="container">
            <div class="row">
                @foreach ($calificaciones as $calificacion)
                    <div class="col-sm-4">
                        <x-calificacion-card 
                        nombre="{{ $calificacion->nombre }}" 
                        descripcion="{{$calificacion->descripcion}}" 
                        puntualidad="{{$calificacion->puntualidad}}"
                        dificultad="{{$calificacion->dificultad}}"
                        aprendizaje="{{$calificacion->aprendizaje}}"
                        planeacion="{{$calificacion->planeacion}}"
                        evaluacion="{{$calificacion->evaluacion}}"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-principal-layout>
