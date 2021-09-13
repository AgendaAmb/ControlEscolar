@if($attributes->has('v-if')) 
<div class="{{ $attributes->get('class') }}" v-if="{{ $attributes->get('v-if') }}">
@else
<div class="{{ $attributes->get('class') }}">
@endif

        <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
        

        @if($attributes->has(':readonly'))         
        <input v-if="!('{{ $attributes->get('id') }}' in Errores)" 
                type="{{ $attributes->get('type') }}" 
                id="{{ $attributes->get('id') }}" 
                name="{{ $attributes->get('id') }}" 
                class="form-control" 
                v-model="{{ $attributes->get('id') }}" 
                style="{{ $attributes->get('style') }}" 
                :readonly="{{ $attributes->get(':readonly') }}">

        <input v-else type="{{ $attributes->get('type') }}" 
                class="form-control is-invalid" 
                id="{{ $attributes->get('id') }}" 
                name="{{ $attributes->get('id') }}" 
                v-model="{{ $attributes->get('id') }}" 
                style="{{ $attributes->get('style') }}" 
                :readonly="{{ $attributes->get(':readonly') }}"> 
        
        @elseif ($attributes->has('readonly'))
        <input v-if="!('{{ $attributes->get('id') }}' in Errores)" 
                type="{{ $attributes->get('type') }}" 
                id="{{ $attributes->get('id') }}" 
                name="{{ $attributes->get('id') }}" 
                class="form-control" 
                v-model="{{ $attributes->get('id') }}" 
                style="{{ $attributes->get('style') }}" 
                readonly="{{ $attributes->get('readonly') }}">

        <input v-else type="{{ $attributes->get('type') }}" 
                class="form-control is-invalid" 
                id="{{ $attributes->get('id') }}" 
                name="{{ $attributes->get('id') }}" 
                v-model="{{ $attributes->get('id') }}" 
                style="{{ $attributes->get('style') }}" 
                readonly="{{ $attributes->get('readonly') }}"> 
        @else        
        <input v-if="!('{{ $attributes->get('id') }}' in Errores)" 
                type="{{ $attributes->get('type') }}" 
                id="{{ $attributes->get('id') }}" 
                name="{{ $attributes->get('id') }}" 
                class="form-control" 
                v-model="{{ $attributes->get('id') }}" 
                style="{{ $attributes->get('style') }}">

        <input v-else type="{{ $attributes->get('type') }}" 
                class="form-control is-invalid" 
                id="{{ $attributes->get('id') }}" 
                name="{{ $attributes->get('id') }}" 
                v-model="{{ $attributes->get('id') }}" 
                style="{{ $attributes->get('style') }}">  
        
        @endif

        @if ($error !== null && $error->attributes->has('v-if')) 
        <x-error v-if="{{ $error->attributes->get('v-if') }}">{{ $error }}</x-error>
        @endif   
</div>