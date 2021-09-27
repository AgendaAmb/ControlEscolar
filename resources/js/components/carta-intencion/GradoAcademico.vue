<template>
  <div class="row my-3">
    <div class="form-group col-12">

      <!-- 
        Datos generales del estatus de estudio.
        Grado, título, etc.
      -->
      <div  class="row">
        <div class="form-group col-md-6 col-lg-4">
          <label> Nivel de escolaridad: </label>
          <input v-model="escolaridad" type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Título obtenido: </label>
          <input v-model="titulo" type="text" class="form-control" readonly>
        </div>

        <div class="d-none d-lg-block form-group col-lg-4">
          <label> Estatus: </label> 
          <input v-model="estatus" type="text" class="form-control" readonly>
        </div>
      </div>

      <!-- 
        País de estudios y universidad 
      -->
      <div class="row">
        <div class="form-group col-lg-6">
          <label> País donde realizaste tus estudios: </label>
          <input type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-lg-6">
          <label> Universidad de estudios: </label>
          <input type="text" class="form-control" readonly>
        </div>

        <div class="d-block d-lg-none form-group col-md-6">
          <label> Estatus: </label>
          <input v-model="estatus" type="text" class="form-control" readonly>
        </div>
      </div>
      
      <!-- 
        Datos de obtención de grado/pasantía.
      -->
      <div class="row" v-if="estatus !== ''" >
        <div v-if="estatus === 'Grado obtenido'" class="form-group col-md-6">
          <label> Fecha de titulación: </label>
          <input type="text" class="form-control" readonly>
        </div>

        <div v-if="estatus === 'Pasante'" class="form-group col-md-6">
          <label> Fecha de obtención de pasantía: </label>
          <input type="text" class="form-control" readonly>
        </div>

        <div v-if="estatus === 'Título o grado en proceso'" class="form-group col-md-6">
          <label> Fecha de presentación de examen: </label>
          <input type="text" class="form-control" readonly>
        </div>
      </div>
      <!-- 
        Pedir CVU, solo en maestría
      -->
      <div class="row" v-if="escolaridad === 'Maestría'" >
        <div class="form-group col-md-4">
          <label> Número de CVU CONACYT: </label>
          <input type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-md-4">
          <label> ¿Cuentas con una carta de reconocimiento? </label>
          <input type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-md-4">
          <label> ¿Cuentas con tu firma electrónica del CONACYT? </label>
          <input type="text" class="form-control" readonly>
        </div>
      </div>



      <!-- 
        Promedio del postulante
      -->
      <div class="row">
        <div class="form-group col-md-6 col-lg-4">
          <label> Promedio obtenido: </label>
          <input v-model="promedio" type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Calificación mínima: </label>
          <input v-model="calmin" type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Calificación máxima: </label>
          <input v-model="calmax" type="text" class="form-control" readonly>
        </div>
      </div>
    </div>

    <documento-postulante v-for="documento in documentos" 
      :key="documento.name"
      :errores.sync = "documento.errores"
      v-bind="documento">
    </documento-postulante>
  </div>
</template>

<script>
import DocumentoPostulante from './DocumentoPostulante.vue';

export default {
  components: { DocumentoPostulante },
  name: "ci-grado-academico",

  props: {
    id: {
      type: Number,
    },
    escolaridad: String,
    titulo: String,
    cedula: String,
    modoTitulacion: String,
    documentos: Array
  },

  data: function () {
    return {
      estatus: '',
      fechaobtencion: '',
      promedio: '',
      calmin: '',
      calmax: '',
      paisestudios: '',
      universidad: '',
      escolaridades: ["Licenciatura", "Maestría"],
      estatusEstudios: ["Pasante","Grado obtenido","Título o grado en proceso"],
    };
  },
};
</script>