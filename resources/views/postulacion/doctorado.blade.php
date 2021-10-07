<script> 
const appliantArchive = @json($archive); 
const academicProgram = @json($academic_program);
const postulante_solicitud = {
    curp:'',
    nombres:'',
    apPaterno:'',
    apMaterno:'',
    fechaNacimiento:'',
    genero:'',
    estado:'',
    paisNacimiento:'',
    estadoNacimiento:'',
    paisResidencia:'',
    telefonoContacto:'',
    correoContacto:'',
    correoAlterno:'',
};
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')
<form v-on:submit.prevent="actualizaSolicitud"> 
    <solicitud-postulante
        :archive_id="archive.id"
        :personal_documents="archive.personal_documents"
        :motivation="archive.motivation"
        :entrance_documents="archive.entrance_documents"
        :postulante="postulante"
        :academic_program="academic_program"
        :academic_degrees="archive.academic_degrees"
        :appliant_languages="archive.appliant_languages"
        :appliant_working_experiences="archive.appliant_working_experiences"
        :scientific_productions="archive.scientific_productions"
        :human_capitals="archive.human_capitals">
    </solicitud-postulante>
</form>


@endsection
@push('vuejs')
<script>

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    data: {
        archive: appliantArchive,
        postulante: postulante_solicitud,
        academic_program: academicProgram
    }, 
    methods: {
        actualizaSolicitud(){
            return false;
        }
    }
});
</script>
@endpush
