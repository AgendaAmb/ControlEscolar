<template>

  <details open>
    <summary class="btn row d-flex align-items-center justify-content-center my-2" :style="styleBtnAccordionSection">
      <div class="col-lg-8 col-md-6 col-xs-12">
        <b-icon icon="arrow-up" class="mx-2" font-scale="2.0"></b-icon>
        <span class="h5 font-weight-bold" style="width:auto!important;"> Working Experience {{ index }}</span>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-12">
        <b-button @click="eliminaExperienciaLaboral" pill class="d-flex justify-content-start align-items-center"
          style="height:45px!important" variant="danger">
          <b-icon icon="trash-fill" class="mx-2" font-scale="2.5"></b-icon>
          <p class="h5 my-2">Delete</p>
        </b-button>
      </div>
    </summary>
    <!-- Accordion -->
    <b-card-body>
      <!-- Content -->
      <div class="d-flex justify-content-start align-items-center my-2" style="width:100%;">
        <div class="col-12">
          <!-- First row FROM | TO | TYPE OF EXPERIENCE -->
          <div class="row my-2">

            <div class="form-group col-md-4">
              <label> From: </label>
              <input v-model="From" type="date" :class="classObjectFor('from')">
              <div v-if="estaEnError('from')" class="invalid-feedback">{{ errores.from }}</div>
            </div>

            <div class="form-group col-md-4">
              <label> To: </label>
              <input v-model="To" type="date" :class="classObjectFor('to')">
              <div v-if="estaEnError('to')" class="invalid-feedback">{{ errores.to }}</div>
            </div>

            <div class="form-group col-md-4">
              <label> Type of experience: </label>
              <input v-model="TypeOfExperience" type="text" :class="classObjectFor('type_of_experience')">
              <div v-if="estaEnError('type_of_experience')" class="invalid-feedback">{{ errores.type_of_experience }}
              </div>
            </div>

          </div>

          <!-- Position -->
          <div class="row my-2">
            <div class="form-group col-md-12">
              <label>Position: </label>
              <input v-model="WorkingPosition" type="text" :class="classObjectFor('working_position')">
              <div v-if="estaEnError('working_position_description')" class="invalid-feedback">{{
                  errores.working_position
              }}</div>
            </div>
          </div>

          <!-- Organization | Country -->
          <div class="row my-2">
            <div class="col-lg-8 col-sm-12">
              <label>Organization: </label>
              <input v-model="Organization" type="text" :class="classObjectFor('organization')">
              <div v-if="estaEnError('organization')" class="invalid-feedback">{{ errores.organization }}</div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <label> City/Country: </label>
              <select v-model="Country" class="form-control" @change="escogePais" >
                <option value="" selected>Choose a country</option>
                <option v-for="country in countries" :key="country.id" :value="country.name">
                  {{ country.name }}
                </option>
              </select>

              <div v-if="estaEnError('country')" class="invalid-feedback">
                {{ errores.country }}
              </div>
            </div>
          </div>

          <!-- Main responsabilities -->
          <div class="row my-2">
            <label>Main responsabilities: </label>
            <textarea class="form-control" rows="4" v-model="MainResponsabilities"
              placeholder="Detalla el por que se no se seleccionara al postulante ..." />
          </div>
        </div>

      </div>

      <!-- Save Content -->
      <div class="d-flex justify-content-start my-2" style="width:100%;">
        <div class="col-md-2 col-xs-3 align-items-center " style="width:100%; max-height: 45px !important;">
          <img @click="guardaExperienciaLaboral" :src="images_btn.guardar" alt="" style=" max-height: 45px !important;">
        </div>
        <div class="col-md-10 col-xs-9 mx-3">
          <label>
            <strong>Nota: </strong>
            Para poder registrar los cambios en los campos anteriores es necesario seleccionar el siguiente botón. <p>
              <strong>Solo se guardara la experiecia laboral actual</strong>
            </p>
          </label>
        </div>
      </div>
    </b-card-body>
  </details>
</template>


<script>
export default {
  name: "working-experience",

  props: {
    from: {
      type: Date,
      default: null,
    },

    to: {
      type: Date,
      default: null,
    },

    knowledge_area: {
      type: String,
      default: "",
    },

    working_position: {
      type: String,
      default: "",
    },

    institution: {
      type: String,
      default: "",
    },

    state: {
      type: String,
      default: "",
    },

    working_position_description: {
      type: String,
      default: "",
    },

    index: {
      type: Number, 
      default: 0,
    },

    images_btn: {
      type: Array,
      default: []
    }


  },

  data() {
    return {
      countries: [],
      errores: {}
    }
  },

  mounted: function () {
    this.$nextTick(function () {
      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
        .then((response) => {
          this.countries = response.data;
        });
    });
  },

  computed: {
    styleBtnAccordionSection() {
      var color = "rgba(0,96,175,255)";

      return {
        backgroundColor: color,
        color: 'rgb(244, 244, 244)',
        border: 'none',
        alignItems: 'center',
        width: '100%!important',
        display: 'flex'
      }
    },

    From: {
      get() {
        return this.from;
      },
      set(newVal) {
        this.$emit('update:from', newVal);
      }
    },

    To: {
      get() {
        return this.to;
      },
      set(newVal) {
        this.$emit('update:to', newVal);
      }
    },

    TypeOfExperience: {
      get() {
        return this.knowledge_area;
      },
      set(newVal) {
        this.$emit('update:knowledge_area', newVal);
      }
    },


    WorkingPosition: {
      get() {
        return this.working_position;
      },
      set(newVal) {
        this.$emit('update:working_position', newVal);
      }
    },

    Organization: {
      get() {
        return this.institution;
      },
      set(newVal) {
        this.$emit('update:institution', newVal);
      }
    },

    Country: {
      get() {
        return this.state;
      },
      set(newVal) {
        this.$emit('update:state', newVal);
      }
    },

    MainResponsabilities: {
      get() {
        return this.working_position_description;
      },
      set(newVal) {
        this.$emit('update:working_position_description', newVal);
      }
    },
  },

  // Methods
  methods: {

    escogePais(evento) {
      Vue.set(
        this,
        "states",
        this.countries[evento.target.selectedIndex - 1].states
      );
    },

    ColorStrip() {
      var color = "#FFFFFF";

      switch (this.academic_program.alias) {
        case "maestria":
          color = "#0598BC";
          break;
        case "doctorado":
          color = "#FECC50";
          break;
        case "enrem":
          color = "#FF384D";
          break;
        case "imarec":
          color = "#118943";
          break;
      }

      return {
        backgroundColor: color,
        height: "1px",
      };
    },

    guardaExperienciaLaboral(evento) {
      this.enviaExperienciaLaboral(evento, 'Completo');
    },

    eliminaExperienciaLaboral() {
      axios.post('/controlescolar/solicitud/deleteWorkingExperience', {
        id: this.id,
        archive_id: this.archive_id
      }).then(response => {

        //Llama al padre para que elimine el item de la lista de experiencia laboral
        this.$emit('delete-item', this.index - 1);

        Swal.fire({
          title: "Éxito al eliminar Experiencia laboral",
          text: response.data.message, // Imprime el mensaje del controlador
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Continuar",
        });

      }).catch(error => {
        Swal.fire({
          title: "Error al eliminar Experiencia laboral",
          showCancelButton: false,
          icon: "error",
        });
      });
    },

    enviaExperienciaLaboral(evento, estado) {
      this.errores = {};

      axios.post('/controlescolar/solicitud/updateWorkingExperience', {

        id: this.id,
        archive_id: this.archive_id,
        state: estado,
        institution: this.institution,
        working_position: this.working_position,
        from: this.from,
        to: this.to,
        knowledge_area: this.knowledge_area,
        field: this.field,
        working_position_description: this.working_position_description,
        achievements: this.achievements

      }).then(response => {
        this.State = response.data.state;
        this.Institution = response.data.institution;
        this.WorkingPosition = response.data.working_position;
        this.From = response.data.from;
        this.To = response.data.to;
        this.KnowledgeArea = response.data.knowledge_area;
        this.Field = response.data.field;
        this.working_position = response.data.working_position;

        Swal.fire({
          title: "Los datos se han actualizado correctamente",
          text: "La experiencia laboral seleccionada de tu expediente ha sido modificada, podras hacer cambios mientras la postulación este disponible",
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Continuar",
        });


      }).catch(error => {
        this.State = 'Incompleto';
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });

        Swal.fire({
          title: "Error al actualizar datos",
          text: error.response.data["message"],
          showCancelButton: false,
          icon: "error",
        });
      });
    },

    estaEnError(key) {
      return key in this.errores;
    },

    classObjectFor(key) {
      return {
        'form-control': true,
        'is-invalid': this.estaEnError(key)
      }
    }
  }
};
</script>