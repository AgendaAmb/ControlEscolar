@props([
    'profile_picture' => null,
    'identidad_usuario' => null,
    'datos_personales' => null,
    'experiencia_laboral' => null,
    'informacion_personal' => null,
    'informacion_academica' => null,
    'formatos_ingreso' => null,
    'documentos_curriculares' => null,
    'grados_academicos' => null,
])

<form @if($attributes->has('v-on:submit.prevent')) v-on:submit.prevent="{{ $attributes->get('v-on:submit.prevent') }}" @endif>
    @csrf
    <div class="mt-5 form-row justify-content-left">
        <h2 class="col-md-9 my-4"><strong> Datos Personales </strong></h2>
        <div class="col-12">
            <div class="row">
                <div class="col-md-5 col-lg-6 col-xl-3 my-2"> {{ $profile_picture }} </div>
                <div class="form-group col-md-7 col-lg-6 col-xl-9">
                    <div class="row"> {{ $identidad_usuario }} </div>
                </div>
                
                {{ $datos_personales }}
            </div>
        </div>

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

    </div>
</form>