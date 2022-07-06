<script>
    const academic_programs = @json($academic_programs);
</script>
@extends('layouts.app')

@section('main')
    <div v-if="academicProgramsNotEmpty() === true" class="mt-5 row text-center justify-content-center">
        <div class="row my-2 text-center justify-content-center">
            <div class="col-12 mx-2">
                <p class="display-4"><strong>Escoge un nuevo programa academico</strong></p>
            </div>
        </div>

        <academic-program v-for="academic_program in academic_programs" v-bind="academic_program" :id="academic_program.id"
            :photo="academic_program.card_location" :name="academic_program.name"
            @click="nuevoProgramaAcademico(academic_program)">
        </academic-program>
    </div>

    <div v-else class="mt-5 row text-center justify-content-center">

        <div class="col-12 mx-2">
            <p class="display-4"><strong>Has aplicado a todos los programas academicos disponibles por el momento</strong>
            </p>
        </div>

        <div class="col-4">
            <input type="hidden">
        </div>

        <div class="col-4 my-1" style="max-height: 75px !important; width: 100%">
            <label>
                <a href="{{ route('showRegisterArchives') }}" style=" height: 75px !important; width:100%;">
                    <img :src="images_btn['ver']" alt="" style="width:100%; max-height: 75px !important;">
                </a>
            </label>
        </div>

        <div class="col-4">
            <input type="hidden">
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/appliant/js/appliantNewArchive.js') }}" defer></script>
@endpush
