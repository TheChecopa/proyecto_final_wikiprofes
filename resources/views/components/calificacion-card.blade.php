<div class="card text-center m-2">
    <div class="card-header card-title h2">
        {{ $nombre }}
    </div>
    <div class="card-body">
        <p class="card-text">
            {{ $descripcion }}
        <div class="card-footer text-muted">
            Puntualidad: {{ $puntualidad }}/100
        </div>
        <div class="card-footer text-muted">
            Dificultad: {{ $dificultad }}/100
        </div>
        <div class="card-footer text-muted">
            Aprendizaje: {{ $aprendizaje }}/100
        </div>
        <div class="card-footer text-muted">
            Planeacion: {{ $planeacion }}/100
        </div>
        <div class="card-footer text-muted">
            Evaluacion: {{ $evaluacion }}/100
        </div>
    </div>
</div>
