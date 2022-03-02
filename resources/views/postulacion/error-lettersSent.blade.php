<script> 
    const user_id = @json($user_id);

    </script>
    
    @extends('layouts.app')
    
    @section('main')
    
    <p>Hubo un problema al querer actualizar la informacion de carta para el postulante con id {{$user_id}}</p>

    @endsection
    
    {{-- @push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
    @endpush --}}