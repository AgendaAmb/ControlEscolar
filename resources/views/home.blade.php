<script>
    const user = @json($user);
    const user_roles = @json($user_roles);
</script>

@extends('layouts.app')
@section('main')

<div class="container-fluid">
    <candidate-data
    :user = "user"
    :user_roles = "user_roles"
    >
    </candidate-data>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
@endpush