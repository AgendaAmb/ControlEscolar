<script> const docsPersonales = @json($personal_documents); </script>
@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')

<solicitud-postulante>
    <template v-slot:postulante>
        <postulante :postulante="postulante"
            :documentos="postulante.documentos"
            :documentos.sync="postulante.documentos">
        </postulante>
    </template>

    <template v-slot:historialacademico >
        <grado-academico v-for="grado in gradosAcademicos"
            v-bind:key="grado.cedula"
            v-bind="grado"
            :paises="Countries"> 
        </grado-academico>
    </template>
</solicitud-postulante>


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
        academicProgram: @json($academic_program),
        docsLicenciatura: @json($bachelor_documents),
        docsMaestria: @json($master_documents),
        Countries: [],
        CountryUniversities:[],
        EnglishExams: [],
        EnglishExamTypes: [],
        Errores: [],
        gradosAcademicos: [],

        postulante: {
            curp:'MEOM970906HSPNRG06',
            nombres:'MIGUEL ÁNGEL',
            apPaterno:'MÉNDEZ',
            apMaterno:'ORTA',
            fechaNacimiento:'1997-09-06',
            genero:'Masculino',
            estado:'Soltero(a)',
            paisNacimiento:'México',
            estadoNacimiento:'San Luis Potosí',
            paisResidencia:'México',
            telefonoContacto:'44411139929',
            correoContacto:'miguel.menor09@gmail.com',
            correoAlterno:'jackieorta@live.com.mx',
            documentos: @json($personal_documents),
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

            this.nuevoGradoAcademico();
        });
    },
    methods: {
        nuevoGradoAcademico(){

            var gradoAcademico = {
                escolaridad: '',
                titulo: 'fff',
                estatus: '',
                cedula: '222',
                fechaobtencion: '',
                calmin: '',
                calmax: '',
                promedio: '',
                documentos: [],
            };

            if (this.academicProgram.type === 'maestría'){
                gradoAcademico.documentos = this.docsLicenciatura;
            }
            else if (this.academicProgram.type === 'doctorado'){
                gradoAcademico.documentos = this.docsMaestria;
            }

            this.gradosAcademicos.push(gradoAcademico);
        },
        /*
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
        }*/
    }
});
</script>
@endpush
