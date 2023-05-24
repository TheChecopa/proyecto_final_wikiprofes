<x-principal-layout>
    <x-nav-bar />
    <link src="{{asset('css/dataTables.bootstrap5.min.css')}}"/>   
    @error('calificacion_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('calificacion_puntualidad')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('calificacion_dificultad')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('calificacion_aprendizaje')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('calificacion_planeacion')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('calificacion_evaluacion')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('calificacion_descripcion')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="container">
        @if (!isset($calificacion) && !isset($calificacion->id))
            <h1>Nueva asignacion</h1>
        @else
            <h1>Profesor No. {{$calificacion->id}}</h1>
        @endif
        <div class="d-flex justify-content-center">
        </div>
        <form action="{{ route('calificacionStore')}}" method="POST" id="form_calificacion">
            @csrf
            <input type="hidden" name="id" @if (isset($calificacion) && isset($calificacion->id))
            value="{{ $calificacion->id }}"
            @endif
            required>
            <div class="form-group">
                <label for="calificacion-name">Nombre del maestro</label>
                <input type="text" name="calificacion_name" class="form-control" id="calificacion-name"
                    placeholder="Nombre de calificacion" @if (isset($calificacion) && isset($calificacion->id))
                value="{{ $calificacion->nombre }}"
                @endif
                required>
            </div>
            <div class="form-group">
                <label for="descripcion">Comentario del maestro</label>
                <textarea name="descripcion" class="form-control" id="descripcion" rows="3">@if (isset($calificacion) && isset($calificacion->id)){{ $calificacion->descripcion }}@endif</textarea>
            </div>
            <div class="form-group">
                <label for="calificacion_puntualidad">Puntualidad del maestro</label>
                <input type="number" name="calificacion_puntualidad" class="form-control" id="calificacion_puntualidad" placeholder="Calificacion del 1 al 100"
                    @if (isset($calificacion) && isset($calificacion->id))
                        value="{{ $calificacion->puntualidad }}"
                @endif required min="1" max="100">
            </div>
            <div class="form-group">
                <label for="calificacion_dificultad">Dificultad de la materia</label>
                <input type="number" name="calificacion_dificultad" class="form-control" id="calificacion_dificultad" placeholder="Calificacion del 1 al 100"
                    @if (isset($calificacion) && isset($calificacion->id))
                    value="{{ $calificacion->dificultad }}"
                @endif required min="1" max="100">
            </div>
            <div class="form-group">
                <label for="calificacion_aprendizaje">Aprendizaje del curso </label>
                <input type="number" name="calificacion_aprendizaje" class="form-control" id="calificacion_aprendizaje" placeholder="Calificacion del 1 al 100"
                    @if (isset($calificacion) && isset($calificacion->id))
                        value="{{ $calificacion->aprendizaje }}"
                @endif required min="1" max="100">
            </div>
            <div class="form-group">
                <label for="calificacion_planeacion">Plneacion del curso </label>
                <input type="number" name="calificacion_planeacion" class="form-control" id="calificacion_planeacion" placeholder="Calificacion del 1 al 100"
                    @if (isset($calificacion) && isset($calificacion->id))
                        value="{{ $calificacion->planeacion }}"
                @endif required min="1" max="100">
            </div>
            <div class="form-group">
                <label for="calificacion_evaluacion">Evaluacion del curso </label>
                <input type="number" name="calificacion_evaluacion" class="form-control" id="calificacion_evaluacion" placeholder="Calificacion del 1 al 100"
                    @if (isset($calificacion) && isset($calificacion->id))
                        value="{{ $calificacion->evaluacion }}"
                @endif required min="1" max="100">
            </div>
            <label for="">Materia que imparte</label>
            <div class="form-group">
                <select class="form-select" id="select_Puntuacion_add">
                    @foreach ($puntuaciones ?? '' as $puntuacion)
                    <option value="{{$puntuacion->id}}" class="dropdown-item">{{$puntuacion->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <label for="">NRC de la materia</label>
            <div class="form-group">
                <select class="form-select" id="select_Nrc_add">
                    @foreach ($puntuaciones ?? '' as $puntuacion)
                    <option value="{{$puntuacion->id}}" class="dropdown-item">{{$puntuacion->nrc}}</option>
                    @endforeach
                </select>
            <input class="btn btn-primary" type="submit" value="Guardar" id="btnSubmit" onclick="eliminarPuntuacion()"/>
        </form>
    </div>

    <script src=" {{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('js/calificacion.js')}}"></script>
</x-principal-layout>
