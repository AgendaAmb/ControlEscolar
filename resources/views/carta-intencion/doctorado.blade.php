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
            <div class="row">
                <div class="col-md-4">
                    <h5 class="d-block my-4"><strong> 1.- </strong>  Licenciatura en picar piedra </h5>
                    <h5 class="d-block my-2"><strong> País donde realizó sus estudios: </strong>  México</h5>
                    <h5 class="d-block my-2"><strong> Universidad de procedencia: </strong>  La universidad de los picapiedra </h5>
                    <h5 class="d-block my-2"><strong> Estatus: </strong>  Grado obtenido </h5>
                    <h5 class="d-block my-2"><strong> Fecha de titulación: </strong>  15 de septiembre del 2021 </h5>
                    <h5 class="d-block my-2"><strong> Promedio obtenido: </strong>  8.6 </h5>
                </div>

                <div class="col-md-8">
                    
                </div>
            </div>
            
        </div>
    </x-slot>
</x-student-appliance>
@endsection


@include('carta-intencion.vuejs')