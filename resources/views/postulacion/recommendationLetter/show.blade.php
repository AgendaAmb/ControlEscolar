<script>
    const recommendation_letter = @json($recommendation_letter);
    const appliant = @json($appliant);
    const announcement = @json($announcement);
    const parameters = @json($parameters);
    const token = @json($token);
    // console.log(recommendation_letter.id);
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
        :archive_id = "recommendation_letter.id"
        :time_to_know.sync = "recommendation_letter.time_to_meet"
        :how_meet.sync = "recommendation_letter.how_meet"
        :kind_relationship.sync = "recommendation_letter.kind_relationship"
        :experience_with_candidate.sync = "recommendation_letter.experience_with_candidate"
        :qualification_student.sync = "recommendation_letter.qualification_student"
    ></relationship-with-candidate> 
    {{-- 
        analisis del candidato, puntos importantes 
        se incluye el pie de fondo
        --}}
    <candidate-analysis
        :special_skills.sync = "recommendation_letter.special_skills"
        :why_recommendation.sync = "recommendation_letter.why_recommendation"
        :confirm_submit.sync = 'confirm_submit'
        {{-- 
            se supone que tambien los parametros
            parameters
            --}}
        :parameters = "parameters"
        :custom_parameters = "custom_parameters"
    ></candidate-analysis> 

    {{-- actualizar la informacion --}}
    <div class="form-group row justify-content-end mt-5 mb-5 mr-2">
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