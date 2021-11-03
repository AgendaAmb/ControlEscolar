<script>
const user = @json($user);
const appliant = @json($appliant);
const rubric = @json($rubric);
const announcement = @json($announcement);
</script>

@extends('layouts.app')
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="title">Formato de evaluación</h1>
        <h1 class="sub-title">Maestría y Doctorado</h1>
    </div>
    <hr class="col-11 hr">
</div>

<evaluation-rubric-section v-bind:title="'1.- Datos básicos'" v-bind:concepts="rubric.basic_concepts">
    <template v-slot:appliant_data>
        <appliant-data v-bind:appliant="appliant" v-bind:announcement="announcement"></appliant-data>
    </template>
</evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'2.- Información académica'" v-bind:concepts="rubric.academic_concepts"></evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'3. Experiencia de investigación'" v-bind:concepts="rubric.research_concepts"></evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'4. Experiencia laboral'" v-bind:concepts="rubric.working_experience_concepts"></evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'5. Atributos personales'" v-bind:concepts="rubric.personal_attributes_concepts"></evaluation-rubric-section>

<div class="form-row mt-2 justify-content-center">
    <h4 class="col-11 myriad-bold blue rubric-title mb-3"> 6. Varios </h4>
    <div class="form-group col-lg-11">
        <label for="exampleFormControlTextarea1">1. ¿Tienes algún último comentario o aportación que desees agregar para ser considerado en tu evaluación?</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group col-lg-11">
        <label for="exampleFormControlTextarea1">Situaciones o información importante que haya detectado la comisión de evaluación</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>        
    <hr class="col-11 hr">
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/rubrica.js') }}" defer></script>
@endpush