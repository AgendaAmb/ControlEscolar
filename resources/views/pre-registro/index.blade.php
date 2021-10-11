<script>
const academicPrograms = @json($academic_programs);
</script>

@extends('layouts.app')

@section('main')
<div class="row justify-content-center">
    <div class="form-group col-md-12 text-center">
    </div>
</div>

<div class="mt-5 row text-center justify-content-center">
    <academic-program 
        v-for="academic_program in academic_programs"
        v-bind="academic_program"
        :id="academic_program.id"
        :photo="academic_program.card_location"
        @@click="selected_academic_program = academic_program">
    </academic-program>
</div>

<pre-registro :academic_program.sync="selected_academic_program"></pre-registro>
@endsection

@push('vuejs')
<script>
 const app =  new Vue({
    el: '#app',

    data: {
        academic_programs: academicPrograms,
        selected_academic_program: null,
    }
});
</script>
@endpush