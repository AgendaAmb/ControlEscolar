@extends('layouts.app')

@section('main')
<div class="row justify-content-center">
    <div class="form-group col-md-12 text-center">
    </div>
</div>

<div class="mt-5 row text-center justify-content-center">
    <academic-program-card image="{{ asset('storage/academic-programs/doctorado-01.png') }}"></academic-program-card>
    <academic-program-card image="{{ asset('storage/academic-programs/maestria-nacional-01.png') }}"></academic-program-card>
    <academic-program-card image="{{ asset('storage/academic-programs/maestria-internacional-01.png') }}"></academic-program-card>
    <academic-program-card image="{{ asset('storage/academic-programs/imarec-01.png') }}"></academic-program-card>
</div>

<modal-registro>
    <yes-no-select v-on:changed="PerteneceUASLP = $event" id="PerteneceUASLP" label="¿Perteneces a la UASLP?" clase="form-group col-md-3">
        <div v-if="PerteneceUASLP === 'Si'" class="form-group col-12"></div>


        <form-input id="emailR" input_type="text" clase="form-group col-4" v-if="PerteneceUASLP === 'Si'" :input.sync="emailR">
            Ingresa tu RPE/clave única de alumno ó correo Institucional
        </form-input>
       
        <input type="hidden" name="Dependencia" v-model="Facultad" v-if="PerteneceUASLP === 'Si'">
        
        <div class="form-group col-2" v-if="PerteneceUASLP === 'Si'">
            <a class="btn btn btn-outline-light search-button" v-on:click="uaslpUser"
                data-toggle="tooltip" data-placement="right" title="Buscar mi información"
                v-if="!spinnerVisible"><i class="fas fa-search"></i></a>
            <button class="btn btn-light" type="button" disabled v-if="spinnerVisible">
                <span class="spinner-border spinner-border-sm search-button" role="status" aria-hidden="true"></span>
                <span class="sr-only">Cargando...</span>
            </button>
        </div>

        <form-input id="emailR" input_type="email" clase="form-group col-md-12" v-if="PerteneceUASLP === 'No'" :input.sync="emailR">
            Ingresa un correo electrónico
        </form-input>

        <form-input id="Password" input_type="password" clase="form-group col-md-6" v-if="PerteneceUASLP === 'No'" :input.sync="Password">
            Contraseña
        </form-input>

        <form-input id="PasswordR" input_type="password" clase="form-group col-md-6" 
                    v-if="PerteneceUASLP === 'No'" :changed.sync="PasswordR">
            Repite tu Contraseña
        </form-input>

        <span class="text-danger" role="alert" v-if="Errores[1].Visible">
            @{{Errores[1].Mensaje}}
        </span>
    </yes-no-select>

    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
    <div class="form-row">

        <form-input id="Nombres" input_type="text" clase="form-group col-md-12" :input.sync="Nombres" :input="Nombres">
            Nombre(s):
        </form-input>

        <form-input id="ApellidoP" input_type="text" clase="form-group col-md-6":input.sync="ApellidoP">
            Apellido Paterno
        </form-input>

        <form-input id="ApellidoM" input_type="text" clase="form-group col-md-6" :input.sync="ApellidoM">
            Apellido Materno
        </form-input>
    </div>
    <div class="form-row">
        <form-input id="Edad" input_type="number" clase="form-group col-md-2" :input.sync="Edad">
            Edad
        </form-input>
        <gender :changed.sync="Genero"></gender>
        
    </div>
    <yes-no-select id="TienesCurp" label="¿Tienes Curp?" @changed="tienesCurpChanged" clase="form-group col-md-4">
        <form-input id="CURP" input_type="text" clase="form-group col-md-4" v-if="TienesCurp === 'Si'" :input.sync="CURP">
            Ingresa tu Curp:
        </form-input>

    </yes-no-select>
    <div class="form-row">
        <countries id="PaisNacimiento" clase="form-group col-md-4 was-validated" label="País de nacimiento" v-bind:countries="Countries" v-on:updated="cambiaPaisNacimiento"></countries>
        <country-state label="Estado de nacimiento"clase="form-group col-md-4 was-validated" v-bind:states="States" v-on:updated="cambiaEstadoNacimiento"></country-state>
        <countries id="PaisResidencia" clase="form-group col-md-4 was-validated" label="País de residencia" v-bind:countries="Countries" v-on:updated="cambiaPaisResidencia"></countries>
        
        <form-input id="Tel" input_type="tel" clase="form-group col-md-4 was-validated" :input.sync="Tel">
            Teléfono de contacto
        </form-input>
        
        <form-input id="CP" input_type="number" clase="form-group col-md-4 was-validated" :input.sync="CP">
            Codigo Postal
        </form-input>

        <form-input id="GEtnico" input_type="text" clase="form-group col-md-4 was-validated" :input.sync="GEtnico">
            Grupo étnico
        </form-input>
    </div>

    <yes-no-select @changed="isDiscapacidadChanged" id="isDiscapacidad" label="¿Tienes alguna discapacidad?" clase="form-group col-md-4">
        <form-input id="Discapacidad" input_type="text" clase="form-group col-md-4" v-if="isDiscapacidad === 'Si'" :input.sync="Discapacidad">
            ¿Cuál?
        </form-input>
    </yes-no-select>
    <div class="form-row">
        <div class="form-group col-12 my-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Al enviar la información confirmo que he leido y acepto el <a
                        href="http://transparencia.uaslp.mx/avisodeprivacidad" style="color: #fecc56;;"> aviso
                        de privacidad.</a>
                </label>
            </div>
            <div class="modal-footer justify-content-start my-3">
                <button id="submit" type="submit" class="btn btn-primary"
                    style="background-color: #0160AE">Registrar</button>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>

</modal-registro>
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
        IdPaisNacimiento: '',
        PaisNacimiento: '',
        IdPaisResidencia: '',
        PaisResidencia: '',
        IdEstadoNacimiento: '',
        EstadoNacimiento: '',
        TienesCurp: '',
        CP: '',
        Tel: '',
        CURP:'',
        isDiscapacidad: '',
        Discapacidad: '',
        GEtnico: '',
        spinnerVisible:false,
        Countries: '',
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
        States:[],
    },
    methods: {

        tienesCurpChanged(value){
            this.TienesCurp = value;
        },

        isDiscapacidadChanged(value){
            this.isDiscapacidad = value;
        },

        cambiaPaisNacimiento(index){

            if (index === -1) return;
            
            this.PaisNacimiento = this.Countries[index].name;
            this.IdPaisNacimiento = this.Countries[index].id;
            this.States = this.Countries[index].states;
        },
        cambiaEstadoNacimiento(index){
            this.EstadoNacimiento = this.States[index].name;
            this.IdEstadoNacimiento = this.States[index].id;
        },
        cambiaPaisResidencia(index){
            this.PaisResidencia = this.Countries[index].name;
            this.IdPaisResidencia = this.Countries[index].id;
        },
        uaslpUser: function(){
            this.spinnerVisible = true;

            if(this.emailR!=''){
                var data = {
                    "username":this.emailR
                }
            }

            axios.post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user',data)
            .then(response => {
                this.spinnerVisible = false;
                this.Nombres = response['data']['data']['name'];
                this.ApellidoP = response['data']['data']['first_surname'];
                this.ApellidoM = response['data']['data']['last_surname'];
                this.Facultad = response['data']['data']['Dependencia'];
                this.userInfo = response['data']['data'];
                this.EmailR = response['data']['data']['email'];
                this.Errores[0].Visible = false;

                $('#PaisNacimiento').val('México');
                $('#PaisResidencia').val('México');

                this.cambiaPaisNacimiento($('#PaisNacimiento').prop('selectedIndex') - 1);

            }).catch((err) => {
                this.spinnerVisible = false,
                this.Errores[0].Visible = true;
                this.apellidoM = '';
                this.apellidoP = '';
                this.nombres = '';
            });
        },

        VerificarContraseña:function(){
            this.Errores[1].Visible= this.password !== this.passwordR;
        },
    },
    mounted: function () {
        
        this.$nextTick(function () {

            axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries/states')
            .then(response => {
                
                this.Countries = response.data;
                this.cambiaPaisNacimiento(-1);
            });
        });
    },
});
</script>
@endpush