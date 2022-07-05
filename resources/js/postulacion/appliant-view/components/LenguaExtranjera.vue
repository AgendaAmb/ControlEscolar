<template >
  <details class="mb-2">
    <summary class="d-flex justify-content-start align-items-center my-2">
      <div class="col-3 col-md-6 ms-5">
        <h4 class="font-weight-bold">Idioma {{ index }}</h4>
      </div>
      <div class="col-8 col-md-3 col-sm-2"></div>

      <div class="col-1 col-md-3 col-sm-5">
        <button @click="eliminaIdioma" class="btn btn-danger" style="height: 35px; width: 100%">
          Eliminar Idioma
        </button>
      </div>
    </summary>
    <div class="row my-4 justify-content-center">
      <!-- Datos principales -->
      <div v-if="getImage() === true" class="form-group col-4 my-auto ">
        <img style="width: 80%; height: 80% !important" :src="flag_image" />
      </div>
     
      <div class="form-group col-md-8">
        <div class="row justify-content-end">
          <div class="form-group col-lg-6 col-md-11 d-none d-md-block">
            <label> Idioma: </label>
            <select v-model="Language" class="form-control" :class="{ 'is-invalid': 'language' in errores }">
              <option value="" selected>Escoge una opción</option>
              <option v-for="idioma in idiomas" :key="idioma" :value="idioma">
                {{ idioma }}
              </option>
            </select>

            <div v-if="'language' in errores" class="invalid-feedback">
              {{ errores.language }}
            </div>
          </div>

          <div class="form-group col-lg-6 col-md-11 d-none d-md-block">
            <label> Institución que otorgó el certificado: </label>
            <input v-model="Institution" type="text" class="form-control"
              :class="{ 'is-invalid': 'institution' in errores }" />

            <div v-if="'institution' in errores" class="invalid-feedback">
              {{ errores.institution }}
            </div>
          </div>

          <div v-if="isEnglish" class="form-group col-lg-6 col-md-11">
            <label> ¿Qué examen de inglés presentaste? </label>
            <select v-model="ExamPresented" class="form-control" @change="chooseExam"
              :class="{ 'is-invalid': 'exam_presented' in errores }">
              <option value="" selected>Escoge una opción</option>
              <option v-for="exam in examNames" :key="exam" :value="exam">
                {{ exam }}
              </option>
            </select>

            <div v-if="'exam_presented' in errores" class="invalid-feedback">
              {{ errores.exam_presented }}
            </div>
          </div>

          <div v-if="isEnglish" class="form-group col-lg-6 col-md-11">
            <label> Escoge un tipo de examen </label>

            <select v-model="KindOfExam" class="form-control" :class="{ 'is-invalid': 'exam_presented' in errores }">
              <option value="" selected>Escoge una opción</option>
              <option v-for="exam in kindOfExamNames" :key="exam" :value="exam">
                {{ exam }}
              </option>
            </select>

            <div v-if="'kind_of_exam' in errores" class="invalid-feedback">
              {{ errores.kind_of_exam }}
            </div>
          </div>

          <div class="form-group col-md-6">
            <label> Puntaje obtenido: </label>
            <input v-model.number="Score" type="number" class="form-control"
              :class="{ 'is-invalid': 'score' in errores }" />

            <div v-if="'score' in errores" class="invalid-feedback">
              {{ errores.score }}
            </div>
          </div>

          <div class="form-group col-md-6">
            <label> Fecha de aplicación: </label>
            <input v-model="PresentedAt" type="date" class="form-control"
              :class="{ 'is-invalid': 'presented_at' in errores }" />

            <div v-if="'presented_at' in errores" class="invalid-feedback">
              {{ errores.presented_at }}
            </div>
          </div>

          <div class="form-group d-none d-lg-block col-lg-6">
            <label> Vigencia desde: </label>
            <input v-model="ValidFrom" type="date" class="form-control"
              :class="{ 'is-invalid': 'valid_from' in errores }" />

            <div v-if="'valid_from' in errores" class="invalid-feedback">
              {{ errores.valid_from }}
            </div>
          </div>

          <div class="form-group d-none d-lg-block col-lg-6">
            <label> Hasta: </label>
            <input v-model="ValidTo" type="date" class="form-control"
              :class="{ 'is-invalid': 'valid_to' in errores }" />

            <div v-if="'valid_to' in errores" class="invalid-feedback">
              {{ errores.valid_to }}
            </div>
          </div>
        </div>
      </div>

      <div class="form-group d-lg-none col-md-6">
        <label> Vigencia desde: </label>
        <input v-model="ValidFrom" type="date" class="form-control"
          :class="{ 'is-invalid': 'valid_from' in errores }" />

        <div v-if="'valid_from' in errores" class="invalid-feedback">
          {{ errores.valid_from }}
        </div>
      </div>

      <div class="form-group d-lg-none col-md-6">
        <label> Hasta: </label>
        <input v-model="ValidTo" type="date" class="form-control" :class="{ 'is-invalid': 'valid_to' in errores }" />

        <div v-if="'valid_to' in errores" class="invalid-feedback">
          {{ errores.valid_to }}
        </div>
      </div>

      <div class="form-group col-md-6 col-lg-3">
        <label> Grado de dominio: </label>
        <input v-model="LanguageDomain" type="text" class="form-control"
          :class="{ 'is-invalid': 'language_domain' in errores }" />

        <div v-if="'language_domain' in errores" class="invalid-feedback">
          {{ errores.language_domain }}
        </div>
      </div>

      <div class="form-group col-md-6 col-lg-3">
        <label> Nivel conversacional: </label>
        <input v-model="ConversationalLevel" type="text" class="form-control"
          :class="{ 'is-invalid': 'writing_level' in errores }" />

        <div v-if="'conversational_level' in errores" class="invalid-feedback">
          {{ errores.conversational_level }}
        </div>
      </div>

      <div class="form-group col-md-6 col-lg-3">
        <label> Nivel de lectura: </label>
        <input v-model="ReadingLevel" type="text" class="form-control"
          :class="{ 'is-invalid': 'reading_level' in errores }" />

        <div v-if="'reading_level' in errores" class="invalid-feedback">
          {{ errores.reading_level }}
        </div>
      </div>

      <div class="form-group col-md-6 col-lg-3">
        <label> Nivel de escritura: </label>
        <input v-model="WritingLevel" type="text" class="form-control"
          :class="{ 'is-invalid': 'writing_level' in errores }" />
        <div v-if="'writing_level' in errores" class="invalid-feedback">
          {{ errores.writing_level }}
        </div>
      </div>

      <div class="d-flex justify-content-start mt-4 mb-0"  style="width:100%;">
        <div class="col-md-2 col-xs-3 align-items-center " style="width:100%; max-height: 45px !important;">
             <img  @click="actualizaLenguaExtranjera" :src="images_btn['guardar']" alt="" style=" max-height: 45px !important;">
          </div>
        <div class="col-md-10 col-xs-9 mx-3">
          <label>
            <strong>Nota: </strong>
            Para poder registrar los cambios en los campos anteriores del idioma
            correspondiente es necesario seleccionar el siguiente botón. <p><strong>Solo se guardara el Idioma actual.</strong></p>
          </label>
        </div>
      </div>


      <documento-requerido v-for="documento in Documentos" :key="documento.name" :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location" :errores.sync="documento.errores" :images_btn="images_btn"
        @enviaDocumento="cargaDocumento" v-bind="documento">
      </documento-requerido>
      <hr class="my-4 d-block" :style="ColorStrip" />
    </div>
    <hr class="d-block mb-1" :style="ColorStrip" />
  </details>
</template>


<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";
import InputSolicitud from "./InputSolicitud.vue";

export default {
  name: "lengua-extranjera",
  components: { DocumentoRequerido, InputSolicitud },
  props: {
    //Index
    index: Number,

    // Id.
    id: Number,

    images_btn: Array,

    // Id del expediente.
    archive_id: Number,

    // Estado del idioma.
    state: String,

    // Lengua extranjera.
    language: String,

    // Institución que otorgó el certificado.
    institution: String,

    // Puntaje de examen.
    score: Number,

    // Fecha de aplicación.
    presented_at: String,

    // Vigencia desde.
    valid_from: String,

    // Vigencia hasta.
    valid_to: String,

    // Dominio del idioma.
    language_domain: String,

    // Nivel conversacional.
    conversational_level: String,

    // Nivel de lectura.
    reading_level: String,

    // Nivel de escritura.
    writing_level: String,

    exam_presented: {
      type: String,
      default: "",
    },

    kind_of_exam: {
      type: String,
      default: "",
    },

    // Documentos probatorios.
    documentos: Array,
  },

  data() {
    return {
      flag_image: null,
      errores: {},
      mensajesExito: {},
      idiomas: ["Español", "Inglés", "Francés", "Alemán", "Otro"],
      examNames: ["TOEFL", "IELTS", "CAMBRIDGE"],
      kindOfExamNames: [],
      kindOfExamNames_TOEFL: ["ITP", "iBT"],
      kindOfExamNames_iELTS: ["IELTS Academic", "IELTS General"],
      kindOfExamNames_CAMBRIDGE: [
        "FIRST (FCE)",
        "ADVANCED (CAE)",
        "PROFICIENCY (CPE)",
      ],
      localLanguage: null,
      localExamenPresented: null,
      clases: {
        state: "form-control",
        language: "form-control",
        institution: "form-control",
        score: "form-control",
        presented_at: "form-control",
        valid_from: "form-control",
        valid_to: "form-control",
        language_domain: "form-control",
        conversational_level: "form-control",
        reading_level: "form-control",
        writing_level: "form-control",
        kind_of_exam: "form-control",
        exam_presented: "form-control",
      },
    };
  },

  computed: {
    KindOfExam: {
      get() {
        return this.kind_of_exam;
      },
      set(newVal) {
        this.$emit("update:kind_of_exam", newVal);
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
        if (this.localLanguage === null) {
          this.localLanguage = this.language;
        }
        return this.language;
      },
      set(newVal) {
        this.$emit("update:language", newVal);
        this.localLanguage = newVal;
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
    PresentedAt: {
      get() {
        return this.presented_at;
      },
      set(newVal) {
        this.$emit("update:presented_at", newVal);
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

    Documentos: {
      get() {
        return this.documentos;
      },
      set(newVal) {
        this.$emit("update:documentos", newVal);
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

    getImage() {

      // console.log(this.language);
      axios
        .get("/controlescolar/solicitud/getFlagImage", {
          params: {
            language: this.language,
          },
        })
        .then((response) => {
          // console.log("aaaaaaaaa" + response.data);
          this.flag_image = response.data;
          console.log(this.flag_image);
        })
        .catch((error) => {
          console.log(error);
        });

      return true;
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
      if (this.localLanguage.toString().localeCompare("Inglés")) {
        return true;
      }
      return false;
    },

    actualizaLenguaExtranjera(evento) {
      this.enviaLenguaExtranjera(evento, "Completo");
    },

    enviaLenguaExtranjera(evento, estado) {
      this.errores = {};
      console.log(this.kind_of_exam);
      axios
        .post("/controlescolar/solicitud/updateAppliantLanguage", {
          id: this.id,
          archive_id: this.archive_id,
          state: estado,
          language: this.language,
          institution: this.institution,
          score: this.score,
          presented_at: this.presented_at,
          valid_from: this.valid_from,
          valid_to: this.valid_to,
          language_domain: this.language_domain,
          conversational_level: this.conversational_level,
          reading_level: this.reading_level,
          writing_level: this.writing_level,
          kind_of_exam: this.kind_of_exam,
          exam_presented: this.exam_presented,
        })
        .then((response) => {
          // El resultado fue exitoso.
          Object.keys(response.data).forEach((dataKey) => {
            var event = "update:" + dataKey;
            this.$emit(event, response.data[dataKey]);
          });

          Swal.fire({
            title: "Los datos se han actualizado correctamente",
            text: "El idioma seleccionado se ha guardado, podras hacer cambios mientras la postulación este disponible",
            icon: "success",
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonColor: "#3085d6",
            cancelButtonText: "Continuar",
          });
        })
        .catch((error) => {
          Swal.fire({
            title: "Error al actualizar datos",
            text: error.response.data["message"],
            showCancelButton: false,
            icon: "error",
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

    cargaDocumento(requiredDocument, file) {
      var formData = new FormData();
      formData.append("id", this.id);
      formData.append("archive_id", this.archive_id);
      formData.append("requiredDocumentId", requiredDocument.id);
      formData.append("index", this.index);
      formData.append("file", file);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/updateAppliantLanguageRequiredDocument",
        data: formData,
        headers: {
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      })
        .then((response) => {
          requiredDocument.datosValidos.file = "¡Archivo subido exitosamente!";
          requiredDocument.Location = response.data.location;
        })
        .catch((error) => {
          console.log(error);
          var errores = error.response.data["errors"];
          requiredDocument.Errores = {
            file: "file" in errores ? errores.file[0] : null,
            id:
              "requiredDocumentId" in errores
                ? errores.requiredDocumentId[0]
                : null,
          };
        });
    },
  },
};
</script>