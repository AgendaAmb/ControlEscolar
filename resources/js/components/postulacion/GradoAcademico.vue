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
          <select v-model="Status" class="form-control">
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
          <select v-model="Country" class="form-control" @change="escogePais">
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
          <select v-model="Status" class="form-control">
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
      <div class="row" v-if="Status !== ''" >
        <div v-if="Status === 'Grado obtenido'" class="form-group col-md-6">
          <label> Número de cédula: </label>
          <input v-model.number="Cedula" type="number" class="form-control">
        </div>

        <div v-if="Status === 'Grado obtenido'" class="form-group col-md-6">
          <label> Fecha de titulación: </label>
          <input v-model="fechaobtencion" type="date" class="form-control">
        </div>

        <div v-if="Status === 'Pasante'" class="form-group col-md-6">
          <label> Fecha de obtención de pasantía: </label>
          <input v-model="fechaobtencion" type="date" class="form-control">
        </div>

        <div v-if="Status === 'Título o grado en proceso'" class="form-group col-md-6">
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
          <input v-model.number="CVU" type="number" class="form-control">
        </div>

        <div class="form-group col-md-4">
          <label> ¿Cuentas con una carta de reconocimiento? </label>
          <select v-model="KnowledgeCard" class="form-control">
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
          <input v-if="'average' in errores" v-model.number="Average" type="number" class="form-control is-invalid">
          <input v-else v-model.number="Average" type="number" class="form-control">

          <div v-if="'average' in errores" class="invalid-feedback">{{errores.average}}</div>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Calificación mínima: </label>
          <input v-if="'min_avg' in errores" v-model.number="MinAvg" type="number" class="form-control is-invalid">
          <input v-else v-model.number="MinAvg" type="number" class="form-control">

          <div v-if="'min_avg' in errores" class="invalid-feedback">{{errores.min_avg}}</div>
        </div>

        <div class="form-group col-md-6 col-lg-4">
          <label> Calificación máxima: </label>
          <input v-if="'max_avg' in errores" v-model.number="MaxAvg" type="number" class="form-control is-invalid">
          <input v-else v-model.number="MaxAvg" type="number" class="form-control">

          <div v-if="'max_avg' in errores" class="invalid-feedback">{{errores.max_avg}}</div>
        </div>
      </div>
    </div>

    <documento-requerido 
      v-for="documento in RequiredDocuments" 
      :key="documento.name"
      :archivo.sync="documento.archivo" 
      :location.sync="documento.location" 
      :errores.sync = "documento.errores"
      v-bind="documento"
      @enviaDocumento = "cargaDocumento" >
    </documento-requerido>

    <div class="col-12 my-3">
      <button @click="agregaHistorialAcademico" class="btn btn-success"> Agregar </button>
      <button @click="actualizaHistorialAcademico" class="mx-2 btn btn-primary"> Guardar </button>
    </div>
  </div>
</template>

<script>
import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  components: { DocumentoRequerido, InputSolicitud },
  name: "grado-academico",

  props: {

    // Países que el postulante puede escoger.
    paises: Array,

    // id del grado.
    id: Number,

    // id del expediente.
    archive_id: Number,

    // Título del grado académico.
    degree: String,

    // Tipo de grado académico
    degree_type: String,

    // Cédula profesional.
    cedula: Number,

    // País en donde el estudiante realizó sus estudios.
    country: String,

    // Universidad en donde el postulante realizó sus estudios.
    university: String,

    // Modo de titulación.
    titration_mode: String,

    // Número de CVU de CONACyT.
    cvu: Number,

    // Estatus académico.
    status: String,

    // Estado de los datos del grado académico.
    state: { 
      type: String,
      
      validator(value){
        return ['Incompleto','Completo'].indexOf(value) !== -1;
      }
    },

    // Promedio obtenido.
    average: Number,

    // Promedio obtenido.
    min_avg: Number,

    // Promedio obtenido.
    max_avg: Number,

    // Promedio obtenido.
    knowledge_card: String,

    // Documentos requeridos en el programa académico.
    required_documents: Array,
  },

  data: function () {
    return {
      fechaobtencion: '',
      errores: {},
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

    CVU: {
      get(){
        return this.cvu;
      },
      set(newVal){
        this.$emit('update:cvu',newVal);
      }
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
        this.$emit('update:degree_type',newVal);
      }
    },

    Country: {
      get(){
        return this.country;
      },
      set(newVal){
        this.$emit('update:country',newVal);
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

    Status: {
      get(){
        return this.status;
      },
      set(newVal){
        this.$emit('update:status',newVal);
      }
    },

    State: {
      get(){
        return this.state;
      },
      set(newVal){
        this.$emit('update:state',newVal);
      }
    },

    RequiredDocuments: {
      get(){
        return this.required_documents;
      },
      set(newVal){
        this.$emit('update:required_documents',newVal);
      }
    },

    KnowledgeCard: {
      get(){
        return this.knowledge_card;
      },
      set(newVal){
        this.$emit('update:knowledge_card',newVal);
      }
    },

    Average: {
      get(){
        return this.average;
      },
      set(newVal){

        delete this.errores['average'];

        if (isNaN(newVal) || newVal.length === 0){
          this.errores['average'] = 'La calificación mínima solo puede ser numérica';
          this.$emit('update:average', 0);
          return;
        }

        this.$emit('update:average',newVal);
      }
    },

    MinAvg: {
      get(){
        return this.min_avg;
      },
      set(newVal){

        delete this.errores['min_avg'];

        if (isNaN(newVal) || newVal.length === 0){
          this.errores['min_avg'] = 'La calificación mínima solo puede ser numérica';
          this.$emit('update:min_avg', 0);
          return;
        }

        this.$emit('update:min_avg',newVal);
      }
    },

    MaxAvg: {
      get(){
        return this.max_avg;
      },
      set(newVal){

        delete this.errores['max_avg'];

        if (isNaN(newVal) || newVal.length === 0){
          this.errores['max_avg'] = 'La calificación máxima solo puede ser numérica';
          this.$emit('update:max_avg', 0);
          return;
        }

        this.$emit('update:max_avg',newVal);
      }
    },
  },
  methods: {
    escogePais(evento) {
      this.Universidades =
        this.paises[evento.target.selectedIndex - 1].universities;
    },

    agregaHistorialAcademico(evento) {
      this.enviaHistorialAcademico(evento, 'Completo');
    },

    actualizaHistorialAcademico(evento){
      this.enviaHistorialAcademico(evento, 'Incompleto');
    },

    enviaHistorialAcademico(evento, state){
      axios.post('/controlescolar/solicitud/updateAcademicDegree', {
        
        id: this.id,
        archive_id: this.archive_id,
        degree: this.degree,
        degree_type: this.degree_type,
        cvu: this.cvu,
        cedula: this.cedula,
        country: this.country,
        university: this.university,
        status: this.status,
        state: state,
        average: this.average,
        min_avg: this.min_avg,
        max_avg: this.max_avg,
        knowledge_card: this.knowledge_card,

      }).then(response => {
        this.id = response.data.id;
        this.archive_id = response.data.archive_id;
        this.Degree = response.data.degree;
        this.DegreeType = response.data.degree_type;
        this.CVU = response.data.cvu;
        this.Cedula = response.data.cedula;
        this.Country = response.data.country;
        this.University = response.data.university;
        this.Status = response.data.status;
        this.State = response.data.state;
        this.Average = response.data.average;
        this.MinAvg = response.data.min_avg;
        this.MaxAvg = response.data.max_avg;
        this.KnowledgeCard = response.data.knowledge_card;

      }).catch(error => {
        this.State = 'Incompleto';
        var errores = error.response.data['errors'];

        console.log(errores);
        /*
        requiredDocument.Errores = { 
          file: 'file' in errores ? errores.file[0] : null,
          id: 'requiredDocumentId' in errores ? errores.requiredDocumentId[0] : null,
        };*/
      });
    },

    cargaDocumento(requiredDocument, file) {
      
      var formData = new FormData();
      formData.append('requiredDocumentId', requiredDocument.id);
      formData.append('file', file);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/updateAcademicDegreeRequiredDocument',
        data: formData,
        headers: {
          'Accept' : 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        requiredDocument.datosValidos.file = '¡Archivo subido exitosamente!';
        requiredDocument.Location = response.data.location;        
        
      }).catch(error => {
        var errores = error.response.data['errors'];
        requiredDocument.Errores = { 
          file: 'file' in errores ? errores.file[0] : null,
          id: 'requiredDocumentId' in errores ? errores.requiredDocumentId[0] : null,
        };
      });
    },
  },
};
</script>