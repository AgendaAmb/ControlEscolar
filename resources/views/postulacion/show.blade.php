<script>
    const archiveModel = @json($archive);
    const appliantModel = @json($appliant);
    const academicProgram = @json($academic_program);
    const recommendation_letters = @json($recommendation_letters);
    const archives_recommendation_letters = @json($archives_recommendation_letters);
    const header_academic_program = @json($header_academic_program);
    const viewer = @json($viewer);
</script>
@extends('layouts.app')

@section('container-class', 'class=container-fluid')
@section('main')
    

    <div class="c-center-nch">
        
        <h2 class="self-start c-title">{{$academic_program->name}}</h2>
        <!-- <img class="img-fluid rounded" src="{{ $header_academic_program }}"> -->
    </div>

    @if ((Auth::user()->hasRole('control_escolar') ||
        Auth::user()->hasRole('admin') ||
        Auth::user()->hasRole('personal_apoyo') ||
        Auth::user()->hasRole('coordinador')) &&
        $archive->status <= 4)
        <actualizar-expediente :required_documents="archive.required_documents"
            :personal_documents="archive.personal_documents" :entrance_documents="archive.entrance_documents"
            :academic_degrees="archive.academic_degrees" :appliant_languages="archive.appliant_languages"
            :working_experiences="archive.appliant_working_experiences" :academic_program="academic_program"
            :alias_academic_program="academic_program.alias" :user_id="appliant.id" :archive_id="archive.id">
        </actualizar-expediente>

        <actualizar-expediente-prueba-nuevo :required_documents="archive.required_documents"
            :personal_documents="archive.personal_documents" :entrance_documents="archive.entrance_documents"
            :academic_degrees="archive.academic_degrees" :appliant_languages="archive.appliant_languages"
            :working_experiences="archive.appliant_working_experiences" :academic_program="academic_program"
            :alias_academic_program="academic_program.alias" :user_id="appliant.id" :archive_id="archive.id">
        </actualizar-expediente-prueba-nuevo>

        <rechazar-expediente :required_documents="archive.required_documents"
            :personal_documents="archive.personal_documents" :entrance_documents="archive.entrance_documents"
            :academic_degrees="archive.academic_degrees" :appliant_languages="archive.appliant_languages"
            :working_experiences="archive.appliant_working_experiences" :academic_program="academic_program"
            :alias_academic_program="academic_program.alias" :user_id="appliant.id" :archive_id="archive.id">
        </rechazar-expediente>
    @endif
   
    @if ($academic_program['alias'] === 'enrem')
        <solicitud-postulante :archive_id="archive.id" :personal_documents="archive.personal_documents"
            :enviroment_related_skills="archive.enviroment_related_skills" :reasons_to_choise="archive.reasons_to_choise"
            :address="archive.address" :motivation="archive.motivation"
            :secondary_education="archive.secondary_education" :future_plans="archive.future_plans"
            :fields_of_interest="archive.fields_of_interest" :financing_studies="archive.financing_studies"
            :recommendation_letter_enrem="archive.recommendation_letter_enrem"
            :hear_about_program="archive.hear_about_program" :enrem_documents="archive.enrem_documents"
            :exanni_score="archive.exanni_score" :entrance_documents="archive.entrance_documents" :appliant="appliant"
            :viewer="viewer" :academic_program="academic_program" :academic_degrees="archive.academic_degrees"
            :appliant_languages="archive.appliant_languages"
            :appliant_working_experiences="archive.appliant_working_experiences"
            :scientific_productions="archive.scientific_productions" :human_capitals="archive.human_capitals"
            :recommendation_letters="recommendation_letters"
            :archives_recommendation_letters="archives_recommendation_letters"
            :interview_documents="archive.interview_documents" :status="archive.status">
        </solicitud-postulante>
    @else
        <solicitud-postulante :archive_id="archive.id" :personal_documents="archive.personal_documents"
            :motivation="archive.motivation" :exanni_score="archive.exanni_score"
            :entrance_documents="archive.entrance_documents" :appliant="appliant" :viewer="viewer"
            :academic_program="academic_program" :academic_degrees="archive.academic_degrees"
            :appliant_languages="archive.appliant_languages"
            :appliant_working_experiences="archive.appliant_working_experiences"
            :scientific_productions="archive.scientific_productions" :human_capitals="archive.human_capitals"
            :recommendation_letters="recommendation_letters"
            :archives_recommendation_letters="archives_recommendation_letters"
            :interview_documents="archive.interview_documents" :status="archive.status">
        </solicitud-postulante>
    @endif


@endsection

@push('scripts')

    <script>
            redireccionar() {
        window.location.href = `/controlescolar/solicitud/expediente/${this.archive_id}`;
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/v-google-translate/lib/v-google-translate.umd.min.js"></script>
    {{-- Tendremos cinco vistas
        Administrador               Eliminar, agregar, modificar Cerrar expediente      components (postulaion.js)
        Postulante                  Eliminar, agregar, modificar                        appliant-view (appliant.js)
        Coordinador y profesor      Visualizar solamente                                professor-view (proffesor.js)
        Control Escolar             Visualizar y agregar, no modificar ni eliminar      controlescolar-view (controlescolar.js) 15641 
        Expediente Cerrado          Visualizar para todos los roles anteriores (Cambiar estado solamente ) --}}
    {{-- Admin view --}}


    {{-- Expediente completo --}}
    @if (((Auth::user()->hasRole('aspirante_local') ||
        Auth::user()->hasRole('aspirante_foraneo') ||
        Auth::user()->hasRole('aspirante_extranjero')) &&
        $archive->status > 1) ||
        ((Auth::user()->hasRole('control_escolar') ||
            Auth::user()->hasRole('admin') ||
            Auth::user()->hasRole('personal_apoyo') ||
            Auth::user()->hasRole('coordinador') ||
            Auth::user()->hasRole('profesor_colaborador') ||
            Auth::user()->hasRole('profesor_nb')) &&
            ($archive->status === 5 || $archive->status === 6 || $archive->status === 7)) ||
        Auth::user()->hasRole('personal_apoyo'))
        <script src="{{ asset('postulacion/js/close.js') }}" defer></script>
        {{-- Administrador --}}
    @elseif (Auth::user()->hasRole('admin'))
        @if ($academic_program['alias'] === 'enrem')
            <script src="{{ asset('appliant/js/appliant-doubleDegree.js') }}" defer></script>
        @else
            <script src="{{ asset('js/postulacion.js') }}" defer></script>
        @endif
        {{-- Control escolar --}}
    @elseif (Auth::user()->hasRole('control_escolar') ||
        Auth::user()->hasRole('personal_apoyo') ||
        Auth::user()->hasRole('coordinador'))
        {{-- falta definir para sandra solo --}}
        @if ($academic_program['alias'] === 'enrem')
            <script src="{{ asset('appliant/js/appliant-doubleDegree.js') }}" defer></script>
        @else
            <script src="{{ asset('controlescolar/js/controlescolar.js') }}" defer></script>
        @endif
        {{-- Profesores --}}
    @elseif (Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb'))
        <script src="{{ asset('professor/js/professor-only-rl.js') }}" defer></script>
        {{-- Aspirantes --}}
    @else
        @if ($academic_program['alias'] === 'enrem')
            <script src="{{ asset('appliant/js/appliant-doubleDegree.js') }}" defer></script>
        @else
            <script src="{{ asset('appliant/js/appliant.js') }}" defer></script>
        @endif
    @endif


@endpush

