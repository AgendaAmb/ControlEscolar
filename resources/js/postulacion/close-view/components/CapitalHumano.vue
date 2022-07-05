<template>
  <details>
    <summary class="d-flex justify-content-start align-items-center my-2">
      <div class="col-12">
        <h5 class="font-weight-bold">Capital Humano {{ index + 1 }}</h5>
      </div>
    </summary>

    <div class="row mx-2">
      <div class="form-group col-md-4">
        <label> Nombre del curso: </label>
        <input
          type="text"
          class="form-control"
          v-model="CourseName"
          :readonly="true"
        />
      </div>

      <div class="form-group col-md-4">
        <label> Fecha: </label>
        <input
          type="date"
          class="form-control"
          v-model="AssistedAt"
          :readonly="true"
        />
      </div>

      <div class="form-group col-md-4">
        <label> Nivel de escolaridad: </label>
        <input
          type="text"
          class="form-control"
          v-model="ScolarshipLevel"
          :readonly="true"
        />
      </div>
      <hr class="d-block" :style="ColorStrip" />
    </div>
  </details>
</template>


<script>
export default {
  name: "capital-humano",

  props: {
    // id del capital humano.
    id: Number,

    images_btn:Array,

    //Index
    index: Number,

    // id del expediente.
    archive_id: Number,

    // Estado de control.
    state: String,

    // Nombre del curso.
    course_name: String,

    // Fecha del curso.
    assisted_at: String,

    // Nivel de escolaridad.
    scolarship_level: String,
  },

  data() {
    return {
      errores: {},
    };
  },

  computed: {
    CourseName: {
      get() {
        return this.course_name;
      },
      set(newVal) {
        this.$emit("update:course_name", newVal);
      },
    },
    AssistedAt: {
      get() {
        return this.assisted_at;
      },
      set(newVal) {
        this.$emit("update:assisted_at", newVal);
      },
    },
    ScolarshipLevel: {
      get() {
        return this.scolarship_level;
      },
      set(newVal) {
        this.$emit("update:scolarship_level", newVal);
      },
    },
  },

  methods: {
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

    guardaCapitalHumano(evento) {
      this.enviaCapitalHumano(evento, "Completo");
    },

    enviaCapitalHumano(evento, estado) {
      this.errores = {};

      axios
        .post("/controlescolar/solicitud/updateHumanCapital", {
          id: this.id,
          archive_id: this.archive_id,
          state: estado,
          course_name: this.course_name,
          assisted_at: this.assisted_at,
          scolarship_level: this.scolarship_level,
        })
        .then((response) => {
          Object.keys(response.data).forEach((dataKey) => {
            var event = "update:" + dataKey;
            this.$emit(event, response.data[dataKey]);
          });
        })
        .catch((error) => {
          this.State = "Incompleto";
          var errores = error.response.data["errors"];

          Object.keys(errores).forEach((key) => {
            Vue.set(this.errores, key, errores[key][0]);
          });
        });
    },
  },

  eliminaCapitalHumano() {
    axios
      .post("/controlescolar/solicitud/deleteHumanCapital", {
        id: this.id,
        archive_id: this.archive_id,
      })
      .then((response) => {
        //Llama al padre para que elimine el item de la lista de experiencia laboral
        this.$emit("delete-item", this.index - 1);

        Swal.fire({
          title: "Éxito al eliminar Capital Humano",
          text: response.data.message, // Imprime el mensaje del controlador
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Continuar",
        });
      })
      .catch((error) => {
        Swal.fire({
          title: "Error al eliminar Capital Humano",
          showCancelButton: false,
          icon: "error",
        });
      });
  },
};
</script>