<script>
const appliant = @json($appliant);
const rubrics = @json($rubrics);
const appliant_details = @json($data);
const scores = @json($avg_collection);
const type = @json($type);
const archive_id = @json($id);
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
        <h1 v-if="type === 'doctorado' " class="sub-title">Doctorado</h1>
        <h1 v-else class="sub-title">Maestría</h1>
    </div>
    <hr class="col-11 hr">
</div>

<average-rubric 
    v-bind:rubrics="rubrics" 
    v-bind:appliant="appliant" 
    v-bind:appliant_details="appliant_details"
    v-bind:scores="scores">
</average-rubric>

<div class="row mt-2 justify-content-center">
    <a href="{{ route('entrevistas.rubrica.export_rubric',['archive_id' => $id]) }}" class="btn btn-success" role="button"><i class="fa fa-download"></i> .xlsx</a>
</div>
<br>

@endsection

@push('scripts')
<script src="{{ asset('js/rubricaPromedio.js') }}" defer></script>
@endpush