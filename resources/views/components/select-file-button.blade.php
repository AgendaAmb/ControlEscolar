<div class="d-block">
    <label class="botonArchivo my-0" 
            style="background-image: url({{ asset('storage/archive-buttons/seleccionar.png') }})" 
            {{ $attributes->whereStartsWith('v-bind:for') }}> 
    </label>

    <p class="mt-n2" {{ $attributes->whereStartsWith('v-bind:id') }}>
        <small>
             <strong> {{ $slot }} </strong>
        </small>
    </p>
</div>