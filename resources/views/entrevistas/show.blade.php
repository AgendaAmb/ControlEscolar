<script>
const user = @json($user);
const academicPrograms = @json($academic_programs);
const announcements = @json($announcements);

</script>

@extends('layouts.app')
    
@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')
    
@section('main')

<div class="col-12 my-5">
    <h1 class="mes text-start">Programa de entrevistas</h1>
</div>

<div class="col-12 my-5">
    <search-rubric-form 
        :academic_programs="academic_programs" 
        :announcements="announcements" 
        :is-Admin="loggedUserIsAdmin()" 
        v-on:archives-found="updateArchives"
        >
    </search-rubric-form>
</div>

<div class="row justify-content-center">
    <interviews-comite 
        v-bind:interviews_ordered="interviews"
        v.bind:user="loggedUser"
        >
    </interviews-comite>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/programaEntrevistas.js') }}" defer></script>
@endpush