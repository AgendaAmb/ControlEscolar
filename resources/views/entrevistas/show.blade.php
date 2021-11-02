<script>
const interviews = @json($interviews);
</script>
@extends('layouts.app')
    
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')
    
@section('main')
@include('entrevistas.navbar')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="mes">Entrevistas</h1>
        <h1 class="d-block año">2021</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div v-for="(interview_rooms, interview_date) in interviews" class="col-10 text-center my-4">
        <a class="d-block interview-day text-decoration-none" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <p class="my-0 py-0"> @{{ StringDate(interview_date) }}</p>
        </a>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
              ¡Pinole!
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/programaEntrevistas.js') }}" defer></script>
@endpush