<script>
const user = @json($user);
const appliant = @json($appliant);
const rubric = @json($rubric);
const announcement = @json($announcement);
const basicConcepts = @json($basic_concepts);

// console.log(basicConcepts);
</script>

@extends('layouts.app')
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="title">Rúbrica de evaluación</h1>
        <h1 v-if="announcement.type === 'doctorado' " class="sub-title">Doctorado</h1>
        <h1 v-else class="sub-title">Maestría</h1>
    </div>
    <hr class="col-11 hr">
</div>

<basic-data-rubric-section v-bind:title="'1.- Datos básicos'" v-bind:university="university" v-bind:country="appliant.birth_country" v-bind:concepts="basic_concepts" v-bind:estudio_score="estudio_score" v-bind:english_score="english_score" v-bind:exani_score="exani_score"  v-bind:antype="announcement.type" v-bind:id="0">
    <template v-slot:appliant_data>
        <appliant-data v-bind:appliant="appliant" v-bind:announcement="announcement"></appliant-data>
    </template>
</basic-data-rubric-section>

<div style="font-size: 18px;" class="alert alert-success px-5 mx-3" role="alert">
    INSTRUCCIONES DE LLENADO:
    <br>
    <b>Las Secciones 2, 3, 4 y 5</b>: Comprenden un mecanismo de evaluación que se realiza mediante 4
    mediciones:
    Excelente, Muy Bien, Bien y Deficiente. La evaluación se solicita entre un rango porcentual que determina la
    medición, es importante responder con el porcentaje especifico, acorde al criterio examinado, es decir, si
    se selecciona una respuesta bien y el criterio es que logró un 37%, esa será la respuesta para capturar en
    <b>evaluación</b>.
</div>
<hr class="col-11 hr">

<evaluation-rubric-section v-bind:title="'2.- Información académica'" v-bind:concepts="academic_concepts" v-bind:antype="announcement.type" v-bind:id="1"></evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'3. Experiencia de investigación'" v-bind:concepts="research_concepts" v-bind:antype="announcement.type" v-bind:id="2"></evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'4. Experiencia laboral'" v-bind:concepts="working_experience_concepts"  v-bind:antype="announcement.type" v-bind:id="3"></evaluation-rubric-section>
<evaluation-rubric-section v-bind:title="'5. Atributos personales'" v-bind:concepts="personal_attributes_concepts"  v-bind:antype="announcement.type" v-bind:id="4"></evaluation-rubric-section>

<div class="form-row mt-2 justify-content-center rubric-section">
    <h4 class="col-11 myriad-bold rubric-section-header mb-3"> 6. Varios </h4>
    <div class="form-group col-lg-11">
        <label> ¿Tienes algún último comentario o aportación que desees agregar para ser considerado en tu evaluación?</label>
        <textarea :readonly="$root.r_only()" v-model="considerations" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group col-lg-11">
        <label> Situaciones o información importante que haya detectado la comisión de evaluación</label>
        <textarea :readonly="$root.r_only()" v-model="additional_information" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group col-lg-11">
        <label> DICTAMEN DE LA COMISIÓN EVALUADORA</label>
        <textarea :readonly="$root.r_only()" v-model="dictamen_ce" class="form-control" rows="3"></textarea>
    </div>        
    <hr class="col-11 hr">
    <div v-if="$root.r_only()"></div>
    <div v-else class="form-group col-lg-11 text-right">
        <button class="btn btn-primary interview-button" type="button" disabled  v-if="visbleSave">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Guardando...
          </button>                                                                                  
         
        <button type="button" class="myriad-bold btn btn-primary interview-button" v-on:click="guardaRubrica('save')" v-if="!visbleSave"> Guardar </button>
        <button class="btn btn-primary interview-button" type="button" disabled  v-if="visbleSend" >
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Enviando...
          </button>
        <button type="button" class="myriad-bold btn btn-primary interview-button" v-on:click="guardaRubrica('send')" v-if="!visbleSend"> Enviar </button>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('js/rubrica.js') }}" defer></script>
@endpush