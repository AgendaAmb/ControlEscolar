@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/ENREM-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')

<x-student-appliance style="background-color:#FECC50; height: 1px;" v-on:submit.prevent="actualizaSolicitud">    
    <x-slot name="profile_picture"></x-slot>
    <x-slot name="identidad_usuario"> @include('postulacion.identidad-usuario') </x-slot>
    <x-slot name="datos_personales"> @include('postulacion.datos-personales') </x-slot>
    <x-slot name="datos_universitarios"> @include('postulacion.datos-universitarios') </x-slot>
    <x-slot name="datos_titulacion"> @include('postulacion.datos-titulacion') </x-slot>
    <x-slot name="datos_ingles"> @include('postulacion.datos-ingles') </x-slot>

    @include('postulacion.required-documents')
</x-student-appliance>

@endsection
@include('postulacion.vuejs')