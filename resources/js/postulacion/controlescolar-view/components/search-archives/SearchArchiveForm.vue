<template>
  <form @submit.prevent="buscaExpedientes" class="d-block">
    <div class="row mx-1">
      <div class="form-group col-6">
        <label> <strong> Programa académico </strong> </label>
        <select v-model="AcademicProgramSelect" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option
            v-for="(academicProgram,index) in academic_programs"
            :key="index"
            :value="academicProgram.name"
          >
            {{ academicProgram.name }}
          </option>
        </select>
      </div>
      <!-- 
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
      </div> -->

      <div class="form-group col-6">
        <label> <strong> Periodo </strong> </label>
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
      default: [],
    },

    announcements: {
      type: Array,
      default: [],
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
        this.academic_programs_for_periods = [];
         this.announcementsForAcademicProgram = [];
        this.academic_program_selected = newVal;

        this.announcements.forEach((element) => {
        
          if (newVal === element.name) {
            
             console.log('newVal: ' + newVal);
               console.log('academicProgram: ' + element.name);
            this.announcementsForAcademicProgram.push(element);
          }
        });
      },
    },
  },

  methods: {
    buscaExpedientes() {
      //Datos no completos para hacer busqueda
      if (
        this.announcement_selected == null ||
        this.academic_program_selected == null
      ) {
        Swal.fire({
          title: "Error al hacer busqueda",
          text: "Alguno de los campos falta por completar, ingresa fecha y programa academico",
          icon: "error",
        });
      } else {
        //Se hace la busqueda
        axios
          .get("/controlescolar/solicitud/archives", {
            params: {
              "announcement_id": this.announcement_selected,
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