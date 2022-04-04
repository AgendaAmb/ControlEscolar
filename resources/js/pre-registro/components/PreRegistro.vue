<template>
  <div
    class="modal fade"
    id="Registro"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div
        class="modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3 px-2"
        style="background-color: #8b96a8"
      >
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Registro</h2>
          <button
            style="border-radius: 10px; border:none; color:black; background-color:#8b96a8;"
            type="button"
            @click="AcademicProgram = null"
            class="btn-close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true" style="color:white; font-size: 25px" >X</span>
          </button>

        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="registraUsuario">
            <!-- Datos para crear la cuenta -->
            <crear-cuenta
              :errores="errores"
              :tipo_usuario.sync="tipo_usuario"
              :pertenece_uaslp.sync="pertenece_uaslp"
              :clave_uaslp.sync="clave_uaslp"
              :facultad.sync="facultad"
              :email.sync="email"
              :email_alterno.sync="email_alterno"
              :password.sync="password"
              :rpassword.sync="rpassword"
              :hasAlternEmail.sync="hasAlternEmail"
              @uaslpUserUpdated="uaslpUserUpdated"
              @miPortalUserUpdated="miPortalUserUpdated"
            >
            </crear-cuenta>

            <div v-if="tipo_usuario !== null && Readonly">
              <!-- Datos generals -->
              <datos-personales
                :errores="errores"
                :tipo_usuario.sync="tipo_usuario"
                :readonly="Readonly"
                :countries="countries"
                :mystates="mystates"
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
                :disability.sync="disability"

              >
              </datos-personales>
            </div>
            <!-- <button @click="a()">sdfasd</button> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import CrearCuenta from "./CrearCuenta.vue";
import DatosPersonales from "./DatosPersonales.vue";

import swal from "sweetalert2";
window.Swal = swal;

export default {
  components: { CrearCuenta, DatosPersonales },
  name: "pre-registro",

  props: {
    // Programa académico escogido,
    academic_program: Object,
  },

  data() {
    return {
      countries: [],
      mystates: [],
      errores: {},
      tipo_usuario: null,
      clave_uaslp: null,
      directorio_activo: null,
      pertenece_uaslp: false,
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
      hasAlternEmail: false,
    };
  },

  computed: {
    Readonly: {
      get() {
        return (
          this.tipo_usuario === "Comunidad UASLP" ||
          this.tipo_usuario === "Comunidad AA"
        );
      },
    },

    AcademicProgram: {
      get() {
        return this.academic_program;
      },
      set(newValue) {
        this.$emit("update:academic_program", newValue);
      },
    },

    

  },

  methods: {
    // a(){
    //   Swal.fire('Test!', 'Hello test message','success');
    // },

    uaslpUserUpdated(user) {
      this.facultad = user.dependency;
      this.directorio_activo = user.DirectorioActivo;

      //nombres
      this.name = user.name;
      this.first_surname = user.first_surname;
      this.last_surname = user.last_surname;

      //email
      this.email = user.email;

      //nacionalidad  y pais de residencia
      this.birth_country = "México";
      this.residence_country = "México";
      // console.log(this.countries.length);
      for (let i = 0; i < this.countries.length; i++) {
        if (this.countries[i].name == this.birth_country) {
            this.mystates  = this.countries[i].states;
        }
      }
      // console.log(this.mystates);
      this.hasData();
    },

    miPortalUserUpdated(user) {
      //clave facultad
      this.clave_uaslp = String(user.id);
      this.facultad = user.Dependencia;

      //nombre
      this.name = user.name;
      this.first_surname = user.middlename;
      this.last_surname = user.surname;

      //emilas
      this.email = user.email;
      this.email_alterno = user.altern_email;
      
      //datos generales
      this.birth_date = user.birth_date
      this.ocupation = user.ocupation;
      this.curp = user.curp;
      this.ocupation = user.ocupation;
      this.gender = user.gender;
      this.zip_code = Number(user.zip_code);
      this.phone_number = Number(user.phone_number);
      
      //nacionalidad y pais de nacimiento
      this.birth_country = user.nationality;
      this.residence_country = user.residence;
      
      for (let i = 0; i < this.countries.length; i++) {
        if (this.countries[i].name == this.birth_country) {
            this.mystates  = this.countries[i].states;
        }
      }

      this.hasData();
    },

    hasData(){
      if(this.altern_email!=null){
        this.hasAlternEmail = true;
      }
    },

    registraUsuario() {

      

      this.errores = {};
      var formData = new FormData();
      formData.append("announcement_id", this.academic_program.id);
      formData.append("tipo_usuario", this.tipo_usuario);
      formData.append("pertenece_uaslp", this.pertenece_uaslp);
      formData.append("email", this.email);
      formData.append("altern_email", this.email_alterno);
      formData.append("curp", this.curp);
      formData.append("no_curp", !this.no_curp);
      formData.append("name", this.name);
      formData.append("middlename", this.first_surname);
      formData.append("surname", this.last_surname);
      formData.append("birth_date", this.birth_date);
      formData.append("ocupation", this.ocupation);
      formData.append("gender", this.gender);
      formData.append("other_gender", this.other_gender);
      formData.append("civic_state", this.civic_state);
      formData.append("other_civic_state", this.other_civic_state);
      formData.append("birth_country", this.birth_country);
      formData.append("birth_state", this.birth_state);
      formData.append("residence_country", this.residence_country);
      formData.append("zip_code", this.zip_code);
      formData.append("phone_number", this.phone_number);
      formData.append("ethnicity", this.ethnicity);
      formData.append("is_disabled", this.is_disabled);
      formData.append("disability", this.disability);
      if (!this.pertenece_uaslp) {
        formData.append("password", this.password);
        formData.append("rpassword", this.rpassword);
      }else{
        formData.append("clave_uaslp", Number(this.clave_uaslp));
        formData.append("directorio_activo", this.directorio_activo);
      }

      //  console.log("form data no curp: " + formData.get('no_curp'));
     
      axios({
        method: "post",
        url: "/controlescolar/pre-registro",
        data: formData,
        headers: {
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      })
        .then((response) => {
          console.log(response.data);
          if (response.status == 201) {
            Swal.fire({
              title: "Registro exitoso",
              text: "Tu cuenta ha sido creada",
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Acceder a cuenta",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href =
                  // "https://ambiental.uaslp.mx/controlescolar/home";
                  window.location.href = "/controlescolar/home";
              }
            });
            // window.location.href = "/controlescolar/home";
            //window.location.href = this.url + "/controlescolar/home";
          }else{
            Swal.fire({
              title: "El usuario ya ha sido registrado",
              text: response.data.message,
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Acceder a cuenta",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href =
                  // "https://ambiental.uaslp.mx/controlescolar/home";
                  window.location.href = "/controlescolar/home";
              }
            });
          }
        })
        .catch((error) => {
          console.log(response.data);
            //alert(error.response.data);
            Swal.fire({
              title: "Error al crear usuario",
              text: response.data,
              icon: "error",
              confirmButtonColor: "#cfbaf0",
              confirmButtonText: "Ok, volver a formulario",

            });
        });
    },
  },

  mounted: function () {
    this.$nextTick(function () {
      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
        .then((response) => {
          // if(response.data[1].name === 'Albania'){
          //     console.log('no es');
          // }else{
          //     console.log('si es');
          // }

          // console.log(response.data[1].states);
          

          this.countries = response.data;
        });
    });
  },
};
</script>