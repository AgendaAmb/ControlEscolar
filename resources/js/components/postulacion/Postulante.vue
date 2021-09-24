<template>
  <div class="form-row my-4">
    <div class="col-12">
      <div class="row">
        <div class="col-md-5 col-lg-6 col-xl-3 my-2"></div>
        <div class="form-group col-md-7 col-lg-6 col-xl-9">
          <div class="row">
            <div class="form-group col-12">
              <label> CURP:</label>
              <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-12">
              <label> Nombre(s): </label>
              <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
              <label> Primer Apellido: </label>
              <input type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
              <label> Segundo Apellido: </label>
              <input type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="form-group col-xl-4">
          <label> Fecha de nacimiento </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Género: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Estado civil: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-3">
          <label> País de nacimiento: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-3">
          <label> Estado de nacimiento: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-3">
          <label> País de residencia: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-3">
          <label> Teléfono de contacto: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-6">
          <label> Correo electrónico: </label>
          <input type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-6">
          <label> Correo de contacto alterno: </label>
          <input type="text" class="form-control" readonly />
        </div>
      </div>
    </div>

    <documento-requerido :documento="informacionpersonal.docActaNacimiento"></documento-requerido>
    <documento-requerido :documento="informacionpersonal.docCurp"></documento-requerido>
    <documento-requerido :documento="informacionpersonal.docIne"></documento-requerido>
    <documento-requerido :documento="informacionpersonal.docPasaporte"></documento-requerido>
  </div>
</template>

<script>
import DatosPostulante from '../../clases/DatosPostulante.js'
import DocumentoRequerido from "./DocumentoRequerido.vue";

export default {
  props: {
    informacionpersonal: DatosPostulante,
    required: true,
  },
  components: { DocumentoRequerido },
  name: "datos-personales",
};
</script>