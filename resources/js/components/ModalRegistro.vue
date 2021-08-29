<template>
    <div class="modal fade " id="Registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3 px-2" style="background-color: #8b96a8">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Registro</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post">
                        <yes-no-select @changed="perteneceUASLPChanged" id="perteneceUASLP" label="¿Perteneces a la UASLP?"></yes-no-select>

                        <div class="form-row" v-if="paisResidencia === 'México'" >
                            <div class="form-group col-md-12  was-validated">
                                <label for="CURP ">CURP</label>
                                <input type="text" class="form-control" id="CURP" required style="text-transform: uppercase;" maxlength="18" name="CURP">
                            </div>
                        </div>
                        <div class="form-row" v-if="perteneceUASLP === 'Si'">
                            <div class="form-group col-md-10 col-sm-10 col-10  was-validated">
                                <label for="email">Ingresa tu RPE/clave única de alumno ó correo Institucional</label>
                                <input type="text" class="form-control" id="emailR" v-model="emailR" name="email" required>
                            </div>
                            <input type="hidden" name="Dependencia" v-model="facultad">
                            <div class="form-group col-md-2 col-sm-2 col-2">

                                <a class="btn btn btn-outline-light mt-md-2 mt-md-4" v-on:click="uaslpUser"
                                    data-toggle="tooltip" data-placement="right" title="Buscar mi información"
                                    v-if="!spinnerVisible"><i class="fas fa-search"></i></a>
                                <button class="btn btn-light mt-md-2 mt-md-4" type="button" disabled v-if="spinnerVisible">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">Cargando...</span>
                                </button>
                            </div>
                        </div>

                        <div class="form-row" v-if="perteneceUASLP === 'No'">
                            <div class="form-group col-md-12 was-validated">
                                <label for="email">Ingresa un correo electrónico</label>
                                <input type="email" class="form-control" id="emailR" name="email" required>
                            </div>
                            <div class="form-group col-md-6 was-validated">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    v-model="password" v-on:change="VerificarContraseña()" minlength="8">
                            </div>
                            <div class="form-group col-md-6 was-validated">
                                <label for="passwordR">Repite tu Contraseña</label>
                                <input type="password" class="form-control" id="passwordR" name="passwordR" required
                                    v-model="passwordR" v-on:change="VerificarContraseña()" minlength="8">
                            </div>

                            <span class="text-danger" role="alert" v-if="errores[1].Visible">
                                {{errores[1].Mensaje}}
                            </span>
                        </div>

                        <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
                        <div class="form-row">
                            <div class="form-group col-md-12 was-validated">
                                <label for="inputAddress">Nombre(s)</label>
                                <input type="text" class="form-control" id="Nombres" v-model="Nombres" required name="Nombres"
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group col-md-6  was-validated">
                                <label for="inputCity">Apellido materno</label>
                                <input type="text" class="form-control" id="ApellidoM" v-model="ApellidoP" required
                                        name="ApellidoP" style="text-transform: capitalize;">
                            </div>
                            <div class="form-group col-md-6 was-validated">
                                <label for="inputAddress2">Apellido paterno</label>
                                <input type="text" class="form-control" id="ApellidoP" v-model="ApellidoM" required
                                        name="ApellidoM" style="text-transform: capitalize;">
                            </div>
                            <div class=" form-group col-md-2">
                                <label for="Edad">Edad</label>
                                <input type="number" name="Edad" id="Edad" v-model="Edad" class="form-control" min="1" max="100" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Genero">Género</label>
                                <select id="Genero" class="form-control" v-model="Genero" required name="Genero">
                                    <option disabled value="">Género</option>
                                    <option value="Masculino" id="M">Masculino</option>
                                    <option value="Femenino" id="F">Femenino</option>
                                    <option value="Otro" id="Otro">Otro</option>
                                    <option value="NoEspecificar" id="NE">No Especificar</option>
                                </select>
                            </div>

                            <countries label="País de residencia" v-bind:countries="countries" :changed.sync="paisResidencia" />
                            <countries label="País de nacimiento" v-bind:countries="countries" :changed.sync="paisNacimiento" />
                            <country-state label="Estado de nacimiento"></country-state>
                            <div class="form-group col-md-6 was-validated">
                                <label for="inputCity">Teléfono de contacto</label>
                                <input type="tel" class="form-control" id="Tel" required name="Tel" autocomplete="Tel">
                            </div>
                            <div class="col-md-6 ">
                                <label for="CP">Codigo Postal</label>
                                <input type="number" class="form-control" id="CP" required name="CP" v-model="CP">
                            </div>
                            <div class="col-4">
                                <label for="isDiscapacidad">¿Tienes alguna
                                    discapacidad?</label>
                                <select id="isDiscapacidad" class="form-control" v-model="isDiscapacidad" required
                                    name="isDiscapacidad">
                                    <option disabled value="">Opción</option>
                                    <option value="Si" id="Si">Si</option>
                                    <option value="No" id="No">No</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="GEtnico">Grupo étnico</label>
                                <input type="text" name="GEtnico" class="form-control" id="GEtnico" v-model="GEtnico"
                                    placeholder="Grupo étnico (Zapoteco, Pame, etc)">
                            </div>
                            <div class="col-md-4" v-if="isDiscapacidad=='Si'">
                                <label for="Discapacidad">De ser afirmativivo,¿Cúal?</label>
                                <input type="text" class="form-control" id="Discapacidad" required name="Discapacidad" v-model="Discapacidad">
                            </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CountryState from './CountryState.vue';

export default {
  components: { CountryState },
    data() {
        return {
            PerteneceUASLP: '',
            EmailR: '',
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
            spinnerVisible:false,
            Errores:[],
            Countries:[],
        }
    },
    computed: {
        perteneceUASLP: {
            get: function() {
              return this.PerteneceUASLP;
            },
            set: function(value) { 
              this.PerteneceUASLP = value
            }
        },
        emailR: {
            get: function() {
              return this.EmailR;
            },
            set: function(value) { 
              this.EmailR = value
            }
        },
        edad: {
            get: function() {
              return this.Edad
            },
            set: function(value) { 
              this.Edad = value
            }
        },
        genero: {
            get: function() {
              return this.Genero;
            },
            set: function(value) { 
              this.Genero = value
            }
        },
        facultad: {
            get: function() {
              return this.Facultad;
            },
            set: function(value) { 
              this.Facultad = value
            }
        },
        password: {
            get: function() {
              return this.Password;
            },
            set: function(value) { 
              this.Password = value
            }
        },
        passwordR: {
            get: function() {
              return this.PasswordR;
            },
            set: function(value) { 
              this.PasswordR = value
            }
        },
        paisNacimiento: {
            get: function() {
              return this.PaisNacimiento;
            },
            set: function(value) {
               this.PaisNacimiento = value
            }
        },
        paisResidencia: {
            get: function() {
              return this.PaisResidencia;
            },
            set: function(value) {
               this.PaisResidencia = value
            }
        },
        estadoNacimiento: {
            get: function() {
              return this.EstadoNacimiento;
            },
            set: function(value) {
               this.EstadoNacimiento = value
            }
        },
        errores: {
            get: function() {
              return this.Errores;
            },
            set: function(value) { 
              this.Errores = value
            }
        },
        countries: {
            get: function() {
                return this.Countries;
            },
            set: function(value) {
                this.Countries = value;
            }
        }
    },
    methods: {
        perteneceUASLPChanged(value){
            this.perteneceUASLP = value;
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
                this.paisNacimiento ="México",
                this.facultad=response['data']['data']['Dependencia'],
                this.userInfo=response['data']['data'],
                this.emailR=response['data']['data']['email'],
                this.errores[0].Visible = false,
                this.emit('esMiembroUASLP', this.perteneceUASLP))

            ).catch((err) => {
                this.spinnerVisible=false,
                this.errores[0].Visible=true;
                this.apellidoM='';
                this.apellidoP='';
                this.nombres='';
            });
        },

        VerificarContraseña:function(){
            this.errores[1].Visible= this.password !== this.passwordR;
        },
    },
    mounted: function () {
          this.$nextTick(function () {
      
            this.errores.push({
                Mensaje:" Lo sentimos tu RPE/Clave unica ó correo Institucional no se encuentra.",
                Visible:false
            });

            this.errores.push({
                Mensaje:"Las contraseñas no coinciden",
                Visible:false
            });

            axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries')
            .then(response => this.countries = response.data);
        });
    },
};
</script>