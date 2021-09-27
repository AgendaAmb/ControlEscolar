<template>
  <div class="row my-3">
    <div class="form-group col-md-5 col-lg-4">

    </div>
    <div class="form-group  col-md-7 col-lg-8">

      <!-- 
        Datos generales del estatus de estudio.
        Grado, título, etc.
      -->
      <div  class="row">
        <div class="form-group col-md-6 col-lg-4">
          <label> Nivel de escolaridad: </label>

          <select v-model="escolaridad" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="escolaridad in escolaridades" :key="escolaridad" :value="escolaridad">
              {{ escolaridad }}
            </option>
          </select>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Título obtenido: </label>
          <input v-model="titulo" type="text" class="form-control">
        </div>

        <div class="d-none d-lg-block form-group col-lg-4">
          <label> Estatus: </label>
          <select v-model="estatus" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="estatusEstudio in estatusEstudios" :key="estatusEstudio" :value="estatusEstudio">
              {{ estatusEstudio }}
            </option>
          </select>
        </div>
      </div>


      <!-- 
        País de estudios y universidad 
      -->
      <div class="row">
        <div class="form-group col-lg-6">
          <label> País donde realizaste tus estudios: </label>
          <select v-model="paisestudios" class="form-control" @change="escogePais">
            <option value="" selected>Escoge una opción</option>
            <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name">
              {{ PaisEstudio.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-lg-6">
          <label> Universidad de estudios: </label>
          <select v-model="universidad" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name">
              {{ Universidad.name }}
            </option>
          </select>
        </div>

        <div class="d-block d-lg-none form-group col-md-6">
          <label> Estatus: </label>
          <select v-model="estatus" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="estatusEstudio in estatusEstudios" :key="estatusEstudio" :value="estatusEstudio">
              {{ estatusEstudio }}
            </option>
          </select>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Promedio obtenido: </label>
          <input v-model="promedio" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Calificación mínima: </label>
          <input v-model="calmin" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Calificación máxima: </label>
          <input v-model="calmax" type="text" class="form-control">
        </div>
      </div>
    </div>

    


      <!--
      <div v-if="estatus === 'Grado obtenido'" class="d-block my-3">
        <label> Fecha de titulación: </label>
        <input v-model="fechaobtencion" type="date" class="form-control">
      </div>

      <div v-if="estatus === 'Pasante'" class="d-block my-3">
        <label> Fecha de obtención de pasantía: </label>
        <input v-model="fechaobtencion" type="date" class="form-control">
      </div>

      <div v-if="estatus === 'Título o grado en proceso'" class="d-block my-3">
        <label> Fecha de presentación de examen: </label>
        <input v-model="fechaobtencion" type="date" class="form-control">
      </div>-->
<!--
    <div class=" col-md-6 col-lg-8">
      <div class="row">
        <div class="form-group col-lg-6">
          <label> Modo de titulación: </label>
          <input v-model="modoTitulacion" type="text" class="form-control">
        </div>

        
        <div class="form-group col-lg-6">
          <label> Promedio obtenido: </label>
          <input v-model="promedio" type="text" class="form-control">
        </div>
      </div>
    </div>-->

    <documento-requerido v-for="documento in Documentos" :key="documento.name"
      :archivo.sync="documento.archivo" :url.sync="documento.url" 
      :errores.sync = "documento.errores"
      v-bind="documento">
    </documento-requerido>
    <!--
    <div class="form-group col-sm-6 col-md-4">
      <label> Nivel de escolaridad: </label>

      <select v-model="escolaridad" class="form-control">
        <option value="" selected>Escoge una opción</option>
        <option v-for="escolaridad in escolaridades" :key="escolaridad" :value="escolaridad">
          {{ escolaridad }}
        </option>
      </select>
    </div>

    <input-solicitud 
      v-if="escolaridad !== ''"
      v-model="titulo"
      clase="form-group col-sm-6 col-md-8" 
    > 
      Titulo: 
    </input-solicitud>

    <div v-if="escolaridad !== ''" class="form-group col-md-4">
      <div class="row">
        <div class="form-group col-12">
          <label> Estatus: </label>
          <select v-model="estatus" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="estatusEstudio in estatusEstudios" :key="estatusEstudio" :value="estatusEstudio">
              {{ estatusEstudio }}
            </option>
          </select>
        </div>

        <input-solicitud v-if="estatus === 'Grado obtenido'" clase="form-group col-6" v-model="cedula"> 
          Cédula profesional: 
        </input-solicitud>

        <input-solicitud v-if="estatus === 'Grado obtenido'" tipo="date" clase="form-group col-6" v-model="fechaobtencion"> 
          Fecha de titulación: 
        </input-solicitud>

        <input-solicitud v-else-if="estatus === 'Pasante'" tipo="date" clase="form-group col-12" v-model="fechaobtencion"> 
          Fecha de obtención de pasantía: 
        </input-solicitud>

        <input-solicitud v-else-if="estatus === 'Título o grado en proceso'" tipo="date" clase="form-group col-12" v-model="fechaobtencion"> 
          Fecha de presentación de examen:
        </input-solicitud>
      </div>
    </div>

    <div v-if="escolaridad !== ''" class="form-group col-md-8">
      <div class="row" v-if="estatus === 'Grado obtenido'">
        <div class="form-group col-lg-4">
          <label> País donde realizaste tus estudios: </label>

          <select v-model="paisestudios" class="form-control" @change="escogePais">
            <option value="" selected>Escoge una opción</option>
            <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name">
              {{ PaisEstudio.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Universidad de estudios: </label>

          <select v-model="universidad" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name">
              {{ Universidad.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-6 col-sm-4">
          <label> Modo de titulación: </label>
          <select v-model="modotitulacion" class="form-control">
            <option value="" selected>Escoge una opción</option>
          </select>
        </div>

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="promedio"> Promedio obtenido: </input-solicitud>
        <input-solicitud v-if="paisestudios !== 'México'" clase="form-group col-6 col-sm-4" v-model="calmin"> Calificación mínima: </input-solicitud>
        <input-solicitud v-if="paisestudios !== 'México'" clase="form-group col-6 col-sm-4" v-model="calmax"> Calificación máxima: </input-solicitud>
      </div>

      <div class="row" v-else>
        <div class="form-group col-sm-6">
          <label> País donde realizaste tus estudios: </label>

          <select v-model="paisestudios" class="form-control" @change="escogePais">
            <option value="" selected>Escoge una opción</option>
            <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name">
              {{ PaisEstudio.name }}
            </option>
          </select>
        </div>

        <div class="form-group col-6">
          <label> Universidad de estudios: </label>

          <select v-model="universidad" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name">
            {{ Universidad.name }}
            </option>
          </select>
        </div>

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="promedio"> 
          Promedio obtenido: 
        </input-solicitud>  

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="calmin"> 
          Calificación mínima: 
        </input-solicitud>

        <input-solicitud clase="form-group col-6 col-sm-4" v-model="calmax"> 
          Calificación máxima: 
        </input-solicitud>
      </div>
    </div>


    <documento-requerido v-for="documento in exampledocumentos" 
      :key="documento.nombre"
      :documento="documento">
    </documento-requerido>-->
    
  </div>
</template>

<script>
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
    escolaridad: String,
    titulo: String,
    cedula: String,
    modoTitulacion: String,
    documentos: Array,
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

    Titulo: {
      get(){
        return this.titulo;
      },
      set(newVal){
        this.$emit('update:titulo',newVal);
      }
    },

    Cedula: {
      get(){
        return this.cedula;
      },
      set(newVal){
        this.$emit('update:cedula',newVal);
      }
    },

    Documentos: {
      get(){
        return this.documentos;
      },
      set(newVal){
        this.$emit('update:Documentos',newVal);
      }
    }
  },
  methods: {
    escogePais(evento) {
      this.Universidades =
        this.paises[evento.target.selectedIndex - 1].universities;
    },
  },
};
</script>