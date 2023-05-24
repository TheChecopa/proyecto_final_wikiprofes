<x-principal-layout>
    <x-nav-bar />
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- New materia Modal -->
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Nueva materia
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('PuntuacionStore') }}" method="POST">
                        <div class="">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_ingr" class="form-label">Nombre de la materia</label>
                                <input class="form-control" type="text" id="nombre_ingr" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="cant_ingred" class="form-label">NRC</label>
                                <input class="form-control" type="number" id="cant_ingred" name="nrc" required min="1">
                            </div>
                            <div class="form-group">
                                <label for="cant_ingred" class="form-label">Profesor</label>
                                <select name="idProfesor" id="select-profesor">
                                    <option value="null" id="opc-sinProfesor">Sin Profesor</option>
                                    <!--Rellenar profesores -->
                                    @foreach ($profesores as $profesor)
                                        <option value="{{$profesor->id}}">{{$profesor->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Añadir">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
                Agregar nueva materia
            </button>
        </div>
        <br>
        <!--<a class="btn btn-primary float-right" href="">Agregar nuevo puntuacion</a>-->
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('nrc')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <h2 class="h2 d-inline">Materias</h2>
        <table class="table table-responsive table-dark text-center">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%">ID</th>
                    <th scope="col" style="width: 50%">Nombre de la materia</th>
                    <th scope="col" style="width: 80%">NRC</th>
                    <th scope="col" style="width: 100%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntuaciones as $puntuacion)
                    <tr>
                        <td>{{ $puntuacion->id }}</td>
                        <td>{{ $puntuacion->nombre }}</td>
                        <td>{{ $puntuacion->nrc }}</td>
                        <td>
                            <a class='btn btn-lg btn-primary mx-1' href="{{route('PuntuacionDelete', $puntuacion->id)}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('js/puntuaciones.js') }}"></script>
</x-principal-layout>
