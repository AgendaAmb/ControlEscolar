@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/ENREM-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class')
class="container"
@endsection

@section('main')
<student-appliance>

    @include('layouts.partials.appliant-data')

    <template v-slot:datos_solicitud>
       
        <form-input id="tituloObtenido" clase="form-group col-12"> 
            Grado de estudios (como se muestra en el documento probatorio): 
        </form-input> 

        <form-select id="PaisEstudios" clase="form-group col-md-6" v-bind:options="Countries" 
                    v-on:update:selected_index="cambiaPaisEstudios"> 
            País donde realizaste tus estudios 
        </form-select>

        <form-select id="UniversidadProcedencia" clase="form-group col-md-6" v-bind:options="CountryUniversities" 
                    v-on:update:selected_index="cambiaUniversidadProcedencia"> 
            Universidad de procedencia
        </form-select>

        
        <form-input id="FechaAprobacion" clase="form-group col-md-6" input_type="date"> 
            Fecha de aprobación de tu examen profesional: 
        </form-input>
        
        <div class="form-group col-12 my-0"></div>

        <form-input id="calificacionMinima" clase="form-group col-md-6"> 
            Calificación mínima aprobatoria: 
        </form-input>

        <form-input id="calificacionMaxima" clase="form-group col-md-6"> 
            Calificación máxima aprobatoria: 
        </form-input>

        <form-input id="promedio" clase="form-group col-md-6"> 
            Promedio obtenido: 
        </form-input>

        <form-input id="PuntajeEXANI" clase="form-group col-md-6"> 
            Puntaje EXANI III: 
        </form-input>
            
        <div class="col-12"></div>

        <form-select id="ExamenIngles" clase="form-group col-md-6" v-bind:options="EnglishExams" 
                        v-on:update:selected_index="cambiaExamenIngles"> 
            Examen de inglés:
        </form-select>

        <form-select id="TipoExamenIngles" clase="form-group col-md-6" v-bind:options="EnglishExamTypes" 
                        v-on:update:selected_index="cambiaTipoExamenIngles"> 
            Tipo de examen de inglés
        </form-select>

        <form-input id="fechaExamenIngles" clase="form-group col-md-6" input_type="date"> 
            Fecha de aplicación de tu examen de inglés: 
        </form-input>

        <form-input id="puntajeExamenIngles" clase="form-group col-md-6" input_type="text"> 
            Puntaje obtenido: 
        </form-input>

    </template>

    <template v-slot:experiencia_laboral>
        <work-experience></work-experience>

        <div class="col-12 my-4">
            <button type="button" class="btn btn-primary"> Añadir </button>
        </div>
    </template>

    @include('layouts.partials.required-documents')

</student-appliance>
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
        personal_documents: [{
                name:"1.- Birth Certificate",
                label: "01_BirthCert_iniciales",
                example: '01_BirthCert_CJG'
            },{
                name:"2.- CURP",
                label: '02_CURP_añodesolicitud_iniciales',
                example: '02_CURP_2021_CJG'
            },{
                name:"3.- INE",
                label: '03_INE_añodesolicitud_iniciales',
                example: '03_INE_2021_CJG'
            },{
                name:"4.- Passport",
                label: '04_Pasaporte_añodesolicitud_iniciales',
                example: '04_Pasaporte_2021_CJG'
        }],

        academic_documents: [{
                name:"5.- High School Certificate",
                label: '05_HighSchool_iniciales',
                example: '05_HighSchool_2021_CJG'
            },{
                name:"5A.- Bachelor Degree",
                label: '05A_DegreeBachelor_iniciales',
                example: '05A_DegreeBachelor_CJG'
            },{
                name:"6.- Bachelor Transcript",
                label: '06A_TranscriptBachelor_iniciales',
                example: '06A_TranscriptBachelor_CJG'
            },{
                name:"7.- Final Grade Average of Bachelor Degree",
                label: '07A_PromBachelor_iniciales',
                example: '07A_PromBachelor_CJG'
            },{
                name:"8.- Professional License",
                label: '08A_ProfessionalLicense_iniciales',
                example: '08A_ProfessionalLicense_CJG'
        }],

        entrance_documents:[{
                name:"9.- ENREM Application Form",
                label: '09A_Application_iniciales',
                example: '09A_Application_CJG'
            },{
                name:"9A.- DAAD Application Form",
                label: '09A_DAAD_iniciales',
                example: '09A_DAAD_CJG'
            },{
                name:"13A.- Proof of English Proficiency",
                label: '13A_English_iniciales',
                example: '13A_English_CJG'
            },{
                name:"13B.- Proof of Spanish Proficiency",
                label: '13B_Spanish_iniciales',
                example: '13B_English_CJG'
            },{
                name:"13C.- Proof of German Proficiency",
                label: '13C_German_iniciales',
                example: '13C_German_CJG'
            },{
                name:"15.- Project idea",
                label: '15_ProjectIdea_iniciales',
                example: '15_ProjectIdea_CJG'
        }],

        curricular_documents: [{
                name:"16.- Currículum Vítae con los documentos probatorios (formato líbre)",
                label: '16_CV_añodesolicitud_iniciales',
                example: '16_CV_2021_CJG'
            },{
                name:"17A.- Certificate(s) of Employment/Internship",
                label: '17A_ProofExperience_iniciales',
                example: '17A_ProofExperience_CJG'
            },{
                name:"17B.- Confirmation of employment",
                label: '17B_ConfirmationEmp_iniciales',
                example: '17B_ConfirmationEmp_CJG'
            },{
                name:"18A.- Recommendation Letter",
                label: '18A_Recommendation_01_añodesolicitud_iniciales',
                example: '18A_Recommendation_01_2021_CJG'
            },{
                name:"18B.- Recommendation Letter",
                label: '18B_Recommendation_02_añodesolicitud_iniciales',
                example: '18B_Recommendation_02_2021_CJG'
        }],

        Countries: [],
        CountryUniversities:[],
        PaisEstudios: '',
        IdPaisEstudios: '',
        UniversidadProcedencia:'',
        IdUniversidadProcedencia:'',
        EnglishExams: [],
        ExamenIngles: '',
        IdExamenIngles: '',
        EnglishExamTypes: [],
        TipoExamenIngles: '',
        IdTipoExamenIngles: '',
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
        cambiaPaisEstudios(index){
            if (index === -1) return;

            this.PaisEstudios = this.Countries[index].name;
            this.IdPaisEstudios = this.Countries[index].id;
            this.CountryUniversities = this.Countries[index].universities;
        },
        cambiaUniversidadProcedencia(index){
            if (index === -1) return;

            this.UniversidadProcedencia = this.CountryUniversities[index].name;
            this.UniversidadProcedencia = this.CountryUniversities[index].id;
        },
        cambiaExamenIngles(index){
            if (index === -1) return;

            this.ExamenIngles = this.EnglishExams[index].name;
            this.IdExamenIngles = this.EnglishExams[index].id;
            this.EnglishExamTypes = this.EnglishExams[index].english_exam_types;
        },
        cambiaTipoExamenIngles(index){
            if (index === -1) return;

            this.TipoExamenIngles = this.EnglishExamTypes[index].name;
            this.IdTipoExamenIngles = this.EnglishExamTypes[index].id;
        }
    }
});
</script>
@endpush