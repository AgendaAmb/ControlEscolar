<template>
  <div class="row">
    <h4 class="form-group col-12 my-1"> </h4>
    <div class="form-group col-md-4">
      <label> Tipo de publicación: </label>
        <select v-model="produccionCientifica.tipo" class="form-control">
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
      <div v-if="produccionCientifica.tipo === 'Publicación de artículos'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.titulo"> Título del artículo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.nombre"> Nombre de la revista: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="produccionCientifica.tipo === 'Publicación de libros'" class="row">
        <input-solicitud clase="form-group col-md-6" v-model="produccionCientifica.titulo"> Título del libro: </input-solicitud>
        <input-solicitud clase="form-group col-md-6" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="produccionCientifica.tipo === 'Capítulos publicados'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.titulo"> Título del capítulo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.numCapitulo"> No. del capítulo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="produccionCientifica.tipo === 'Reportes técnicos'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.titulo"> Título: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.institucion"> Institución a la que se presenta el reporte: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="produccionCientifica.tipo === 'Memorias'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.titulo"> Título de la memoria: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.nombre"> Título de la publicación: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="produccionCientifica.tipo === 'Documentos de trabajo'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.titulo"> Título del documento de trabajo: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.nombre"> Título de la publicación: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>

      <div v-else-if="produccionCientifica.tipo === 'Reseñas'" class="row">
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.titulo"> Título de la reseña: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.nombre"> Título de la publicación: </input-solicitud>
        <input-solicitud clase="form-group col-md-4" v-model="produccionCientifica.año"> Año de publicación: </input-solicitud>
      </div>
    </div>
  </div>
</template>


<script>
class ProduccionCientifica
{
  /**
   * Construye el objeto, que representa el puesto laboral.
   * 
   * @param string tipoPuesto
   * @param string tipoPuesto
   * @param string tipoPuesto
   * @param Date tipoPuesto
   * @param Date fechaFin
   * @param string areaConocimiento
   * @param string campo
   */
  constructor(tipo = '', titulo = '', nombre = '', fecha = null, año = '', numCapitulo = null, institucion = null)
  {
    this.tipo = tipo;
    this.titulo = titulo;
    this.nombre = nombre;
    this.fecha = fecha;
    this.año = año;
    this.numCapitulo = numCapitulo;
    this.institucion = null;
  }
}

import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  name: "produccion-cientifica",
  components: { DocumentoRequerido, InputSolicitud },

  data() {
    return {
      produccionCientifica: new ProduccionCientifica(),

    };
  }
};
</script>