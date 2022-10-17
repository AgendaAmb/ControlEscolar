<template>
  <div v-if="requiredForAcademicProgram() === true" class="col-12">
    <div class="row my-3">
      <!-- Nombre y notas -->
      <div class="form-group col-9 my-auto">
        <h5 class="mt-4 d-block">
          <strong> {{ name }} </strong>
          <template v-if="checkUpload() === true">
            <i>Estado:</i> <i class="text-success">Subido</i>
          </template>
          <template v-else>
            <i>Estado:</i> <i class="text-danger">Sin subir</i>
          </template>
        </h5>

        <!-- Carta Compromiso y manifiesto -->
        <p v-if="isLetterCommitment() === true" class="mt-3 mb-1 d-block">
          <strong>
            Observaciones: Descargar carta
            <!-- Maestrias PMPCA -->
            <a v-if="alias_academic_program === 'maestria' || alias_academic_program === 'enrem'"
              href="https://ambiental.uaslp.mx/pmpca/docs/CartaCompromiso_MCA.docx" target="_blank">dando clic aquí</a>
            <!-- Maestria imarec -->
            <a v-else-if="alias_academic_program === 'imarec'"
              href="https://ambiental.uaslp.mx/imarec/docs/CartaCompromiso_IMaREC.docx" target="_blank">dando clic
              aquí</a>
            <!-- Doctorado PMPCA  -->
            <a v-else href="https://ambiental.uaslp.mx/pmpca/docs/CartaCompromiso_DCA.docx" target="_blank">dando clic
              aquí</a>
          </strong>
        </p>

        <!-- Solo hay algo en notas por lo que se adjunta -->
        <p v-else-if="notes !== null" class="mt-3 mb-1 d-block">
          <strong> Observaciones: <span v-html="notes"></span></strong>
        </p>

        <p class="mt-3 mb-1 d-block">
          <strong> Etiqueta: </strong> {{ label }}
        </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }}</p>
      </div>
      <!-- Actions buttons -->
      <div class="form-group col-3 align-items-center p-2">
        <div v-if="checkUpload() === true" class="d-flex justify-content-center  my-1"
          style="max-height: 45px; width: 100%">
          <label>
            <a :href="'../../../controlescolar/solicitud/expediente/' + location" style=" height: 45px; width:100%;"
              target="_blank">
              <img :src="images_btn.ver" alt="" style="width:100%; max-height: 45px !important;">
            </a>
          </label>
        </div>
      </div>
    </div>
    
    <div v-if="isEXANNI() === true" class="row my-1 align-items-center justify-content-center" style="height: 75px">
      <div class="col-2 " style="height:100%;">
        <div class="d-flex">
          <label> Puntaje obtenido</label>
        </div>
        <div class=" d-flex align-items-end">
          <input v-model.number="ExanniScore" type="number" class="form-control" :readonly="true">
        </div>
      </div>

      <div class="col-10" style="height:100%; width:100%;">
        <input type="hidden" class="w-100">
      </div>

    </div>

  </div>
</template>

<script>
export default {
  name: "documento-requerido",

  props: {

    user_id: {
      type: Number,
      default: -1,
    },

    images_btn: {
      type: Object,
      default: null,
    },

    viewer_id: {
      type: Number,
      default: -1,
    },

    id: {
      type: Number,
    },

    name: {
      type: String
    },

    notes: {
      type: String
    },

    label: {
      type: String
    },

    example: {
      type: String
    },

    archivo: {
      type: File
    },

    location: {
      type: String
    },

    alias_academic_program: {
      type: String,
      default: null,
    },

    index_carta: {
      type: Number,
      default: 0,
    },

    exanni_score: {
      type: Number,
      default: -1,
    }
  },

  data() {
    return {
      errores: {},
      datosValidos: {},
      textStateUpload: '',
      academiLetterCommitment: '',
    };
  },

  computed: {

    Archivo: {
      get() {
        return this.archivo;
      },
      set(newValue) {
        this.$emit('update:archivo', newValue);
      }
    },
    Location: {
      get() {
        return this.location;
      },
      set(newValue) {
        this.$emit('update:location', newValue);
      }
    },
    Errores: {
      get() {
        return this.errores;
      },
      set(newValue) {
        this.errores = newValue;
        this.$emit('update:errores', newValue);
      }
    },
    ExanniScore: {
      get() {
        return this.exanni_score;
      },
      set(newValue) {
        this.$emit('update:exanni_score', newValue)
      }
    }
  },



  methods: {
    isEXANNI() {
      if (this.name === "13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros, comprobante de pago del examen si no tienen resultados o no lo han presentado)") {
        return true;
      }
      //return a value
      return false;
    },

    actualizaPuntajeExanni() {
      this.$emit("nuevoPuntajeExanni", this.exanni_score);
    },

    requiredForAcademicProgram() {
      let res = true;

      // Documents for Maestria en ciencias ambientales and imarec
      if (this.alias_academic_program === "maestria" || this.alias_academic_program === "imarec") {
        switch (this.name) {
          case "4.- Primera página del pasaporte":
            res = false;
            break;
          case "5.- Título de preparatoria":
            res = false;
            break;
          case "5B.- Título de Maestria o acta de examen":
            res = false;
            break;
          case "6B.- Certificado de materias de la maestría":
            res = false;
            break;
          case "7B.- Constancia de promedio de la maestría.":
            res = false;
            break;
          case "8B.- Cédula de la maestría":
            res = false;
            break;
          case "5C.- Carta de pasantía":
            res = false;
            break;
          case "9.- Application":
            res = false;
            break;
          case "9A.- Application DAAD":
            res = false;
            break;
          case "14.- Propuesta de proyecto avalada por el profesor postulante":
            res = false;
            break;
          case "16.- Proof Experience Document":
            res = false;
            break;
          case "17.- ConfirmationEMP":
            res = false;
            break;
          case "18.- FormatoEuropass":
            res = false;
            break;
        }
      }
      //Documents for doctorado
      else if (this.alias_academic_program === "doctorado") {
        switch (this.name) {
          case "4.- Primera página del pasaporte":
            res = false;
            break;
          case "5.- Título de preparatoria":
            res = false;
            break;
          case "5A.- Título de licenciatura o acta de examen":
            res = false;
            break;
          case "6A.- Certificado de materias de la licenciatura":
            res = false;
            break;

          case "7A.- Constancia de promedio de la licenciatura.":
            res = false;
            break;

          case "8A.- Cédula de la licenciatura":
            res = false;
            break;
          case "5C.- Carta de pasantía":
            res = false;
            break;
          case "9.- Application":
            res = false;
            break;
          case "9A.- Application DAAD":
            res = false;
            break;

          case "16.- Proof Experience Document":
            res = false;
            break;
          case "17.- ConfirmationEMP":
            res = false;
            break;
          case "18.- FormatoEuropass":
            res = false;
            break;
        }
      }

      //Documents for doctorado
      else if (this.alias_academic_program === "enrem") {
        switch (this.name) {
          // case "14.- Propuesta de proyecto avalada por el profesor postulante":
          //   res = false;
          //   break;
          case "5B.- Título de Maestria o acta de examen":
            res = false;
            break;
          case "6B.- Certificado de materias de la maestría":
            res = false;
            break;
          case "7B.- Constancia de promedio de la maestría.":
            res = false;
            break;
          case "8B.- Cédula de la maestría":
            res = false;
            break;
          case "5C.- Carta de pasantía":
            res = false;
            break;
          case "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)":
            res = false;
            break;
          case "13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)":
            res = false;
            break;
        }
      }

      // return the answer accordin to academic program and name of the required document
      // console.log('res: ' + res + ' name: ' + this.name);
      return res;
    },

    isLetterCommitment() {
      if (
        this.name === "11.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)") {
        return true;
      }
      //return a value
      return false;
    },

    isIntentionLetter() {
      //If return 0 is intention letter of professor

      if (this.name === "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)") {
        console.log(this.name);
        return true;
      }
      return false;
    },

    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        return true;
      } else {
        return false;
      }
    },
    cargaDocumento(e) {
      var name = e.target.files[0].name;
      this.Errores = {};

      if (!name.endsWith(".pdf")) {
        this.Errores = {
          file: "El archivo debe de contener formato pdf.",
        };
        return false;
      }

      this.$emit("enviaDocumento", this, e.target.files[0]);
    },
  },
};
</script>