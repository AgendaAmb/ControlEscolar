<script>
const user = @json($user);
const appliant = @json($appliant);
const rubric = @json($rubric);
const announcement = @json($announcement);
</script>

@extends('layouts.app')
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="title">Formato de evaluación</h1>
        <h1 class="sub-title">Maestría y Doctorado</h1>
    </div>
    <hr class="col-10 hr">
</div>
<basic-data v-bind:appliant="appliant"
    v-bind:announcement="announcement">
</basic-data>
@endsection

@push('scripts')
<script src="{{ asset('js/rubrica.js') }}" defer></script>
@endpush