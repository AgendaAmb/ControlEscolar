<script> 
const authUser = @json($user);
const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('main')

@role('admin')
    <search-archive-form :academic_programs="academic_programs" v-on:archives-found="updateArchives">
</search-archive-form>
<archives>
    <archive v-for="archive in archives" v-bind="archive"></archive>
</archives>
@endrole

@hasanyrole('profesor_nb|profesor_colaborador')
    <div>Aqui se te mostrara un buscador para acceder unicamente a tus aspirantes</div>
@endhasanyrole

@endsection

@push('scripts')
<script src="{{ asset('js/intention-letter.js') }}" defer></script>
@endpush