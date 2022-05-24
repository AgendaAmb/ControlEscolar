<script>
    const user = @json($user);
    </script>

@extends('layouts.app')
@section('main')

<div class="container-fluid">
    <candidate-data
    :user = "user"
    >
    </candidate-data>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
@endpush