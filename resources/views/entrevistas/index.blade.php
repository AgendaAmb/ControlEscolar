@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection
@section('id', 'id=entrevistas')

@section('main')
<calendario-entrevistas></calendario-entrevistas>

@endsection
@push('scripts')
<script src="{{ asset('js/entrevistas.js') }}" defer></script>
@endpush