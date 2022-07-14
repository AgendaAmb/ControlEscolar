<script>
const appliant = @json($appliant);
const rubric = @json($rubric);
const scores = @json($scores);
const type = @json($type);
const archive_id = @json($id);
console.log(rubric);
// console.log(type);
</script>

@extends('layouts.app')
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="title">Rúbrica promedio de evaluación</h1>
        <h1 v-if="type=='doctorado'" class="sub-title">Doctorado</h1>
        <h1 v-else class="sub-title">Maestría</h1>
    </div>
    <hr class="col-11 hr">
</div>

<average-rubric-ca v-bind:rubric="rubric" 
                v-bind:appliant="appliant"
                v-bind:scores="scores">
</average-rubric-ca>

@endsection

@push('scripts')
<script src="{{ asset('js/rubricaPromedioCa.js') }}" defer></script>
@endpush