<template>
  <div class="col-12">
    <div class="form-row my-4">
      <div class="col-12">
        <label> Explica los motivos, por los cuales deseas aplicar al programa académico </label>          
        <textarea v-model="Motivation" class="form-control" rows="8"></textarea>
      </div>

      <div class="col-12 my-3">
        <button @click="actualizaExposicionMotivos" class="btn btn-primary"> Guardar exposición de motivos </button>
      </div>
      
      <documento-requerido v-for="documento in Documentos" :key="documento.name"
        :archivo.sync="documento.archivo" 
        :location.sync="documento.pivot.location" 
        :errores.sync = "documento.errores"
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
    documentos: Array,
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

    actualizaExposicionMotivos(evento){
      axios.post('/controlescolar/solicitud/updateMotivation', {
        archive_id:this.archive_id,
        motivation: this.motivation,
      }).then(response => {
        this.Motivation = response.data.motivation;
      }).catch(error => {
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    },

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
        requiredDocument.datosValidos.file = '¡Archivo subido exitosamente!';
        requiredDocument.Location = response.data.location;        
        
      }).catch(error => {
        var errores = error.response.data['errors'];
        requiredDocument.Errores = { 
          file: 'file' in errores ? errores.file[0] : null,
          id: 'requiredDocumentId' in errores ? errores.requiredDocumentId[0] : null,
        };
      });
    },
  }
};
</script>