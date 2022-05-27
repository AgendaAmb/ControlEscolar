<script>
    const archiveModel = @json($archive);
    const appliantModel = @json($appliant);
    const academicProgram = @json($academic_program);
    const header_academic_program = @json($header_academic_program);
    const personal_documents_ids = @json($personal_documents_ids);
    const entrance_documents_ids = @json($entrance_documents_ids);
    const academic_documents_ids = @json($academic_documents_ids);
    const language_documents_ids = @json($language_documents_ids);
    const working_documents_ids = @json($working_documents_ids);    
</script>
@extends('layouts.app')

@section('container-class', 'class=container')
@section('main')
    {{-- Img representativa de postulacion --}}
    <img class="img-fluid my-4 " src="{{ $header_academic_program }}" width="100%" height="300px!important">

    <actualiza-documentos 
        :personal_documents="archive.personal_documents" 
        :entrance_documents="archive.entrance_documents"
        
        :academic_degrees="archive.academic_degrees" 
        :appliant_languages="archive.appliant_languages"
        :working_experiences="archive.appliant_working_experiences"

        :personal_documents_ids="personal_documents_ids"
        :entrance_documents_ids="entrance_documents_ids"
        :academic_documents_ids="academic_documents_ids"
        :language_documents_ids="language_documents_ids"
        :working_documents_ids="working_documents_ids"

        :appliant.sync="appliant" 
        :archive_id.sync="archive.id"
        :academic_program="academic_program">
    </actualiza-documentos>
@endsection

@push('scripts')
    <script src="{{ asset('appliant/js/appliantUpdateDocuments.js') }}" defer></script>
@endpush
