<script>
    const academic_programs = @json($academic_programs);
</script>
@extends('layouts.app')

@section('main')
    <div class="mt-5 row text-center justify-content-center">
        <academic-program v-for="academic_program in academic_programs" v-bind="academic_program" :id="academic_program.id"
            :photo="academic_program.card_location"
            :name="academic_program.name"
            @click="nuevoProgramaAcademico(academic_program)">
        </academic-program>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('/appliant/js/appliantNewArchive.js') }}" defer></script>
@endpush
