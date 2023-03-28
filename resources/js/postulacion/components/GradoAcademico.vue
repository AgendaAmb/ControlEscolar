<template>
  <details open class="c-center-nch">
    <summary
      class="btn row d-flex align-items-center justify-content-center my-2"
      :style="styleBtnAccordionSection"
    >
      <div class="col-lg-8 col-md-6 col-xs-12">
        <b-icon icon="arrow-up" class="mx-2" font-scale="2.0"></b-icon>
        <span class="h5 font-weight-bold" style="width: auto !important"
          >Nivel de escolaridad {{ index }}</span
        >
      </div>
      <div class="col-lg-2 col-md-4 col-sm-12">
        <button class="uaslp-btn uaslp-red" @click="eliminaHistorialAcademico">
          <span class="material-icons">delete_forever</span>
          <span>Eliminar</span>
        </button>
      </div>
    </summary>
    <!-- Accordion -->
    <b-card-body>
      <div class="d-flex align-items-center my-2">
        <div class="col-md-1 col-sm-1 text-center">
          <b-form-checkbox
            style="transform: scale(1.75)"
            v-model="StatusCheckBox"
          ></b-form-checkbox>
        </div>
        <div class="form-group col-md-11 col-sm-11">
          <!-- 
        Datos generales del estatus de estudio.
        Grado, título, etc.
      -->
          <div class="row">
            <div
              v-if="alias_academic_program == 'doctorado'"
              class="form-group col-md-6 col-lg-4"
            >
              <label> Nivel de escolaridad: </label>
              <!-- Solo se podra seleccionar para doctorado -->
              <select
                v-model="DegreeType"
                class="form-control"
                :class="objectForError('degree_type')"
              >
                <option value="" selected>Escoge una opción</option>
                <option
                  v-for="escolaridad in escolaridades"
                  :key="escolaridad"
                  :value="escolaridad"
                >
                  {{ escolaridad }}
                </option>
              </select>
              <div v-if="estaEnError('degree_type')" class="invalid-feedback">
                {{ errores.degree_type }}
              </div>
            </div>

            <div v-else class="form-group col-md-6 col-lg-4">
              <label> Nivel de escolaridad: </label>
              <!-- Solo se podra seleccionar para doctorado -->
              <select
                v-model="DegreeType"
                class="form-control"
                :class="objectForError('degree_type')"
              >
                <option value="Licenciatura" selected>Licenciatura</option>
              </select>
              <div v-if="estaEnError('degree_type')" class="invalid-feedback">
                {{ errores.degree_type }}
              </div>
            </div>

            <div class="form-group col-md-6 col-lg-4">
              <label> Título obtenido: </label>
              <input
                v-model="Degree"
                type="text"
                class="form-control"
                :class="objectForError('degree')"
              />

              <div v-if="estaEnError('degree')" class="invalid-feedback">
                {{ errores.degree_type }}
              </div>
            </div>

            <div
              v-if="alias_academic_program == 'imarec'"
              class="d-none d-lg-block form-group col-lg-4"
            >
              <label> Estatus: </label>
              <select
                v-model="Status"
                class="form-control"
                :class="objectForError('status')"
              >
                <option value="" selected>Escoge una opción</option>
                <option
                  v-for="estatusEstudio in estatusEstudios_otros"
                  :key="estatusEstudio"
                  :value="estatusEstudio"
                >
                  {{ estatusEstudio }}
                </option>
              </select>

              <div v-if="estaEnError('status')" class="invalid-feedback">
                {{ errores.status }}
              </div>
            </div>

            <div v-else class="d-none d-lg-block form-group col-lg-4">
              <label> Estatus: </label>
              <select
                v-model="Status"
                class="form-control"
                :class="objectForError('status')"
              >
                <option value="" selected>Escoge una opción</option>
                <option
                  v-for="estatusEstudio in estatusEstudios_PMPCA"
                  :key="estatusEstudio"
                  :value="estatusEstudio"
                >
                  {{ estatusEstudio }}
                </option>
              </select>

              <div v-if="estaEnError('status')" class="invalid-feedback">
                {{ errores.status }}
              </div>
            </div>
          </div>

          <!-- 
        País de estudios y universidad 
      -->
          <div class="row">
            <div class="form-group col-lg-6">
              <label> País donde realizaste tus estudios: </label>
              <select
                v-model="Country"
                class="form-control"
                @change="escogePais"
                :class="objectForError('country')"
              >
                <option value="" selected>Escoge una opción</option>
                <option
                  v-for="PaisEstudio in paises"
                  :key="PaisEstudio.id"
                  :value="PaisEstudio.name"
                >
                  {{ PaisEstudio.name }}
                </option>
              </select>

              <div v-if="estaEnError('country')" class="invalid-feedback">
                {{ errores.country }}
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label> Universidad de estudios: </label>
              <select
                v-model="University"
                class="form-control"
                :class="objectForError('university')"
              >
                <option value="" selected>Escoge una opción</option>
                <option
                  v-for="Universidad in Universidades"
                  :key="Universidad.id"
                  :value="Universidad.name"
                >
                  {{ Universidad.name }}
                </option>
              </select>

              <div v-if="estaEnError('university')" class="invalid-feedback">
                {{ errores.university }}
              </div>
            </div>
          </div>

          <!-- 
        Datos de obtención de grado/pasantía.
      -->
          <div class="row" v-if="Status !== ''">
            <div v-if="Status === 'Grado obtenido'" class="form-group col-md-6">
              <label> Número de cédula: </label>
              <input v-model.number="Cedula" class="form-control" />
            </div>

            <div v-if="Status === 'Grado obtenido'" class="form-group col-md-6">
              <label> Fecha de titulación: </label>
              <input v-model="TitrationDate" type="date" class="form-control" />
            </div>

            <div v-if="Status === 'Pasante'" class="form-group col-md-6">
              <label> Fecha de obtención de pasantía: </label>
              <input v-model="TitrationDate" type="date" class="form-control" />
            </div>

            <div
              v-if="Status === 'Título o grado en proceso'"
              class="form-group col-md-6"
            >
              <label> Fecha de presentación de examen: </label>
              <input v-model="TitrationDate" type="date" class="form-control" />
            </div>
          </div>
          <!-- 
        Pedir CVU, solo en Doctorado
      -->

          <div class="row" v-if="degree_type === 'Maestría'">
            <div class="form-group col-md-4">
              <label> Número de CVU CONACYT: </label>
              <input v-model.number="CVU" type="number" class="form-control" />
            </div>

            <div class="form-group col-md-4">
              <label> ¿Cuentas con una carta de reconocimiento? </label>
              <select v-model="KnowledgeCard" class="form-control">
                <option value="" selected>Escoge una opción</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label> ¿Cuentas con tu firma electrónica del CONACYT? </label>
              <select v-model="DigitalSignature" class="form-control">
                <option value="" selected>Escoge una opción</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
          <!-- 
        Promedio del postulante
      -->
          <div class="row">
            <div class="form-group col-md-6 col-lg-4">
              <label> Promedio obtenido: </label>
              <input
                v-if="'average' in errores"
                v-model.number="Average"
                type="number"
                class="form-control is-invalid"
              />
              <input
                v-else
                v-model.number="Average"
                type="number"
                class="form-control"
              />

              <div v-if="'average' in errores" class="invalid-feedback">
                {{ errores.average }}
              </div>
            </div>

            <div class="form-group col-md-6 col-lg-4">
              <label> Calificación mínima: </label>
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
              <label> Calificación máxima: </label>
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
      </div>

      <div class="d-flex justify-content-start mt-0 mb-3" style="width: 100%">
        <div
          class="col-md-2 col-xs-3 align-items-center"
          style="width: 100%; max-height: 45px !important"
        >
          <button class="uaslp-btn" @click="actualizaHistorialAcademico">
            <span class="material-icons">delete_forever</span>
            <span>Eliminar</span>
          </button>
        </div>
        <div class="col-md-10 col-xs-9 mx-3">
          <label>
            <strong>Nota: </strong>
            Para poder guardar los cambios en los campos anteriores del
            historial académico es necesario seleccionar el siguiente botón.
            <p><strong>Solo se guardara el historial académico</strong></p>
          </label>
        </div>
      </div>

      <documento-requerido
        v-for="documento in RequiredDocuments"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :alias_academic_program="alias_academic_program"
        :images_btn="images_btn"
        v-bind="documento"
        @enviaDocumento="cargaDocumento"
      >
      </documento-requerido>
    </b-card-body>
  </details>
</template>

<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";
import InputSolicitud from "./InputSolicitud.vue";

export default {
  components: { DocumentoRequerido, InputSolicitud },
  name: "grado-academico",

  props: {
    //Index de la escolaridad
    index: Number,

    images_btn: Object,

    //Alias academic program
    alias_academic_program: String,

    // Países que el postulante puede escoger.
    paises: Array,

    // id del grado.
    id: Number,

    // id del expediente.
    archive_id: Number,

    // Cédula profesional.
    cedula: String,

    // Título del grado académico.
    degree: String,

    // Tipo de grado académico
    degree_type: {
      type: String,
      default: "Licenciatura",
    },

    // Estatus académico.
    status: String,

    // Modo de titulación.
    titration_mode: String,

    //Fecha de titulacion
    titration_date: String,

    // País en donde el estudiante realizó sus estudios.
    country: String,

    // Universidad en donde el postulante realizó sus estudios.
    university: String,

    // Número de CVU de CONACyT.
    cvu: Number,

    // Promedio obtenido.
    knowledge_card: String,

    // Firma electrónica.
    digital_signature: String,

    // Estado de los datos del grado académico.
    state: String,

    // Promedio obtenido.
    average: Number,

    // Promedio obtenido.
    min_avg: Number,

    // Promedio obtenido.
    max_avg: Number,

    // Documentos requeridos en el programa académico.
    required_documents: Array,

    universidades: {
      type: Array,
      default: null,
    },

    status_checkBox: {
      type: Boolean,
      default: false,
    },
  },

  data: function () {
    return {
      fechaobtencion: "",
      errores: {},
      datosValidos: {},
      // universidades: [],
      escolaridades: ["Licenciatura", "Maestría"],
      estatusEstudios_PMPCA: ["Grado obtenido", "Título o grado en proceso"],
      estatusEstudios_otros: [
        "Pasante",
        "Grado obtenido",
        "Título o grado en proceso",
      ],
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
        let mispaises = this.paises;
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

    StatusCheckBox: {
      get() {
        return this.status_checkBox;
      },
      set(newValue) {
        this.$emit("update:status_checkBox", newValue);
      },
    },

    CVU: {
      get() {
        return this.cvu;
      },
      set(newVal) {
        this.$emit("update:cvu", newVal);
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

    Cedula: {
      get() {
        return this.cedula;
      },
      set(newVal) {
        this.$emit("update:cedula", newVal);
      },
    },

    TitrationDate: {
      get() {
        return this.titration_date;
      },
      set(newVal) {
        this.$emit("update:titration_date", newVal);
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

    Country: {
      get() {
        return this.country;
      },
      set(newVal) {
        this.$emit("update:country", newVal);
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

    Status: {
      get() {
        return this.status;
      },
      set(newVal) {
        this.$emit("update:status", newVal);
      },
    },

    State: {
      get() {
        setCountryAndUniversities();
        return this.state;
      },
      set(newVal) {
        this.$emit("update:state", newVal);
      },
    },

    RequiredDocuments: {
      get() {
        return this.required_documents;
      },
      set(newVal) {
        this.$emit("update:required_documents", newVal);
      },
    },

    KnowledgeCard: {
      get() {
        return this.knowledge_card;
      },
      set(newVal) {
        this.$emit("update:knowledge_card", newVal);
      },
    },

    DigitalSignature: {
      get() {
        return this.digital_signature;
      },
      set(newVal) {
        this.$emit("update:digital_signature", newVal);
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

    MinAvg: {
      get() {
        return this.min_avg;
      },
      set(newVal) {
        delete this.errores["min_avg"];

        if (isNaN(newVal)) {
          this.errores["min_avg"] =
            "La calificación mínima solo puede ser numérica";
          this.$emit("update:min_avg", 0);
          return;
        }

        this.$emit("update:min_avg", newVal);
      },
    },

    MaxAvg: {
      get() {
        return this.max_avg;
      },
      set(newVal) {
        delete this.errores["max_avg"];

        if (isNaN(newVal) || newVal.length === 0) {
          this.errores["max_avg"] =
            "La calificación máxima solo puede ser numérica";
          this.$emit("update:max_avg", 0);
          return;
        }

        this.$emit("update:max_avg", newVal);
      },
    },
  },
  methods: {
    countryHasValue() {
      //country is not empty
      if (this.country != null) {
        //Find the index
        this.paises.forEach(function (pais) {
          if (pais.name === this.country) {
            this.Universidades = pais.universities;
          }
        });
      }

      return true;
    },

    selectOrNotDegreeType() {
      let res = true;
      let answer = this.alias_academic_program.localCompare("doctorado"); //compare string

      //alias no es doctorado por lo que es una maestria
      if (answer != 0) {
        this.degree_type = "Licenciatura"; //Solo licenciatura
        res = false; //retorno falso
      }

      return res;
    },

    escogePais(evento) {
      this.Universidades =
        this.paises[evento.target.selectedIndex - 1].universities;
    },

    //Funcion para un futuro guardar datos permanentes
    actualizaHistorialAcademico(evento) {
      this.enviaHistorialAcademico(evento, "Completo");
    },

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

    enviaHistorialAcademico(evento, state) {
      this.errores = {};
      axios
        .post("/controlescolar/solicitud/updateAcademicDegree", {
          id: this.id,
          archive_id: this.archive_id,
          state: state,
          status: this.status,
          degree: this.degree,
          degree_type: this.degree_type,
          cvu: this.cvu,
          cedula: this.cedula,
          country: this.country,
          university: this.university,
          average: this.average,
          min_avg: this.min_avg,
          max_avg: this.max_avg,
          knowledge_card: this.knowledge_card,
          digital_signature: this.digital_signature,
          titration_date: this.titration_date,
        })
        .then((response) => {
          Swal.fire({
            title: "Los datos se han actualizado correctamente",
            text: "El historial academico de tu registro ha sido modificado, podras hacer cambios mientras la postulación este disponible",
            icon: "success",
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonColor: "#3085d6",
            cancelButtonText: "Continuar",
          });
        })
        .catch((error) => {
          console.log(error.response.data);
          Swal.fire({
            title: "Error al actualizar datos",
            text: error.response.data["message"],
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

      // console.log(formData);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/updateAcademicDegreeRequiredDocument",
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
