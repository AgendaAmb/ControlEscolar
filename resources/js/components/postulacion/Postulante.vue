<template>
  <div class="form-row my-4">
    <div class="col-12">
      <div class="row">
        <div class="col-md-5 col-lg-6 col-xl-3 my-2"></div>
        <div class="form-group col-md-7 col-lg-6 col-xl-9">
          <div class="row">
            <div class="form-group col-12">
              <label> CURP:</label>
              <input v-model="postulante.curp" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-12">
              <label> Nombre(s): </label>
              <input v-model="postulante.nombres" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
              <label> Primer Apellido: </label>
              <input v-model="postulante.apPaterno" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
              <label> Segundo Apellido: </label>
              <input v-model="postulante.apMaterno" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="form-group col-xl-4">
          <label> Fecha de nacimiento </label>
          <input v-model="postulante.fechaNacimiento" type="date" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Género: </label>
          <input v-model="postulante.genero" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Estado civil: </label>
          <input v-model="postulante.estadoCivil" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> País de nacimiento: </label>
          <input v-model="postulante.paisNacimiento" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> Estado de nacimiento: </label>
          <input v-model="postulante.estadoNacimiento" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> País de residencia: </label>
          <input v-model="postulante.paisResidencia" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> Teléfono de contacto: </label>
          <input v-model="postulante.telefonoContacto" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6">
          <label> Correo electrónico: </label>
          <input type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6">
          <label> Correo de contacto alterno: </label>
          <input type="text" class="form-control" readonly>
        </div>
      </div>
    </div>

    <documento-requerido v-for="documento in Documentos" :key="documento.name"
      :archivo.sync="documento.archivo" :url.sync="documento.url" 
      :errores.sync = "documento.errores"
      v-bind="documento">
    </documento-requerido>
  </div>
</template>

<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";

export default {
  props: {
    postulante: Object,
    documentos: Array,
  },
  components: { DocumentoRequerido },
  name: "postulante",

  computed: {
    Documentos: {
      get(){
        return this.documentos;
      },
      set(newVal){
        this.$emit('update:documentos', newVal);
      }
    }
  },
};
</script>