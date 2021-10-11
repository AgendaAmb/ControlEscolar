<template>
  <div class="form-row">
    <div class="form-group col-sm-6 col-lg-5 mb-3">
      <label> ¿Perteneces a la UASLP? </label>
      <select v-model="PerteneceUaslp" :class="inputClassFor('pertenece_uaslp')">
        <option value="" selected>Escoge una opción</option>
        <option :value="true"> Si </option>
        <option :value="false"> No </option>
      </select>
      <div v-if="'pertenece_uaslp' in errores" class="invalid-feedback"> {{ errores.pertenece_uaslp }} </div>
    </div>
    <div class="col-12"></div>

    <div v-if="PerteneceUaslp === true" class="form-group col-11 col-sm-6 col-lg-5 mb-auto">
      <input type="hidden" name="Dependencia" v-model="Facultad">
      <label> Ingresa tu RPE/clave única de alumno ó correo Institucional </label>
      <input type="search" :class="inputClassFor('clave_uaslp')" v-model="ClaveUaslp">

      <div v-if="'clave_uaslp' in errores" class="invalid-feedback"> {{ errores.clave_uaslp}} </div>
    </div>

    <div v-if="PerteneceUaslp === true" class="col-1 mt-auto">
      <a class="py-2 btn btn btn-outline-light search-button position-relative" 
        @click="uaslpUser"
        data-toggle="tooltip" 
        data-placement="right" 
        title="Buscar mi información">
        <i class="fas fa-search"></i>
      </a>
    </div>
    <div class="col-12"></div>

    <div v-if="PerteneceUaslp === false" class="form-group col-12">
      <h5 class="modal-title mt-3" >Crear cuenta </h5>
    </div>

    <div :class="EmailClass">
      <label> Ingresa un correo electrónico </label>
      <input type="email" :class="inputClassFor('email')" v-model="Email" :readonly="ClaveUaslp !== null">
      <div v-if="'email' in errores" class="invalid-feedback"> {{ errores.email}} </div>
    </div>

    <div :class="EmailClass">
      <label> Ingresa un correo de contacto alterno </label>
      <input type="email" :class="inputClassFor('email_alterno')"  v-model="EmailAlterno">
      <div v-if="'email_alterno' in errores" class="invalid-feedback"> {{ errores.email_alterno}} </div>
    </div>

    <div :class="PasswordClass">
      <label> Contraseña</label>
      <input type="password" :class="inputClassFor('password')" v-model="Password">
      <div v-if="'password' in errores" class="invalid-feedback"> {{ errores.password}} </div>
    </div>

    <div :class="PasswordClass">
      <label> Repite tu Contraseña </label>
      <input type="password" :class="inputClassFor('rpassword')" v-model="RPassword">
      <div v-if="'rpassword' in errores" class="invalid-feedback"> {{ errores.rpassword}} </div>
    </div>
  </div>
</template>

<script>


export default {
  name: "crear-cuenta",

  props: {
    // El usuario pertenece a la UASLP.
    pertenece_uaslp: Boolean,
    
    // Facultad de adscripción del usuario.
    facultad: String,

    // Usuario de la UASLP.
    clave_uaslp: String,

    // Email de registro.
    email: String,

    // Email de registro alterno.
    email_alterno: String,

    // Contraseña de registro.
    password: String,

    // Confirmación de la contraseña.
    rpassword: String,

    // Errores.
    errores: Object,
  },

  data() {
    return {
      claveUaslp: null,
    }
  },

  computed: {
    PerteneceUaslp: {
      get(){
        return this.pertenece_uaslp;
      },
      set(newVal){
        this.$emit('update:pertenece_uaslp', newVal);
      }
    },

    Facultad: {
      get(){
        return this.facultad;
      },
      set(newVal){
        this.$emit('update:facultad', newVal);
      }
    },

    ClaveUaslp: {
      get(){
        return this.clave_uaslp;
      },
      set(newVal){
        this.$emit('update:clave_uaslp', newVal);
      }
    },

    Email: {
      get(){
        return this.email;
      },
      set(newVal){
        this.$emit('update:email', newVal);
      }
    },

    EmailAlterno: {
      get(){
        return this.email_alterno;
      },
      set(newVal){
        this.$emit('update:email_alterno', newVal);
      }
    },
    Password: {
      get(){
        return this.password;
      },
      set(newVal){
        this.$emit('update:password', newVal);
      }
    },
    RPassword: {
      get(){
        return this.passwordR;
      },
      set(newVal){
        this.$emit('update:rpassword', newVal);
      }
    },

    EmailClass: {
      get(){
        return {
          'form-group': true,
          'col-lg-6': true,
          'my-3': true,
          'd-none': this.ClaveUaslp === null && (this.PerteneceUaslp === true || this.PerteneceUaslp === null)
        };
      }
    },

    PasswordClass: {
      get(){
        return {
          'form-group': true,
          'col-lg-6': true,
          'd-none': this.PerteneceUaslp !== false
        };
      }
    },
  },

  methods:{
    uaslpUser: function(){
      var data = {
        "username":this.ClaveUaslp
      }

      axios.post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user',data)
      .then(response => {
        this.spinnerVisible = false;
        var res = response['data']['data'];
        this.$emit('uaslpUserUpdated', res);

      }).catch((err) => { 
        this.spinnerVisible = false;
      });
    },

    inputClassFor(model){
      return {
        'form-control': true,
        'is-invalid': model in this.errores
      }
    }
  }
};
</script>