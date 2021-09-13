@props([
    'profile_picture' => null,
    'identidad_usuario' => null,
    'datos_personales' => null,
    'datos_solicitud' => null,
    'experiencia_laboral' => null,
    'informacion_personal' => null,
    'informacion_academica' => null,
    'formatos_ingreso' => null,
    'documentos_curriculares' => null,
])

<form action="{{ $attributes->get('action') }}" 
        method="{{ $attributes->get('method') }}" 
        
        @if($attributes->has('v-on:submit.prevent'))
        v-on:submit.prevent="{{ $attributes->get('v-on:submit.prevent') }}"
        @endif>
    
    
    @csrf
    <div class="mt-5 form-row justify-content-left">
        <h4 class="col-md-9 my-4"><strong> Datos Personales </strong></h4>
        <div class="col-12">
            <div class="row">
                <div class="col-md-5 col-lg-6 col-xl-3 my-2"> {{ $profile_picture }} </div>
                <div class="form-group col-md-7 col-lg-6 col-xl-9">
                    <div class="row"> {{ $identidad_usuario }} </div>
                </div>
                
                {{ $datos_personales }}
            </div>
        </div>

        @isset($datos_solicitud)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>
        <h4 class="col-md-9 my-4"><strong> Datos Solicitud </strong></h4>
        

        <div class="col-12">
            <div class="row">
                {{ $datos_solicitud }}
            </div>
        </div>
        @endisset

        @isset($experiencia_laboral)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>

        <h4 class="col-md-9 my-4"><strong> Experiencia laboral  </strong></h4>
        <div class="col-12">
            <div class="row">
                {{ $experiencia_laboral }}
            </div>
        </div>
        @endisset

        @isset($informacion_personal)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>
        
        <h4 class="col-md-9 my-4"><strong> Información personal </strong></h4>
        <div class="col-12"> {{ $informacion_personal }} </div>
        @endisset

        @isset($informacion_academica)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>

        <h4 class="col-md-9 my-4"><strong> Información académica  </strong></h4>
        <div class="col-12"> {{ $informacion_academica }}</div>
        @endisset

        @isset($formatos_ingreso)
        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>

        <h4 class="col-md-9 my-4"><strong> Formatos de ingreso  </strong></h4>
        <div class="col-12"> {{ $formatos_ingreso }} </div>
        @endisset

        <hr class="col-md-12" @if($attributes->has('style')) style="{{ $attributes->get('style') }}" @endif>

        <h4 class="col-md-9 my-4"><strong> Documentos curriculares  </strong></h4>
        <div class="col-12"> 
            {{ $documentos_curriculares }} 
        
            <button type="submit" class="d-block my-3 btn btn-primary"> Guardar </button>
        </div>

    </div>
</form>

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
        AcademicProgram: academicProgram,
        CVU: '',
        curp:'',
        name:'',
        middlename:'',
        surname:'',
        fechaNacimiento:'',
        genero:'',
        paisNacimiento:'',
        edoNacimiento:'',
        paisResidencia:'',
        telContacto:'',
        email:'',
        emailAlt:'',
        tituloObtenido:'',
        PaisEstudios:'',
        IdPaisEstudios: '',
        UniversidadProcedencia:'',
        IdUniversidadProcedencia:'',
        FechaAprobacion: '',
        calificacionMinima: '',
        calificacionMaxima: '',
        promedio: '',
        PuntajeEXANI: '',
        ExamenIngles: '',
        IdExamenIngles: '',
        TipoExamenIngles: '',
        IdTipoExamenIngles: '',
        fechaExamenIngles: '',
        puntajeExamenIngles: '',

        personal_documents: personalDocuments,
        academic_documents: academicDocuments,
        entrance_documents: entranceDocuments,
        curricular_documents: curricularDocuments, 

        Countries: [],
        CountryUniversities:[],
        EnglishExams: [],
        EnglishExamTypes: [],
        Errores: [],
        Documents:{},
        TemporalDocuments: {},
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
            this.IdUniversidadProcedencia = this.CountryUniversities[index].id;
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
        },

        cargarArchivo(e, document) {
            this.Documents[document.id] = '';
            this.Documents[document.id] = e.target.files[0];

            let reader = new FileReader();

            reader.onload = (event) => {
                this.TemporalDocuments[document.id] = event.target.result;
            };

            reader.readAsDataURL(e.target.files[0]);

            $('#view_document'+document.id+'_text small strong').change();
            $('#document'+document.id+'_text small strong').text(this.Documents[document.id].name);
        },

        actualizaSolicitud(e, document) {
            
            const formData = new FormData();
            
            formData.append('tituloObtenido', this.tituloObtenido),
            formData.append('PaisEstudios', this.PaisEstudios),
            formData.append('academicProgram', this.AcademicProgram.id),
            formData.append('IdPaisEstudios', this.IdPaisEstudios),
            formData.append('UniversidadProcedencia', this.UniversidadProcedencia),
            formData.append('IdUniversidadProcedencia', this.IdUniversidadProcedencia),
            formData.append('FechaAprobacion', this.FechaAprobacion),
            formData.append('calificacionMinima', this.calificacionMinima),
            formData.append('calificacionMaxima', this.calificacionMaxima),
            formData.append('promedio', this.promedio),
            formData.append('PuntajeEXANI', this.PuntajeEXANI),
            formData.append('ExamenIngles', this.ExamenIngles),
            formData.append('IdExamenIngles', this.IdExamenIngles),
            formData.append('TipoExamenIngles', this.TipoExamenIngles),
            formData.append('IdTipoExamenIngles', this.IdTipoExamenIngles),
            formData.append('fechaExamenIngles', this.fechaExamenIngles),
            formData.append('puntajeExamenIngles', this.puntajeExamenIngles);
            formData.append('Documents', JSON.stringify(this.Documents));

            Object.keys(this.Documents).forEach((key) => {
                formData.append('Documents[' + key + ']', this.Documents[key]);
            });

            formData.append('_method', 'post');

            axios({
                
                method: 'post',
                url: '/controlescolar/solicitud',
                data: formData,
                headers: {
                    'Accept' : 'application/json',
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {

                
            }).catch((err) => {

                this.Errores = err.response.data['errors'];
                console.log(this.Errores);
            });
        }
    }
});
</script>
@endpush
