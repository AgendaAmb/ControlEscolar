<template>
  <form @submit.prevent="buscaExpedientes" class="d-block">
    <div class="row mx-1">
      <div class="form-group col-6">
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

      <div class=" col-6">
        <div class="row">
          <div class="col d-block">
            <label><strong>Desde</strong></label>
          </div>
          <div class="col d-block">
            <label><strong>Hasta</strong></label>
          </div>
        </div>

        <div class="form-group row">
          <div class="col">
            <input
              type="date"
              class='form-control'
              v-model="date_from"
            />
          </div>
          <div class="col">
            <input
              type="date"
              class='form-control'
              v-model="date_to"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row mx-1">
      <div class="col-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>

      <div v-if="dataLength != null" class="col mx-3">
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
  name: "search-archive-form",

  // Propiedades no reactivas.
  props: {
    // Programas académicos.
    academic_programs: {
      type: Array,
      default() {
        return [];
      },
    },

    // date_to: {
    //   type: Date,
    //   default: null,
    // },

    // date_from: {
    //   type: Date,
    //   default: null,
    // },
  },

  // Propiedades reactivas.
  data() {
    return {
      announcement: null,
      dataLength : null,
      date_to: null,
      date_from: null,
    };
  },

  computed: {
    // DateTo: {
    //   get() {
    //     return this.date_to;
    //   },
    //   set(newVal) {
    //     this.$emit("update:date_to", newVal);
    //   },
    // },

    // DateFrom: {
    //   get() {
    //     return this.date_from;
    //   },
    //   set(newVal) {
    //     this.$emit("update:date_from", newVal);
    //   },
    // },
  },

  methods: {
    buscaExpedientes() {
      // Parámetros de búsqueda.
      var params = {};

        console.log('Desde: ', this.date_from, ' Hasta: ', this.date_to);
      if (this.announcement !== null) {
        //si existe una fecha de convocatoria abierta
        params = {
          params: {
            "filter[announcement.id]": this.announcement,
            "date_from": this.date_from,
            "date_to": this.date_to,
          },
        };
      }

      let request = {
          announcement: this.announcement,
          date_from: this.date_from,
          date_to: this.date_to
        };

      axios
        .get("/controlescolar/solicitud/archives",{
          date_from: this.date_from,
          date_to: this.date_to
        })
        .then((response) => {
            console.log(response);
          this.dataLength = response.data.length; // cantidad de articulos
          this.$emit("archives-found", response.data); //actualiza archivos
        })
        .catch((error) => {
            console.log(error);
              Swal.fire({
              title: "Error al hacer busqueda",
              text: error.response.data,
              icon: "error",
            })
        });

      return false;
    },
  },
};
</script>