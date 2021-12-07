<script>
const user = @json($user);
const period = @json($period);
const appliants = @json($appliants);
const announcements = @json($announcements);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="mt-4 img-fluid" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection

@section('main-content')
<main id="app" class="calendar">
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
        v-bind:min_date="period.start_date"
        v-bind:max_date="period.end_date"
        v-bind:appliants="appliants"
        v-bind:period_id="period.id"
        v-bind:date="date"
        v-bind:rooms="period.rooms"
        v-on:nuevaentrevista="agregaEntrevista">
    </nueva-entrevista>

    <detalle-entrevista v-if="period !== null" 
        v-bind="selectedInterview"
        v-on:interview_deleted="removeInterview"
        v-on:update:confirmed="confirmInterview">
    </detalle-entrevista>
</main>
@endsection
@push('scripts')
<script src="{{ asset('js/entrevistas.js') }}" defer></script>
@endpush