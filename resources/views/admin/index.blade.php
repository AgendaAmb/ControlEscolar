<script>
const academic_areas = @json($academic_areas);
const academic_entities = @json($academic_entities);
const academic_comittes = @json($academic_comittes);
const roles = [
    {"id": 8, "name": "admin"},
    {"id": 3, "name": "aspirante_extranjero"},
    {"id": 2, "name": "aspirante_foraneo"},
    {"id": 1, "name": "aspirante_local"},
    {"id": 9, "name": "comite_academico"},
    {"id": 6, "name": "control_escolar"},
    {"id": 10, "name": "coordinador"},
    {"id": 7, "name": "personal_apoyo"},
    {"id": 5, "name": "profesor_colaborador"},
    {"id": 4, "name": "profesor_nb"}
];


</script>


@extends('layouts.app')


@section('main')

<div class="content">

    <editar-usuario
    :roles="roles" 
    :academic_areas="academic_areas" 
    :academic_entities="academic_entities"
    :academic_comittes="academic_comittes"
    >
    </editar-usuario>

<usuarios-ce
    :roles="roles" 
    :academic_areas="academic_areas" 
    :academic_entities="academic_entities"
    :academic_comittes="academic_comittes"
    >
</usuarios-ce>

<nuevo-usuario 
    :roles="roles" 
    :academic_areas="academic_areas" 
    :academic_entities="academic_entities"
    :academic_comittes="academic_comittes"
    >
</nuevo-usuario>

</div>



@endsection

@push('scripts')
<script src="{{ asset('js/admin.js') }}" defer></script>
@endpush