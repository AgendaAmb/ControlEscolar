<div class="{{ $attributes->get('class') }}" >
    <label for="{{ $attributes->get('id') }}"> {{ $slot }} </label>

    <x-select id="{{ $attributes->get('id') }}" v-if="('{{ $attributes->get('id') }}' in Errores)">
        <option value="" selected> Escoge una opción </option>   
        <option v-for="{{ $attributes->get('v-for') }}" :key="option.id" :value="option.name"> @{{option.name}} </option> 
    </x-select>

    @if ($error !== null && $error->attributes->has('v-if')) 
    <x-error v-if="{{ $error->attributes->get('v-if') }}">{{ $error }}</x-error>
    @endif
</div>