@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/ENREM-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')

<x-student-appliance style="background-color:#FECC50; height: 1px;" v-on:submit.prevent="actualizaSolicitud">    
    @include('postulacion.appliant-data')

    <x-slot name="datos_solicitud">
        <x-form-input id="tituloObtenido" class="form-group col-12"> 
            <x-slot name="slot"> Grado de estudios (como se muestra en el documento probatorio): </x-slot>
            <x-slot name="error" v-if="'tituloObtenido' in Errores"> @{{ Errores['tituloObtenido'][0] }} </x-slot> 
        </x-form-input> 

        <x-form-select id="PaisEstudios" class="form-group col-md-6" v-for="option in Countries" v-on:change="cambiaPaisEstudios($event.target.selectedIndex)"> 
            <x-slot name="slot"> País donde realizaste tus estudios: </x-slot> 
            <x-slot name="error" v-if="'PaisEstudios' in Errores"> @{{ Errores['PaisEstudios'][0] }} </x-slot> 
        </x-form-select>

        <x-form-select id="UniversidadProcedencia" class="form-group col-md-6" v-for="option in CountryUniversities" v-on:change="cambiaUniversidadProcedencia($event.target.selectedIndex)"> 

            <x-slot name="slot"> Universidad de procedencia: </x-slot> 
            <x-slot name="error"> @{{ Errores['UniversidadProcedencia'][0] }} </x-slot> 
        </x-form-select>
        
        <x-form-input id="FechaAprobacion" class="form-group col-md-6" type="date"> 
            <x-slot name="slot">  Fecha de aprobación de tu examen profesional: </x-slot>
            <x-slot name="error" v-if="'FechaAprobacion' in Errores"> @{{ Errores['FechaAprobacion'][0] }} </x-slot> 
        </x-form-input> 
        
        <div class="form-group col-12 my-0"></div>

        <x-form-input id="calificacionMinima" class="form-group col-md-6"> Calificación mínima aprobatoria: </x-form-input>
        <x-form-input id="calificacionMaxima" class="form-group col-md-6"> Calificación máxima aprobatoria: </x-form-input>
        <x-form-input id="promedio" class="form-group col-md-6"> Promedio obtenido: </x-form-input>
        <x-form-input id="PuntajeEXANI" class="form-group col-md-6"> Puntaje EXANI III: </x-form-input>

        <div class="col-12"></div>

        <x-form-select id="ExamenIngles" class="form-group col-md-6" v-for="option in EnglishExams" v-on:change="cambiaExamenIngles($event.target.selectedIndex)"> 
            <x-slot name="slot"> Examen de inglés que presentaste: </x-slot> 
            <x-slot name="error" v-if="'ExamenIngles' in Errores"> @{{ Errores['ExamenIngles'][0] }} </x-slot> 
        </x-form-select>

        <x-form-select id="TipoExamenIngles" class="form-group col-md-6" v-for="option in EnglishExamTypes" v-on:change="cambiaTipoExamenIngles($event.target.selectedIndex)">
            <x-slot name="slot"> Tipo de examen de inglés: </x-slot> 
            <x-slot name="error" v-if="'TipoExamenIngles' in Errores"> @{{ Errores['TipoExamenIngles'][0] }} </x-slot> 
        </x-form-select>

        <x-form-input id="fechaExamenIngles" class="form-group col-md-6" type="date"> 
            <x-slot name="slot"> Fecha de aplicación de tu examen de inglés: </x-slot>
            <x-slot name="error" v-if="'fechaExamenIngles' in Errores"> @{{ Errores['fechaExamenIngles'][0] }} </x-slot> 
        </x-form-input> 
        
        <x-form-input id="puntajeExamenIngles" class="form-group col-md-6"> 
            <x-slot name="slot"> Puntaje obtenido: </x-slot>
            <x-slot name="error" v-if="'puntajeExamenIngles' in Errores"> @{{ Errores['puntajeExamenIngles'][0] }} </x-slot> 
        </x-form-input> 
    </x-slot>

    @include('postulacion.required-documents')
</x-student-appliance>

@endsection
@include('postulacion.vuejs')