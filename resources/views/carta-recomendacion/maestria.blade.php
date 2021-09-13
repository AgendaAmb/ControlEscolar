@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/PMPCA-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')

@section('main')
<x-student-appliance style="background-color:#0060AE; height: 1px;" action="{{ route('solicitud.actualizaSolicitud') }}" v-on:submit.prevent="actualizaSolicitud">
    <x-slot name="profile_picture"></x-slot>
    <x-slot name="identidad_usuario">
        <x-form-input id="curp" type="text" class="col-12 mt-3" readonly> CURP: </x-form-input>
        <x-form-input id="name" type="text" class="col-12 mt-3" readonly> Nombre(s): </x-form-input>
        <x-form-input id="middlename" type="text" class="col-md-6 mt-3" readonly> Primer Apellido: </x-form-input>
        <x-form-input id="surname" type="text" class="col-md-6 mt-3" readonly> Segundo Apellido: </x-form-input>
    </x-slot>

    <x-slot name="documentos_curriculares">
        <x-required-document v-for="document in curricular_documents">
            <x-slot name="selectFile" v-on:change="cargarArchivo($event, document)" 
                    v-if="document.recommendation_letter === 1">
            </x-slot>
        </x-required-document>
    </x-slot>
</x-student-appliance>


@endsection
@push('variables')
<script>

const academicProgram = @json($academic_program);
const personalDocuments = @json($personal_documents);
const academicDocuments = @json($academic_documents);
const entranceDocuments = @json($entrance_documents);
const curricularDocuments = @json($curricular_documents);
</script>
@endpush