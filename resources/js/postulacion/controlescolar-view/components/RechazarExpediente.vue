<template>
  <b-modal id="RechazarExpediente" hide-backdrop content-class="shadow" size="xl" title="Revisión">
    <div class="col-12">
      <div class="row my-2">
        <!-- DOCUMENTOS PERSONALES -->
        <div class="col-3">
          <p class="h5">Personales</p>
          <ul class="list-group">
            <li v-for="etiqueta in required_documents" :key="etiqueta.id" class="form-check">
              <div v-if="
                requiredForAcademicProgram() === true &&
                isPersonalDocument(etiqueta) === true
              ">
                <input class="form-check-input" type="checkbox" :value="etiqueta.id"
                  v-model="selected_personalDocuments" />
                <label class="form-check-label">
                  {{  etiqueta.name  }}
                </label>
              </div>
            </li>
          </ul>
        </div>

        <!-- DOCUMENTOS DE INGRESO-->
        <div class=" col-3">
          <p class="h5">Ingreso</p>
          <ul class="list-group">
            <li v-for="etiqueta in entrance_documents" :key="etiqueta.id" class="form-check">
              <div v-if="
                requiredForAcademicProgram() === true &&
                isEntranceDocument(etiqueta) === true
              ">
                <input class="form-check-input" type="checkbox" :value="etiqueta.id"
                  v-model="selected_entranceDocuments" />
                <label class="form-check-label">
                  {{  etiqueta.name  }}
                </label>
              </div>
            </li>
          </ul>
        </div>

        <!-- DOCUMENTOS ACADEMICOS -->
        <div class=" col-3">
          <p class="h5">Grado(s) academico(s)</p>
          <ul class="list-group" v-for="(grado, index) in academic_degrees" :key="grado.id" :index="index + 1">
            <li class="list-inline-item">
              <p class="label"><strong> Grado Academico #{{  index + 1  }} </strong></p>
            </li>
            <li v-for="etiqueta in grado.required_documents" :key="etiqueta.id" class="form-check">
              <div v-if="
                requiredForAcademicProgram() === true &&
                isAcademicDocument(etiqueta) === true
              ">
                <input class="form-check-input" type="checkbox" :value="[grado.id, etiqueta.id]"
                  v-model="selected_academicDocuments" />
                <label class="form-check-label">
                  {{  etiqueta.name  }}
                </label>
              </div>
            </li>
          </ul>
        </div>

        <!-- DOCUMENTOS DE LENGUA EXTRANJERA -->
        <div class="col-3">
          <p class="h5">Lengua(s) Entranjera(s)</p>

          <ul class="list-group" v-for="(language, index) in appliant_languages" :key="language.id" :index="index + 1">
            <li class="list-inline-item">
              <span><strong> Lengua Extranjera #{{  index + 1  }} </strong></span>
            </li>
            <li v-for="etiqueta in language.required_documents" :key="etiqueta.id" class="form-check">
              <div v-if="
                requiredForAcademicProgram() === true &&
                isLanguageDocument(etiqueta) === true
              ">
                <input class="form-check-input" type="checkbox" :value="[language.id, etiqueta.id]"
                  v-model="selected_languageDocuments" />
                <label class="form-check-label">
                  {{  etiqueta.name  }}
                </label>
              </div>
            </li>
          </ul>
        </div>

        <!-- DOCUMENTOS DE EXPERIENCIA LABORAL -->
        <div v-if="requiereWorkingExperience() === true" class="col-3">
          <p class="h5">Experiencia(s) Laboral(s)</p>

          <ul class="list-group" v-for="(working_experience, index) in working_experiences" :key="working_experience.id"
            :index="index + 1">
            <li class="list-inline-item">
              <span><strong> Grado Academico #{{  index + 1  }} </strong></span>
            </li>
            <li v-for="etiqueta in working_experience.required_documents" :key="etiqueta.id" class="form-check">
              <div v-if="
                requiredForAcademicProgram() === true &&
                isWorkingDocument(etiqueta) === true
              ">
                <input class="form-check-input" type="checkbox" :value="[working_experience.id, etiqueta.id]"
                  v-model="selected_workingDocuments" />
                <label class="form-check-label">
                  {{  etiqueta.name  }}
                </label>
              </div>
            </li>
          </ul>
        </div>

        <div class="col-12">
          <textarea class="form-control" rows="4" v-model="instructions" title="¿Por qué este mensaje?"
            v-b-popover.hover="' Dejar un comentario que solamente control escolar y administración podran observar sobre el por que el aspirante no avanzara a la siguiente etapa'"
            placeholder="Deja instrucciones claras para los documentos indicados" />
        </div>
      </div>
    </div>
    
    <hr class="d-block" :style="ColorStrip" />

    <template #modal-footer="{ cancel }">
      <!-- Emulate built in modal footer ok and cancel button actions -->
      <b-button size="sm" variant="success" @click="enviarActualizacion()" :style="styleBtnAccordionSection">
        <p class="h5">Guardar estado</p>
      </b-button>
      <b-button size="sm" variant="danger" @click="cancel()" :style="styleBtnAccordionSection">
        <p class="h5">Cancelar</p>
      </b-button>
    </template>
  </b-modal>
</template>

<script>
export default {
  name: "rechazar-expediente",

  props: {
    // Documents to update
    required_documents: {
      type: Array,
      default: [],
    },

    personal_documents: {
      type: Array,
      default: [],
    },

    entrance_documents: {
      type: Array,
      default: [],
    },

    academic_degrees: {
      type: Array,
      default: [],
    },

    appliant_languages: {
      type: Array,
      default: [],
    },

    working_experiences: {
      type: Array,
      default: [],
    },

    // Information
    academic_program: {
      type: Object,
      default: null,
    },

    alias_academic_program: {
      type: String,
      default: "maestria",
    },

    archive_id: {
      type: Number,
      default: null,
    },

    user_id: {
      type: Number,
      default: null,
    },
  },

  computed: {
    styleBtnAccordionSection() {
      return {
        backgroundColor: "rgba(0,96,175,255)",
        color: 'rgb(244, 244, 244)',
        border: 'none',
        display: 'flex',
        alignItems: 'center',
        height: '50px'
      }
    },

    modalStyle(){
      return{
        backgroundColor: "rgba(0,96,175,255)",
      }
    },

    btnStyle() {
      return {
        height: '50px!important',
        width: '100%!important',
        color: 'white'
      }
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
        height: '3px'
      };
    },
  },

  data() {
    return {
      selected_etiquetas: [],
      selected_personalDocuments: [],
      selected_academicDocuments: [],
      selected_entranceDocuments: [],
      selected_languageDocuments: [],
      selected_workingDocuments: [],
      instructions: "",
    };
  },

  methods: {
    enviarActualizacion() {
      console.log(this.selected_academicDocuments);
      console.log("instructions: " + this.instructions);

      if (
        this.archive_id != null &&
        this.user_id != null
      ) {
        Swal.fire({
          title: "¿Estas seguro de realizar el cambio?",
          text: "Actulizar el expediente a que no cumple",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            axios
              .post("/controlescolar/solicitud/whoModifyArchive", {
                archive_id: this.archive_id,
              })
              .then((response) => {
                axios
                  .post("/controlescolar/solicitud/sentEmailRechazadoPostulacion", {
                    selected_personalDocuments: this.selected_personalDocuments,
                    selected_academicDocuments: this.selected_academicDocuments,
                    selected_entranceDocuments: this.selected_entranceDocuments,
                    selected_languageDocuments: this.selected_languageDocuments,
                    selected_workingDocuments: this.selected_workingDocuments,
                    instructions: this.instructions,
                    academic_program: this.academic_program,
                    archive_id: this.archive_id,
                    user_id: this.user_id,
                  })
                  .then((response) => {
                    Swal.fire({
                      title: "Exito",
                      text: "Se ha enviado un correo al usuario con los cambios a realizar",
                      icon: "success",
                      showCancelButton: false,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Entendido",
                    }).then((result) => {
                      axios
                        .post("/controlescolar/solicitud/updateStatusArchive", {
                          // Status id to change the state
                          archive_id: this.archive_id,
                          status: 6,
                        })
                        .then((response) => {
                          window.location.href = "/controlescolar/solicitud/";
                        })
                        .catch((error) => {
                          console.log(error);
                          Swal.fire({
                            title: "Error al actualizar",
                            showCancelButton: false,
                            icon: "error",
                          });
                        });
                    });
                  })
                  .catch((error) => {
                    Swal.fire({
                      title: "Ups",
                      text: "No fue posible completar la petición, intentelo mas tarde",
                      icon: "error",
                      showCancelButton: true,
                      cancelButtonColor: "#d33",
                      cancelButtonText: "Entendido",
                    });
                    // alert('Ha ocurrido un error, intenta mas tarde');
                    // console.log(error);
                  });
              })
              .catch((error) => {
                console.log(error);
                Swal.fire({
                  title: "Error al actualizar",
                  text: "El usuario que esta revisando, no se encuentra en el sistema",
                  showCancelButton: false,
                  icon: "error",
                });
              });

          }
        });
      } else {
        Swal.fire({
          title: "Alguno de los datos no es correcto, verifique nuevamente",
          icon: "error",
          showCancelButton: true,
          cancelButtonColor: "#d33",
          cancelButtonText: "Entendido",
        });
      }
    },

    // Solamente los documentos de trabajo se piden para maestria de ENREM
    // Cuando aumente cambiar a un switch
    requiereWorkingExperience() {
      if (this.alias_academic_program === "enrem") {
        return true;
      }

      return false;
    },

    isPersonalDocument(etiqueta) {
      if (etiqueta.type === "personal") {
        return true;
      }
      return false;
    },

    isAcademicDocument(etiqueta) {
      // console.log('nombre: '+etiqueta.name + ': tipo'+ etiqueta.type);
      if (etiqueta.type === "academic") {
        return true;
      }
      return false;
    },

    isEntranceDocument(etiqueta) {
      if (etiqueta.type === "entrance") {
        return true;
      }
      return false;
    },

    isLanguageDocument(etiqueta) {
      if (etiqueta.type === "language") {
        return true;
      }
      return false;
    },

    isWorkingDocument(etiqueta) {
      if (etiqueta.type === "working") {
        return true;
      }
      return false;
    },

    requiredForAcademicProgram() {
      let res = true;
      // console.log("id: "+this.id+" nombre: "+this.name);

      if (this.alias_academic_program === "maestria") {
        switch (this.name) {
          case "5.- Título de preparatoria":
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
          case "'14.- Propuesta de proyecto avalada por el profesor postulante'":
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
      // Documents for imarec
      else if (this.alias_academic_program === "imarec") {
        switch (this.name) {
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
          case "9.- Application":
            res = false;
            break;
          case "9A.- Application DAAD":
            res = false;
            break;
          case "'14.- Propuesta de proyecto avalada por el profesor postulante'":
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
          case "5.- Título de preparatoria":
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

      return res;
    },
  },
};
</script>
