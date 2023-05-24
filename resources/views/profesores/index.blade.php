<x-principal-layout>
    <x-nav-bar/>

    <div class="container">
        <a class="btn btn-primary float-right" href="{{ route('profesorCreate') }}">Agregar nuevo profesor</a>
        <h2 class="h2 d-inline">Profesores</h2><br><br>
        <table class="table table-responsive table-dark text-center">
            <thead>
                <tr>
                    <th scope="col" style="width: 20%">Nombre del profesor</th>
                    <th scope="col" style="width: 20%">Departamento</th>
                    <th scope="col" style="width: 20%">Contacto</th>
                    <th scope="col" style="width: 10%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->departamento }}</td>
                        <td>{{ $profesor->contacto }}</td>
                        <td class="d-flex justify-content-center">
                            <a class='btn btn-lg btn-primary mx-1' href="{{ route('profesorEdit', $profesor->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class='btn btn-lg btn-primary mx-1' href="{{ route('profesorDelete', $profesor->id, ) }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            @if (isset($profesor->contacto))
                            <a class='btn btn-lg btn-primary mx-1' href="{{ route('profesorMail', ['id'=>$profesor->id]) }}">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-principal-layout>
