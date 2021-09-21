@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')

<x-student-appliance style="background-color:#FECC50; height: 1px;" v-on:submit.prevent="actualizaSolicitud">    
    <x-slot name="profile_picture"></x-slot>
    <x-slot name="identidad_usuario"> @include('postulacion.identidad-usuario') </x-slot>
    
    <x-slot name="datos_personales"> 
        @include('postulacion.datos-personales') 
        <documento-requerido :documento="{
            nombre: '1.- Acta de nacimiento.',
            etiqueta: '01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
            ejemplo: '01_Promedio_2021_CJG'
          }">
        </documento-requerido>
        <documento-requerido :documento="{
            nombre: '2.- CURP en Ampliación tamaño carta.',
            etiqueta: '02_CURP_añodesolicitud_iniciales',
            ejemplo: '02_CURP_2021_CJG'
          }">
        </documento-requerido>
        <documento-requerido :documento="{
            nombre: '3.- Credencial de elector INE en ampliación tamaño carta.',
            etiqueta: '03_INE_añodesolicitud_iniciales',
            ejemplo: '03_INE_2021_CJG'
          }">
        </documento-requerido>
        <documento-requerido :documento="{
            nombre: '4.- Primera página del pasaporte.',
            etiqueta: '04_Pasaporte_añodesolicitud_iniciales',
            ejemplo: '04_Pasaporte_2021_CJG'
          }">
        </documento-requerido>
    </x-slot>


    <x-slot name="datos_universitarios"> 
        <div class="col-12" v-if="GradosAcademicos.length > 0">
            <grado-academico v-for="(GradoAcademico, i) in GradosAcademicos"
            :key="i + 1" :id="i + 1" :paises="Countries"
            :escolaridad.sync="GradoAcademico.escolaridad"
            :titulo.sync="GradoAcademico.titulo"
            :paisestudios.sync="GradoAcademico.paisestudios"
            :universidad.sync="GradoAcademico.universidad"
            v-on:cancelainsertar="quitaDatoAcademico">
            </grado-academico> 
        </div>
        <div class="col-12" v-else>
            <h5 class="d-block"><strong> Aún no se ha subido información. </strong></h5>
        </div>
        <div class="col-12 my-3">
            <button type="button" class="btn btn-success" v-on:click="nuevoDatoAcademico"> Agregar </button>
        </div>
    </x-slot>

    <x-slot name="dominio_idioma"> 
        <lengua-extranjera></lengua-extranjera>
    </x-slot>
</x-student-appliance>

@endsection
@include('postulacion.vuejs')