@extends('layouts.app')


@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')
@section('main')

@endsection

{{--

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
        EntranceDocuments:@json($entrance_documents),
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
                titulo: '',
                estatus: '',
                cedula: '',
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
        },/*

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
--}}