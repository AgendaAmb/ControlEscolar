<script>
const user = @json($user);
const rubric = @json($rubric);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<rubrica></rubrica>
@endsection
@push('scripts')
<script src="{{ asset('js/rubrica.js') }}" defer></script>
@endpush