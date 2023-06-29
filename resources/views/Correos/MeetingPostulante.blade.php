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
        <div class="row">
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
                <p>Estimado(a)
                    <strong>{{ $Student->middlename . ' ' . $Student->surname . ' ' . $Student->name }}</strong><br>

                    Por medio de la presente se le informa que la documentación entregada para el proceso de
                    selección 2023 para el programa de {{ $academic_program['name'] }} CUMPLE con los requisitos
                    estipulados en la convocatoria. Por lo tanto, se le notifica que la etapa siguiente (entrevista)
                    se llevará a cabo:
                </p>

                <div class="container" style="margin-top: 20px; margin-bottom: 20px">
                    <table class="table" style="max-width: 700px; margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td scope="row" style="padding-left: 1rem; padding-right: 1rem;"><strong>Nombre del aspirante</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ $Student->middlename . ' ' . $Student->surname . ' ' . $Student->name }}</td>
                            </tr>
                            <tr>
                                <td scope="row" style="padding-left: 1rem; padding-right: 1rem;"><strong>Correo electrónico</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ $Student->email }} </td>
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

            </div>

            <div class="container">
                @if ($academic_program['alias'] === 'maestria' || $academic_program['alias'] == 'enrem')
                    <div class="row my-2">
                        <p>Dentro de los requisitos, se establece la elaboración de un ensayo académico de la lista de temas que a continuación se enumeran debes seleccionar uno de ellos y desarrollarlo en una
                        o dos cuartillas como mínimo.
                        <br>
                        <li>Problemas ambientales globales</li>
                        <li>Contaminación</li>
                        <li>Participación social y problemas ambientales</li>
                        <li>Desarrollo sustentable</li>
                        <li>Ordenamiento territorial</li>
                        <li>Ecoturismo</li>
                        <li>Comunidades indígenas y medio ambiente</li>
                        <li>Cambio climático</li>
                        <li>Biodiversidad</li>
                        <li>Abastecimiento de agua</li>
                        <br>                
                        El cual se le solicita
                        sea ingresado en la plataforma a mas tardar el día 29 de junio a las 23:59 horas.
                        <br>
                        Favor de confirmar entrevista.
                        </p>
                    </div>
                    
                    <div class="row mt-2 mb-2 align-items-center justify-content-center">
                        @component('mail::button',
                            [
                                'url' => route('documentsForInterview.show', [
                                    'archive_id' => $archive_id,
                                ]),
                            ])
                            Subir Ensayo
                        @endcomponent
                    </div>

                    <div class="row my-2">
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
                    
                @elseif ($academic_program['alias'] === 'doctorado')
                    <div class="row my-2">
                        <p>
                            Dentro de los requisitos, se establece la elaboración de UNA PRESENTACIÓN de tu proyecto de tesis Y UN ENSAYO académico de la lista de temas que a continuación se enumeran debes seleccionar uno de ellos y desarrollarlo en una
                            o dos cuartillas como mínimo.
                            <br>
                            <li>Problemas ambientales globales</li>
                            <li>Contaminación</li>
                            <li>Participación social y problemas ambientales</li>
                            <li>Desarrollo sustentable</li>
                            <li>Ordenamiento territorial</li>
                            <li>Ecoturismo</li>
                            <li>Comunidades indígenas y medio ambiente</li>
                            <li>Cambio climático</li>
                            <li>Biodiversidad</li>
                            <li>Abastecimiento de agua</li>
                            <br>  
                            Las cuales deberán de ser ingresadas a la plataforma a mas tardar el día 2 de julio a las 23:59 horas.
                            <br>
                            Favor de confirmar entrevista.
                            <br>
                        </p>
                    </div>

                    <div class="row mt-2 mb-2 align-items-center justify-content-center">
                        @component('mail::button',
                            [
                                'url' => route('documentsForInterview.show', [
                                    'archive_id' => $archive_id,
                                ]),
                            ])
                            Subir Presentación y Ensayo
                        @endcomponent
                    </div>

                    <div class="row my-2">
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

                @endif
                
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
