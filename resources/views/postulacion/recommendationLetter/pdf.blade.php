<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carta Recomendación</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="container-fluid">
        <div id="dataCandidate">
            <!-- Inicio de carta  -->
            <p class="h1 titleSection">Formulario de recomendación</p>
            <hr class="d-block titleSection" />
        
            <!-- datos del candidato 
                nombre                                      Tiempo de convocatoria
                licenciatura                                Postulacion     (Maestria o doctorado)
                nacionalidad                                Area en cargada (Gestion ambiental)
        
                numero telefonico (agenda ambiental)
                correo electronico (agenda ambiental)
             -->
            <h2>Datos del candidato</h2>
            <div class="d-block d-lg-flex flex-lg-row justify-content-between">
              <div class="d-block d-lg-inline-block">
                <!-- Datos del aplicante -->
        
                <!-- Nombre -->
                <p class="d-block mb-0 myriad-bold">
                  {{
                    $recommendation_letter->appliant->name . " ". $recommendation_letter->appliant->middlename " ". $recommendation_letter->appliant->surname
                  }}
                </p>
        
                <!-- Nacionalidad -->
                <p class="d-block mb-0 myriad-light ">
                  Nacionalidad: {{ $recommendation_letter->appliant->birth_country }}
                </p>
        
                <!-- Grado academico -->
                  <!-- Agregar en el portal -->
                <p v-if='appliant.academic_degree != null' class="d-block mb-0 myriad-light ">
                  Grado academico: {{ $recommendation_letter->appliant->academic_degree }} 
                </p>
                <p v-else class="d-block mb-0 myriad-light ">
                  Grado academico: Sin grado academico registrado
                </p>
        
                <p class="mb-3"></p>
        
                <!-- Numero telefonico de contacto -->
                <p class="d-block myriad-light mb-0">
                  Telefono: {{ $recommendation_letter->appliant->phone_number }}
                </p>
                <!--Email principal de contacto -->
                <p class="d-block myriad-light ">
                  Email: {{ $recommendation_letter->appliant->email }}
                </p>
        
              </div>
        
              <div class="d-block d-lg-inline-block">
                <!-- Programa academico y fecha de postulacion -->
                <p class="d-block mb-0 myriad-bold">Convocatoria {{ $recommendation_letter->announcement_date }}</p>
                <p class="d-block myriad-light ">
                  {{ $recommendation_letter->announcement->academic_program->name }}
                </p>
        
                <p class="mb-3"></p>
                <!-- Area a cargo o dependencia -->
                <p v-if='appliant.dependency != null' class="d-block myriad-light ">
                  {{$recommendation_letter->appliant->dependency}}
                </p>
                
                <p v-else>
                  Universidad Autónoma de San Luis Potosí
                </p>
        
              </div>
              <div class="d-block d-lg-inline-block"></div>
            </div>
          </div>

          <div id="relationshipWithCandidate">
            <hr class="d-block" />
            <h2>Relación con el candidato</h2>
            <div id="RelacionCandidato" class="d-block">
              <div class="d-flex flex-column">
                <label> ¿Desde cuándo conoce al candidato? </label>
                <input
                  id="FechaRelacion"
                  type="date"
                  v-model="timeToKnow"

                  value="{{$recommendation_letter->time_to_know}}"
                  class="form-control"
                />
        
                <label class="mt-4"> ¿Cómo lo conoció? </label>
                <textarea 
                  class="form-control" 
                  rows="4" 
                  v-model="howMeet"
                />
        
                <label class="mt-4">
                  ¿Qué tipo de relación escolar, académica, laboral, etc. ha tenido el
                  candidato con usted?
                </label>
                <textarea
                  class="form-control"
                  rows="4"
                  v-model="kindRelationship"
                />
        
                <label class="mt-4">
                  ¿El candidato ha trabajado, estudiado o desempeñado alguna tarea en
                  colaboración o directamente para usted? Por favor describa la
                  naturaleza de esas tareas
                </label>
                <textarea
                  class="form-control"
                  rows="4"
                  v-model="experienceWithCandidate"
                />
        
                <label class="mt-4">
                  Si el estudiante tomó algún curso con usted ?n qué lugar quedó de
                  acuerdo a su calificación final? (Por ejemplo: 30% superior) ¿Cuál es
                  el número total de estudiantes que está considerando para el cálculo?
                </label>
                <textarea
                  class="form-control"
                  rows="4"
                  v-model="qualificationStudent"
                />
              </div>
            </div>
          </div>
    </body>
</html>
