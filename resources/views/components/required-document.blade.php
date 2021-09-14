@props([
    'viewFile',
    'download_image',
    'selectFile',
])

@php

$component_attributes = $attributes->filter(function($value, $key) { 
    return collect(['class','v-for'])->contains($key) === true;
});

$select_file_attributes = $attributes->filter(function($value, $key) { 
    return collect(['v-on:change','v-bind:id', 'v-if'])->contains($key) === true;
});

@endphp


<div {{ $component_attributes }}>
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

                <input type="file" 
                    v-bind:id="{{ $attributes->get('v-bind:id') }}" 
                    v-bind:name="{{ $attributes->get('v-bind:id') }}" 
                    v-on:change="{{ $attributes->get('v-on:change') }}"
                    style="display: none" 
                    accept="application/pdf"/>
            </div>
        </div>
    </div>

    <div class="col-sm-3 text-sm-right my-auto">
        @isset($viewFile) 
        <div class="d-block" {{ $viewFile->attributes }} > {{ $viewFile }} </div>  
        @endisset

        @isset($selectFile)
        <div class="d-block" {{ $selectFile->attributes }}> {{ $selectFile }} </div>
        @endisset
    </div>
</div>