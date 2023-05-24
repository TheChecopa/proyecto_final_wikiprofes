<x-principal-layout>
    <x-nav-bar />

    <!--<link src="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>-->
    <link src="{{asset('css/dataTables.bootstrap5.min.css')}}"/>
    <div class="container">
        <br>

        <a class="btn btn-primary float-right" href="{{ route('calificacionCreate') }}">Agregar nueva asignacion</a>
        <h2 class="h2 d-inline">Agregar asignacion de materias y profesor</h2><br><br>
        <table class="table table-responsive table-dark table-striped text-center" id="mats_table">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">ID</th>
                    <th scope="col" style="width: 10%">Materia</th>
                    <th scope="col" style="width: 10%">Puntualidad</th>
                    <th scope="col" style="width: 10%">Dificultad</th>
                    <th scope="col" style="width: 10%">Aprendizaje</th>
                    <th scope="col" style="width: 10%">Planeacion</th>
                    <th scope="col" style="width: 10%">Evaluacion</th>
                    <th scope="col" style="width: 10%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calificaciones as $calificacion)
                    <tr>
                        <th scope="row">{{ $calificacion->id }}</th>
                        <th scope="row">{{ $calificacion->nombre }}</th>
                        <td>{{ $calificacion->puntualidad }}</td>
                        <td>{{ $calificacion->dificultad }}</td>
                        <td>{{ $calificacion->aprendizaje }}</td>
                        <td>{{ $calificacion->planeacion }}</td>
                        <td>{{ $calificacion->evaluacion }}</td>
                        <td>
                            <a class='btn btn-lg btn-primary mx-1' href="{{ route('calificacionEdit', $calificacion->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class='btn btn-lg btn-primary mx-1' href="{{ route('calificacionDelete', $calificacion->id)}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    <script src=" {{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
    <!--<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>-->
    <script src="{{asset('js/tablefiltercalificacions.js')}}"></script>
</x-principal-layout>
