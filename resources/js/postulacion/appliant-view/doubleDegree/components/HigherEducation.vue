<template>
  <details open>
    <summary
      class="btn row d-flex align-items-center justify-content-center my-2"
      :style="styleBtnAccordionSection"
    >
      <div class="col-lg-8 col-md-6 col-xs-12">
        <b-icon icon="arrow-up" class="mx-2" font-scale="2.0"></b-icon>
        <span class="h5 font-weight-bold" style="width: auto !important"
          >Higher Education {{ index }}</span
        >
      </div>
      <div class="col-lg-2 col-md-4 col-sm-12">
        <b-button
          @click="eliminaHistorialAcademico"
          pill
          class="d-flex justify-content-start align-items-center"
          style="height: 45px !important"
          variant="danger"
        >
          <b-icon icon="trash-fill" class="mx-2" font-scale="2.5"></b-icon>
          <p class="h5 my-2">Delete</p>
        </b-button>
      </div>
    </summary>
    <!-- Accordion -->
    <b-card-body>
      <div class="form-group col-12 my-2">
        <div class="row my-1">
          <div class="form-group col-lg-4 col-sm-12">
            <label> Degree obtained: </label>
            <!-- Solo se podra seleccionar para doctorado -->
            <select v-model="DegreeType" class="form-control">
              <option value="" selected>Choose an option</option>
              <option
                v-for="escolaridad in escolaridades"
                :key="escolaridad"
                :value="escolaridad"
              >
                {{ escolaridad }}
              </option>
            </select>
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label> Date of award of degree: </label>
            <input
              v-model="DateOfAwardOfDegree"
              type="date"
              class="form-control"
            />
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label> Final grade average: </label>
            <input
              v-model="FinalGradeAverage"
              type="number"
              class="form-control"
            />
          </div>
        </div>

        <div class="row my-1">
          <div class="form-group col-md-12">
            <label> Exact Degree: </label>
            <input v-model="Degree" type="text" class="form-control" />

            <div v-if="estaEnError('degree')" class="invalid-feedback">
              {{ errores.degree_type }}
            </div>
          </div>
        </div>

        <div class="row my-1">
          <div class="form-group col-12">
            <label> Name of institution: </label>
            <!-- <select v-model="University" class="form-control">
                            <option value="" selected>Escoge una opción</option>
                            <option v-for="uni in universidades" :key="uni.id" :value="uni.name">
                                {{ uni.name }}
                            </option>
                        </select> -->

            <input v-model="University" type="text" class="form-control" />
          </div>
        </div>

        <div class="row my-1">
          <div class="form-group col-sm-12 col-lg-4">
            <label> City/Country: </label>
            <select v-model="Country" class="form-control" @change="escogePais">
              <option value="" selected>Choose a country</option>
              <option
                v-for="country in countries"
                :key="country.id"
                :value="country.name"
              >
                {{ country.name }}
              </option>
            </select>

            <div v-if="estaEnError('country')" class="invalid-feedback">
              {{ errores.country }}
            </div>
          </div>

          <div class="form-group col-sm-12 col-lg-4">
            <label> From: </label>
            <input v-model="From" type="date" class="form-control" />
          </div>

          <div class="form-group col-sm-12 col-lg-4">
            <label> To: </label>
            <input v-model="To" type="date" class="form-control" />
          </div>
        </div>

        <div class="row my-1">
          <div class="form-group col-12">
            <label> Graduation mode: </label>
            <select v-model="GraduationMode" class="form-control">
              <option value="" selected>Choose an option</option>
              <option v-for="gm in graduation_mode_list" :key="gm" :value="gm">
                {{ gm }}
              </option>
            </select>

            <div v-if="estaEnError('graduation_mode')" class="invalid-feedback">
              {{ errores.graduation_mode }}
            </div>
          </div>
        </div>

        <div class="row my-1">
          <div class="form-group col-12">
            <label> Fill according to your graduation: </label>
            <input
              v-model="FillAccordingGraduation"
              type="text"
              class="form-control"
            />
          </div>
        </div>

        <div class="row mt-1">
          <div class="col-12">
            <label class="h4"> Grading system at your University</label>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6 col-lg-4">
            <label> Minimum Score: </label>
            <input
              v-if="'min_avg' in errores"
              v-model.number="MinAvg"
              type="number"
              class="form-control is-invalid"
            />
            <input
              v-else
              v-model.number="MinAvg"
              type="number"
              class="form-control"
            />

            <div v-if="'min_avg' in errores" class="invalid-feedback">
              {{ errores.min_avg }}
            </div>
          </div>

          <div class="form-group col-md-6 col-lg-4">
            <label> Min passing Score </label>
            <input
              v-if="'average' in errores"
              v-model.number="MinPassScore"
              type="number"
              class="form-control is-invalid"
            />
            <input
              v-else
              v-model.number="MinPassScore"
              type="number"
              class="form-control"
            />

            <div v-if="'average' in errores" class="invalid-feedback">
              {{ errores.minPassScore }}
            </div>
          </div>

          <div class="form-group col-md-6 col-lg-4">
            <label> Maximum Score: </label>
            <input
              v-if="'max_avg' in errores"
              v-model.number="MaxAvg"
              type="number"
              class="form-control is-invalid"
            />
            <input
              v-else
              v-model.number="MaxAvg"
              type="number"
              class="form-control"
            />
            <div v-if="'max_avg' in errores" class="invalid-feedback">
              {{ errores.max_avg }}
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-start mt-0 mb-3" style="width: 100%">
        <div
          class="col-md-2 col-xs-3 align-items-center"
          style="width: 100%; max-height: 45px !important"
        >
          <button class="uaslp-btn" @click="updateHigherEducation">
            <span class="material-icons-outlined">save</span>
            <span>Guardar</span>
          </button>
          <!-- <img
            @click="updateHigherEducation"
            :src="images_btn.guardar"
            alt=""
            style="max-height: 45px !important"
          /> -->
        </div>
        <div class="col-md-10 col-xs-9 mx-3">
          <label>
            <strong>Note:That's only save higher education </strong>
          </label>
        </div>
      </div>
    </b-card-body>
  </details>
</template>

<script>
export default {
  name: "higher-education",

  props: {
    //Index de la escolaridad
    id: {
      type: Number,
      default: -1,
    },

    archive_id: {
      type: Number,
      default: -1,
    },

    index: Number,

    degree_type: {
      type: String,
      default: "",
    },

    // new
    date_of_award_of_degree: {
      type: String,
      default: null,
    },

    // new
    final_grade_average: {
      type: String,
      default: "",
    },

    to: {
      type: String,
      default: "",
    },

    from: {
      type: String,
      default: "",
    },

    degree: {
      type: String,
      default: "",
    },

    country: {
      type: String,
      default: "",
    },

    // new
    graduation_mode: {
      type: String,
      default: "",
    },

    university: {
      type: String,
      default: "",
    },
    // new

    fill_according_graduation: {
      type: String,
      default: "",
    },

    // Promedio obtenido.
    average: {
      type: Number,
      default: 0,
    },

    // Promedio obtenido.
    min_avg: {
      type: Number,
      default: 0,
    },

    // Promedio obtenido.
    max_avg: {
      type: Number,
      default: 0,
    },
  },

  data: function () {
    return {
      fechaobtencion: "",
      errores: {},
      datosValidos: {},
      images_btn: [],
      // degree_obtained: ['Bachelors Degree', 'Masters Degree', 'Diplom', 'Magister', 'Specialization'],
      universidades: [],
      escolaridades: [
        "Bachelor's Degree",
        "Master's Degree",
        "Diplom",
        "Magister",
        "Specialization",
      ],
      estatusEstudios_PMPCA: ["Grado obtenido", "Título o grado en proceso"],
      graduation_mode_list: [
        "Thesis Investigation - Thesis Title",
        "Graduation Courses & Examination - Courses Underta",
        "Practical Work - Field & Institution",
      ],
      estatusEstudios_otros: [
        "Pasante",
        "Grado obtenido",
        "Título o grado en proceso",
      ],

      countries: [],
    };
  },

  computed: {
    styleBtnAccordionSection() {
      var color = "rgba(0,96,175,255)";

      return {
        backgroundColor: color,
        color: "rgb(244, 244, 244)",
        border: "none",
        alignItems: "center",
        width: "100%!important",
        display: "flex",
      };
    },

    ColorStrip() {
      var color = "#FFFFFF";

      switch (this.alias_academic_program) {
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

    Universidades: {
      get: function () {
        let selected_pais = this.country;
        let unis = this.universidades;
        let mispaises = this.countries;
        if (unis === null && selected_pais != null) {
          mispaises.forEach(function (pais, indice, array) {
            if (selected_pais.localeCompare(pais.name.toString()) === 0) {
              unis = pais.universities;
            }
          });
          if (unis != null) {
            // this.universidades = unis;
          }
        }
        return unis;
      },
      set: function (value) {
        this.$emit("update:universidades", value);
      },
    },

    University: {
      get() {
        return this.university;
      },
      set(newVal) {
        this.$emit("update:university", newVal);
      },
    },

    DegreeType: {
      get() {
        return this.degree_type;
      },
      set(newVal) {
        this.$emit("update:degree_type", newVal);
      },
    },

    DateOfAwardOfDegree: {
      get() {
        return this.date_of_award_of_degree;
      },
      set(newVal) {
        this.$emit("update:date_of_award_of_degree", newVal);
      },
    },

    FinalGradeAverage: {
      get() {
        return this.final_grade_average;
      },
      set(newVal) {
        this.$emit("update:final_grade_average", newVal);
      },
    },

    To: {
      get() {
        return this.to;
      },
      set(newVal) {
        this.$emit("update:to", newVal);
      },
    },

    From: {
      get() {
        return this.from;
      },
      set(newVal) {
        this.$emit("update:from", newVal);
      },
    },

    Degree: {
      get() {
        return this.degree;
      },
      set(newVal) {
        this.$emit("update:degree", newVal);
      },
    },

    Country: {
      get() {
        return this.country;
      },
      set(newVal) {
        this.$emit("update:country", newVal);
      },
    },

    GraduationMode: {
      get() {
        return this.graduation_mode;
      },
      set(newVal) {
        this.$emit("update:graduation_mode", newVal);
      },
    },

    FillAccordingGraduation: {
      get() {
        return this.fill_according_graduation;
      },
      set(newVal) {
        this.$emit("update:fill_according_graduation", newVal);
      },
    },

    MinAvg: {
      get() {
        return this.min_avg;
      },
      set(newVal) {
        delete this.errores["average"];

        if (isNaN(newVal)) {
          this.errores["min_avg"] =
            "La calificación mínima solo puede ser numérica";
          this.$emit("update:average", 0);
          return;
        }

        this.$emit("update:min_avg", newVal);
      },
    },

    Average: {
      get() {
        return this.average;
      },
      set(newVal) {
        delete this.errores["average"];

        if (isNaN(newVal)) {
          this.errores["average"] =
            "La calificación mínima solo puede ser numérica";
          this.$emit("update:average", 0);
          return;
        }

        this.$emit("update:average", newVal);
      },
    },

    MinPassScore: {
      get() {
        return this.average;
      },
      set(newVal) {
        delete this.errores["average"];

        if (isNaN(newVal)) {
          this.errores["average"] =
            "La calificación mínima solo puede ser numérica";
          this.$emit("update:average", 0);
          return;
        }

        this.$emit("update:average", newVal);
      },
    },

    MaxAvg: {
      get() {
        return this.max_avg;
      },
      set(newVal) {
        delete this.errores["max_avg"];

        if (isNaN(newVal)) {
          this.errores["max_avg"] =
            "La calificación máxima solo puede ser numérica";
          this.$emit("update:max_avg", 0);
          return;
        }

        this.$emit("update:max_avg", newVal);
      },
    },
  },

  created() {
    // console.log(this.language);

    axios
      .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
      .then((response) => {
        this.countries = response.data;
      });

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

    if (this.country != null) {
      this.countries.forEach(function (pais, indice, array) {
        if (this.country === pais.name) {
          Vue.set(this, "universidades", pais.universities);
        }
      });
    }
  },

  methods: {
    eliminaHistorialAcademico() {
      axios
        .post("/controlescolar/solicitud/deleteAcademicDegree", {
          id: this.id,
          archive_id: this.archive_id,
        })
        .then((response) => {
          //Llama al padre para que elimine el item de la lista de experiencia laboral
          this.$emit("delete-item", this.index - 1);
          Swal.fire({
            title: "Éxito al eliminar registro",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });
        })
        .catch((error) => {
          Swal.fire({
            title: "Error al eliminar registro",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    escogePais(evento) {
      Vue.set(
        this,
        "universidades",
        this.countries[evento.target.selectedIndex - 1].universities
      );
    },

    updateHigherEducation() {
      axios
        .post("/controlescolar/solicitud/enrem/higherEducation/update", {
          id: this.id,
          archive_id: this.archive_id,
          degree_type: this.degree_type,
          degree: this.degree,
          to: this.to,
          from: this.from,
          date_of_award_of_degree: this.date_of_award_of_degree,
          final_grade_average: this.final_grade_average,
          university: this.university,
          country: this.country,
          graduation_mode: this.graduation_mode,
          fill_according_graduation: this.fill_according_graduation,
          average: this.average,
          min_avg: this.min_avg,
          max_avg: this.max_avg,
        })
        .then((response) => {
          Swal.fire({
            title: response.data.message,
            icon: "success",
            text: "Continue filling others sections",
            showCancelButton: false,
          });
        })
        .catch((error) => {
          Swal.fire({
            title: "Error trying to save information",
            icon: "error",
            text: "Try later",
            showCancelButton: false,
          });
        });
    },

    estaEnError(key) {
      return key in this.errores;
    },

    objectForError(key) {
      return {
        "is-invalid": this.estaEnError(key),
      };
    },
  },
};
</script>
