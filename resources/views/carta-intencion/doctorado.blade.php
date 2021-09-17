@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')

@section('main')
<x-student-appliance style="background-color:#FECC50; height: 1px;" action="{{ route('solicitud.actualizaSolicitud') }}" v-on:submit.prevent="actualizaSolicitud">
    <x-slot name="profile_picture"></x-slot>
    <x-slot name="identidad_usuario"> @include('postulacion.identidad-usuario') </x-slot>
    <x-slot name="datos_personales"> @include('postulacion.datos-personales') </x-slot>

    <x-slot name="datos_universitarios"> 
        <div class="col-12">
            <grado-academico-postulante v-for="GradoAcademico in GradosAcademicos"
                :id="GradoAcademico.id"
                :titulo="GradoAcademico.titulo"
                :paisEstudios="GradoAcademico.paisEstudios"
                :estatus="GradoAcademico.estatus"
                :fechaTitulacion="GradoAcademico.fechaTitulacion"
                :promedio="GradoAcademico.promedio"
                :calMin="GradoAcademico.calMin"
                :calMax="GradoAcademico.calMax"
                :numCedula="GradoAcademico.numCedula"
                :urlCedula="GradoAcademico.urlCedula"
                :urlConstanciaPromedio="GradoAcademico.urlConstanciaPromedio"
                :urlCertificadoPromedio="GradoAcademico.urlCertificadoPromedio">

            </grado-academico-postulante>
        </div>
    </x-slot>
</x-student-appliance>
@endsection


@include('carta-intencion.vuejs')