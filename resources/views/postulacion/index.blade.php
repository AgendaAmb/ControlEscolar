<script>
    const authUser = @json($user);
    const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('main')
    @hasanyrole('admin|control_escolar')
        <search-archive-form :academic_programs="academic_programs" v-on:archives-found="updateArchives">
        </search-archive-form>
        <archives>
            <archive v-for="(archive,index) in archives" :index="index + 1" v-bind="archive">
            </archive>
        </archives>
    @endhasanyrole

    @hasanyrole('profesor_nb|profesor_colaborador')
        <search-archive-input :academic_programs="academic_programs" v-on:archives-found="updateArchives">
        </search-archive-input>
        <archives>
            <archive v-for="(archive,index) in archives" :index="index + 1" v-bind="archive">
            </archive>
        </archives>
    @endhasanyrole
@endsection

@push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
@endpush
