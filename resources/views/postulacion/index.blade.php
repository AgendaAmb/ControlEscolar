<script> 
const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')

<expedientes :academic_programs="academic_programs"></expedientes>


@endsection

@push('scripts')
<script src="{{ asset('js/postulacion.js') }}" defer></script>
@endpush