<div class="{{ $attributes->get('class') }}" >
    <label for="{{ $attributes->get('id') }}"> {{ $slot }} </label>

    <select id="{{ $attributes->get('id') }}" 
            v-model="{{ $attributes->get('id') }}" 
            class="form-control" 

            @if($attributes->has('v-on:change'))
            v-on:change="{{ $attributes->get('v-on:change') }}"
            @endif

            v-model="{{ $attributes->get('id') }}"> 

            <option value="" selected> Escoge una opción </option>   
            <option v-for="{{ $attributes->get('v-for') }}" 
                    :key="option.id" 
                    :value="option.name"> @{{option.name}} </option> 

    </select>
</div>