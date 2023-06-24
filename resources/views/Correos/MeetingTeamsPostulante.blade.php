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

            <div class="col-12 ">
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
                    <table class="table" style="max-width: 700px; margin: 0 auto">
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
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ Carbon\Carbon::parse($Meeating['start_time'])->locale('es')->isoFormat('DD MMMM YYYY') }}</td>
                            </tr>

                            <tr>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Horario de la entrevista</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">{{ Carbon\Carbon::parse($Meeating['start_time'])->subHour(6)->toTimeString() }}-{{ Carbon\Carbon::createFromDate($Meeating['start_time'])->addMinutes($Meeating['duration'])->subHour(6)->toTimeString() }}</td>
                            </tr>

                            <tr>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Modalidad de la entrevista</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">Virtual</td>
                            </tr>

                            <tr>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Plataforma</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;">Microsoft Teams</td>
                            </tr>

                            <tr>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><strong>Enlace para la entrevista</strong></td>
                                <td style="padding-left: 1rem; padding-right: 1rem;"><a href="http://a.uaslp.mx/Ej2q3JPb">Unirse a la reunión</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="container">
                @if ($academic_program['alias'] === 'maestria' || $academic_program['alias'] == 'enrem') 
                    <div class="row">
                        Dentro de los requisitos, se establece la elaboración de un ensayo académico relacionado con las
                        ciencias ambientales o bien relacionado con tu posible trabajo de tesis, el cual se le solicita
                        sea ingresado en la plataforma a mas tardar el día 30 de Noviembre a las 14:00 hrs.
                    </div>
                    
                    <!-- <div class="row mt-2 mb-2 align-items-center justify-content-center">
                        @component('mail::button',
                            [
                                'url' => route('documentsForInterview.show', [
                                    'archive_id' => $archive_id,
                                ]),
                            ])
                            Subir Ensayo
                        @endcomponent

                    </div> -->
                @elseif ($academic_program['alias'] === 'doctorado')
                    <div class="row">
                        Dentro de los requisitos, se establece la elaboración UNA PRESENTACIÓN Y ENSAYO, las cuales deberán de ser ingresadas a la plataforma a mas tardar el día 30 de Noviembre a las 14:00 hrs.
                    </div>

                    <!-- <div class="row align-items-center justify-content-center" style="margin-top: 20px">
                        @component('mail::button',
                            [
                                'url' => route('documentsForInterview.show', [
                                    'archive_id' => $archive_id,
                                ]),
                            ])
                            Subir Presentación y Ensayo
                        @endcomponent
                    </div> -->
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
