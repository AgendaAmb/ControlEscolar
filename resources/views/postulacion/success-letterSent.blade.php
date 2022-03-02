<script>
    const user_id = @json($user_id);
</script>

@extends('layouts.app')

@section('main')
    <p>La carta de recomendacion ya ha sido enviada para el aplicante con el id {{$user_id}}</p>
@endsection

{{-- @push('scripts')
    <script src="{{ asset('js/intention-letter.js') }}" defer></script>
    @endpush --}}
