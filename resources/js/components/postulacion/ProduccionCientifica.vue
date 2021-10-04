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
      <publicacion-articulo v-if="tipo === 'Publicación de artículos'"
        :titulo-articulo.sync="titulo"
        :nombre-revista.sync="nombre"
        :ano-publicacion.sync="año"
        :autores.sync="autores">
      </publicacion-articulo>

      <publicacion-capitulo v-else-if="tipo === 'Capítulos publicados'"
        :titulo-capitulo.sync="titulo"
        :nombre-articulo.sync="nombre"
        :ano-publicacion.sync="año"
        :autores.sync="autores">
      </publicacion-capitulo>

      <publicacion-libro v-else-if="tipo === 'Publicación de libros'"
        :titulo-libro.sync="titulo"
        :ano-publicacion.sync="año"
        :autores.sync="autores">
      </publicacion-libro>

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
import PublicacionArticulo from './produccion-cientifica/PublicacionArticulo.vue';
import PublicacionCapitulo from './produccion-cientifica/PublicacionCapitulo.vue';
import PublicacionLibro from './produccion-cientifica/PublicacionLibro.vue';

export default {
  name: "produccion-cientifica",
  components: { 
    DocumentoRequerido, 
    InputSolicitud, 
    PublicacionArticulo, 
    PublicacionCapitulo,
    PublicacionLibro
  },

  data() {
    return {
      tipo: '',
      nombre: '',
      titulo: '',
      capLibro: '',
      autores: [],
      año: '',
      institucion: '',
    };
  }
};
</script>