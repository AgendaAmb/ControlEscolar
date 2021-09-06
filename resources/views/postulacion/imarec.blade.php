@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/IMAREC-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')

@section('main')
<student-appliance color="#FECC50">

    @include('layouts.partials.appliant-data')

    <template v-slot:datos_solicitud>
       
        <form-input id="tituloObtenido" clase="form-group col-12"> Grado de estudios (como se muestra en el documento probatorio): </form-input> 
        <form-select id="PaisEstudios" clase="form-group col-md-6" 
                    v-bind:options="Countries" v-on:updated="cambiaPaisEstudios"> 
                    País donde realizaste tus estudios 
        </form-select>

        <form-select id="UniversidadProcedencia" clase="form-group col-md-6" 
                    v-bind:options="CountryUniversities" v-on:updated="cambiaUniversidadProcedencia"> 
                    Universidad de procedencia
        </form-select>

        
        <form-input id="FechaAprobacion" clase="form-group col-md-6" input_type="date"> Fecha de aprobación de tu examen profesional: </form-input>
        <div class="form-group col-12 my-0"></div>

        <form-input id="calificacionMinima" clase="form-group col-md-6"> Calificación mínima aprobatoria: </form-input>
        <form-input id="calificacionMaxima" clase="form-group col-md-6"> Calificación máxima aprobatoria: </form-input>
        <form-input id="promedio" clase="form-group col-md-6"> Promedio obtenido: </form-input>
        <form-input id="PuntajeEXANI" clase="form-group col-md-6"> Puntaje EXANI III: </form-input>
            
        <div class="col-12"></div>

        <form-select id="ExamenIngles" clase="form-group col-md-6" 
                    v-bind:options="EnglishExams" v-on:updated="cambiaExamenIngles"> 
                    Examen de inglés:
        </form-select>

        <form-select id="TipoExamenIngles" clase="form-group col-md-6" 
                    v-bind:options="EnglishExamTypes" v-on:updated="cambiaTipoExamenIngles"> 
                    Tipo de examen de inglés
        </form-select>
      

        <form-input id="fechaExamenIngles" clase="form-group col-md-6" input_type="date"> Fecha de aplicación de tu examen de inglés: </form-input>
        <form-input id="puntajeExamenIngles" clase="form-group col-md-6" input_type="text"> Puntaje obtenido: </form-input>

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
                name:"1.- Acta de nacimiento",
                label: "01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
                example: '01_ActaNac_2021_CJG'
            },{
                name:"2.- CURP en Ampliación tamaño carta",
                label: '02_CURP_añodesolicitud_iniciales',
                example: '02_CURP_2021_CJG'
            },{
                name:"3.- Credencial de elector INE en ampliación tamaño carta",
                label: '03_INE_añodesolicitud_iniciales',
                example: '03_INE_2021_CJG'
            },{
                name:"4.- Primera página del pasaporte",
                label: '04_Pasaporte_añodesolicitud_iniciales',
                example: '04_Pasaporte_2021_CJG'
        }],

        academic_documents: [{
                name:"5.- Título de licenciatura",
                label: '05A_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '05A_TitLicenciatula_2021_CJG'
            },{
                name:"6.- Certificado de materias de la licenciatura",
                label: '06A_CertLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '06A_CertfLic_2021_CJG'
            },{
                name:"7.- Certificado de promedio de la licenciatura",
                label: '07B_PromedioLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '07B_PromedioLic_2021_CJG'
            },{
                name:"8.- Cédula de la licenciatura (aplica solo para estudios realizados en México)",
                label: '08B_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '08B_Cédula_2021_CJG'
        }],

        entrance_documents:[{
                name:"12.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)",
                label: '12B_EXANIIII_añodesolicitud_iniciales',
                example: '12B_EXANIIII_2021_CJG'
            },{
                name:"13A.- Certificado de idioma inglés vigente",
                label: '13A_Inglés_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '13A_Inglés_2021_CJG'
            },{
                name:"13B.-Certificado de idioma español",
                label: '13B_Español_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '13B_Español_2021_CJG'
            },{
                name:"14.- Carta de intención de un profesor del núcleo básico del PMPCA",
                label: '14_Intencion_añodesolicitud_iniciales',
                example: '14_Intencion_2021_CJG'
            },{
                name:"15.- Propuesta de proyecto avalada por el profesor postulante",
                label: '15_Proyecto_iniciales',
                example: '15_Proyecto_CJG'
        }],

        curricular_documents: [{
                name:"16.- Currículum Vítae con los documentos probatorios (formato líbre)",
                label: '16_CV_añodesolicitud_iniciales',
                example: '16_CV_2021_CJG'
            },{
                name:"18A.- Carta de recomendación",
                label: '18A_Recomendación_01_añodesolicitud_iniciales',
                example: '18A_Recomendación_01_2021_CJG'
            },{
                name:"18B.- Carta de recomendación",
                label: '18B_Recomendación_02_añodesolicitud_iniciales',
                example: '18B_Recomendación_02_2021_CJG'
            },
        ], 
        
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