<template>
  <div class="row">
    <div class="col-12 mx-2 my-2">
      <h1 class="display-5">Actualiza tus Documentos</h1>

      <p class="fs-2">
        Podras cambiar los documentos tantas veces quieras mientras que el
        revisor no apruebe cada uno de estos
      </p>
    </div>

    <div class="col-12 mx-2">
    <h4 class="display">Documentos academicos</h4>
    </div>

    <div
    class="col-12 mx-2"
      v-for="(grado, index) in academic_degrees"
      v-bind:key="grado.id"
      :index="index + 1"
    >
      <h4 class="display">Grado Academico {{index + 1}}</h4>
      <documento-requerido-porActualizar
        v-for="documento in grado.required_documents"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :alias_academic_program="alias_academic_program"
        v-bind="documento"
        @enviaDocumento="cargaDocumento"
      >
      </documento-requerido-porActualizar>
    </div>

    <div class="form-group col-12 mx-2 my-4">
      <button
        @click="avisarCambios"
        class="btn btn-success"
        style="height: 45px; width: 250px"
      >
        Informar de cambios
      </button>
    </div>
  </div>
</template>

<script>
import { defaultFormat } from 'moment';
export default {
  name: "actualiza-documentos",
  props: {
    // Documentos personales.
    personal_documents: Array,

    // Documentos de ingreso.
    entrance_documents: Array,

    // Grados académicos del postulante.
    academic_degrees: Array,

    // Lenguas extranjeras del postulante.
    appliant_languages: Array,

    required_documents_ids: {
      type: Array,
      default: [],
    },

    appliant: {
      type: Object,
      default: null,
    },

    academic_program: {
      type: Object,
      default: null,
    },

    archive_id: {
      type: Number,
      default: null,
    },
  },
  methods: {
    avisarCambios() {
      axios
        .post("/controlescolar/solicitud/updateStatusArchive", {
          //   Documentos nuevos
          archive_id: this.archive_id,
          status: 4,
        })
        .then((response) => {
          Swal.fire({
            title: "Se le ha informado al revisor de los cambios realizados",
            text: "Queda atento a las correcciones",
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar",
          });
        })
        .catch((error) => {
          console.log(error);
          Swal.fire({
            title: "Error al actualizar",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    cargaDocumento(requiredDocument, file, type) {
      var formData = new FormData();
      formData.append("id", this.id);
      formData.append("archive_id", this.archive_id);
      formData.append("requiredDocumentId", requiredDocument.id);
      formData.append("file", file);

      let url = null;

      if (type != null) {
        switch (type) {
          case "personal":
            url = "/controlescolar/solicitud/updateArchivePersonalDocument";
            break;
          case "academic":
            url =
              "/controlescolar/solicitud/updateAcademicDegreeRequiredDocument";

            break;
          case "entrance":
            url =
              "/controlescolar/solicitud/updateArchiveEntranceDocument";
            break;
          case "language":
            url = "/controlescolar/solicitud/updateAppliantLanguageRequiredDocument";
            break;
          // case "working":
          //   break;
            default:
              break;
        }
      }
      axios({
        method: "post",
        url: url,
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
  },

  created() {
    console.log(this.documentos);
  },
};
</script>