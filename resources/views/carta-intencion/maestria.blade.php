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
    <x-slot name="datos_personales">
        <x-form-input id="fechaNacimiento" type="date" class="form-group col-xl-4" readonly> Fecha de Nacimiento: </x-form-input>
        <x-form-input id="genero" class="form-group col-lg-6 col-xl-4" readonly> Género: </x-form-input>
        <x-form-input id="paisResidencia" class="form-group col-lg-6 col-xl-4" readonly> País de residencia: </x-form-input>
        <x-form-input id="paisNacimiento" class="form-group col-lg-6 col-xl-4" readonly> País de nacimiento: </x-form-input>
        <x-form-input id="edoNacimiento" class="form-group col-lg-6 col-xl-4" readonly> Estado de nacimiento: </x-form-input>
        <x-form-input id="telContacto" type="tel" class="form-group col-lg-4" readonly> Teléfono de contacto: </x-form-input>
        <x-form-input id="email" type="email" class="form-group col-lg-4 col-xl-6" readonly> Correo electrónico: </x-form-input>
        <x-form-input id="emailAlt" type="email" class="form-group col-lg-4 col-xl-6" readonly> Correo de contacto alterno: </x-form-input>
    </x-slot>

    <x-slot name="datos_solicitud">
        <x-form-input id="tituloObtenido" class="form-group col-12" readonly> Grado de estudios (como se muestra en el documento probatorio): </x-form-input> 
        <x-form-input id="PaisEstudios" class="form-group col-md-6" readonly> País donde realizaste tus estudios: </x-form-input> 
        <x-form-input id="UniversidadProcedencia" class="form-group col-md-6" readonly> Universidad de procedencia: </x-form-input> 
        <x-form-input id="FechaAprobacion" class="form-group col-md-6" type="date" readonly> Fecha de aprobación de tu examen profesional: </x-form-input> 

        <div class="form-group col-12 my-0"></div>

        <x-form-input id="calificacionMinima" class="form-group col-md-6" readonly> Calificación mínima aprobatoria: </x-form-input>
        <x-form-input id="calificacionMaxima" class="form-group col-md-6" readonly> Calificación máxima aprobatoria: </x-form-input>
        <x-form-input id="promedio" class="form-group col-md-6" readonly> Promedio obtenido: </x-form-input>
        <x-form-input id="PuntajeEXANI" class="form-group col-md-6" readonly> Puntaje EXANI III: </x-form-input>

        <div class="col-12"></div>

        <x-form-input id="ExamenIngles" class="form-group col-md-6" readonly> Examen de inglés que presentaste: </x-form-input>
        <x-form-input id="TipoExamenIngles" class="form-group col-md-6" readonly> Tipo de examen de inglés: </x-form-input>
        <x-form-input id="fechaExamenIngles" class="form-group col-md-6" type="date" readonly> Fecha de aplicación de tu examen de inglés: </x-form-input> 
        <x-form-input id="puntajeExamenIngles" class="form-group col-md-6" readonly> Puntaje obtenido: </x-form-input>
    </x-slot>

    <x-slot name="informacion_personal">
        <x-required-document v-for="document in personal_documents"></x-required-document>
    </x-slot>

    <x-slot name="informacion_academica">
        <x-required-document v-for="document in academic_documents"></x-required-document>
    </x-slot>

    <x-slot name="formatos_ingreso">
        <x-required-document v-for="document in entrance_documents">
            <x-slot name="selectFile" v-on:change="cargarArchivo($event, document)" v-if="document.intention_letter === 1"></x-slot>
        </x-required-document>
    </x-slot>

    <x-slot name="documentos_curriculares">
        <x-required-document v-for="document in curricular_documents"></x-required-document>
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