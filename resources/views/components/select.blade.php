@php
$attributes->merge([
    'name' => $attributes->get('id'),
    'v-model' =>  $attributes->get('id'),
]);
@endphp

<select {{ $attributes }} class="form-control is-invalid"> {{ $slot }}</select>
<select v-else class="form-control"> {{ $slot }}</select>