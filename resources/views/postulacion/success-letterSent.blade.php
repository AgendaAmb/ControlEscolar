<script>
    const user_id = @json($user_id);
</script>

@extends('layouts.app')

@section('main') 
    <div class="container">
        <div class="row mb-5">
            <h1 class="display-3">
                Carta Enviada
            </h1>

            <blockquote class="blockquote">
                <p class="mb-0">La informacion se ha registrado exitosamente en nuestro sistema, nosotros avisaremos al postulante con el ID : 
                    <cite title="Source Title"> {{$user_id}} </cite> sobre los cambios
                </p>
                

                <p class="mb-0">Agradecemos su participacion</p>
                
            </blockquote>
        </div>

        <div class="row justify-content-center">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Si usted no es el responsable de contestar por favor abstenerse de acceder nuevamente</p>
                <footer class="blockquote-footer">Atentamente <cite title="Source Title">Agenda Ambiental</cite></footer>
              </blockquote>
        </div>
    </div>
@endsection

{{-- @push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
    @endpush --}}
