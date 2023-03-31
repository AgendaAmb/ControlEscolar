<template>
  <form @submit.prevent="buscaExpediente" class="d-block">
    <div class="row mx-3">
      <p class="h5">
        Ingresa el programa académico y el nombre del alumno del cual deseas ver
        sus documentos
      </p>
    </div>

    <div class="row mx-1">
      <div class="form-group col-12">
        <label> <strong> Programa académico </strong> </label>
        <select v-model="announcement" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option
            v-for="academicProgram in academic_programs"
            :key="academicProgram.id"
            :value="academicProgram.latest_announcement.id"
          >
            {{ academicProgram.name }}
          </option>
        </select>
      </div>
    </div>

    <div class="row mx-1">
      <div class="col-3">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>

      <div v-if="dataLength != null" class="col-3 mx-4">
        {{ dataLength }} <span> Resultados encontrados</span>
      </div>
    </div>
  </form>
</template>

<script>
import swal from "sweetalert2";
window.Swal = swal;
export default {
  // Nombre del componente
  name: "search-archive-input",

  // Propiedades no reactivas.
  props: {
    // Programas académicos.
    academic_programs: {
      type: Array,
      default() {
        return [];
      },
    },
  },

  // Propiedades reactivas.
  data() {
    return {
      student_name: null,
      announcement: null,
      dataLength: null,
    };
  },

  methods: {
    buscaExpediente() {
      //Datos no completos para hacer busqueda
      if (this.announcement == null) {
        Swal.fire({
          title: "Error al hacer busqueda",
          text: "Alguno de los campos se encuentra vacio",
          icon: "error",
        });
      } else {
        //Se hace la busqueda
        axios
          .get("/controlescolar/solicitud/archives/professor", {
            params: {
              // student_name: this.student_name,
              "filter[announcement.id]": this.announcement,
            },
          })
          .then((response) => {
            this.dataLength = response.data.length; // cantidad de articulos
            console.log("archives.found " + response.data.length);

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
