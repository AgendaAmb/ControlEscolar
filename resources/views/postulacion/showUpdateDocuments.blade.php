<script>
    const archiveModel = @json($archive);
    const appliantModel = @json($appliant);
    const academicProgram = @json($academic_program);
    const header_academic_program = @json($header_academic_program);
    const required_documents = @json($required_documents);
</script>
@extends('layouts.app')

@section('container-class', 'class=container')
@section('main')
    {{-- Img representativa de postulacion --}}
    <img class="img-fluid my-4 " src="{{ $header_academic_program }}" width="100%" height="300px!important">
    
@endsection

@push('scripts')
    <script src="{{ asset('appliant/js/appliantUpdateDocuments.js') }}" defer></script>
@endpush
