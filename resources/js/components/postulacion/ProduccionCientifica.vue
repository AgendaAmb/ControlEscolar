<template>
  <div class="row">
    <h4 class="form-group col-12 my-1"> </h4>
    <div class="form-group col-md-4">
      <label> Tipo de publicación: </label>
        <select v-model="tipo" class="form-control">
          <option value="" selected>Escoge una opción</option>
          <option value="Publicación de artículos"> Publicación de artículos </option>
          <option value="Publicación de libros"> Publicación de libros </option>
          <option value="Capítulos publicados"> Capítulos publicados </option>
          <option value="Reportes técnicos"> Reportes técnicos </option>
          <option value="Memorias"> Memorias </option>
          <option value="Documentos de trabajo"> Documentos de trabajo </option>
          <option value="Reseñas"> Reseñas </option>
      </select>
    </div>

    <div class="form-group col-md-12">
      <div v-if="tipo === 'Publicación de artículos'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="titulo"> Título del artículo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="nombre"> Nombre de la revista: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="tipo === 'Publicación de libros'" class="row">
        <input-solicitud clase="form-group col-md-6" v-model="titulo"> Título del libro: </input-solicitud>
        <input-solicitud clase="form-group col-md-6" v-model="año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="tipo === 'Capítulos publicados'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="titulo"> Título del capítulo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="numCapitulo"> No. del capítulo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="tipo === 'Reportes técnicos'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="titulo"> Título: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="institucion"> Institución a la que se presenta el reporte: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="tipo === 'Memorias'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="titulo"> Título de la memoria: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="nombre"> Título de la publicación: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="tipo === 'Documentos de trabajo'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="titulo"> Título del documento de trabajo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="nombre"> Título de la publicación: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="tipo === 'Reseñas'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="titulo"> Título de la reseña: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="nombre"> Título de la publicación: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="año"> Año de publicación: </input-solicitud>
      </div>
    </div>
  </div>
</template>


<script>

import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  name: "produccion-cientifica",
  components: { DocumentoRequerido, InputSolicitud },

  data() {
    return {
      tipo: '',
      nombre: '',
      titulo: '',
      capLibro: '',
      año: ''
    };
  }
};
</script>