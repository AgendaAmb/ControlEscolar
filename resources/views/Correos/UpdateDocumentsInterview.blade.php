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
                    <div class="row my-2">
                        Dentro de los requisitos, se establece la elaboración de un ensayo académico relacionado con las
                        ciencias ambientales o bien relacionado con tu posible trabajo de tesis, el cual se le solicita
                        sea ingresado en la plataforma.
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
                    <div class="row my-2">
                        Dentro de los requisitos, se establece la elaboración UNA PRESENTACIÓN Y ENSAYO, las cuales deberán de ser ingresadas a la plataforma.
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
