<header class="mb-5 d-block header">
    <a class="d-block header-image" href="https://ambiental.uaslp.mx">
        <img class="ml-auto d-block img-fluid" src="{{ asset('storage/headers/logod.png') }}">
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
            
            <a href="{{ route('logout') }}" class="nav-link">logout</a>

            {{-- Cuadro temporal solo para mostrar la informacion del usuario --}}
            <div>
                Clave/rpe: <b>{{Auth::user()->id}}</b> Tipo de usuario: <b>{{Auth::user()->type}}</b> 
                Roles: @foreach (Auth::user()->roles as $r)
                {{-- <b> {{$r->name}},</b> --}}
                @endforeach
            </div>
  
        </nav>
    @endauth
</header> 