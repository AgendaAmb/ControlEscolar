<script>
const roles = @json($roles);
const academic_areas = @json($academic_areas);
const academic_entities = @json($academic_entities);
const academic_comittes = @json($academic_comittes);

</script>

@extends('layouts.app')


@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('main')
<usuarios-ce></usuarios-ce>
<nuevo-usuario :roles="roles" 
    :academic_areas="academic_areas" 
    :academic_entities="academic_entities"
    :academic_comittes="academic_comittes">
</nuevo-usuario>
@endsection

@push('scripts')
<script src="{{ asset('js/admin.js') }}" defer></script>
@endpush