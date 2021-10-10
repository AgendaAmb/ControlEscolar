<template>
  <div class="form-row">
    <div class="form-group col-sm-6 col-lg-5 mb-3">
      <label> ¿Perteneces a la UASLP? </label>
      <select v-model="PerteneceUaslp" class="form-control">
        <option value="" selected>Escoge una opción</option>
        <option value="Si"> Si </option>
        <option value="No"> No </option>
      </select>
    </div>
    <div class="col-12"></div>

    <div v-if="PerteneceUaslp === 'Si'" class="form-group col-11 col-sm-6 col-lg-5 my-auto">
      <input type="hidden" name="Dependencia" v-model="Facultad">
      <label> Ingresa tu RPE/clave única de alumno ó correo Institucional </label>
      <input type="search" class="form-control" v-model="claveUaslp">
    </div>

    <div v-if="PerteneceUaslp === 'Si'" class="col-1 mt-auto">
      <a class="btn btn btn-outline-light search-button position-relative" 
        @click="uaslpUser"
        data-toggle="tooltip" 
        data-placement="right" 
        title="Buscar mi información">
        <i class="fas fa-search"></i>
      </a>
    </div>
    <div class="col-12"></div>

    <div v-if="PerteneceUaslp === 'No'" class="form-group col-12">
      <h5 class="modal-title mt-3" >Crear cuenta </h5>
    </div>

    <div :class="EmailClass">
      <label> Ingresa un correo electrónico </label>
      <input type="email" class="form-control" v-model="Email" :readonly="ClaveUaslp !== null">
    </div>

    <div :class="EmailClass">
      <label> Ingresa un correo de contacto alterno </label>
      <input type="email" class="form-control" v-model="EmailAlterno">
    </div>

    <div :class="PasswordClass">
      <label> Contraseña</label>
      <input type="password" class="form-control" v-model="Password">
    </div>

    <div :class="PasswordClass">
      <label> Repite tu Contraseña </label>
      <input type="password" class="form-control" v-model="RPassword">
    </div>
  </div>
</template>

<script>


export default {
  name: "crear-cuenta",

  props: {
    // El usuario pertenece a la UASLP.
    pertenece_uaslp: String,
    
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
          'd-none': this.ClaveUaslp === null && (this.PerteneceUaslp === 'Si' || this.PerteneceUaslp === null)
        };
      }
    },

    PasswordClass: {
      get(){
        return {
          'form-group': true,
          'col-lg-6': true,
          'd-none': this.PerteneceUaslp !== 'No'
        };
      }
    },
  },

  methods:{
    uaslpUser: function(){
      var data = {
        "username":this.claveUaslp
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
  }
};
</script>