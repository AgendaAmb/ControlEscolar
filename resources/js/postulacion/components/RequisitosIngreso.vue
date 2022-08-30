<template>
  <div class="d-block">
    <!-- Exposición de motivos -->
    <div class="d-flex  justify-content-start align-items-center my-2" style="width: 100%;">
      <div class="col-md-1 col-sm-1 text-center">
        <b-form-checkbox style="transform: scale(1.75);" v-model="StatusCheckBox"></b-form-checkbox>
      </div>

      <div class="col-md-11 col-sm-11">
        <label> Explica los motivos, por los cuales deseas aplicar al programa académico </label>
        <textarea v-model="Motivation" class="form-control" rows="8"></textarea>
      </div>
    </div>

    <!-- Guardado de exposición de motivos  -->
    <div class="d-flex  justify-content-end my-4" style="width:100%;">
      <div class="col-md-2 col-xs-3 text-end ">
        <img @click="actualizaExposicionMotivos" :src="images_btn.guardar" alt="" style=" max-height: 45px !important;">
      </div>
      <div class="col-md-10 col-xs-9 mx-3">
        <label>
          <strong>Nota: </strong>
          Para poder registrar los cambios del campo anterior es necesario seleccionar el siguiente botón.
          <p><strong>Solo se guardara la exposición de motivos.</strong></p>
        </label>
      </div>
    </div>

    <!-- Documentos Requisitos ingreso  -->
    <documento-requerido v-for="documento in Documentos" :key="documento.name" :user_id="user_id" :viewer_id="viewer_id"
      :alias_academic_program="alias_academic_program" :archivo.sync="documento.archivo"
      :location.sync="documento.pivot.location" :errores.sync="documento.errores" :exanni_score.sync="exanni_score"
      :images_btn="images_btn" v-bind="documento" @nuevoPuntajeExanni="nuevoPuntajeExanni"
      @enviaDocumento="cargaDocumento">
    </documento-requerido>


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
    },

    status_checkBox:{
      type: Boolean,
      default: false,
    }
  },
  components: { DocumentoRequerido },
  name: "requisitos-ingreso",

  data() {
    return {
      errores: {}
    }
  },
  computed: {
    Motivation: {
      get() {
        return this.motivation;
      },
      set(newVal) {
        this.$emit('update:motivation', newVal);
      }
    },

    StatusCheckBox: {
      get() {
        return this.status_checkBox;
      },
      set(newVal) {
        this.$emit('update:status_checkBox', newVal);
      }
    },
    

    Documentos: {
      get() {
        return this.documentos;
      },
      set(newVal) {
        this.$emit('update:documentos', newVal);
      }
    }
  },

  methods: {

    actualizaExposicionMotivos(evento) {
      axios.post('/controlescolar/solicitud/updateMotivation', {
        archive_id: this.archive_id,
        motivation: this.motivation,
      }).then(response => {
        Swal.fire({
          title: "¡Éxito!",
          text: "La exposición de motivos se ha guardado correctamente",
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
        });
        this.Motivation = response.data.motivation;
      }).catch(error => {

        Swal.fire({
          title: ":( Error al actualizar exposición de motivos",
          showCancelButton: false,
          icon: "error",
        });
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    },

    nuevoPuntajeExanni(puntaje) {
      axios.post('/controlescolar/solicitud/updateExanniScore', {
        archive_id: this.archive_id,
        exanni_score: this.exanni_score,
      }).then(response => {
        Swal.fire({
          title: "¡Éxito!",
          text: "El puntaje se ha guardado correctamente",
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
        });
        this.exanni_score = response.data.exanni_score;
      }).catch(error => {

        Swal.fire({
          title: "Error",
          text: "El puntaje no se pudo guardar correctamente",
          showCancelButton: false,
          icon: "error",
        });
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
          'Accept': 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        requiredDocument.datosValidos.file = '¡Archivo subido exitosamente!';
        requiredDocument.location = response.data.location;

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