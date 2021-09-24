<template>
  <div class="row my-3">
    <div class="form-group col-sm-6 col-md-4">
      <label> Nivel de escolaridad: </label>

      <select v-model="gradoacademico.escolaridad" class="form-control">
        <option value="" selected>Escoge una opción</option>
        <option v-for="escolaridad in escolaridades" :key="escolaridad" :value="escolaridad">
          {{ escolaridad }}
        </option>
      </select>
    </div>

    <input-solicitud 
      v-if="gradoacademico.escolaridad !== ''"
      v-model="gradoacademico.titulo"
      clase="form-group col-sm-6 col-md-8" 
    > 
      Titulo: 
    </input-solicitud>

    <div v-if="gradoacademico.escolaridad !== ''" class="form-group col-md-4">
      <div class="row">
        <div class="form-group col-12">
          <label> Estatus: </label>
          <select v-model="gradoacademico.estatus" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="estatusEstudio in estatusEstudios" :key="estatusEstudio" :value="estatusEstudio">
              {{ estatusEstudio }}
            </option>
          </select>
        </div>

        <input-solicitud v-if="gradoacademico.estatus === 'Grado obtenido'" clase="form-group col-6" v-model="gradoacademico.cedula"> 
          Cédula profesional: 
        </input-solicitud>

        <input-solicitud v-if="gradoacademico.estatus === 'Grado obtenido'" tipo="date" clase="form-group col-6" v-model="gradoacademico.fechaobtencion"> 
          Fecha de titulación: 
        </input-solicitud>

        <input-solicitud v-else-if="gradoacademico.estatus === 'Pasante'" tipo="date" clase="form-group col-12" v-model="gradoacademico.fechaobtencion"> 
          Fecha de obtención de pasantía: 
        </input-solicitud>

        <input-solicitud v-else-if="gradoacademico.estatus === 'Título o grado en proceso'" tipo="date" clase="form-group col-12" v-model="gradoacademico.fechaobtencion"> 
          Fecha de presentación de examen:
        </input-solicitud>
      </div>
    </div>

    <div v-if="gradoacademico.escolaridad !== ''" class="form-group col-md-8">
      <div class="row" v-if="gradoacademico.estatus === 'Grado obtenido'">
        <div class="form-group col-lg-4">
          <label> País donde realizaste tus estudios: </label>

          <select v-model="gradoacademico.paisestudios" class="form-control" @change="escogePais">
            <option value="" selected>Escoge una opción</option>
            <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name">
              {{ PaisEstudio.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Universidad de estudios: </label>

          <select v-model="gradoacademico.universidad" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name">
              {{ Universidad.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-6 col-sm-4">
          <label> Modo de titulación: </label>
          <select v-model="gradoacademico.modotitulacion" class="form-control">
            <option value="" selected>Escoge una opción</option>
          </select>
        </div>

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="gradoacademico.promedio"> Promedio obtenido: </input-solicitud>
        <input-solicitud v-if="gradoacademico.paisestudios !== 'México'" clase="form-group col-6 col-sm-4" v-model="gradoacademico.calmin"> Calificación mínima: </input-solicitud>
        <input-solicitud v-if="gradoacademico.paisestudios !== 'México'" clase="form-group col-6 col-sm-4" v-model="gradoacademico.calmax"> Calificación máxima: </input-solicitud>
      </div>

      <div class="row" v-else>
        <div class="form-group col-sm-6">
          <label> País donde realizaste tus estudios: </label>

          <select v-model="gradoacademico.paisestudios" class="form-control" @change="escogePais">
            <option value="" selected>Escoge una opción</option>
            <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name">
              {{ PaisEstudio.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-6">
          <label> Universidad de estudios: </label>

          <select v-model="gradoacademico.universidad" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name">
            {{ Universidad.name }}
            </option>
          </select>
        </div>

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="gradoacademico.promedio"> 
          Promedio obtenido: 
        </input-solicitud>  

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="gradoacademico.calmin"> 
          Calificación mínima: 
        </input-solicitud>

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="gradoacademico.calmax"> 
          Calificación máxima: 
        </input-solicitud>
      </div>
    </div>


    <documento-requerido v-for="documento in gradoacademico.documentos" 
      :key="documento.nombre"
      :documento="documento">
    </documento-requerido>
    
  </div>
</template>

<script>
import GradoAcademicoModel from '../../clases/GradoAcademico.js';
import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  components: { DocumentoRequerido, InputSolicitud },
  name: "grado-academico",

  props: {
    paises: {
      type: Array,
    },
    id: {
      type: Number,
    },
    gradoacademico: GradoAcademicoModel
  },

  data: function () {
    return {
      universidades: [],
      escolaridades: ["Licenciatura", "Maestría"],
      estatusEstudios: ["Pasante","Grado obtenido","Título o grado en proceso"],
    };
  },

  computed: {
    Universidades: {
      get: function () {
        return this.universidades;
      },
      set: function (value) {
        this.universidades = value;
      },
    },
  },
  methods: {
    escogePais(evento) {
      this.Universidades =
        this.paises[evento.target.selectedIndex - 1].universities;
    },
  },
};
</script>