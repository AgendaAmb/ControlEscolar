<script>
    const archiveModel = @json($archive);
    const appliantModel = @json($appliant);
    const academicProgram = @json($academic_program);
    const header_academic_program = @json($header_academic_program);
</script>
@extends('layouts.app')

@section('container-class', 'class=container')
@section('main')
    {{-- Img representativa de postulacion --}}
    <img class="img-fluid my-4 " src="{{ $header_academic_program }}" width="100%" height="300px!important">

    <documentos-entrevista
        :appliant.sync="appliant" 
        :archive_id.sync="archive.id"
        :academic_program="academic_program"
        :interview_documents="archive.interview_documents">
    </documentos-entrevista>
@endsection

@push('scripts')
    <script src="{{ asset('appliant/js/appliantInterviewUpdateDocuments.js') }}" defer></script>
@endpush
