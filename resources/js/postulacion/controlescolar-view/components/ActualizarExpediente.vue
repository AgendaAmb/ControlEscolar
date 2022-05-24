<template>
  <div
    class="modal fade"
    id="ActualizaExpediente"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div
        class="px-2 modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3"
        style="background-color: #8b96a8"
      >
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">
            Actualizar expediente
          </h2>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="enviarActualizacion">
            <div class="row my-2 mx-2">
              <div class="my-2 col-12">
                <h4>Documentos para actualizar</h4>
                <ul>
                  <li
                    v-for="etiqueta in required_documents"
                    :key="etiqueta.id"
                    class="form-check"
                  >
                    <div v-if="requiredForAcademicProgram() === true">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        :value="etiqueta.id"
                        v-model="selected_etiquetas"
                      />
                      <label class="form-check-label">
                        {{ etiqueta.name }}
                      </label>
                    </div>
                  </li>
                </ul>
                <div class="row my-2 mx-2">
                  <div class="col-12 my-2">
                    <h4>
                      Deja un mensaje al postulante para que queden mas claras
                      las instrucciones para el cambio
                    </h4>
                    <textarea
                      class="form-control"
                      rows="4"
                      v-model="instructions"
                    />
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="px-0 my-3 modal-footer justify-content-start">
          <button
            id="submit"
            type="submit"
            class="btn btn-primary"
            style="background-color: #0160ae"
            @click="enviarActualizacion"
          >
            Enviar actualizaciones
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "actualizar-expediente",

  props: {
    required_documents: {
      type: Array,
      default: [],
    },

    alias_academic_program: {
      type: String,
      default: "maestria",
    },

    archive_id: {
      type: Number,
      default: null,
    },

    academic_program: {
      type: Object,
      default: null,
    },

    user_id: {
      type: Number,
      default: null,
    },
  },

  data() {
    return {
      selected_etiquetas: [],
      instructions: "",
    };
  },

  methods: {
    enviarActualizacion() {
      console.log(this.selected_etiquetas);
      console.log("instructions: " + this.instructions);

      if (
        this.selected_etiquetas.length > 0 &&
        this.archive_id != null &&
        this.user_id != null
      ) {
        axios
          .post("/controlescolar/solicitud/sentEmailToUpdateDocuments", {
            selected_etiquetas: this.selected_etiquetas,
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
                    status: 3,
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
              title: error.data,
              showCancelButton: true,
              cancelButtonColor: "#d33",
              cancelButtonText: "Entendido",
            });
            // alert('Ha ocurrido un error, intenta mas tarde');
            console.log(error);
          });
      } else {
        Swal.fire({
          title: "Alguno de los datos no es correcto, verifique nuevamente",
          icon: "error",
          title: error.data,
          showCancelButton: true,
          cancelButtonColor: "#d33",
          cancelButtonText: "Entendido",
        });
      }
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