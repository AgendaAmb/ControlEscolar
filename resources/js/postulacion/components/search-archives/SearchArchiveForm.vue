<template>
  <form @submit.prevent="buscaExpedientes" class="d-block mt-0">

  

    <div class="row mx-1">
      <div class="form-group col-6">
        <label class="h5"> <strong> Programa académico </strong> </label>
        <select v-model="AcademicProgramSelect" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option
            v-for="(academicProgram, index) in academic_programs"
            :key="index"
            :value="academicProgram.name"
          >
            {{ academicProgram.name }}
          </option>
        </select>
      </div>

      <div class="form-group col-6">
        <label class="h5"> <strong> Periodo </strong> </label>
        <select v-model="announcement_selected" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option
            v-for="(announcement, index) in announcementsForAcademicProgram"
            :key="index"
            :value="announcement.id"
          >
            {{ announcement.from + " - " + announcement.to }}
          </option>
        </select>
      </div>
    </div>

    <!-- BTN SUBMIT -->
    <div class="d-flex justify-content-start mx-1">
      <!-- <div class="col-4">
        <input type="hidden">
      </div> -->
      <div class="col-3 align-items-center" style="height:40px">
        <button type="submit" class="btn btn-primary" style="height:100%; width:100%;"><label class="h5"><strong>Buscar</strong></label></button>
      </div>
      <div class="col-9">
        <input type="hidden">
      </div>
    </div>

    <!-- RESULT DATA -->
    <div class="d-flex justify-content-start mx-1 my-1">
      
      <div v-if="dataLength != null" class="col-3 align-items-center d-flex justify-content-start">
        <label class="h5"><strong>{{ dataLength }} Resultados encontrados</strong></label>
      </div>
      <div class="col-9"></div>
    </div>

    <!-- SEND EMAILS -->
    <!-- <div v-if="isAdmin === true" class="row mx-1 my-1 justify-content-center align-items-center">
      <div class="col-6">
        <button class="btn btn-primary my-3" style="width:100%;" @click="mandarCorreos">
          Mandar correos
        </button>
      </div>
    </div> -->
  </form>
</template>

<script>
import swal from "sweetalert2";
window.Swal = swal;
export default {
  // Nombre del componente
  name: "search-archive-form",

  // Propiedades no reactivas.
  props: {
    // Programas académicos.
    academic_programs: {
      type: Array,
      default: [],
    },

    announcements: {
      type: Array,
      default: [],
    },

    isAdmin:{
      type:Boolean,
      default: false
    }
  },

  // Propiedades reactivas.
  data() {
    return {
      announcementsForAcademicProgram: [],
      academic_program_selected: null,
      announcement_selected: null,
      dataLength: null,
      date_to: null,
      date_from: null,
    };
  },

  computed: {
    AcademicProgramSelect: {
      get() {
        return this.academic_program_selected;
      },

      set(newVal) {
        this.academic_program_selected = newVal;

        this.academic_programs_for_periods = [];
        this.announcementsForAcademicProgram = [];

        this.announcements.forEach((element) => {
          if (newVal === element.name) {
            console.log("newVal: " + newVal);
            console.log("academicProgram: " + element.name);
            this.announcementsForAcademicProgram.push(element);
          }
        });
      },
    },
  },

  methods: {
    mandarCorreos() {
      console.log(this.announcement_selected);
      axios
        .post(
          "/controlescolar/entrevistas/SendMailUpdateOnlyDocumentsForInterview",
          {
            announcement_id: this.announcement_selected,
          }
        )
        .then((response) => {
          Swal.fire({
            title: "Éxito!",
            text: "Se envio el correo a todos los postulantes", // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });
        })
        .catch((error) => {
          console.log(error);
          Swal.fire({
            title: ":( Error ",
            text: "No se pudieron enviar los correos", // Imprime el mensaje del controlador
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    // puedeEnviarCorreos(){
    //   let res = false;
    //   if(this.user_rol === 'Administrador'){
    //     res = true;
    //   }
    //   return res;
    // },

    buscaExpedientes() {
      //Datos no completos para hacer busqueda
      if (
        this.announcement_selected == null ||
        this.academic_program_selected == null
      ) {
        Swal.fire({
          title: "Ups",
          text: "Falta alguno de los campos",
          icon: "error",
        });
      } else {
        //Se hace la busqueda
        axios
          .get("/controlescolar/solicitud/archives", {
            params: {
              announcement_id: this.announcement_selected,
            },
          })
          .then((response) => {
            console.log(response.data);
            this.dataLength = response.data.length; // cantidad de articulos
            this.$emit("archives-found", response.data); //actualiza archivos
          })
          .catch((error) => {
            console.log(error);
            Swal.fire({
              title: "Error al hacer busqueda",
              text: error.response.data,
              icon: "error",
            });
          });
      }

      return false;
    },
  },
};
</script>