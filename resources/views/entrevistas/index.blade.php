<script>
const user = @json($user);
const period = @json($period);
const interviews = @json($interviews);
const announcements = @json($announcements);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="mt-4 img-fluid" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection

@section('main-content')

<main id="app" class="calendar">

    {{--* Modal crear nuevo periodo --}}
    <calendario-entrevistas
        v-bind:period="period"
        v-bind:date.sync="date"
        v-bind:interviews="interviews"
        v-bind:auth_user="loggedUser"
        v-bind:announcements="announcements">
    </calendario-entrevistas>

    {{--* Modal crear nuevo periodo --}}
    <nuevo-periodo v-if="period === null" 
        v-on:nuevoperiodo="actualizaPeriodo"
        v-bind:announcements="announcements">
    </nuevo-periodo>

    {{--* Modal crear nuevo periodo --}}
    <nueva-entrevista v-if="period !== null"
        v-bind:min_date="period.start_date"
        v-bind:max_date="period.end_date"
        v-bind:announcements="announcements"
        v-bind:period_id="period.id"
        v-bind:date="date"
        v-bind:rooms="period.rooms"
        v-bind:virtual_rooms="period.virtual_rooms"
        v-bind:modality="period.modality"
        v-on:nuevaentrevista="agregaEntrevista">
    </nueva-entrevista>

    {{--* Modal crear nuevo periodo --}}
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