<form @if($attributes->has('v-on:submit.prevent')) v-on:submit.prevent="{{ $attributes->get('v-on:submit.prevent') }}" @endif>
    @csrf
    <div class="mt-5 form-row justify-content-left">
        

        @isset($documentos_personales)
        <h2 class="col-md-9 my-4"><strong> Documentos personales </strong></h2>
        
        {{ $documentos_personales }}
        @endisset

        @isset($datos_universitarios)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>
        <h2 class="col-md-9 my-4"><strong> Historial académico </strong></h2>
        
        {{ $datos_universitarios }}
        @endisset

        @isset($dominio_idioma)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>
        <h2 class="col-md-9 my-4"><strong> Dominio de idiomas </strong></h2>
        <div class="col-12"> {{ $dominio_idioma }} </div>
        @endisset

        @isset($experiencia_laboral)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>
        <h2 class="col-md-9 my-4"><strong> Trayectoria profesional </strong></h2>

        <div class="col-12"> {{ $experiencia_laboral }} </div>
        @endisset

        @isset($produccion_cientifica)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>
        <h2 class="col-md-9 my-4"><strong> Producción científica </strong></h2>

        <div class="col-12"> {{ $produccion_cientifica }} </div>
        @endisset
    </div>
</form>