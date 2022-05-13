<script>
    const user_id = @json($user_id);
</script>

@extends('layouts.app')

@section('main') 
    <div class="container">
        <div class="row">
            <h1 class="display-3">
                No existe carta de recomendacion
            </h1>

            <blockquote class="blockquote">
                <p class="mb-0">Al parecer la carta de recomendacion para el aplicante no esta disponible o no existe 
                </p>
                <p class="mb-1">Si es usted responsable de contestar y el problema persiste porfavor comuniquese con nosotros</p>
            </blockquote>
            
        </div>

        <div class="row justify-content-center">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Agenda Ambiental, UASLP</p>
                <p class="mb-0">Manuel Nava #201, último piso</p>
                <p class="mb-0">Col. Universitaria, 78210</p>
                <p class="mb-0">San Luis Potosí, S. L. P. México</p>
                <p class="mb-0">Tel. +52 (444) 826-2300 Ext. 7204</p>
              </blockquote>
        </div>

        <div class="row justify-content-center">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Si usted no es el responsable de contestar por favor abstenerse de acceder nuevamente</p>
                <footer class="blockquote-footer">Atentamente <cite title="Source Title">Agenda Ambiental</cite></footer>
              </blockquote>
        </div>
    </div>
    <p>La carta de recomendacion ya ha sido enviada para el aplicante con el id {{$user_id}}</p>
@endsection

{{-- @push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
    @endpush --}}
