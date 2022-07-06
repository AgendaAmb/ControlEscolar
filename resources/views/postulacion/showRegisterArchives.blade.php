<script>
    const archives = @json($archives);
</script>

@extends('layouts.app')

@section('main')
    <div class="container">
        {{-- @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb')) --}}
        @if (Auth::user()->hasRole('aspirante_local') || Auth::user()->hasRole('aspirante_foraneo') || Auth::user()->hasRole('aspirante_extranjero'))
            <programas-academicos-registrados :archives="archives">
            </programas-academicos-registrados>
        @else
            <h1>Usted que hace aqui</h1>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('appliant/js/appliantShowRegisterArchives.js') }}" defer></script>
@endpush
