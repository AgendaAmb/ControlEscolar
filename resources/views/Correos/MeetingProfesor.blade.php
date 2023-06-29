<!DOCTYPE html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        width: auto;
    }
</style>

<body>
    <main class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-12">
                <img src="{{ asset('imagenes/logod.png') }}">
                {{-- <img src="{{ $message->embed('imagenes/logod.png') }}"> --}}
            </div>

            <div class="col-12">
                <p style="text-align:center;">
                    <strong>
                        Información de entrevista para ingreso a
                        <br>
                        {{ $academic_program['name'] }}
                        <br>
                        Convocatoria 2023-08
                    </strong>
                </p>

            </div>

            <div class="row my-2 justify-content-end" style="text-align: right; margin-top: 20px; margin-bottom: 20px;">
                San Luis Potosí, S.L.P,&nbsp;
                {{ Carbon\Carbon::parse(Carbon\Carbon::now())->locale('es')->isoFormat('dddd DD MMMM YYYY') }}
            </div>

            <div class="container">
                <div class="row my-2">
                    <p>Estimado Profesor {{ $Profesor->middlename . ' ' . $Profesor->surname . ' ' . $Profesor->name }}</p>
                    <p>Agredecemos su partición en la entrevista de:</p>
                </div>

                <div class="container" style="margin-top: 20px; margin-bottom: 20px">
                    <table class="table" style="max-width: 700px; margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td scope="row" style="padding-left: 1rem; padding-right: 1rem;"><strong>Nombre del aspirante</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ $Student->middlename . ' ' . $Student->surname . ' ' . $Student->name }}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Día de la entrevista</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ Carbon\Carbon::parse($Interview->date)->locale('es')->isoFormat('DD MMMM YYYY') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Horario de la entrevista</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ $Interview->start_time }}-{{ $Interview->end_time }}</td>
                            </tr>
                            <tr>
                                @if($Room === 'Teams')
                                    <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Modalidad de la entrevista</strong></td>
                                    <td style="padding-left: 1rem; padding-right: 1rem;">Virtual</td>
                                @else
                                    <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Modalidad de la entrevista</strong></td>
                                    <td style="padding-left: 1rem; padding-right: 1rem;">Presencial</td>
                                @endif
                            </tr>
                            <tr>
                                @if($Room === 'Teams')
                                    <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Plataforma</strong></td>
                                    <td style="padding-left: 1rem; padding-right: 1rem;">{{ $Room }}</td>
                                @else
                                    <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Lugar</strong></td>
                                    <td style="padding-left: 1rem; padding-right: 1rem;">{{ $Room }}</td>
                                @endif
                            </tr>
                            @if($Room === 'Teams')
                                <tr>
                                    <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Enlace para la entrevista</strong></td>
                                    <td style="padding-left: 1rem; padding-right: 1rem;"><a href="http://a.uaslp.mx/Ej2q3JPb">Unirse a la reunión</a></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="row my-2">
                    <p><strong>Indicaciones:</strong></p>

                    <ul>
                        <li> Acceder a <a href="https://ambiental.uaslp.mx/Bienvenida" target="_blank"
                                rel="noopener noreferrer">https://ambiental.uaslp.mx/Bienvenida</a></li>
                        <li> En el menú superior <strong>Entrevista</strong> , submenú <strong>Programa de
                                entrevista</strong> podrá visualizar el expediente del candidato, así como la rúbrica.
                        </li>
    
                    </ul>
    
                    <p>Saludos cordiales, <br>
                        M.I Maricela Rdz. Díaz de León <br>
                        Coordinación Educativa <br>
                        Agenda Ambiental de la Universidad Autónoma de San Luis Potosí <br>
                        Ave. Manuel Nava 201, 2do piso <br>
                        Zona Universitaria (Entre Facultad de Estomatología y Oficina de Finanzas)78210 San Luis Potosí,
                        México. <br>
                        Tels: (444) 8262439 y 2435
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="container-fluid p-2">
        <div class="row">
            <div class="col-12">
                <img src="{{ $url_ContactoAA }}" alt="Contacto Agenda Ambiental" style="width: 100;">
            </div>
        </div>
    </footer>
</body>
