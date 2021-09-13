@props([
    'viewFile',
    'download_image',
    'selectFile',
])

@if($attributes->get('v-for') !== null) 
<div class="row mb-3" v-for="{{ $attributes->get('v-for') }}">
@else
<div class="row mb-3">
@endif

    <div class="col-sm-9 my-3">
        <div class="row">
            <div class="col-md-8">
                <h5 class="mt-3 mb-0 d-block"> @{{document.name}} </h5>
                <h6 class="mt-4 my-2 d-block">
                    <strong> Etiqueta: </strong>
                    @{{document.label}}
                </h6>
                <h6 class="my-2 d-block">
                    <strong> Ejemplo: </strong>
                    @{{document.example}}
                </h6>
            </div>
        </div>
    </div>

    @if($selectFile !== null && $selectFile->attributes->get('v-if') !== null)
    <div class="col-sm-3 text-sm-right my-auto" v-if="{{ $selectFile->attributes->get('v-if') }}">
    @else
    <div class="col-sm-3 text-sm-right my-auto">
    @endif

        @isset($selectFile)
        <input type="file" v-bind:id="'document[' + document.id + ']'" v-bind:name="'document[' + document.id + ']'" style="display: none" accept="application/pdf" {{ $selectFile->attributes }}>
        @else
        <input type="file" v-bind:id="'document[' + document.id + ']'" v-bind:name="'document[' + document.id + ']'" style="display: none" accept="application/pdf">
        @endisset

        @isset($viewFile)
        <div class="d-block" v-if="document.id in TemporalDocuments || document.documents.length > 0">
            {{-- Si el documento está en los archivos temporales --}}
            <a v-if="document.id in TemporalDocuments" 
                v-bind:id="'view_document[' + document.id + ']'"
                :href="TemporalDocuments[document.id]" 
                style="display: none"
                target="_blank">
            </a>
            <label v-bind:for="'view_document[' + document.id + ']'"
                    style="background-image: url({{ asset('storage/archive-buttons/ver.png') }});"  
                    class="botonArchivo my-0">
            </label>
        </div>   
        @endisset

        @isset($selectFile)
        <div class="d-block">
            <label v-bind:for="'document[' + document.id + ']'" style="background-image: url({{ asset('storage/archive-buttons/seleccionar.png') }});" class="botonArchivo my-0">
            </label>
            
            <p class="mt-n2" v-bind:id="'document'+document.id+'_text'">
                <small>
                    <strong> Formato .pdf </strong>
                </small>
            </p>
        </div>
        @endisset
    </div>
</div>