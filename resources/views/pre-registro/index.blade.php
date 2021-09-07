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

<x-modal-registro v-on:submit.prevent="RegistraUsuario">
    
    <div class="form-row">
        <x-form-select id="PerteneceUASLP" class="form-group col-md-3" 
            v-for="option in [{ id: 'PerteneceUASLP_si', name:'Si' }, { id: 'PerteneceUASLP_no', name:'No' }]"> 
        
            <x-slot name="slot"> ¿Perteneces a la UASLP? </x-slot>
            <x-slot name="error">
                <div v-if="'PerteneceUASLP' in Errores" class="invalid-feedback"> 
                    @{{ Errores['PerteneceUASLP'][0] }} 
                </div>
            </x-slot>
        </x-form-select>
    </div>

    <div class="form-row" v-if="PerteneceUASLP === 'Si'">
        <input type="hidden" name="Dependencia" v-model="Facultad">
        <div class="form-group col-12"></div>

        <x-form-input id="EmailR" type="text" class="form-group col-4"> 
            <x-slot name="slot"> Ingresa tu RPE/clave única de alumno ó correo Institucional </x-slot>
            <x-slot name="error">
                <div v-if="'EmailR' in Errores" class="invalid-feedback"> 
                    @{{ Errores['EmailR'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
       
        
        <div class="form-group col-2">
            <a class="btn btn btn-outline-light search-button" v-on:click="uaslpUser"
                data-toggle="tooltip" data-placement="right" title="Buscar mi información"
                v-if="!spinnerVisible"><i class="fas fa-search"></i></a>
            <button class="btn btn-light" type="button" disabled v-if="spinnerVisible">
                <span class="spinner-border spinner-border-sm search-button" role="status" aria-hidden="true"></span>
                <span class="sr-only">Cargando...</span>
            </button>
        </div>

        

        <span class="text-danger" role="alert" v-if="'EmailR' in Errores">
            @{{Errores['EmailR']}}
        </span>
    </div>
    <div class="form-row" v-if="PerteneceUASLP === 'No'">
        <x-form-input id="EmailR" type="email" class="form-group col-md-12"> 
            <x-slot name="slot"> Ingresa un correo electrónico </x-slot>
            <x-slot name="error">
                <div v-if="'EmailR' in Errores" class="invalid-feedback"> 
                    @{{ Errores['EmailR'][0] }} 
                </div>
            </x-slot>
        </x-form-input>

        <x-form-input id="Password" type="password" class="form-group col-md-6"> 
            <x-slot name="slot"> Contraseña </x-slot>

            <x-slot name="error">
                <div v-if="'Password' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Password'][0] }} 
                </div>
            </x-slot>
        </x-form-input>

        <x-form-input id="PasswordR" type="password" class="form-group col-md-6"> 
            <x-slot name="slot"> Repite tu Contraseña </x-slot>

            <x-slot name="error">
                <div v-if="'PasswordR' in Errores" class="invalid-feedback"> 
                    @{{ Errores['PasswordR'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
    </div>


    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
    <div class="form-row">
        <x-form-input id="Nombres" type="text" class="form-group col-md-12"> 
            <x-slot name="slot"> Nombre(s): </x-slot>
        
            <x-slot name="error">
                <div v-if="'Nombres' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Nombres'][0] }} 
                </div>
            </x-slot>
        </x-form-input>


        <x-form-input id="ApellidoP" type="text" class="form-group col-md-6"> 
            <x-slot name="slot"> Apellido Paterno </x-slot>
        
            <x-slot name="error">
                <div v-if="'ApellidoP' in Errores" class="invalid-feedback"> 
                    @{{ Errores['ApellidoP'][0] }} 
                </div>
            </x-slot>
        </x-form-input>

        <x-form-input id="ApellidoM" type="text" class="form-group col-md-6"> 
            <x-slot name="slot"> Apellido Materno </x-slot>
        
            <x-slot name="error">
                <div v-if="'ApellidoM' in Errores" class="invalid-feedback"> 
                    @{{ Errores['ApellidoM'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
    </div>
    <div class="form-row">
        <x-form-input id="Edad" type="number" class="form-group col-md-2"> 
            <x-slot name="slot"> Edad </x-slot>
        
            <x-slot name="error">
                <div v-if="'ApellidoM' in Errores" class="invalid-feedback"> 
                    @{{ Errores['ApellidoM'][0] }} 
                </div>
            </x-slot>
        </x-form-input>

        <x-form-select id="Genero" class="form-group col-md-3" 
            v-for="option in [{ 
                id: 'M', 
                name:'Masculino' 
            },{ 
                id: 'F', 
                name:'Femenino' 
            },{ 
                id: 'O', 
                name:'Otros' 
            },{ 
                id: 'N', 
                name:'No especificar' 
            }]"> 
        
            <x-slot name="slot"> Genero </x-slot>
            <x-slot name="error">
                <div v-if="'Genero' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Genero'][0] }} 
                </div>
            </x-slot>
        </x-form-select>

        <x-form-input id="OtroGenero" type="text" class="form-group col-md-2" v-if="Genero === 'Otros'"> 
            <x-slot name="slot"> ¿Cuál? </x-slot>
        
            <x-slot name="error">
                <div v-if="'OtroGenero' in Errores" class="invalid-feedback"> 
                    @{{ Errores['OtroGenero'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
    </div>

    <div class="form-row">
        <x-form-select id="TienesCurp" class="form-group col-md-3" 
            v-for="option in [{ id: 'TienesCurp_si', name:'Si' }, { id: 'TienesCurp_no', name:'No' }]"> 
        
            <x-slot name="slot"> ¿TienesCurp? </x-slot>
            <x-slot name="error">
                <div v-if="'TienesCurp' in Errores" class="invalid-feedback"> 
                    @{{ Errores['TienesCurp'][0] }} 
                </div>
            </x-slot>
        </x-form-select>

        <x-form-input id="Curp" type="text" class="form-group col-md-5"  v-if="TienesCurp === 'Si'"> 
            <x-slot name="slot"> Ingresa tu Curp: </x-slot>

            <x-slot name="error">
                <div v-if="'Curp' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Curp'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
    </div>

    <div class="form-row">

        <x-form-select id="PaisNacimiento" 
                class="form-group col-md-4" 
                v-for="option in Countries" 
                v-on:change="cambiaPaisNacimiento($event.target.selectedIndex)"> 

            <x-slot name="slot"> País de nacimiento </x-slot> 
            <x-slot name="error">
                <div v-if="'PaisNacimiento' in Errores" class="invalid-feedback"> 
                    @{{ Errores['PaisNacimiento'][0] }} 
                </div>
            </x-slot> 
        </x-form-select>

        <x-form-select id="EstadoNacimiento" 
                class="form-group col-md-4" 
                v-for="option in States" 
                v-on:change="cambiaEstadoNacimiento($event.target.selectedIndex)"> 

            <x-slot name="slot"> Estado de nacimiento </x-slot>

            <x-slot name="error">
                <div v-if="'EstadoNacimiento' in Errores" class="invalid-feedback"> 
                    @{{ Errores['EstadoNacimiento'][0] }} 
                </div>
            </x-slot>
        </x-form-select>
        
        <x-form-select id="PaisResidencia" 
            class="form-group col-md-4" 
            v-for="option in Countries" 
            v-on:update="cambiaPaisResidencia($event.target.selectedIndex)"> 
            
            <x-slot name="slot"> País de residencia </x-slot>

            <x-slot name="error">
                <div v-if="'PaisResidencia' in Errores" class="invalid-feedback"> 
                    @{{ Errores['PaisResidencia'][0] }} 
                </div>
            </x-slot>
        </x-form-select>
        
        <x-form-input id="Tel" type="tel" class="form-group col-md-4"> 
            <x-slot name="slot"> Teléfono de contacto </x-slot>

            <x-slot name="error">
                <div v-if="'Tel' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Tel'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
        
        <x-form-input id="Cp" type="number" class="form-group col-md-4"> 
            <x-slot name="slot"> Codigo Postal </x-slot>

            <x-slot name="error">
                <div v-if="'Cp' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Cp'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
        
        <x-form-input id="GEtnico" type="text" class="form-group col-md-4"> 
            <x-slot name="slot"> Grupo étnico </x-slot>

            <x-slot name="error">
                <div v-if="'GEtnico' in Errores" class="invalid-feedback"> 
                    @{{ Errores['GEtnico'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
    </div>

    <div class="form-row">
        <x-form-select id="IsDiscapacidad" class="form-group col-md-3" 
                v-for="option in [{ id: 'IsDiscapacidad_si', name:'Si' }, 
                { id: 'IsDiscapacidad_no', name:'No' }]"> 
            
            ¿Tienes alguna discapacidad?
        </x-form-select>

        <x-form-input id="Discapacidad" type="text" class="form-group col-md-4"  v-if="IsDiscapacidad === 'Si'"> 
            <x-slot name="slot"> ¿Cuál? </x-slot>
            
            <x-slot name="error">
                <div v-if="'Discapacidad' in Errores" class="invalid-feedback"> 
                    @{{ Errores['Discapacidad'][0] }} 
                </div>
            </x-slot>
        </x-form-input>
    </div>

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
</x-modal-registro>
@endsection

@push('vuejs')
<script>
 const app =  new Vue({
    el: '#app',
    data: {
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
        IdPaisNacimiento: '',
        PaisNacimiento: '',
        IdPaisResidencia: '',
        PaisResidencia: '',
        IdEstadoNacimiento: '',
        EstadoNacimiento: '',
        TienesCurp: '',
        Cp: '',
        Tel: '',
        Curp:'',
        IsDiscapacidad: '',
        Discapacidad: '',
        GEtnico: '',
        spinnerVisible:false,
        Countries: '',
        Errores:{},
        Countries:[],
        States:[],
        OtroGenero: '',
    },
    methods: {

        tienesCurpChanged(value){
            this.TienesCurp = value;
        },

        IsDiscapacidadChanged(value){
            this.IsDiscapacidad = value;
        },

        cambiaPaisNacimiento(index){

            if (index === -1) return;

            this.PerteneceUASLP = this.Countries[index].name;
            this.IdPaisNacimiento = this.Countries[index].id;
            this.States = this.Countries[index].states;

        },

        cambiaPaisNacimiento(index){

            console.log(index);
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

            if(this.EmailR!=''){
                var data = {
                    "username":this.EmailR
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
                PerteneceUASLP: this.PerteneceUASLP,
                EmailR: this.EmailR,
                Nombres: this.Nombres,
                ApellidoP: this.ApellidoP,
                ApellidoM: this.ApellidoM,
                Curp: this.Curp,
                Edad: this.Edad,
                Genero: this.Genero,
                OtroGenero :this.OtroGenero,
                TienesCurp: this.TienesCurp,
                Password: this.Password,
                PasswordR: this.PasswordR,
                PaisNacimiento: this.PaisNacimiento,
                EstadoNacimiento: this.EstadoNacimiento,
                PaisResidencia: this.PaisResidencia,
                Tel: this.Tel,
                Cp: this.Cp,
                IsDiscapacidad: this.IsDiscapacidad,
                Discapacidad: this.Discapacidad,
            };

            axios({
                
                method: 'post',
                url: '/controlescolar/register',
                data: form_data,
                headers: {
                    'Accept' : 'application/json'
                }
            }).then(response => {

                alert('Te has registrado exitosamente. Serás redirigido a Agenda Ambiental');
            }).catch((err) => {

                this.Errores = err.response.data['errors'];
                console.log(this.Errores);
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
});
</script>
@endpush