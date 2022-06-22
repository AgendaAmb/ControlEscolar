<script>
    const authUser = @json($user);
    const academicPrograms = @json($academic_programs);
    const announcements = @json($announcements);
</script>

@extends('layouts.app')

@section('main')
    {{-- @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb')) --}}
    @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb'))
        <search-archive-form :academic_programs="academic_programs"  :announcements="announcements" v-on:archives-found="updateArchives" >
        </search-archive-form>
        <archives>
            <archive v-for="(archive,index) in archives" :key="archive.id" :index="index + 1" v-bind="archive"
                :status="archive.status">
            </archive>
        </archives>
    {{-- @elseif (Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb'))
        <search-archive-input :academic_programs="academic_programs" v-on:archives-found="updateArchives">
        </search-archive-input>
        <archives>
            <archive v-for="(archive,index) in archives" :key="archive.id" :index="index + 1" v-bind="archive">
            </archive>
        </archives> --}}
    @endif
@endsection

@push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
@endpush
