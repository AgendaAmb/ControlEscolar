<script>
const interviews = @json($interviews);
const user = @json($user);
</script>
@extends('layouts.app')
    
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')
    
@section('main')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="mes">Entrevistas</h1>
        <h1 class="d-block año">2021</h1>
    </div>
</div>
<div v-for="(interview_rooms, interview_date) in interviews" class="row justify-content-center">
    <interview-day v-bind:interview_date="StringDate(interview_date)" 
        v-bind:interview_rooms="interview_rooms">
    </interview-day>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/programaEntrevistas.js') }}" defer></script>
@endpush