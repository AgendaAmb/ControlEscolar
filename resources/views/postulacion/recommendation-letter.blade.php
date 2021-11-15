@extends('layouts.app')

@section('main-content')
<main id="app" class="recommendation-letter">
    <h1>Formulario de recomendación</h1>
    <hr class="d-block">
    <h2> Datos del candidato </h2>

    <div class="d-block d-lg-flex flex-lg-row justify-content-between">
        <div class="d-block d-lg-inline-block">
            <p class="mb-1"> Chanchito feliz </p>
            <p class="mb-1"> Chanchito feliz </p>
            <p class="mb-3"> Chanchito feliz </p>
            <p class="mb-1"> Chanchito feliz </p>
            <p class="mb-1"> Chanchito feliz </p>
        </div>
        <div class="d-block d-lg-inline-block">
            <p class="mb-1"> Chanchito feliz </p>
            <p class="mb-1"> Chanchito feliz </p>
            <p class="mb-1"> Chanchito feliz </p>
        </div>
        <div class="d-block d-lg-inline-block">
            3 
        </div>
    </div>

    <hr class="d-block">
    <h2> Relación con el candidato </h2>
    <div id="RelacionCandidato" class="d-block">
        <div class="d-flex flex-column">
            <label> ¿Desde cuándo conoce al candidato? </label>
            <input id="FechaRelacion" type="date" class="form-control">

            <label class="mt-4"> ¿Cómo lo conoció? </label>
            <textarea class="form-control" rows="4"></textarea>

            <label class="mt-4"> ¿Qué tipo de relación escolar, académica, laboral, etc. ha tenido el candidato con usted? </label>
            <textarea class="form-control" rows="4"></textarea>

            <label class="mt-4"> 
                ¿El candidato ha trabajado, estudiado o desempeñado alguna tarea en colaboración o directamente para usted? 
                Por favor describa la naturaleza de esas tareas 
            </label>
            <textarea class="form-control" rows="4"></textarea>

            <label class="mt-4"> 
                Si el estudiante tomó algún curso con usted ?n qué lugar quedó de acuerdo a su calificación final? 
                (Por ejemplo: 30% superior) ¿Cuál es el número total de estudiantes que está considerando para el cálculo?
            </label>
            <textarea class="form-control" rows="4"></textarea>
        </div>
    </div>


    <hr class="d-block">
    <h2> Análisis del candidato </h2>
    <div id="AnalisisCandidato" class="d-block">
        <div class="d-flex flex-column">
            <candidate-analysis></candidate-analysis>

            <label class="mt-4"> 
                Comente las habilidades y debilidades que usted desee destacar en el candidato, especialmente en términos
                del rendimiento y desempeño en su trabajo/escuela y en proyectos de investigación.
            </label>
            <textarea class="form-control" rows="4"></textarea>

            <label class="mt-4"> 
                En síntesis ¿Por qué recomienda al aspirante para ingresar al PMPCA?
            </label>
            <textarea class="form-control" rows="4"></textarea>
        </div>
    </div>
    <hr class="d-block">
</main>
@endsection


@push('scripts')
<script src="{{ asset('js/recommendation-letter.js') }}" defer></script>
@endpush