<template>
  <div class="row my-2">

    <div
      v-if="interviewDocumentsNotEmpty() === true"
      class="col-12 mx-2 "
    >
      <documento-requerido-entrevista
        v-for="documento in interview_documents"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :alias_academic_program="academic_program.alias"
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
    
  },
};
</script>