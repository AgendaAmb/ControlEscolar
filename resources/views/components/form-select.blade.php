<div class="{{ $attributes->get('class') }}" >
    <label for="{{ $attributes->get('id') }}"> {{ $slot }} </label>

    <select v-if="('{{ $attributes->get('id') }}' in Errores)" 
            id="{{ $attributes->get('id') }}" 
            v-model="{{ $attributes->get('id') }}" 
            class="form-control is-invalid" 

            @if($attributes->has('v-on:change'))
            v-on:change="{{ $attributes->get('v-on:change') }}"
            @endif

            v-model="{{ $attributes->get('id') }}"> 

        <option value="" selected> Escoge una opción </option>   
        <option v-for="{{ $attributes->get('v-for') }}" 
                :key="option.id" 
                :value="option.name"> 
            
            @{{option.name}} 
        </option> 
    </select>

    <select v-if="!('{{ $attributes->get('id') }}' in Errores)" 
            id="{{ $attributes->get('id') }}" 
            v-model="{{ $attributes->get('id') }}" 
            class="form-control" 

            @if($attributes->has('v-on:change'))
            v-on:change="{{ $attributes->get('v-on:change') }}"
            @endif> 

        <option value="" selected> Escoge una opción </option>   
        <option v-for="{{ $attributes->get('v-for') }}" 
                :key="option.id" 
                :value="option.name"> 
            
            @{{option.name}} 
        </option> 
    </select>

    {{ $error }}
</div>