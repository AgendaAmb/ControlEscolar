<template>
  <div class="col-12">
    <div class="form-row my-4">
      <documento-requerido v-for="documento in Documentos" :key="documento.name"
        :user_id="user_id"
        :viewer_id="viewer_id"
        :alias_academic_program="alias_academic_program"
        :archivo.sync="documento.archivo" 
        :location.sync="documento.pivot.location" 
        :errores.sync="documento.errores"
        :images_btn="images_btn"
        v-bind="documento"
        @enviaDocumento = "cargaDocumento" >
      </documento-requerido>
    </div>
  </div>
</template>

<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";

export default {
  props: {
     archive_id: Number,
    motivation: String,
    exanni_score: Number,
    documentos: Array,
    images_btn: Object,

    user_id: {
      type: Number,
      default: -1,
    },

    viewer_id: {
      type: Number,
      default: -1,
    },

    alias_academic_program: {
      type: String,
      default: null,
    }

    
  },
  components: { DocumentoRequerido },
  name: "requisitos-ingreso",

  data(){
    return {
      errores: {}
    }
  },
  computed: {
    Motivation: {
      get(){
        return this.motivation;
      },
      set(newVal){
        this.$emit('update:motivation', newVal);
      }
    },

    Documentos: {
      get(){
        return this.documentos;
      },
      set(newVal){
        this.$emit('update:documentos', newVal);
      }
    }
  },
   

  methods:{

    cargaDocumento(requiredDocument, file) {
      
      var formData = new FormData();
      formData.append('archive_id', this.archive_id);
      formData.append('requiredDocumentId', requiredDocument.id);
      formData.append('file', file);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/updateArchiveEntranceDocument',
        data: formData,
        headers: {
          'Accept' : 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        requiredDocument.location = response.data.location;
      }).catch(error => {
        console.log(error);
      });
    },
  }
};
</script>