@push('vuejs')
<script>
const academicProgram = @json($academic_program);
const personalDocuments = @json($personal_documents);
const academicDocuments = @json($academic_documents);
const entranceDocuments = @json($entrance_documents);
const curricularDocuments = @json($curricular_documents);

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
        estadoCivil: '',
        paisNacimiento:'',
        edoNacimiento:'',
        paisResidencia:'',
        telContacto:'',
        email:'',
        emailAlt:'',
        ExamenIngles: '',
        IdExamenIngles: '',
        TipoExamenIngles: '',
        IdTipoExamenIngles: '',
        fechaExamenIngles: '',
        puntajeExamenIngles: '',
        Countries: [],
        CountryUniversities:[],
        EnglishExams: [],
        EnglishExamTypes: [],
        Errores: [],
        GradosAcademicos: [],
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

            this.nuevoDatoAcademico(null);
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

        nuevoDatoAcademico(e) {
            this.GradosAcademicos.push({
                id: this.GradosAcademicos.length + 1,
                escolaridad: null,
                titulo: '',
                estatus: '',
                cedula: '',
                fechaobtencion: '',
                paisestudios: '',
                universidad: '',
                modotitulacion: '',
                promedio: '',
                calmin: '',
                calmax: '',
            });
        },

        quitaDatoAcademico(id) {
            this.$delete(this.radosAcademicos, id - 1);
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
