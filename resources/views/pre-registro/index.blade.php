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

<pre-registro>
    <crear-cuenta :pertenece-uaslp.sync="PerteneceUASLP">
        <cuenta-uaslp v-if="PerteneceUASLP === 'Si'"
            :facultad.sync="Facultad"
            :email-r.sync="EmailR">
        </cuenta-uaslp>

        <cuenta-externo v-if="PerteneceUASLP === 'No'"
            :email-r.sync="EmailR"
            :email-alterno.sync="EmailAlterno"
            :password.sync="Password"
            :password-r.sync="PasswordR">
        </cuenta-uaslp>
    </crear-cuenta>

    <datos-personales v-if="PerteneceUASLP !== ''"
        :nombres.sync="Nombres"
        :ap-paterno.sync="ApellidoP"
        :ap-Materno.sync="ApellidoM">

    </datos-personales>
</pre-registro>
{{--  
<x-modal-registro v-on:submit.prevent="RegistraUsuario">
   


    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
    <div class="form-row">
        <x-form-input id="Nombres" type="text" class="form-group col-md-12" ::readonly="PerteneceUASLP === 'Si' ? true : false"> 
            <x-slot name="slot"> Nombre(s): </x-slot>
            <x-slot name="error" v-if="'Nombres' in Errores"> @{{ Errores['Nombres'][0] }} </x-slot>
        </x-form-input>

        <x-form-input id="ApellidoP" type="text" class="form-group col-md-6"  ::readonly="PerteneceUASLP === 'Si' ? true : false"> 
            <x-slot name="slot"> Apellido paterno </x-slot>
            <x-slot name="error" v-if="'ApellidoP' in Errores"> @{{ Errores['ApellidoP'][0] }} </x-slot>
        </x-form-input>

        <x-form-input id="ApellidoM" type="text" class="form-group col-md-6" ::readonly="PerteneceUASLP === 'Si' ? true : false"> 
            <x-slot name="slot"> Apellido materno </x-slot>
            <x-slot name="error" v-if="'ApellidoM' in Errores"> @{{ Errores['ApellidoM'][0] }} </x-slot>
        </x-form-input>
    </div>
    <div class="form-row">
        <x-form-input id="Edad" type="number" class="form-group col-md-2"> 
            <x-slot name="slot"> Edad </x-slot>
            <x-slot name="error" v-if="'Edad' in Errores"> @{{ Errores['Edad'][0] }} </x-slot>
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
        
            <x-slot name="slot"> Género </x-slot>
            <x-slot name="error" v-if="'Genero' in Errores"> @{{ Errores['Genero'][0] }} </x-slot>
        </x-form-select>

        <x-form-input id="OtroGenero" type="text" class="form-group col-md-2" v-if="Genero === 'Otros'"> 
            <x-slot name="slot"> ¿Cuál? </x-slot>
            <x-slot name="error" v-if="'OtroGenero' in Errores"> @{{ Errores['OtroGenero'][0] }} </x-slot>
        </x-form-input>
    </div>

    <div class="form-row">
        <x-form-select id="TienesCurp" class="form-group col-md-3" 
            v-for="option in [{ id: 'TienesCurp_si', name:'Si' }, { id: 'TienesCurp_no', name:'No' }]"> 
        
            <x-slot name="slot"> ¿Tienes CURP? </x-slot>
            <x-slot name="error" v-if="'TienesCurp' in Errores"> @{{ Errores['TienesCurp'][0] }}</x-slot>
        </x-form-select>

        <x-form-input id="Curp" type="text" class="form-group col-md-5"  v-if="TienesCurp === 'Si'"> 
            <x-slot name="slot"> Ingresa tu Curp: </x-slot>
            <x-slot name="error" v-if="'Curp' in Errores">@{{ Errores['Curp'][0] }} </x-slot>
        </x-form-input>
    </div>

    <div class="form-row">
        <x-form-select id="PaisNacimiento" class="form-group col-md-4" v-for="option in Countries" v-on:change="cambiaPaisNacimiento($event.target.selectedIndex)"> 
            <x-slot name="slot"> País de nacimiento </x-slot> 
            <x-slot name="error" v-if="'PaisNacimiento' in Errores"> @{{ Errores['PaisNacimiento'][0] }} </x-slot> 
        </x-form-select>

        <x-form-select id="EstadoNacimiento" class="form-group col-md-4" v-for="option in States" v-on:change="cambiaEstadoNacimiento($event.target.selectedIndex)"> 

            <x-slot name="slot"> Estado de nacimiento </x-slot>
            <x-slot name="error" v-if="'EstadoNacimiento' in Errores"> @{{ Errores['EstadoNacimiento'][0] }} </x-slot>
        </x-form-select>
        
        <x-form-select id="PaisResidencia" class="form-group col-md-4" 
            v-for="option in Countries" v-on:update="cambiaPaisResidencia($event.target.selectedIndex)"> 
            
            <x-slot name="slot"> País de residencia </x-slot>
            <x-slot name="error" v-if="'PaisResidencia' in Errores"> @{{ Errores['PaisResidencia'][0] }} </x-slot>
        </x-form-select>
        
        <x-form-input id="Tel" type="tel" class="form-group col-md-4"> 
            <x-slot name="slot"> Teléfono de contacto </x-slot>
            <x-slot name="error" v-if="'Tel' in Errores">  @{{ Errores['Tel'][0] }} </x-slot>
        </x-form-input>
        
        <x-form-input id="Cp" type="number" class="form-group col-md-4"> 
            <x-slot name="slot"> Código postal </x-slot>
            <x-slot name="error" v-if="'Cp' in Errores">  @{{ Errores['Cp'][0] }} </x-slot>
        </x-form-input>
        
        <x-form-input id="GEtnico" type="text" class="form-group col-md-4"> 
            <x-slot name="slot"> Grupo étnico </x-slot>
            <x-slot name="error" v-if="'GEtnico' in Errores"> @{{ Errores['GEtnico'][0] }} </x-slot>
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
            <x-slot name="error" v-if="'Discapacidad' in Errores"> @{{ Errores['Discapacidad'][0] }} </x-slot>
        </x-form-input>
    </div>

    <div class="form-row">
        <div class="form-group col-12 my-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Al enviar la información confirmo que he leído y acepto el <a
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
</x-modal-registro>--}}
@endsection

@push('vuejs')
<script>
 const app =  new Vue({
    el: '#app',
    data: {
        PerteneceUASLP: '',
        EmailR: '',
        EmailAlterno: '',
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