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
            style="{{ $attributes->get('style') }}" 
            
            @if($attributes->has(':readonly')) 
            :readonly="{{ $attributes->get(':readonly') }}"
            @endif
            
            @if($attributes->has('readonly')) 
            readonly="{{ $attributes->get('readonly') }}"
            @endif
            >

    <input v-if="'{{ $attributes->get('id') }}' in Errores" 
            type="{{ $attributes->get('type') }}" 
            class="form-control is-invalid" 
            id="{{ $attributes->get('id') }}" 
            name="{{ $attributes->get('id') }}" 
            v-model="{{ $attributes->get('id') }}" 
            style="{{ $attributes->get('style') }}" 
            
            @if($attributes->has(':readonly')) 
            :readonly="{{ $attributes->get(':readonly') }}"
            @endif
            
            @if($attributes->has('readonly')) 
            readonly="{{ $attributes->get('readonly') }}"
            @endif
            > 

    {{ $error }}
</div>