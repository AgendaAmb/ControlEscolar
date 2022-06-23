<script>
    const academic_programs = @json($academic_programs);
    // const announcements_register
</script>
@extends('layouts.app')

@section('main')
    <div class="mt-5 row text-center justify-content-center">
        <academic-program v-for="academic_program in academic_programs" v-bind="academic_program" :id="academic_program.id"
            :photo="academic_program.card_location"
            @@click="selected_academic_program = academic_program">
        </academic-program>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/appliantNewArchive.js') }}" defer></script>
@endpush
