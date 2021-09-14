<div class="d-block">
    <a v-bind:id="'view_' + {{ $attributes->get('v-bind:id') }}" {{ $attributes->whereStartsWith('v-bind:href') }} target="_blank">
        <label style="background-image: url({{ asset('storage/archive-buttons/ver.png') }});"  class="botonArchivo my-0"></label>
    </a>
</div>