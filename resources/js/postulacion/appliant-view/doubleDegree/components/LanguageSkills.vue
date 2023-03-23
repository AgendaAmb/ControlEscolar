<template>
  <details open>
    <summary
      class="btn row d-flex align-items-center justify-content-center my-2"
      :style="styleBtnAccordionSection"
    >
      <div class="col-lg-9 col-sm-6">
        <b-icon icon="arrow-up" class="mx-2" font-scale="2.0"></b-icon>
        <span class="h5 font-weight-bold" style="width: auto !important"
          >Language Skills {{ index + 1 }}</span
        >
      </div>
      <div class="col-lg-3 col-sm-6">
        <button class="uaslp-btn uaslp-red" @click="eliminaIdioma">
          <span class="material-icons">delete_forever</span>
          <span>Delete</span>
        </button>
        <!-- <b-button
          @click="eliminaIdioma"
          pill
          class="d-flex justify-content-start align-items-center"
          style="height: 45px !important"
          variant="danger"
        >
          <b-icon icon="trash-fill" class="mx-2" font-scale="2.5"></b-icon>
          <p class="h5 my-2">Eliminar</p>
        </b-button> -->
      </div>
    </summary>
    <b-card-body>
      <div class="form-group col-12 my-2">
        <!-- Kind of languages -->
        <div class="row my-1">
          <div class="col-12">
            <label>Language</label>
            <select v-model="Language" class="form-control">
              <option value="" selected>Choose an option</option>
              <option v-for="lan in listOfLanguages" :key="lan" :value="lan">
                {{ lan }}
              </option>
            </select>
          </div>
        </div>

        <!-- English -->
        <div v-if="selectedIsEnglish() === true" class="row my-2">
          <div class="col-12">
            <label class="h4">English Profiency Examination</label>
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label>Exam Presented</label>
            <!-- Solo se podra seleccionar para doctorado -->
            <select
              v-model="ExamPresented"
              class="form-control"
              @change="putTypesExam"
            >
              <option value="" selected>Choose an option</option>
              <option
                v-for="exName in listExamNames"
                :key="exName"
                :value="exName"
              >
                {{ exName }}
              </option>
            </select>
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label>Type</label>
            <!-- Solo se podra seleccionar para doctorado -->
            <select v-model="KindOfExam" class="form-control">
              <option value="" selected>Choose an option</option>
              <option
                v-for="typeExName in kindsOfExamsGeneral"
                :key="typeExName"
                :value="typeExName"
              >
                {{ typeExName }}
              </option>
            </select>
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label> Date of exam: </label>
            <input v-model="PresentedAt" type="date" class="form-control" />
          </div>
        </div>

        <!-- Spanish -->
        <div v-else-if="selectedIsSpanish() === true" class="row my-2">
          <div class="col-12">
            <label class="h4"
              >Spanish Proficiency (for non-native Spanish speaking
              Appliants)</label
            >
          </div>
          <div class="form-group col-lg-8 col-sm-6">
            <label>Learning method</label>
            <!-- Solo se podra seleccionar para doctorado -->
            <select v-model="LearningMethod" class="form-control">
              <option value="" selected>Choose an option</option>
              <option
                v-for="lm in listLearningMethodSpanish"
                :key="lm"
                :value="lm"
              >
                {{ lm }}
              </option>
            </select>
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label> Duration in months: </label>
            <input
              v-model.number="DurationInMonths"
              type="number"
              class="form-control"
            />
          </div>
        </div>

        <div v-else class="row my-2">
          <div class="col-12">
            <label class="h4"
              >German Proficiency (for non German Appliant)</label
            >
          </div>
          <div class="form-group col-lg-8 col-sm-6">
            <label>Learning method</label>
            <!-- Solo se podra seleccionar para doctorado -->
            <select v-model="LearningMethod" class="form-control">
              <option value="" selected>Choose an option</option>
              <option
                v-for="lm in listLearningMethodGerman"
                :key="lm"
                :value="lm"
              >
                {{ lm }}
              </option>
            </select>
          </div>

          <div class="form-group col-lg-4 col-sm-6">
            <label> Duration in months: </label>
            <input
              v-model.number="DurationInMonths"
              type="number"
              class="form-control"
            />
          </div>
        </div>

        <div class="row my-2">
          <div class="col-lg-8 col-sm-12">
            <label>Country: </label>
            <select v-model="Country" class="form-control">
              <option value="" selected>Choose a country</option>
              <option
                v-for="country in countries"
                :key="country.id"
                :value="country.name"
              >
                {{ country.name }}
              </option>
            </select>
          </div>

          <div class="col-lg-4 col-sm-12">
            <label> Overall grade/score: </label>
            <input
              v-model="OveralGradeScore"
              type="number"
              class="form-control"
            />
          </div>
        </div>

        <div class="row my-2">
          <div class="col-12">
            <label for="" class="h4">Grade, Levels</label>
          </div>
          <div class="col-lg-3 col-sm-6">
            <label> Reading</label>
            <input v-model="ReadingLevel" type="text" class="form-control" />
          </div>

          <div class="col-lg-3 col-sm-6">
            <label> Comprehension</label>
            <input v-model="LanguageDomain" type="text" class="form-control" />
          </div>

          <div class="col-lg-3 col-sm-6">
            <label> Writing</label>
            <input v-model="WritingLevel" type="text" class="form-control" />
          </div>

          <div class="col-lg-3 col-sm-6">
            <label> Speaking</label>
            <input
              v-model="ConversationalLevel"
              type="text"
              class="form-control"
            />
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row justify-content-center my-4">
          <div class="col-lg-2 col-sm-4 align-items-center">
            <button class="uaslp-btn" @click="updateLanguageSkills">
              <span class="material-icons-outlined">save</span>
              <span>Guardar</span>
            </button>
            <!-- <img @click="updateLanguageSkills" :src="images_btn.guardar" alt=""
                            style=" max-height: 45px !important;"> -->
          </div>
          <div class="col-lg-10 col-sm-8">
            <label>
              <p class="h5"><strong>This only save Language</strong></p>
            </label>
          </div>
        </div>
      </div>
    </b-card-body>
  </details>
</template>

<script>
export default {
  name: "lenguage-skills",
  props: {
    //Index
    index: Number,
    // Id.
    id: Number,
    // Id del expediente.
    archive_id: Number,

    language: {
      type: String,
      default: "",
    },

    exam_presented: {
      type: String,
      default: "",
    },

    kind_of_exam: {
      type: String,
      default: "",
    },

    presented_at: {
      type: String,
      default: null,
    },

    // Dominio del idioma.
    language_domain: String,

    // Nivel conversacional.
    conversational_level: String,

    // Nivel de lectura.
    reading_level: String,

    // Nivel de escritura.
    writing_level: String,

    // news
    learning_method: {
      type: String,
      default: "",
    },

    duration_in_months: {
      type: Number,
      default: 0,
    },

    country: {
      type: String,
      default: "",
    },

    overal_grade_score: {
      type: String,
      default: "",
    },
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

  data() {
    return {
      countries: [],
      errores: {},
      idiomas: ["Español", "Inglés", "Francés", "Alemán", "Otro"],
      listExamNames: ["TOEFL", "IELTS", "CAMBRIDGE"],
      kindsOfExamsGeneral: [
        "IBT",
        "IELTS",
        "FIRST (FCE)",
        "ADVANCED (CAE)",
        "PROFIENCY (CFE)",
      ],
      listLearningMethodSpanish: [
        "DELE exam",
        "Language School - Courses",
        "Semester Abroad in a Spanish Speaking Country",
        "Language Courses in School",
        "Language Courses at the University",
        "Lived in a Spanish Speaking Country",
      ],
      listLearningMethodGerman: [
        "Exam",
        "Semester Abroad in Germany",
        "Language Courses",
      ],
      listOfLanguages: ["English", "Spanish", "German", "Other"],
      kindOfExamNames_TOEFL: ["ITP", "iBT"],
      kindOfExamNames_iELTS: ["IELTS Academic", "IELTS General"],
      kindOfExamNames_CAMBRIDGE: [
        "FIRST (FCE)",
        "ADVANCED (CAE)",
        "PROFICIENCY (CPE)",
      ],
      localLanguage: null,
      images_btn: [],
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

    LearningMethod: {
      get() {
        return this.learning_method;
      },
      set(newVal) {
        this.$emit("update:learning_method", newVal);
      },
    },

    OveralGradeScore: {
      get() {
        return this.overal_grade_score;
      },
      set(newVal) {
        this.$emit("update:overal_grade_score", newVal);
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

    PresentedAt: {
      get() {
        return this.presented_at;
      },
      set(newVal) {
        this.$emit("update:presented_at", newVal);
      },
    },

    KindOfExam: {
      get() {
        return this.kind_of_exam;
      },
      set(newVal) {
        this.$emit("update:kind_of_exam", newVal);
      },
    },

    DurationInMonths: {
      get() {
        return this.duration_in_months;
      },
      set(newVal) {
        this.$emit("update:duration_in_months", newVal);
      },
    },

    StatusCheckBox: {
      get() {
        return this.status_checkBox;
      },
      set(newVal) {
        this.$emit("update:status_checkBox", newVal);
      },
    },

    ExamPresented: {
      get() {
        switch (this.exam_presented) {
          case "TOEFL":
            this.kindOfExamNames = this.kindOfExamNames_TOEFL;
            break;
          case "IELTS":
            this.kindOfExamNames = this.kindOfExamNames_iELTS;
            break;
          case "CAMBRIDGE":
            this.kindOfExamNames = this.kindOfExamNames_CAMBRIDGE;
            break;
        }
        return this.exam_presented;
      },
      set(newVal) {
        this.$emit("update:exam_presented", newVal);
      },
    },

    State: {
      get() {
        return this.state;
      },
      set(newVal) {
        this.$emit("update:state", newVal);
      },
    },
    Language: {
      get() {
        return this.language;
      },
      set(newVal) {
        this.$emit("update:language", newVal);
      },
    },
    Institution: {
      get() {
        return this.institution;
      },
      set(newVal) {
        this.$emit("update:institution", newVal);
      },
    },
    Score: {
      get() {
        return this.score;
      },
      set(newVal) {
        this.$emit("update:score", newVal);
      },
    },

    ValidFrom: {
      get() {
        return this.valid_from;
      },
      set(newVal) {
        this.$emit("update:valid_from", newVal);
      },
    },
    ValidTo: {
      get() {
        return this.valid_to;
      },
      set(newVal) {
        this.$emit("update:valid_to", newVal);
      },
    },
    LanguageDomain: {
      get() {
        return this.language_domain;
      },
      set(newVal) {
        this.$emit("update:language_domain", newVal);
      },
    },
    ConversationalLevel: {
      get() {
        return this.conversational_level;
      },
      set(newVal) {
        this.$emit("update:conversational_level", newVal);
      },
    },
    ReadingLevel: {
      get() {
        return this.reading_level;
      },
      set(newVal) {
        this.$emit("update:reading_level", newVal);
      },
    },
    WritingLevel: {
      get() {
        return this.writing_level;
      },
      set(newVal) {
        this.$emit("update:writing_level", newVal);
      },
    },
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
    putTypesExam(evento) {
      switch (this.listExamNames[evento.target.selectedIndex - 1]) {
        case "TOEFL":
          this.kindsOfExamsGeneral = ["IBT"];
          break;
        case "IELTS":
          this.kindsOfExamsGeneral = ["IELTS academic"];
          break;
        case "CAMBRIDGE":
          this.kindsOfExamsGeneral = [
            "FIRST (FCE)",
            "ADVANCED (CAE)",
            "PROFIENCY (CFE)",
          ];
          break;
      }
    },

    escogePais(evento) {
      Vue.set(
        this,
        "universidades",
        this.countries[evento.target.selectedIndex - 1].universities
      );
    },

    selectedIsSpanish() {
      if (this.language === "Spanish") {
        return true;
      }
      return false;
    },

    selectedIsGerman() {
      if (this.language === "German") {
        return true;
      }
      return false;
    },

    selectedIsEnglish() {
      if (this.language === "English") {
        return true;
      }
      return false;
    },

    chooseExam(evento) {
      let examSelected = this.examNames[evento.target.selectedIndex - 1];
      switch (examSelected) {
        case "TOEFL":
          this.kindOfExamNames = this.kindOfExamNames_TOEFL;
          break;
        case "IELTS":
          this.kindOfExamNames = this.kindOfExamNames_iELTS;
          break;
        case "CAMBRIDGE":
          this.kindOfExamNames = this.kindOfExamNames_CAMBRIDGE;
          break;
      }
    },

    isEnglish() {
      if (this.localLanguage != null) {
        if (this.localLanguage.toString().localeCompare("Inglés") == 0) {
          return true;
        }
      }
      return false;
    },

    updateLanguageSkills() {
      axios
        .post("/controlescolar/solicitud/enrem/languageSkills/update", {
          id: this.id,
          archive_id: this.archive_id,
          language: this.language,
          exam_presented: this.exam_presented,
          kind_of_exam: this.kind_of_exam,
          date_of_exam: this.date_of_exam,
          learning_method: this.learning_method,
          country: this.country,
          duration_in_months: this.duration_in_months,
          overal_grade_score: this.overal_grade_score,
          language_domain: this.language_domain,
          conversational_level: this.conversational_level,
          reading_level: this.reading_level,
          writing_level: this.writing_level,
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

    eliminaIdioma() {
      axios
        .post("/controlescolar/solicitud/deleteAppliantLanguage", {
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
  },
};
</script>
