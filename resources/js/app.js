/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('academic-program-header', require('./components/Header.vue').default);
Vue.component('academic-program-card', require('./components/AcademicProgramCard.vue').default);
Vue.component('countries', require('./components/Country.vue').default);
Vue.component('country-state', require('./components/CountryState.vue').default);
Vue.component('yes-no-select', require('./components/YesNoSelect.vue').default);
Vue.component('modal-registro', require('./components/ModalRegistro.vue').default);
Vue.component('gender', require('./components/Gender.vue').default);
Vue.component('form-input', require('./components/FormInput.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        PerteneceUASLP: '',
        emailR: '',
        Nombres: '',
        ApellidoP: '',
        ApellidoM: '',
        Edad: '',
        Genero:'',
        Facultad: '',
        Password: '',
        PasswordR: '',
        PaisNacimiento: '',
        PaisResidencia: '',
        EstadoNacimiento: '',
        TienesCurp: '',
        CP: '',
        CURP:'',
        isDiscapacidad: '',
        Discapacidad: '',
        GEtnico: '',
        spinnerVisible:false,
        Errores:[{
            Mensaje:" Lo sentimos tu RPE/Clave unica ó correo Institucional no se encuentra.",
            Visible:false
        },{
            Mensaje:"Las contraseñas no coinciden",
            Visible:false
        },{
            Mensaje:"El curp no es válido",
            Visible:false
        }],
        Countries:[],
    },
    computed: {
        estadoNacimiento: {
            get: function() {
              return this.EstadoNacimiento;
            },
            set: function(value) {
               this.EstadoNacimiento = value
            }
        },
    },
    methods: {

        tienesCurpChanged(value){
            this.TienesCurp = value;
        },

        isDiscapacidadChanged(value){
            this.isDiscapacidad = value;
        },

        uaslpUser: function(){
            this.spinnerVisible = true;

            if(this.emailR!=''){
                var data = {
                    "username":this.emailR
                }
            }

            axios.post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user',data)
            .then(response => (
                this.spinnerVisible=false,
                this.Nombres = response['data']['data']['name'],
                this.ApellidoM= response['data']['data']['last_surname'],
                this.ApellidoP= response['data']['data']['first_surname'],
                this.PaisNacimiento ="México",
                this.Facultad=response['data']['data']['Dependencia'],
                this.userInfo=response['data']['data'],
                this.EmailR=response['data']['data']['email'],
                this.Errores[0].Visible = false,

                $('#PaisResidencia').val('México')

            )).catch((err) => {
                this.spinnerVisible=false,
                this.Errores[0].Visible=true;
                this.apellidoM='';
                this.apellidoP='';
                this.nombres='';
            });
        },

        VerificarContraseña:function(){
            this.Errores[1].Visible= this.password !== this.passwordR;
        },
    },
    mounted: function () {
          this.$nextTick(function () {

            axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries')
            .then(response => 
                
                this.countries = response.data
            );
        });
    },
});
