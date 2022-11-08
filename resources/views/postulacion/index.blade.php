<script>
    const authUser = @json($user);
    const academicPrograms = @json($academic_programs);
    const announcements = @json($announcements);
</script>

@extends('layouts.app')

@section('main')
    {{-- @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb')) --}}
    
    @if (Auth::user()->hasRole('admin') ||  Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb') || Auth::user()->hasRole('personal_apoyo'))
    <search-archive-form :academic_programs="academic_programs"  :announcements="announcements" :isAdmin="auth_user.isAdmin" v-on:archives-found="updateArchives" >
    </search-archive-form>
    <archives :data="archives_found"></archives>
   
    @endif
@endsection

@push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
@endpush
