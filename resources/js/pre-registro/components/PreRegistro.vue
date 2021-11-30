<template>
  <div class="modal fade" id="Registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3 px-2" style="background-color: #8b96a8">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Registro</h2>
          <button type="button" @click="AcademicProgram = null" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="registraUsuario">
            <!-- Datos para crear la cuenta -->
            <crear-cuenta :errores="errores"
              :tipo_usuario.sync="tipo_usuario"
              :pertenece_uaslp.sync="pertenece_uaslp"
              :clave_uaslp.sync="clave_uaslp"
              :facultad.sync="facultad"
              :email.sync="email"
              :email_alterno.sync="email_alterno"
              :password.sync="password"
              :rpassword.sync="rpassword"
              @uaslpUserUpdated="uaslpUserUpdated"
              @miPortalUserUpdated="miPortalUserUpdated">
            </crear-cuenta>

            <!-- Datos generales -->
            <datos-personales :errores="errores"
              :tipo_usuario.sync="tipo_usuario"
              :readonly="Readonly"
              :countries="countries"
              :curp.sync="curp"
              :no_curp.sync="no_curp"
              :name.sync="name"
              :first_surname.sync="first_surname"
              :last_surname.sync="last_surname"
              :birth_date.sync="birth_date"
              :ocupation.sync="ocupation"
              :birth_country.sync="birth_country"
              :birth_state.sync="birth_state"
              :residence_country.sync="residence_country"
              :gender.sync="gender"
              :other_gender.sync="other_gender"
              :civic_state.sync="civic_state"
              :other_civic_state.sync="other_civic_state"
              :zip_code.sync="zip_code"
              :phone_number.sync="phone_number"
              :ethnicity.sync="ethnicity"
              :is_disabled.sync="is_disabled"
              :disability.sync="disability">
            </datos-personales>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import CrearCuenta from './CrearCuenta.vue';
import DatosPersonales from './DatosPersonales.vue';


export default {
  components: { CrearCuenta, DatosPersonales },
  name: "pre-registro",

  props: {
    // Programa académico escogido,
    academic_program: Object,
  },

  data(){
    return {
      countries: [],
      errores: {},
      tipo_usuario: null,
      clave_uaslp: null,
      directorio_activo: null,
      pertenece_uaslp: null,
      facultad: null,
      email: null,
      email_alterno: null,
      password: null,
      rpassword: null,
      curp: null,
      no_curp: false,
      name: null,
      first_surname: null,
      last_surname: null,
      birth_date: null,
      ocupation: null,
      gender: null,
      other_gender: null,
      civic_state: null,
      other_civic_state: null,
      birth_country: null,
      birth_state: null,
      residence_country: null,
      zip_code: null,
      phone_number: null,
      ethnicity: null,
      is_disabled: false,
      disability: null,
    };
  },

  computed: {
    Readonly: {
      get () {
        return this.tipo_usuario === 'Comunidad UASLP' || this.tipo_usuario === 'Comunidad AA';
      }
    },

    AcademicProgram: {
      get () {
        return this.academic_program;
      },
      set (newValue) {
        this.$emit('update:academic_program', newValue);
      }
    }
  },

  methods: {
    uaslpUserUpdated(user){
      this.facultad = user.dependency;
      this.directorio_activo = user.DirectorioActivo;
      this.name = user.name;
      this.first_surname = user.first_surname;
      this.last_surname = user.last_surname;
      this.email = user.email;
      this.birth_country = 'México';
      this.residence_country = 'México';
    },

    miPortalUserUpdated(user){
      this.clave_uaslp = user.ClaveUASLP;
      this.facultad = user.Dependencia;
      this.name = user.name;
      this.first_surname = user.middlename;
      this.last_surname = user.surname;
      this.email = user.email;
      this.email_alterno = user.altern_email;
      this.birth_country = user.nationality;
      this.ocupation = user.ocupation;
      this.curp = user.curp;
      this.ocupation = user.ocupation;
      this.gender = user.gender;
      this.zip_code = Number(user.zip_code);
      this.phone_number = Number(user.phone_number);
    },

    registraUsuario(){
      this.errores = {};
      var formData = new FormData();
      formData.append('clave_uaslp', this.clave_uaslp);
      formData.append('directorio_activo', this.directorio_activo);
      formData.append('pertenece_uaslp', this.pertenece_uaslp);
      formData.append('email', this.email);
      formData.append('email_alterno', this.email_alterno);
      formData.append('password', this.password);
      formData.append('rpassword', this.rpassword);
      formData.append('curp', this.curp);
      formData.append('no_curp', this.no_curp);
      formData.append('name', this.name);
      formData.append('first_surname', this.first_surname);
      formData.append('last_surname', this.last_surname);
      formData.append('birth_date', this.birth_date);
      formData.append('ocupation', this.ocupation);
      formData.append('gender', this.gender);
      formData.append('other_gender', this.other_gender);
      formData.append('civic_state', this.civic_state);
      formData.append('other_civic_state', this.other_civic_state);
      formData.append('birth_country', this.birth_country);
      formData.append('birth_state', this.birth_state);
      formData.append('residence_country', this.residence_country);
      formData.append('zip_code', this.zip_code);
      formData.append('phone_number', this.phone_number);
      formData.append('ethnicity', this.ethnicity);
      formData.append('is_disabled', this.is_disabled);
      formData.append('disability', this.disability);

      axios({
        method: 'post',
        url: '/controlescolar/login',
        data: formData,
        headers: {
          'Accept' : 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        console.log(response);
      }).catch(error => {
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    }
  },

  mounted: function(){
        
    this.$nextTick(function () {

      axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries/states')
      .then(response => {
        this.countries = response.data;
      });
    });
  },
};
</script>