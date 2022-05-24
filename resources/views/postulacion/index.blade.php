<script>
    const authUser = @json($user);
    const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('main')
    @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') ||  Auth::user()->id === 15641 || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb'))
        <search-archive-form :academic_programs="academic_programs" v-on:archives-found="updateArchives">
        </search-archive-form>
        <archives>
            <archive 
                v-for="(archive,index) in archives" 
                :key="archive.id" 
                :index="index + 1"
                v-bind="archive"
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

    {{-- @hasanyrole('admin|control_escolar')
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
    @endhasanyrole --}}
@endsection

@push('scripts')

    {{-- @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') ||  Auth::user()->id === 15641) --}}
        <script src="{{ asset('js/intention-letter.js') }}" defer></script>
    {{-- @elseif (Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb'))
        <script src="{{ asset('js/professor/professor.js') }}" defer></script> --}}

@endpush
