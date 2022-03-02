<script>
    const idArchive = @json($idArchive);
    const archiveRl = @json($archiveRl);
    const appliant = @json($appliant);
    const announcement = @json($announcement);
    const parameters = @json($parameters);
    const index = @json($index);
    // console.log(archiveRl[num].id);
    // console.log(num);
    console.log(appliant.middlename);
</script>

@extends('layouts.app')

@section('main')

<div id="app" class="container recommendation-letter">
    <data-candidate
        :appliant = "appliant"
        :announcement = "announcement"
    ></data-candidate> 
 
    {{-- <p>{{$rl->time_to_meet}}</p> --}}
    {{-- Inicia form para actualizar carta --}}
    <form  v-on:submit.prevent="actualizaRecomendationLetter"> 
    {{-- informacion de relacion con el candidato --}}
    <relationship-with-candidate
        :archive_id = "archiveRl[index].id"
        :time_to_know = "archiveRl[index].time_to_meet"
        :how_meet = "archiveRl[index].how_meet"
        :kind_relationship = "archiveRl[index].kind_relationship"
        :experience_with_candidate = "archiveRl[index].experience_with_candidate"
        :qualification_student = "archiveRl[index].qualification_student"
    ></relationship-with-candidate> 
    {{-- 
        analisis del candidato, puntos importantes 
        se incluye el pie de fondo
        --}}
    <candidate-analysis
        :special_skills = "archiveRl[index].special_skills"
        :why_recommendation = "archiveRl[index].why_recommendation"
        {{-- 
            se supone que tambien los parametros
            parameters
            --}}
        :score_parameters = "parameters"
        :custom_parameters = "custom_parameters"
    ></candidate-analysis> 

    {{-- actualizar la informacion --}}
    <div class="form-group row justify-content-end mt-5 mb-2 mr-2">
        <div class="container">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>   
    </div> 
   </form> 
</div>
@endsection

<style scoped>
    .titleSection{
      color: #115089;
      font-weight: bold; !important
    }
    </style>

@push('scripts')
<script src="{{ asset('js/recommendation-letter.js') }}" defer></script>
@endpush