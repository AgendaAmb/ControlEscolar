<div class="{{ $attributes->get('class') }}" 
     @if($attributes->has('v-if')) 
     v-if="{{ $attributes->get('v-if') }}"
     @endif>

    <label for="{{ $attributes->get('id') }}"> 
        {{ $slot }}
    </label>
    

    <input v-if="!('{{ $attributes->get('id') }}' in Errores)" 
            type="{{ $attributes->get('type') }}" 
            class="form-control" 
            id="{{ $attributes->get('id') }}" 
            name="{{ $attributes->get('id') }}" 
            v-model="{{ $attributes->get('id') }}" 
            style="{{ $attributes->get('style') }}" >

    <input v-if="'{{ $attributes->get('id') }}' in Errores" 
            type="{{ $attributes->get('type') }}" 
            class="form-control is-invalid" 
            id="{{ $attributes->get('id') }}" 
            name="{{ $attributes->get('id') }}" 
            v-model="{{ $attributes->get('id') }}" 
            style="{{ $attributes->get('style') }}" > 

    {{ $error }}
</div>