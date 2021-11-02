<script>
const user = @json($user);
const period = @json($period);
const appliants = @json($appliants);
const announcements = @json($announcements);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
@include('entrevistas.navbar')
<calendario-entrevistas v-if="period !== null"
    v-bind:period="period"
    v-bind:date.sync="date"
    v-bind:interviews="period.interviews"
    v-bind:auth_user="loggedUser">
</calendario-entrevistas>

<calendario-entrevistas v-else
    v-bind:period="period"
    v-bind:date.sync="date"
    v-bind:interviews="[]"
    v-bind:auth_user="loggedUser">
</calendario-entrevistas>

<nuevo-periodo v-if="period === null" 
    v-on:nuevoperiodo="actualizaPeriodo"
    v-bind:announcements="announcements">
</nuevo-periodo>

<nueva-entrevista v-if="period !== null" 
    v-bind:appliants="appliants"
    v-bind:period_id="period.id"
    v-bind:date="date"
    v-bind:rooms="period.rooms"
    v-on:nuevaentrevista="agregaEntrevista">
</nueva-entrevista>

<detalle-entrevista v-if="period !== null" v-bind="selectedInterview"></detalle-entrevista>
@endsection
@push('scripts')
<script src="{{ asset('js/entrevistas.js') }}" defer></script>
@endpush