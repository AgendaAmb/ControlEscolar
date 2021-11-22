<script> 
const archiveModel = @json($archive); 
const appliantModel = @json($appliant);
const academicProgram = @json($academic_program);
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
        :appliant="appliant"
        :academic_program="academic_program"
        :academic_degrees="archive.academic_degrees"
        :appliant_languages="archive.appliant_languages"
        :appliant_working_experiences="archive.appliant_working_experiences"
        :scientific_productions="archive.scientific_productions"
        :human_capitals="archive.human_capitals">
    </solicitud-postulante>
</form>
@endsection

@push('scripts')
<script src="{{ asset('js/postulacion.js') }}" defer></script>
@endpush