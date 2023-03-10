<template>
  <form @submit.prevent="buscaExpedientes" class="d-block mt-0">
    <div
      class="row mx-1 align-items-center"
      style="max-height: 75px; min-height: 50px"
    >
      <!-- SELECT : PROGRAMA ACADEMICO -->
      <div class="form-group col-5">
        <label class="h6"> <strong> Programa académico </strong> </label>
        <select v-model="AcademicProgramSelect" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option
            v-for="(academicProgram, index) in academic_programs"
            :key="index"
            :id="academicProgram.id"
            :value="academicProgram.name"
          >
            <p>
              {{ academicProgram.name }}
            </p>
          </option>
        </select>
      </div>

      <!-- SELECT : PERIODO -->
      <div class="form-group col-5">
        <label class="h6"> <strong> Periodo </strong> </label>
        <select v-model="announcement_selected" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option
            v-for="(announcement, index) in announcementsForAcademicProgram"
            :key="index"
            :value="announcement.id"
          >
            <p>
              {{
                splitDate(announcement.from) +
                " - " +
                splitDate(announcement.to)
              }}
            </p>
          </option>
        </select>
      </div>

      <div class="form-group col-2 justify-content-center" style="height: 100%">
        <label class="h6"> <strong> Buscar </strong> </label>

        <b-btn
          variant="outline-primary"
          type="submit"
          style="width: 100%; height: 45px !important"
        >
          <b-icon icon="search" aria-hidden="true"></b-icon>
        </b-btn>

        <label class="h6"> <strong> TestBtn </strong> </label>
        <b-btn
          variant="outline-primary"
          style="width: 100%; height: 45px !important"
          @click="searchArchives"
        >
          <b-icon icon="search" aria-hidden="true"></b-icon>
        </b-btn>
      </div>
    </div>
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

    isAdmin: {
      type: Boolean,
      default: false,
    },
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
            //console.log("newVal: " + newVal);
            //console.log("academicProgram: " + element.name);
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

    splitDate(date) {
      let date_splited = date.split("-");
      let month = "";
      let res = "";

      if (date_splited.length > 0) {
        switch (date_splited[1]) {
          case "01":
            month = "Enero";
            break;
          case "02":
            month = "Febrero";
            break;
          case "03":
            month = "Marzo";
            break;
          case "04":
            month = "Abril";
            break;
          case "05":
            month = "Mayo";
            break;
          case "06":
            month = "Junio";
            break;
          case "07":
            month = "Julio";
            break;
          case "08":
            month = "Agosto";
            break;
          case "09":
            month = "Septiembre";
            break;
          case "10":
            month = "Octubre";
            break;
          case "11":
            month = "Noviembre";
            break;
          case "12":
            month = "Diciembre";
            break;
        }

        res = month + " (" + date_splited[0] + ")";
      }

      return res;
    },

    // puedeEnviarCorreos(){
    //   let res = false;
    //   if(this.user_rol === 'Administrador'){
    //     res = true;
    //   }
    //   return res;
    // },
    getDebug(e) {
      console.log("DEBUG", e);
    },
    searchArchives() {
      if (
        this.announcement_selected !== null &&
        this.academic_program_selected !== null
      ) {
        //Se hace la busqueda

        axios
          .get("/controlescolar/solicitud/archives/getArchiveUsers", {
            /*
             * ! Revisar ruta de axios para conectar a BD
             */
            params: {
              announcement_id: this.announcement_selected,
            },
          })
          .then((response) => {
            const { data } = response;
            console.log("Data from btn: ", data);
            this.dataLength = data.length; // cantidad de articulos
            this.$emit("archives-found", {
              data: data,
              programName: this.AcademicProgramSelect,
            }); //actualiza archivos
          })
          .catch((error) => {
            //console.log(error);
            Swal.fire({
              title: "Error al hacer busqueda",
              text: error.response.data,
              icon: "error",
            });
          });
      } else {
        Swal.fire({
          title: "Ups",
          text: "Falta alguno de los campos",
          icon: "error",
        });
      }

      return false;
    },

    buscaExpedientes() {
      //Datos no completos para hacer busqueda
      if (
        this.announcement_selected !== null &&
        this.academic_program_selected !== null
      ) {
        //Se hace la busqueda

        axios
          .get("/controlescolar/solicitud/archives", {
            /*
             * ! Revisar ruta de axios para conectar a BD
             */
            params: {
              announcement_id: this.announcement_selected,
            },
          })
          .then((response) => {
            console.log("RESPUESTA BD \n", response);
            //console.log("Lenght", response.lenght);
            this.dataLength = response.data.length; // cantidad de articulos
            this.$emit("archives-found", {
              data: response.data,
              programName: this.AcademicProgramSelect,
            }); //actualiza archivos
          })
          .catch((error) => {
            //console.log(error);
            Swal.fire({
              title: "Error al hacer busqueda",
              text: error.response.data,
              icon: "error",
            });
          });
      } else {
        Swal.fire({
          title: "Ups",
          text: "Falta alguno de los campos",
          icon: "error",
        });
      }

      return false;
    },
  },
};
</script>
