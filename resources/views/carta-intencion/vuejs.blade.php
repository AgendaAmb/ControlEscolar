@push('vuejs')
<script>
const academicProgram = @json($academic_program);

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
        Errores: [],
        GradosAcademicos: [],
    }, 
    
    mounted: function() {

        this.nuevoDatoAcademico(null);        
    },
    methods: {

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
                titulo: 'Ingeniero en computación',
                paisEstudios: 'México',
                estatus: 'Grado obtenido',
                fechaTitulacion: '15 de septiembre del 2021',
                promedio: 8.6,
                calMin: null,
                calMax: null,
                numCedula: 74374,
                urlCedula: '#',
                urlConstanciaPromedio: '#',
                urlCertificadoPromedio: '#',
            });
        },

        quitaDatoAcademico(id) {
            this.$delete(this.GradosAcademicos, id - 1);
        },

        actualizaSolicitud(e, document) {
            
        }
    }
});
</script>
@endpush
