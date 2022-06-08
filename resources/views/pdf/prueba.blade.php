<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ public_path('css/recommendationLetter.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{ public_path ('css/estilos.css') }}" rel="stylesheet" type="text/css"> --}}
    <style type="text/css" media="all">
        .container,
        .container-fluid,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .display-1 {
            font-size: 4rem;
            font-weight: 300;
            line-height: 1.2;
        }

        .display-2 {
            font-size: 3.5rem;
            font-weight: 300;
            line-height: 1.2;
        }

        .display-3 {
            font-size: 2.5rem;
            font-weight: 300;
            line-height: 1.2;
        }

        .display-4 {
            font-size: 2.0rem;
            font-weight: 300;
            line-height: 1.2;
        }

        .navbar .container,
        .navbar .container-fluid,
        .navbar .container-sm,
        .navbar .container-md,
        .navbar .container-lg,
        .navbar .container-xl {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid,
        .navbar-expand-md>.container-sm,
        .navbar-expand-md>.container-md,
        .navbar-expand-md>.container-lg,
        .navbar-expand-md>.container-xl {
            flex-wrap: nowrap;
        }

        @media (max-width: 991.98px) {

            .navbar-expand-lg>.container,
            .navbar-expand-lg>.container-fluid,
            .navbar-expand-lg>.container-sm,
            .navbar-expand-lg>.container-md,
            .navbar-expand-lg>.container-lg,
            .navbar-expand-lg>.container-xl {
                padding-right: 0;
                padding-left: 0;
            }
        }

        table,
        th,
        td {
            text-align: center;
            border: 1px solid black;

        }

        td{
            text-align: left;
            margin-left: 5px;
            margin-right: 5px;
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</head>




<body>
    <div class="container">

        <div class="row">
            <p class="display-3">Resultados Carta de recomendación</p>
        </div>

        <hr class="d-block " />

        <div class="row" style="margin-top:15px; margin-bottom:15px;">
            <p class="display-4">Datos del candidato</p>
        </div>

        <table class="table" style="margin-top: 10px; margin-bottom:10px">
            <thead>
                <tr>
                    <th style="width:50%">
                        <h3>Datos del candidato</h3>
                    </th>

                    <th style="width:50%">
                        <h3>Datos personales</h3>
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td style="width:50%">
                        <p><strong>Nombre: </strong> {{ $data['appliant']['name'] }}</p>
                        <p><strong>Grado academico: </strong> {{ $data['appliant']['academic_degree'] }}</p>
                        <p><strong>Fecha de nacimiento: </strong> {{ $data['appliant']['birth_country'] }}</p>
                        <p><strong>Telefono: </strong> {{ $data['appliant']['phone_number'] }}</p>
                        <p><strong>Email: </strong> {{ $data['appliant']['email'] }}</p>
                    </td>
                    <td style="width:50%">
                        <p>{{ $data['announcement_date_msg'] }}</p>
                        <p>{{ $data['academic_program']['name'] }}</p>
                        <!-- Area a cargo o dependencia -->
                        <p class="d-block myriad-light ">
                            Universidad Autonoma de San Luis Potosí
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr class="d-block " />

        <div class="row" style="margin-top:15px; margin-bottom:15px;">
            <p class="display-4">Relación con el candidato</p>
        </div>

        <table class="table" style="margin-top: 10px; margin-bottom:10px">
            <thead>
                <tr>
                    <th style="width:50%">
                        <h3>Pregunta</h3>
                    </th>

                    <th style="width:50%">
                        <h3>Respuesta</h3>
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td style="width:50%">
                        <p>¿Desde cúando conoce al candidato?</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['time_to_meet'] }}
                    </td>
                </tr>

                <tr>
                    <td style="width:50%">
                        <p>¿Cómo lo conocio?</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['how_meet'] }}
                    </td>
                </tr>

                <tr>
                    <td style="width:50%">
                        <p>¿Que tipo de relación escolar, académica, laboral, etc. ha tenido el candidato con usted?</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['kind_relationship'] }}
                    </td>
                </tr>

                <tr>
                    <td style="width:50%">
                        <p> ¿El candidato ha trabajado, estudiado o desempeñado alguna tarea en
                            colaboración o directamente para usted? Por favor describa la
                            naturaleza de esas tareas</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['experience_with_candidate'] }}
                    </td>
                </tr>

                <tr>
                    <td style="width:50%">
                        <p> Si el estudiante tomó algún curso con usted ?n qué lugar quedó de
                            acuerdo a su calificación final? (Por ejemplo: 30% superior) ¿Cuál es
                            el número total de estudiantes que está considerando para el cálculo?</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['qualification_student'] }}
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

    <hr class="d-block " />

        <div class="row" style="margin-top:15px; margin-bottom:15px;">
            <p class="display-4">Análisis de candidato</p>
        </div>

        <div class="row" style="margin-top:15px; margin-bottom:15px;">
            <h3>Paremetros personalizados</h3>
        </div>

        <table class="table" style="margin-top: 10px; margin-bottom:10px">
            <thead>
                <tr>
                    <th style="width:50%">
                        <h3>Parametro</h3>
                    </th>

                    <th style="width:50%">
                        <h3>Calificación</h3>
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach ($data['parameters'] as $item)
                <tr>
                    <td style="width:50%">
                        <p>{{$item['text']}}</p>
                    </td>
                    @if ($item['score'] != null)
                    <td style="width:50%">
                        <p>{{$item['score']}}</p>
                    </td>
                    @else
                    <td style="width:50%">
                        <p>Sin calificación</p>
                    </td>
                    @endif
                    
                </tr> 
                @endforeach
            </tbody>
        </table>

        
        @if (sizeof($data['custom_parameters']))
        <hr class="d-block " />

        
        <div class="row" style="margin-top:15px; margin-bottom:15px;">
            <h3>Paremetros personalizados</h3>
        </div>

        <table class="table" style="margin-top: 10px; margin-bottom:10px">
            <thead>
                <tr>
                    <th style="width:50%">
                        <h3>Parametro</h3>
                    </th>

                    <th style="width:50%">
                        <h3>Calificación</h3>
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach ($data['custom_parameters'] as $item)
                <tr>
                    <td style="width:50%">
                        <p>{{$item['text']}}</p>
                    </td>
                    @if ($item['score'] != null)
                    <td style="width:50%">
                        <p>{{$item['score']}}</p>
                    </td>
                    @else
                    <td style="width:50%">
                        <p>Sin calificación</p>
                    </td>
                    @endif
                    
                </tr> 
                @endforeach
            </tbody>
        </table>
        @endif

        <table class="table" style="margin-top: 10px; margin-bottom:10px">
            <thead>
                <tr>
                    <th style="width:50%">
                        <h3>Pregunta</h3>
                    </th>

                    <th style="width:50%">
                        <h3>Respuesta</h3>
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td style="width:50%">
                        <p> Comente las habilidades y debilidades que usted desee destacar en el
                            candidato, especialmente en términos del rendimiento y desempeño en su
                            trabajo/escuela y en proyectos de investigación.</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['special_skills'] }}
                    </td>
                </tr>

                <tr>
                    <td style="width:50%">
                        <p> En síntesis ¿Por qué recomienda al aspirante para ingresar al PMPCA?</p>
                    </td>
                    <td>
                        {{ $data['recommendation_letter']['why_recommendation'] }}
                    </td>
                </tr>

            </tbody>
        </table>
        

</body>

</html>
