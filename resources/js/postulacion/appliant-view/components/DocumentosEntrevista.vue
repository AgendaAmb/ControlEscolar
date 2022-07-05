<template>
  <div   class="row my-2">
    <div class="col-12 mx-2 my-2">
      <h1 class="display-5">Requerimientos para entrevista</h1>

      <h5 >
        Para continuar con el proceso de entrevista, sube los siguientes documentos correspondientes al posgrado aplicado 
      </h5>
    </div>

    <div
      v-if="interviewDocumentsNotEmpty() === true"
      class="col-12 mx-2 my-4"
    >
      <h4 class="display">Documentos entrevista</h4>
      <documento-requerido-entrevista
        v-for="documento in interview_documents"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :alias_academic_program="academic_program.alias"
        :images_btn="images_btn"
        v-bind="documento"
        @enviaDocumento="cargaDocumento"
      >
      </documento-requerido-entrevista>
    </div>
  
  </div>
</template>

<script>
import DocumentoRequeridoEntrevista from "./DocumentoRequeridoEntrevista.vue";
import swal from "sweetalert2";
window.Swal = swal;

export default {
  name: "documento-entrevista",

  components: {
    DocumentoRequeridoEntrevista,
  },

  props: {
    interview_documents: {
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
      images_btn:[],
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

    interviewDocumentsNotEmpty(){
      if (this.interview_documents.length > 0) {
        return true;
      }
      return false;
    },
    

    cargaDocumento(requiredDocument, file) {
      var formData = new FormData();
      formData.append("archive_id", this.archive_id);
      formData.append("requiredDocumentId", requiredDocument.id);
      formData.append("file", file);

      let url = "/controlescolar/updateDocuments/updateArchiveInterviewDocument";

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
   
    },
  },

    created() {
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