

<?php
//Creamos la ruta para comite enviando el id como props


$reference = "/controlescolar/ca/?id=";

?> 
<header class="mb-5 d-block header">
    <a class="d-block header-image" href="">
        <img class="ml-auto d-block img-fluid" src="{{ asset('storage/headers/logod.png') }}">
    </a>
    @auth

    {{-- <b-navbar toggleable="lg" type="dark" variant="info">
        <b-collapse id="nav-collapse" is-nav> --}}
        <nav class="nav nav-options">
            
            {{-- Inicio disponible para todos --}}
            <a class="nav-link" href="{{ route('authenticate.home') }}">Inicio</a>

            {{-- Muestra expediente de postulante para subir cambios --}}

            {{-- Funciona en produccion --}}
            {{-- @if (Auth::user()->hasRole('aspirante_extranjero') || Auth::user()->hasRole('aspirante_foraneo') || Auth::user()->hasRole('aspirante_local')) --}}
            {{-- funciona para pruebas --}}
            @if ((Auth::user()->hasRole('aspirante_local') || Auth::user()->hasRole('aspirante_foraneo') || Auth::user()->hasRole('aspirante_extranjero')) && !Auth::user()->isWorker())
                {{-- Entrevistas organizar --}}
                <div class="nav-item dropdown">
                    <a id="Expedientes" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" href="#">Expedientes</a>
                    <div class="dropdown-menu" aria-labelledby="Expedientes">
                        <a class="dropdown-item" href="{{ route('showRegisterArchives') }}">Ver</a>
                        <a class="dropdown-item" href="{{ route('nuevoExpediente.showCreateNewArchive') }}">Añadir</a>
                    </div>
                </div>
            @endif

            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_nb') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('personal_apoyo') || Auth::user()->hasRole('coordinador'))
                {{-- Expedientes de todos los alumnos --}}
                <div class="nav-item dropdown">
                    <a id="Postulacion" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" href="#"> Postulación </a>
                    <div class="dropdown-menu" aria-labelledby="Postulacion">
                        <a class="dropdown-item" href="{{ route('solicitud.index') }}"> Expedientes </a>
                    </div>
                </div>
            @endif

            
            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_nb') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('coordinador'))
                {{-- Entrevistas organizar --}}
                <div class="nav-item dropdown">
                    <a id="Entrevistas" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" href="#"> Entrevistas </a>
                    <div class="dropdown-menu" aria-labelledby="Entrevistas">
                        <a class="dropdown-item" href="{{ route('entrevistas.calendario') }}">Calendario de
                            entrevistas</a>
                        <a class="dropdown-item" href="{{ route('entrevistas.programa') }}">Programa de entrevistas</a>
                    </div>
                </div>
            @endif


            @if (Auth::user()->hasRole('comite_academico'))
                <a class="nav-link" href="http://ambiental.uaslp.mx/ComiteAcademico"> Comite Academico </a>
                <a class="nav-link" id="control-href" href="{{$reference}}"> Comite Academico Prueba</a>
            @endif


            {{-- Control por el administrador --}}
            @if (Auth::user()->hasRole('admin'))
                {{-- Otras opciones proximamente .... --}}
                <a class="nav-link" href="#"> Inscripciones </a>
                <a class="nav-link" href="{{ route('admin.index') }}"> Administración </a>
            @endif

            <a href="{{ route('logout') }}" class="nav-link">Cerrar sesión</a>

            {{-- Cuadro temporal solo para mostrar la informacion del usuario --}}
            {{-- <div>
                Clave/rpe: <b>{{Auth::user()->id}}</b> Tipo de usuario: <b>{{Auth::user()->type}}</b> 
                Roles: 
                @foreach (Auth::user()->roles as $r)
                    </b>|| {{$r->name}}  ||<b>
                @endforeach
            </div> --}}

        </nav>
    {{-- </b-collapse>
</b-navbar> --}}
    @endauth
</header>

<?php
//Creamos la ruta para comite enviando el id como props
$flag = false;
if(Auth::user()){
    $reference = "/controlescolar/ca/?id=". Auth::user()->id;
    $flag = true;
}

?>

<script>

    if("{{$flag}}"){
        setTimeout(() => {
            let control = document.querySelector("#control-href");
            if(control != null){
                control.setAttribute("href", "{{$reference}}" );
            }
        }, 200);

    }
    
</script>
