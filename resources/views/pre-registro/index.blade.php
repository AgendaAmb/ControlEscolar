@extends('layouts.app')

@section('main')
<div class="row justify-content-center">
    <div class="form-group col-md-12 text-center">
    </div>
</div>

<div class="mt-5 row text-center justify-content-center">
    <x-academic-program-card src="{{ asset('storage/academic-programs/doctorado-01.png') }}" />
    <x-academic-program-card src="{{ asset('storage/academic-programs/maestria-nacional-01.png') }}" />
    <x-academic-program-card src="{{ asset('storage/academic-programs/maestria-internacional-01.png') }}" />
    <x-academic-program-card src="{{ asset('storage/academic-programs/imarec-01.png') }}" />
</div>

<modal-registro @submit="RegistraUsuario">
    <div class="form-row">
        <x-form-select id="PerteneceUASLP" class="form-group col-md-3" 
            v-for="option in [{ id: 'PerteneceUASLP_si', name:'Si' }, { id: 'PerteneceUASLP_no', name:'No' }]"> 
            
            ¿Perteneces a la UASLP?
        
        </x-form-select>

        <input type="hidden" name="Dependencia" v-model="Facultad" v-if="PerteneceUASLP === 'Si'">
        <div v-if="PerteneceUASLP === 'Si'" class="form-group col-12"></div>

        <x-form-input id="emailR" type="text" class="form-group col-4" 
                    v-if="PerteneceUASLP === 'Si'"> Ingresa tu RPE/clave única de alumno ó correo Institucional </x-form-input>
       
        
        <div class="form-group col-2" v-if="PerteneceUASLP === 'Si'">
            <a class="btn btn btn-outline-light search-button" v-on:click="uaslpUser"
                data-toggle="tooltip" data-placement="right" title="Buscar mi información"
                v-if="!spinnerVisible"><i class="fas fa-search"></i></a>
            <button class="btn btn-light" type="button" disabled v-if="spinnerVisible">
                <span class="spinner-border spinner-border-sm search-button" role="status" aria-hidden="true"></span>
                <span class="sr-only">Cargando...</span>
            </button>
        </div>

        <x-form-input id="emailR" type="email" class="form-group col-md-12" 
                    v-if="PerteneceUASLP === 'No'"> Ingresa un correo electrónico </x-form-input>

        <x-form-input id="Password" type="password" class="form-group col-md-6" 
                    v-if="PerteneceUASLP === 'No'"> Contraseña </x-form-input>

        <x-form-input id="PasswordR" type="password" class="form-group col-md-6" 
                    v-if="PerteneceUASLP === 'No'"> Repite tu Contraseña </x-form-input>

        <span class="text-danger" role="alert" v-if="'EmailR' in Errores">
            @{{Errores['EmailR']}}
        </span>
    </div>

    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
    <div class="form-row">
        <x-form-input id="Nombres" type="text" class="form-group col-md-12"> Nombre(s): </x-form-input>
        <x-form-input id="ApellidoP" type="text" class="form-group col-md-6"> Apellido Paterno </x-form-input>
        <x-form-input id="ApellidoM" type="text" class="form-group col-md-6"> Apellido Materno </x-form-input>
    </div>
    <div class="form-row">
        <x-form-input id="Edad" type="number" class="form-group col-md-2"> Edad </x-form-input>
        <gender :changed.sync="Genero"></gender>
        
    </div>
    <yes-no-select id="TienesCurp" label="¿Tienes Curp?" @changed="tienesCurpChanged" clase="form-group col-md-4">
        <x-form-input id="CURP" type="text" clase="form-group col-md-4" 
                    v-if="TienesCurp === 'Si'"> Ingresa tu Curp: </x-form-input>

    </yes-no-select>
    <div class="form-row">

        <x-form-select id="PaisNacimiento" class="form-group col-md-4" v-for="option in Countries" 
            v-on:update="cambiaPaisNacimiento"> País de nacimiento </x-form-select>

        <x-form-select id="EstadoNacimiento" class="form-group col-md-4" v-for="option in States" 
            v-on:update="cambiaEstadoNacimiento"> Estado de nacimiento </x-form-select>
        
        <x-form-select id="PaisResidencia" class="form-group col-md-4" v-for="option in Countries" 
            v-on:update="cambiaPaisResidencia"> País de residencia </x-form-select>
        
        <x-form-input id="Tel" type="tel" class="form-group col-md-4"> Teléfono de contacto </x-form-input>
        <x-form-input id="CP" type="number" class="form-group col-md-4"> Codigo Postal </x-form-input>
        <x-form-input id="GEtnico" type="text" class="form-group col-md-4"> Grupo étnico </x-form-input>
    </div>

    <yes-no-select @changed="isDiscapacidadChanged" id="isDiscapacidad" label="¿Tienes alguna discapacidad?" clase="form-group col-md-4">
        <x-form-input id="Discapacidad" type="text" class="form-group col-md-4" 
            v-if="isDiscapacidad === 'Si'"> ¿Cuál? </x-form-input>


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
 const app =  new Vue({
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
        Errores:{},
        Countries:[],
        States:[]
        
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

            this.PerteneceUASLP = this.Countries[index].name;
            this.IdPaisNacimiento = this.Countries[index].id;
            this.States = this.Countries[index].states;

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
            //delete this.Errores['EmailR'];

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

                $('#PaisNacimiento').val('México');
                $('#PaisResidencia').val('México');

                this.cambiaPaisNacimiento($('#PaisNacimiento').prop('selectedIndex') - 1);

            }).catch((err) => {
                this.spinnerVisible = false,
                this.apellidoM = '';
                this.apellidoP = '';
                this.nombres = '';

                //this.Errores['EmailR'] = 'Lo sentimos, no hemos encontrado tu RPE/Clave única.';
            });
        },

        VerificarContraseña:function(){
            //this.Errores['Password'] = this.password !== this.passwordR;
        },


        RegistraUsuario: function(){
            
            let form_data = {
                Nombres: this.Nombres,
                ApellidoP: this.ApellidoP,
                ApellidoM: this.ApellidoM,
                CURP: this.CURP,
                Tel: this.Tel,
                Edad: this.Edad,
                Genero: this.Genero,
                email: this.emailR,
                password: this.Password,
                passwordR: this.PasswordR,
                PaisNacimiento: this.PaisNacimiento,
                PaisResidencia: this.PaisResidencia,
                EstadoNacimiento: this.EstadoNaAcademicProgramCarddoNacimiento,
                IsDiscapacidad: this.isDiscapacidad,
                Discapacidad: this.Discapacidad,
            };

            axios({
                
                method: 'post',
                url: '/controlescolar/register',
                data: form_data,
                headers: {
                    'Accept' : 'application/json'
                }
            }).then(response => {})
            
            .catch((err) => {

                this.Errores = err.response.data['errors'];
            });
        }
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
    el: '#app'
});
</script>
@endpush