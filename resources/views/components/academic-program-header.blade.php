<header class="d-block header mb-5">
    <a class="d-block header-image" href="https://ambiental.uaslp.mx">
        <img class="d-block img-fluid ml-auto" src="{{ asset('storage/headers/logod.png') }}">
    </a>
    @auth
        <nav class="nav nav-options">
        <a class="nav-link" href="{{ route('authenticate.home') }}"> Inicio </a>
            <div class="nav-item dropdown">
                <a id="Postulacion" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Postulación </a>
                <div class="dropdown-menu" aria-labelledby="Postulacion" >
                    <a class="dropdown-item" href="{{ route('solicitud.index') }}" > Expedientes </a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a id="Entrevistas" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Entrevistas </a>
                <div class="dropdown-menu" aria-labelledby="Entrevistas">
                    <a class="dropdown-item" href="{{ route('entrevistas.calendario') }}">Calendario de entrevistas</a>
                    <a class="dropdown-item" href="{{ route('entrevistas.programa') }}">Programa de entrevistas</a>
                </div>
            </div>
            
                @if (Auth::user()->hasRole('admin'))
                    <a class="nav-link" href="#"> Inscripciones </a>
                        
                    <a class="nav-link" href="{{ route('admin.index') }}" > Administración </a>
                @endif    
        </nav>
    @endauth
</header> 