<script>
const user = @json($user);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<calendario-entrevistas v-bind:period="period"
    v-bind:appliants="appliants"
    v-bind:date.sync="date">
</calendario-entrevistas>

<nuevo-periodo v-if="period !== null" 
    v-on:nuevoperiodo="actualizaPeriodo">
</nuevo-periodo>

<nueva-entrevista v-if="period !== null" 
    v-bind:appliants="appliants"
    v-bind:period_id="period.id"
    v-bind:date="date"
    v-bind:rooms="period.rooms">
</nueva-entrevista>

<detalle-entrevista v-if="period !== null" ></detalle-entrevista>

@endsection
@push('scripts')
<script src="{{ asset('js/entrevistas.js') }}" defer></script>
@endpush