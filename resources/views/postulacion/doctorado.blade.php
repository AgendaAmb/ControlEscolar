<script> 
const archive = @json($archive); 
/*
const personal_documents = @json($personal_documents); 
const academic_program = @json($academic_program);
const bachelor_documents = @json($bachelor_documents);
const master_documents = @json($master_documents);
const language_documents = @json($language_documents); 
const entrance_documents = @json($entrance_documents);*/
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
                :documentos="archive.personal_documents"
                :documentos.sync="archive.personal_documents">
            </postulante>
        </template>

       
        <template v-slot:historialacademico >
            <grado-academico v-for="grado in archive.academic_degrees"
                v-bind="grado"
                v-bind:key="grado.id"
                :cedula.sync="grado.cedula"
                :degree.sync="grado.degree"
                :university.sync="grado.university"
                :degree-type.sync="grado.degree_type"
                :required-documents.sync="grado.required_documents"
                :paises="Countries"> 
            </grado-academico>
        </template>
 <!--
        <template v-slot:requisitosingreso>
            <div class="col-12">
                <label> Explica los motivos, por los cuales deseas aplicar al programa académico de chanchito feliz </label>
                <textarea class="form-control" rows="8"></textarea>
            </div>
            <!--
            <documento-requerido v-for="documento in archive" 
                :key="documento.name"
                :archivo.sync="documento.archivo" 
                :location.sync="documento.location" 
                :errores.sync = "documento.errores"
                v-bind="documento"
                :documento="documento">
            </documento-requerido>
        </template>-->

        
        <template v-slot:experiencialaboral>
            <experiencia-laboral></experiencia-laboral>
        </template>

        <!--
        <template v-slot:dominioidiomas>
            <lengua-extranjera></lengua-extranjera>
        </template>

        <template v-slot:prodcientifica>
            <produccion-cientifica></produccion-cientifica>
        </template>

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
        archive: archive,
        /*
        academicProgram: archive.academicProgram,
        docsLicenciatura: @json($bachelor_documents),
        docsIngreso: @json($entrance_documents),
        docsMaestria: @json($master_documents),*/
        Countries: [],
        CountryUniversities:[],
        EnglishExams: [],
        EnglishExamTypes: [],
        Errores: [],
        gradosAcademicos: [],

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

            this.nuevoGradoAcademico();
        });
    },
    methods: {
        nuevoGradoAcademico(){

/*
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

            this.gradosAcademicos.push(gradoAcademico);*/
        },

        actualizaSolicitud(e) {
            return false;
            /*
            const formData = new FormData();
            formData.append('_method', 'post');

            this.postulante.documentos.filter((documento) => {
                return documento.archivo !== null && documento.archivo !== undefined;
            }).forEach((documento) => {
                formData.append('postulante[documentos][' + documento.id + ']', documento.archivo);
            });


            this.gradosAcademicos.forEach((grado) => {
                Object.keys(grado).forEach((key) => {
                    formData.append('postulante[grados][][' + key + ']', grado[key]);
                });
            });
            

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
            });*/
        }
    }
});
</script>
@endpush
