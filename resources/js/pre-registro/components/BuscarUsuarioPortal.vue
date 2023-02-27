<template>
  <div class="form-row">
    

    <!-- El usuario es miembro de la comunidad de Agenda Ambiental. -->
    <datos-mi-portal
      :errores="errores"
      @miPortalUserUpdated="$emit('miPortalUserUpdated', $event)"
      :correo_registro.sync="correo_registro">
    </datos-mi-portal>

    <!-- Se podra cambiar el correo alterno si no se tiene nada -->
    <div v-if='hasAlternEmail!=false' :class="EmailClass">
      <label>Correo electronico alterno</label>
      <input type="email" :class="inputClassFor('email_alterno')"  v-model="EmailAlterno" :readonly=true>
      <div v-if="'email_alterno' in errores" class="invalid-feedback"> {{ errores.email_alterno}} </div>
    </div>
    
  </div>
</template>

<script>
import DatosMiPortal from './DatosMiPortal.vue';
export default {
  components: { DatosMiPortal },
  name: "buscar-usuario-portal",

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
    //Tienen o no altern email
    hasAlternEmail: Boolean,
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
    },
    setPerteneceUASLP(res){
        this.PerteneceUaslp = res;
    }
  }
};
</script>