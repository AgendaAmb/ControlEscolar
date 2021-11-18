<script> 
const authUser = @json($user);
const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('main')
<search-archive-form></search-archive-form>
<archives></archives>
@endsection

@push('scripts')
<script src="{{ asset('js/intention-letter.js') }}" defer></script>
@endpush