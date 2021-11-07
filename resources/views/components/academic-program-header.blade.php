<header class="d-block header mb-5">
    <a class="d-block header-image" href="https://ambiental.uaslp.mx">
        <img class="d-block img-fluid ml-auto" src="{{ asset('storage/headers/logod.png') }}">
    </a>
    <nav class="nav nav-options">
        <a class="nav-link" href="{{ route('authenticate.home') }}"> Inicio </a>
        <a class="nav-link" href="#"> Postulación </a>
        <a id="Entrevistas" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Entrevistas </a>
        <div class="dropdown-menu" aria-labelledby="Entrevistas">
            <a class="dropdown-item" href="{{ route('entrevistas.calendario') }}">Calendario de entrevistas</a>
            <a class="dropdown-item" href="{{ route('entrevistas.programa') }}">Programa de entrevistas</a>
        </div>
        <a class="nav-link" href="#"> Inscripciones </a>
        <a class="nav-link" href="#"> Administración </a>
    </nav>
</header> 