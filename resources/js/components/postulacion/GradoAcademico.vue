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

          <select v-model="DegreeType" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="escolaridad in escolaridades" :key="escolaridad" :value="escolaridad">
              {{ escolaridad }}
            </option>
          </select>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Título obtenido: </label>
          <input v-model="Degree" type="text" class="form-control">
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
          <select v-model="University" class="form-control">
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
      </div>
      
      <!-- 
        Datos de obtención de grado/pasantía.
      -->
      <div class="row" v-if="estatus !== ''" >
        <div v-if="estatus === 'Grado obtenido'" class="form-group col-md-6">
          <label> Número de cédula: </label>
          <input v-model="Cedula" type="text" class="form-control">
        </div>

        <div v-if="estatus === 'Grado obtenido'" class="form-group col-md-6">
          <label> Fecha de titulación: </label>
          <input v-model="fechaobtencion" type="date" class="form-control">
        </div>

        <div v-if="estatus === 'Pasante'" class="form-group col-md-6">
          <label> Fecha de obtención de pasantía: </label>
          <input v-model="fechaobtencion" type="date" class="form-control">
        </div>

        <div v-if="estatus === 'Título o grado en proceso'" class="form-group col-md-6">
          <label> Fecha de presentación de examen: </label>
          <input v-model="fechaobtencion" type="date" class="form-control">
        </div>
      </div>
      <!-- 
        Pedir CVU, solo en maestría
      -->
      <div class="row" v-if="degree_type === 'Maestría'" >
        <div class="form-group col-md-4">
          <label> Número de CVU CONACYT: </label>
          <input type="text" class="form-control">
        </div>

        <div class="form-group col-md-4">
          <label> ¿Cuentas con una carta de reconocimiento? </label>
          <select class="form-control">
            <option value="" selected> Escoge una opción</option>
            <option value="Si"> Si</option>
            <option value="No"> No </option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <label> ¿Cuentas con tu firma electrónica del CONACYT? </label>
          <select class="form-control">
            <option value="" selected> Escoge una opción</option>
            <option value="Si"> Si</option>
            <option value="No"> No </option>
          </select>
        </div>
      </div>



      <!-- 
        Promedio del postulante
      -->
      <div class="row">
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

    <documento-requerido 
      v-for="documento in RequiredDocuments" 
      :key="documento.name"
      :archivo.sync="documento.archivo" 
      :location.sync="documento.location" 
      :errores.sync = "documento.errores"
      v-bind="documento">
    </documento-requerido>
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

    // id del grado.
    id: {
      type: Number,
    },

    // Título del grado académico.
    degree: String,

    // Tipo de grado académico
    degree_type: String,

    // Cédula profesional.
    cedula: String,

    // País en donde el estudiante realizó sus estudios.
    country: String,

    // Universidad en donde el postulante realizó sus estudios.
    university: String,

    // Modo de titulación.
    titration_mode: String,
    required_documents: Array,
  },

  data: function () {
    return {
      estatus: '',
      fechaobtencion: '',
      promedio: '',
      calmin: '',
      calmax: '',
      paisestudios: '',
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

    Degree: {
      get(){
        return this.degree;
      },
      set(newVal){
        this.$emit('update:degree',newVal);
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

    DegreeType: {
      get(){
        return this.degree_type;
      },
      set(newVal){
        this.$emit('update:degreeType',newVal);
      }
    },

    University: {
      get(){
        return this.university;
      },
      set(newVal){
        this.$emit('update:university',newVal);
      }
    },

    RequiredDocuments: {
      get(){
        return this.required_documents;
      },
      set(newVal){
        this.$emit('update:requiredDocuments',newVal);
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