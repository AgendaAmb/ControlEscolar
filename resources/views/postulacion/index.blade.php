<script> 
const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')
<expedientes :academic_programs="academic_programs"></expedientes>
@endsection
@push('vuejs')
<script>

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    data: {
        academic_programs: academicPrograms
    }, 
    methods: {
    }
});
</script>
@endpush

@push('scripts')
<script src="{{ asset('js/postulacion.js') }}" defer></script>
@endpush