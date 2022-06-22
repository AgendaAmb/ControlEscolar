<script>
    const archiveModel = @json($archive);
    const appliantModel = @json($appliant);
    const academicProgram = @json($academic_program);
    const recommendation_letters = @json($recommendation_letters);
    const archives_recommendation_letters = @json($archives_recommendation_letters);
    const header_academic_program = @json($header_academic_program);
    const letters_Commitment = @json($letters_Commitment);
    const viewer = @json($viewer);
</script>
@extends('layouts.app')

@section('container-class', 'class=container')
@section('main')
    {{-- Img representativa de postulacion --}}
    <img class="img-fluid mt-4 " src="{{ $header_academic_program }}" width="100%" height="300px!important">

    @if ((Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('personal_apoyo') || Auth::user()->hasRole('coordinador')) && $archive->status <= 4)
        <actualizar-expediente :required_documents="archive.required_documents"
            :personal_documents="archive.personal_documents" :entrance_documents="archive.entrance_documents"
            :academic_degrees="archive.academic_degrees" :appliant_languages="archive.appliant_languages"
            :working_experiences="archive.appliant_working_experiences" :academic_program="academic_program"
            :alias_academic_program="academic_program.alias" :user_id="appliant.id" :archive_id="archive.id">
        </actualizar-expediente >

        <rechazar-expediente :required_documents="archive.required_documents"
        :personal_documents="archive.personal_documents" :entrance_documents="archive.entrance_documents"
        :academic_degrees="archive.academic_degrees" :appliant_languages="archive.appliant_languages"
        :working_experiences="archive.appliant_working_experiences" :academic_program="academic_program"
        :alias_academic_program="academic_program.alias" :user_id="appliant.id" :archive_id="archive.id">

        </rechazar-expediente>
    @endif

    {{--  :curricular_documents="archive.curricular_documents" --}}
    {{-- @if (((Auth::user()->hasRole('aspirante_local') || Auth::user()->hasRole('aspirante_foraneo') || Auth::user()->hasRole('aspirante_extranjero')) && $archive->status <= 1) || ((Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('personal_apoyo') || Auth::user()->hasRole('coordinador')) && $archive->status <= 4)) --}}
        <solicitud-postulante :archive_id="archive.id" :personal_documents="archive.personal_documents"
            :motivation="archive.motivation"
            :exanni_score="archive.exanni_score"
            :entrance_documents="archive.entrance_documents" :appliant="appliant" :viewer="viewer"
            :academic_program="academic_program" :academic_degrees="archive.academic_degrees"
            :appliant_languages="archive.appliant_languages"
            :appliant_working_experiences="archive.appliant_working_experiences"
            :scientific_productions="archive.scientific_productions" :human_capitals="archive.human_capitals"
            :recommendation_letters="recommendation_letters"
            :archives_recommendation_letters="archives_recommendation_letters" :letters_Commitment="letters_Commitment"
            :interview_documents="archive.interview_documents"
            :status="archive.status">
        </solicitud-postulante>
        {{-- <h1>{{$archive->status}}</h1>
        <h2>{{ Auth::user()}}</h2> --}}
    {{-- @else
        <expediente-cerrado
        :appliant="appliant"
        :archive_id="archive.id"
        >
        </expediente-cerrado>
    @endif --}}


@endsection

@push('scripts')

    {{-- Tendremos cinco vistas
        Administrador               Eliminar, agregar, modificar Cerrar expediente      components (postulaion.js)
        Postulante                  Eliminar, agregar, modificar                        appliant-view (appliant.js)
        Coordinador y profesor      Visualizar solamente                                professor-view (proffesor.js)
        Control Escolar             Visualizar y agregar, no modificar ni eliminar      controlescolar-view (controlescolar.js) 15641 
        Expediente Cerrado          Visualizar para todos los roles anteriores (Cambiar estado solamente )
        --}}
    {{-- Admin view --}}
    @if(((Auth::user()->hasRole('aspirante_local') || Auth::user()->hasRole('aspirante_foraneo') || Auth::user()->hasRole('aspirante_extranjero')) && $archive->status > 1) || ((Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('personal_apoyo') || Auth::user()->hasRole('coordinador')) && ($archive->status  === 5 || $archive->status  === 6 || $archive->status  === 7  )))
        <script src="{{ asset('postulacion/js/close.js') }}" defer></script>
    @elseif (Auth::user()->hasRole('admin'))
        <script src="{{ asset('js/postulacion.js') }}" defer></script>
        {{-- Professor view --}}
    @elseif (Auth::user()->hasRole('control_escolar') || Auth::user()->hasRole('personal_apoyo') || Auth::user()->hasRole('coordinador') )
        <script src="{{ asset('controlescolar/js/controlescolar.js') }}" defer></script>
    @elseif (Auth::user()->hasRole('profesor_colaborador') || Auth::user()->hasRole('profesor_nb'))
        <script src="{{ asset('professor/js/professor-only-rl.js') }}" defer></script>
    @else
        <script src="{{ asset('appliant/js/appliant.js') }}" defer></script>
    @endif


@endpush
