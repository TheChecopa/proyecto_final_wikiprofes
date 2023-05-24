<x-principal-layout>
    <x-nav-bar/>

    <div class="container">
        @if (!isset($profesor) && !isset($profesor->id))
            <h1>Nuevo profesor</h1>
        @else
            <h1>Profesor No. {{$profesor->id}}</h1>
        @endif
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form method="POST" action="{{ route('profesorStore')}}">
            @csrf
            <input type="hidden" name="id" @if (isset($profesor) && isset($profesor->id))
            value="{{ $profesor->id }}"
            @endif
            >
            <div class="form-group">
                <label for="calificacion-name">Nombre del Profesor</label>
                <input type="text" name="nombre" class="form-control"
                    placeholder="Nombre del profesor" @if (isset($profesor) && isset($profesor->id))
                value="{{ $profesor->nombre }}"
                @endif
                required>
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" class="form-control" placeholder="Departamento"
                    @if (isset($profesor) && isset($profesor->id))
                value="{{ $profesor->departamento }}"
                @endif>
            </div>
            <div class="form-group">
                <label for="contacto">Contacto</label>
                <input type="text" name="contacto" class="form-control" placeholder="Email"
                    @if (isset($profesor) && isset($profesor->id))
                value="{{ $profesor->contacto }}"
                @endif>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Guardar">
        </form>
    </div>
</x-principal-layout>
