<script> 
const appliantArchive = @json($archive); 
const academic_program = @json($academic_program);
</script>

@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')
<form v-on:submit.prevent="actualizaSolicitud"> 
    <solicitud-postulante>
        <template v-slot:postulante>
            <postulante :postulante="postulante"
                :archive_id="archive.id"
                :documentos="archive.personal_documents"
                :documentos.sync="archive.personal_documents">
            </postulante>
        </template>

       
        <template v-slot:historialacademico >
            <grado-academico v-for="grado in archive.academic_degrees"
                v-bind="grado"
                v-bind:key="grado.id"
                :state.sync="grado.state"
                :cvu.sync="grado.cvu"
                :knowledge_card.sync="grado.knowledge_card"
                :cedula.sync="grado.cedula"
                :status.sync="grado.status"
                :degree.sync="grado.degree"
                :average.sync="grado.average"
                :min_avg.sync="grado.min_avg"
                :max_avg.sync="grado.max_avg"
                :country.sync="grado.country"
                :university.sync="grado.university"
                :degree_type.sync="grado.degree_type"
                :required_documents.sync="grado.required_documents"
                :paises="Countries"> 
            </grado-academico>
        </template>

        <template v-slot:dominioidiomas>
            <lengua-extranjera v-for="language in archive.appliant_languages"
                v-bind:key="language.id"
                :language.sync="language.language"
                :institution.sync="language.institution"
                :score.sync="language.score"
                :presented_at.sync="language.presented_at"
                :valid_from.sync="language.valid_from"
                :valid_to.sync="language.valid_to"
                :language_domain.sync="language.language_domain"
                :conversational_level.sync="language.conversational_level"
                :reading_level.sync="language.reading_level"
                :writing_level.sync="language.writing_level"
                :documentos.sync="language.required_documents">
            </lengua-extranjera>
        </template>

        <template v-slot:requisitosingreso> 
            <requisitos-ingreso
                :archive_id="archive.id"
                :motivation.sync="archive.motivation"
                :documentos.sync="archive.entrance_documents">
            </requisitos-ingreso>
        </template>

        
        <template v-slot:experiencialaboral>
            <experiencia-laboral v-for="experience in archive.appliant_working_experiences"
                v-bind="experience"
                v-bind:key="experience.id"
                :state.sync="experience.state"
                :institution.sync="experience.institution"
                :working_position.sync="experience.working_position"
                :from.sync="experience.from"
                :to.sync="experience.to"
                :knowledge_area.sync="experience.knowledge_area"
                :field.sync="experience.field"
                :working_position_description.sync="experience.working_position_description"
                :achievements.sync="experience.achievements">
        
            </experiencia-laboral>
        </template>

        <template v-slot:prodcientifica>
            <produccion-cientifica></produccion-cientifica>
        </template>

        

        
        <!--
        <template v-slot:caphumano>
            <capital-humano></capital-humano>
        </template>-->
    </solicitud-postulante>
</form>


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
        archive: appliantArchive,
        Countries: [],
        CountryUniversities:[],
        EnglishExams: [],
        EnglishExamTypes: [],

        postulante: {
            curp:'',
            nombres:'',
            apPaterno:'',
            apMaterno:'',
            fechaNacimiento:'',
            genero:'',
            estado:'',
            paisNacimiento:'',
            estadoNacimiento:'',
            paisResidencia:'',
            telefonoContacto:'',
            correoContacto:'',
            correoAlterno:'',
        }
    }, 
    
    mounted: function() {
        this.$nextTick(function () {
            axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries/universities')
            .then(response => {
                this.Countries = response.data;
            });

            axios.get('https://ambiental.uaslp.mx/apiagenda/api/englishExams')
            .then(response => {
                
                this.EnglishExams = response.data;
            });
        });
    },
    methods: {
        actualizaSolicitud(){
            return false;
        }
    }
});
</script>
@endpush
