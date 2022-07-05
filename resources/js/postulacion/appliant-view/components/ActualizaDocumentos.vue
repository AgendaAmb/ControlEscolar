<template>
  <div class="row">
    <div class="col-12 mx-2 my-2">
      <h1 class="display-5">Actualiza tus Documentos</h1>

      <h5 >
        Termina de subir o reemplazar los documentos anteriores segun las instrucciones.
        Podras hacer cambios mientras el revisor no apruebe o mande mas correcciones.
      </h5>
    </div>

    <div
      v-if="personalDocumentsIdsNotEmpty() === true"
      class="col-12 mx-2 my-4"
    >
      <h4 class="display">Documentos personales</h4>
      <documento-requerido-porActualizar
        v-for="documento in personal_documents"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :alias_academic_program="academic_program.alias"
        :require_documents_to_update="personal_documents_ids"
        :list_type="'personal'"
        v-bind="documento"
        @enviaDocumento="cargaDocumento"
      >
      </documento-requerido-porActualizar>
    </div>

    <div
      v-if="entranceDocumentsIdsNotEmpty() === true"
      class="col-12 mx-2 my-4"
    >
      <h4 class="display">Documentos de Ingreso</h4>
      <documento-requerido-porActualizar
        v-for="documento in entrance_documents"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :alias_academic_program="academic_program.alias"
        :require_documents_to_update="entrance_documents_ids"
        :list_type="'entrance'"
        v-bind="documento"
        @enviaDocumento="cargaDocumento"
      >
      </documento-requerido-porActualizar>
    </div>

    <div
      v-if="academicDocumentsIdsNotEmpty() === true"
      class="col-12 mx-2 my-4"
    >
      <h4 class="display">Documentos academicos</h4>
      <div
        class="col-12 mx-2"
        v-for="(grado, index) in academic_degrees"
        v-bind:key="grado.id"
        :index="index + 1"
      >
        <div v-if="academicDegreeIsInList(grado.id) === true">
          <h4 class="display">Grado Academico {{ grado.id }}</h4>

          <documento-requerido-porActualizar
            v-for="documento in grado.required_documents"
            :key="documento.name"
            :archivo.sync="documento.archivo"
            :location.sync="documento.pivot.location"
            :errores.sync="documento.errores"
            :alias_academic_program="academic_program.alias"
            :require_documents_to_update="selected_academicDocuments"
            :list_type="'academic'"
            :index_require_documents_to_update="
              index_selected_academicDocuments
            "
            v-bind="documento"
            @enviaDocumento="cargaDocumento"
          >
          </documento-requerido-porActualizar>
        </div>
      </div>
    </div>

    <div class="form-group row mx-2 my-4">
      <div class="col-12 my-2">
        <h5>
          <strong>Nota:</strong>&nbsp;&nbsp;Si has subido algunos o todos los
          documentos puedes hacernos saber para revisarlos
        </h5>
      </div>

      <div class="col-3">
        <button
          @click="avisarCambios"
          class="btn btn-success"
          style="height: 45px; width: 100%"
        >
          Informar de cambios
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import DocumentoRequeridoPorActualizar from "./DocumentoRequeridoPorActualizar.vue";
import swal from "sweetalert2";
window.Swal = swal;

export default {
  name: "actualiza-documentos",

  components: {
    DocumentoRequeridoPorActualizar,
  },

  props: {
    /*
      Models that requiere documents
    */

    // Documentos personales.
    personal_documents: Array,

    // Documentos de ingreso.
    entrance_documents: Array,

    // Grados académicos del postulante.
    academic_degrees: Array,

    // Lenguas extranjeras del postulante.
    appliant_languages: Array,

    // Experiencias laborales  del postulante.
    working_experiences: Array,

    /*
      List of ids for each model that require documents
    */
    personal_documents_ids: {
      type: Array,
      default: [],
    },

    entrance_documents_ids: {
      type: Array,
      default: [],
    },

    academic_documents_ids: {
      type: Array,
      default: [],
    },

    language_documents_ids: {
      type: Array,
      default: [],
    },

    working_documents_ids: {
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

  data() {
    return {
      selected_academicDocuments: [],
      selected_languageDocuments: [],
      selected_workingDocuments: [],

      index_selected_academicDocuments: [],
      index_selected_languageDocuments: [],
      index_selected_workingDocuments: [],

      list_type: null,
      errores: {},
    };
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
    },

    academicDocumentsIdsNotEmpty() {
      if (this.academic_documents_ids.length > 0) {
        return true;
      }
      return false;
    },

    academicDegreeIsInList(academic_degree_id) {
      let res = false;
      academic_documents_ids.forEach((element) => {
        if (element[0] === academic_degree_id) {
          console.log("hayyayay");
          res = true;
        }
      });
      return res;
    },

    personalDocumentsIdsNotEmpty() {
      if (this.personal_documents_ids.length > 0) {
        return true;
      }
      return false;
    },

    entranceDocumentsIdsNotEmpty() {
      if (this.entrance_documents_ids.length > 0) {
        return true;
      }
      return false;
    },

    languageDocumentsIdsNotEmpty() {
      if (this.language_documents_ids.length > 0) {
        return true;
      }
      return false;
    },

    workingDocumentsIdsNotEmpty() {
      if (this.working_documents_ids.length > 0) {
        return true;
      }
      return false;
    },

    avisarCambios() {
      axios
        .post("/controlescolar/updateDocuments/updateStatusArchive", {
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

    cargaDocumento(requiredDocument, file, type, index) {
      var formData = new FormData();
      formData.append("id", this.id);
      formData.append("archive_id", this.archive_id);
      formData.append("requiredDocumentId", requiredDocument.id);
      formData.append("file", file);

      let url = null;

      if (type != null) {
        switch (type) {
          case "personal":
            url =
              "/controlescolar/updateDocuments/updateArchivePersonalDocument";
            break;
          case "academic":
            url =
              "/controlescolar/updateDocuments/updateAcademicDegreeRequiredDocument";
            formData.append("index", index);
            break;
          case "entrance":
            url =
              "/controlescolar/updateDocuments/updateArchiveEntranceDocument";
            break;
          case "language":
            url =
              "/controlescolar/updateDocuments/updateAppliantLanguageRequiredDocument";
            formData.append("index", index);
            break;
          // case "working":
          //   break;
          default:
            break;
        }

        console.log(url);
        console.log(index);
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
            requiredDocument.datosValidos.file =
              "¡Archivo subido exitosamente!";
            requiredDocument.Location = response.data.location;
            Swal.fire({
              title: "Documento nuevo agregado",
              text: "El documento anterior se ha sobreescrito sobre el nuevo ingresado",
              icon: "success",
              showCancelButton: true,
              showConfirmButton: false,
              cancelButtonColor: "#3085d6",
              cancelButtonText: "Continuar",
            });
          })
          .catch((error) => {
            console.log(error);
            Swal.fire({
              title: "Error al subir documento",
              text: "Intente mas tarde",
              showCancelButton: false,
              icon: "error",
            });
          });
      }
    },
  },

  created() {
    this.academic_documents_ids.forEach((element) => {
      if (element[0] != null) {
        console.log("academico:", element[0]);

        this.index_selected_academicDocuments.push(element[0]);
      }

      if (element[1] != null) {
        console.log("academico:", element[1]);
        this.selected_academicDocuments.push(element[1]);
      }
    });
    this.language_documents_ids.forEach((element) => {
      if (element[0] != null) {
        this.index_selected_languageDocuments.push(element[0]);
      }

      if (element[1] != null) {
        console.log("languaje:", element[1]);
        this.selected_languageDocuments.push(element[1]);
      }
    });
    this.working_documents_ids.forEach((element) => {
      if (element[0] != null) {
        this.index_selected_workingDocuments.push(element[0]);
      }

      if (element[1] != null) {
        console.log("working:", element[1]);
        this.selected_workingDocuments.push(element[1]);
      }
    });
  
    axios
      .get("/controlescolar/solicitud/getAllButtonImage")
      .then((response) => {
        this.images_btn = response.data;
      })
      .catch((error) => {
        console.log(error);
      });

  },
};
</script>