/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import AcademicProgram from './components/AcademicProgram.vue';

window.Vue = require('vue').default;
import swal from "sweetalert2";
window.Swal = swal;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
  el: '#app',

  components: {
    'academic-program': AcademicProgram,
  },

  data: {
    // Archive with all the ids 
    academic_programs: academic_programs,
    selected_academic_program: null,
    images_btn:[],
  },

  created() {
    // console.log(this.language);
    axios
      .get("/controlescolar/solicitud/getAllButtonImage")
      .then((response) => {
        // console.log('recibiendo imagenes' + response.data.ver);
        this.images_btn = response.data;
        // console.log('imagenes buttons: ' + this.images.ver);
      })
      .catch((error) => {
        console.log(error);
      });
  },

  methods: {

    academicProgramsNotEmpty() {
      if (this.academic_programs.length > 0) {
        return true;
      }
      return false;
    },


    nuevoProgramaAcademico(academic_program) {
      console.log(academic_program);
      this.selected_academic_program = academic_program;
      Swal.fire({
        title: "¿Estas seguro de continuar?",
        text: "Crearas un nuevo expediente para el programa " + academic_program.name, // Imprime el mensaje del controlador
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Continuar",
        cancelButtonText: "Cerrar",
      }).then((result) => {
        if (result.isConfirmed){
          axios
            .post("/controlescolar/nuevoExpediente/createArchive", {
              academic_program_id: academic_program.id
            })
            .then((response) => {
              window.location.href = "/controlescolar/showRegisterArchives";
            })
            .catch((error) => {
              console.log(error);
              Swal.fire({
                title: "Ups! Algo salio mal",
                text: "No se pudo crear el expediente",
                showCancelButton: false,
                icon: "error",
              });
            });
        }

      });
    }
  }
});