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
                <img src="{{ asset('imagenes/logod.png') }}" style="width:100%;">
                {{-- <img src="{{ $message->embed('imagenes/logod.png') }}"> --}}
            </div>

            <div class="col-12">
                <p style="text-align:center;">
                    <strong>
                        Información de entrevista para ingreso a
                        <br>
                        {{ $academic_program['name'] }}
                        <br>
                        Convocatoria 2022-02
                    </strong>
                </p>

            </div>
            <div class="row justify-content-end" style="text-align: right;">
                San Luis Potosí, S.L.P,&nbsp;
                {{ Carbon\Carbon::parse(Carbon\Carbon::now())->locale('es')->isoFormat('dddd DD MMMM YYYY') }}
            </div>

            <div class="container my-4">
                <p>Estimado(a)
                    <strong>{{ $Student['middlename'] . ' ' . $Student['surname'] . ' ' . $Student['name'] }}</strong>
                    Por medio de la presente se le informa que la documentación entregada para el proceso de
                    selección 2022 para el programa de {{ $academic_program['name'] }} CUMPLE con los requisitos
                    estipulados en la convocatoria. 
                </p>
            </div>

            
            <div class="container">
                @if ($academic_program['alias'] === 'maestria' || $academic_program['alias'] == 'imarec' ||  $academic_program['alias'] == 'enrem')
                    <div class="row mt-2">
                        Dentro de los requisitos, se establece la elaboración de un ensayo académico relacionado con las
                        ciencias ambientales o bien relacionado con tu posible trabajo de tesis, el cual se le solicita
                        sea ingresado en la plataforma a más tardar el día 19 de junio a las 12:00 h
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
                @elseif ($academic_program['alias'] === 'doctorado')
                    <div class="row mt-2">
                        Dentro de los requisitos, se establece la elaboración UNA
                        PRESENTACIÓN Y ENSAYO, las cuales deberán de ser ingresadas a la plataforma a más tardar el día de
                        junio a las 12:00 hrs.
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
                @endif

                <p>

                <p><strong>Indicaciones:</strong></p>
                <p>Los aspectos a tomar en cuenta para el desarrollo de la entrevista son los siguientes:</p>
                <ul>
                    <li> Conocer la información disponible en el sitio web de los PMPCA <a
                            href="https://pmpca.uaslp.mx"></a></li>
                    <li> Demostrar que conoce al menos, el número de áreas que constituyen el posgrado</li>
                    <li>Estructura y funcionamiento de los seminarios que integran el currículo del mismo. </li>
                    <li> Conocer alguna tesis desarrollada dentro de cada una de las áreas que solicita ingreso. Las
                        tesis se consultan en la sección de “Biblioteca” del sitio web.</li>
                    <li>Presentar la propuesta de proyecto en PPT ante los profesores del Comité de Evaluación. El
                        tiempo límite para la presentación es de 20 minutos.</li>
                    <li>Demostrar que conoce las líneas de investigación de profesores del núcleo básico del posgrado,
                        que podrían ser su director de tesis o bien que pueden formar parte de su comité tutelar.</li>
                    <li> Además, debe conocer los objetivos del programa de manera explícita. </li>
                </ul>
                <p>Favor de confirmar asistencia a la entrevista, al correo pmpca@uaslp.mx</p>
                <p>Saludos cordiales, <br>
                    M.I Maricela Rdz. Díaz de León <br>
                    Coordinación Educativa <br>
                    Agenda Ambiental de la Universidad Autónoma de San Luis Potosí <br>
                    Ave. Manuel Nava 201, 2do piso <br>
                    Zona Universitaria (Entre Facultad de Estomatología y Oficina de Finanzas)78210 San Luis Potosí,
                    México. <br>
                    Tels: (444) 8262439 y 2435
                </p>




                </p>
            </div>
        </div>
    </main>
</body>
