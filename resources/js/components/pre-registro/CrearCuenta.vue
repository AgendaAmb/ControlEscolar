<template>
  <div class="form-row">
    <!-- Pregunta al usuario si ya tiene alguna cuenta existente en el sistema. -->
    <div class="form-group col-12 mb-3">
      <h3 class="d-block mb-3"> ¿Eres miembro de la comunidad de Agenda Ambiental o perteneces a la UASLP? </h3>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="TipoUsuario" v-model="TipoUsuario" value="Comunidad AA">
        <label class="form-check-label"> Soy miembro de la comunidad de Agenda Ambiental </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="TipoUsuario" v-model="TipoUsuario" value="Comunidad UASLP">
        <label class="form-check-label"> No soy miembro de la comunidad de Agenda Ambiental, pero sí la UASLP </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="TipoUsuario" v-model="TipoUsuario" value="Ninguno">
        <label class="form-check-label"> Ninguno de los anteriores </label>
      </div>
      <div v-if="'tipo_usuario' in errores" class="invalid-feedback"> {{ errores.tipo_usuario }} </div>
    </div>
    <div class="col-12"></div>

    <!-- El usuario es miembro de la comunidad de Agenda Ambiental. -->
    <datos-mi-portal v-if="TipoUsuario === 'Comunidad AA'"
      :errores="errores"
      @miPortalUserUpdated="$emit('miPortalUserUpdated', $event)"
      :correo_registro.sync="correo_registro">
    </datos-mi-portal>
    <div class="col-12"></div>

    <!-- El usuario es miembro de la UASLP, pero no de AA. -->
    <datos-uaslp v-if="TipoUsuario === 'Comunidad UASLP'"
      :errores="errores" 
      :clave_uaslp.sync="ClaveUaslp" 
      @uaslpUserUpdated="$emit('uaslpUserUpdated', $event)">
    </datos-uaslp>
    <div class="col-12"></div>

    <!-- El usuario no es miembro de ninguno de los 2. -->
    <div v-if="TipoUsuario === 'Ninguno'" class="form-group col-12">
      <h5 class="modal-title mt-3" >Crear cuenta </h5>
    </div>

    <div :class="EmailClass">
      <label> Ingresa un correo electrónico </label>
      <input type="email" :class="inputClassFor('email')" v-model="Email" :readonly="ClaveUaslp !== null">
      <div v-if="'email' in errores" class="invalid-feedback"> {{ errores.email}} </div>
    </div>

    <div :class="EmailClass">
      <label> Ingresa un correo de contacto alterno </label>
      <input type="email" :class="inputClassFor('email_alterno')"  v-model="EmailAlterno" :readonly="TipoUsuario === 'Comunidad AA'">
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
import DatosMiPortal from './DatosMiPortal.vue';
import DatosUaslp from './DatosUaslp.vue';

export default {
  components: { DatosMiPortal, DatosUaslp },
  name: "crear-cuenta",

  props: {
    // El usuario pertenece a la comunidad de agenda ambiental.
    tipo_usuario: String,

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
      correo_registro: null,
    }
  },

  computed: {
    TipoUsuario: {
      get(){
        return this.tipo_usuario;
      },
      set(newVal){
        this.$emit('update:tipo_usuario', newVal);
      }
    },

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
        var usuarioRegistrado = this.TipoUsuario === 'Comunidad AA' && this.email === null 
        usuarioRegistrado |= this.TipoUsuario === 'Comunidad UASLP' && this.email === null;
        usuarioRegistrado |= this.TipoUsuario === null;

        return {
          'form-group': true,
          'col-lg-6': true,
          'mt-3': this.TipoUsuario === 'Comunidad AA' || this.TipoUsuario === 'Comunidad UASLP',
          'd-none': usuarioRegistrado || this.TipoUsuario === null
        };
      }
    },

    PasswordClass: {
      get(){
        return {
          'form-group': true,
          'col-lg-6': true,
          'd-none': this.TipoUsuario === 'Comunidad AA' 
          || this.TipoUsuario === 'Comunidad UASLP'
          || this.TipoUsuario === null
        };
      }
    },
  },

  methods:{
    inputClassFor(model){
      return {
        'form-control': true,
        'is-invalid': model in this.errores
      }
    }
  }
};
</script>