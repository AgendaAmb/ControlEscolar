<template>
  <div class="row">
    <h4 class="form-group col-12 my-2"> </h4>
    
    <!-- Datos principales -->
    <div class="form-group col-4 my-auto">
      <img v-if="Language === 'Alemán'" 
        class="d-block mx-auto" 
        width="120px" 
        src="/controlescolar/storage/emojis/alemania.png">
      
      <img v-else-if="Language === 'Español'" 
        class="d-block mx-auto" 
        width="120px" 
        src="/controlescolar/storage/emojis/mexico.png">
      <img v-else-if="Language === 'Inglés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/inglaterra.png">
      <img v-else-if="Language=== 'Francés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/francia.png">
    </div>

    <!--
      Visualización a partir de tamaños medianos o más pequeños.
    -->
    <div class="form-group col-8 d-md-none">
      <div class="row justify-content-end">
        <div class="form-group col-11">
          <label> Idioma: </label>
          <select v-model="Language" class="form-control" :class="{'is-invalid': 'language' in errores}">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>

          <div v-if="'language' in errores" class="invalid-feedback">{{errores.language}}</div>
        </div>

        <div class="form-group col-11">
          <label> Institución que otorgó el certificado: </label>
          <input v-model="Institution" type="text" 
            class="form-control" 
            :class="{ 'is-invalid': ('institution' in errores) }">

          <div v-if="'institution' in errores" class="invalid-feedback">{{errores.institution}}</div>
        </div>
      </div>
    </div>

    <!--
      Visualización a partir de tamaños medianos o más grandes.
    -->
    <div class="form-group col-md-8">
      <div class="row justify-content-end">
        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Idioma: </label>
          <select v-model="Language" class="form-control" :class="{'is-invalid': 'language' in errores}">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>

          <div v-if="'language' in errores" class="invalid-feedback">{{errores.language}}</div>
        </div>

        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Institución que otorgó el certificado: </label>
          <input v-model="Institution" type="text" 
            class="form-control" 
            :class="{ 'is-invalid': ('institution' in errores) }">

            <div v-if="'institution' in errores" class="invalid-feedback">{{errores.institution}}</div>
        </div>

        <div v-if="Language === 'Inglés'" class="form-group col-md-6">
          <label> ¿Qué examen de inglés presentaste? </label>
          <input type="text" class="form-control">
        </div>

        <div v-if="Language === 'Inglés'" class="form-group col-md-6">
          <label> Escoge un tipo de examen </label>
          <input type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label> Puntaje obtenido: </label>
          <input v-model.number="Score" type="number" 
            class="form-control" 
            :class="{ 'is-invalid': ('score' in errores) }">

            <div v-if="'score' in errores" class="invalid-feedback">{{errores.score}}</div>
        </div>

        <div class="form-group col-md-6">
          <label> Fecha de aplicación:  </label>
          <input v-model="PresentedAt" 
            type="date" 
            class="form-control" 
            :class="{ 'is-invalid': ('presented_at' in errores) }">

          <div v-if="'presented_at' in errores" class="invalid-feedback">{{errores.presented_at}}</div>
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Vigencia desde: </label>
          <input v-model="ValidFrom" 
            type="date" 
            class="form-control" :class="{ 'is-invalid': ('valid_from' in errores) }">

          <div v-if="'valid_from' in errores" class="invalid-feedback">{{errores.valid_from}}</div>
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Hasta: </label>
          <input v-model="ValidTo" 
            type="date" 
            class="form-control" :class="{ 'is-invalid': ('valid_to' in errores) }">

          <div v-if="'valid_to' in errores" class="invalid-feedback">{{errores.valid_to}}</div>
        </div>
      </div>
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Vigencia desde: </label>
      <input v-model="ValidFrom" 
        type="date" 
        class="form-control" :class="{ 'is-invalid': ('valid_from' in errores) }">

      <div v-if="'valid_from' in errores" class="invalid-feedback">{{errores.valid_from}}</div>
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Hasta: </label>
      <input v-model="ValidTo" 
        type="date" 
        class="form-control" :class="{ 'is-invalid': ('valid_to' in errores) }" >

      <div v-if="'valid_to' in errores" class="invalid-feedback">{{errores.valid_to}}</div>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Grado de dominio: </label>
      <input v-model="LanguageDomain" 
        type="text" 
        class="form-control" :class="{ 'is-invalid': ('language_domain' in errores) }">

      <div v-if="'language_domain' in errores" class="invalid-feedback">{{errores.language_domain}}</div>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel conversacional: </label>
      <input v-model="ConversationalLevel" 
        type="text" 
        class="form-control" :class="{ 'is-invalid': ('writing_level' in errores) }">

      <div v-if="'conversational_level' in errores" class="invalid-feedback">{{errores.conversational_level}}</div>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel de lectura: </label>
      <input v-model="ReadingLevel" 
        type="text" 
        class="form-control" :class="{ 'is-invalid': ('reading_level' in errores) }">

      <div v-if="'reading_level' in errores" class="invalid-feedback">{{errores.reading_level}}</div>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel de escritura: </label>
      <input v-model="WritingLevel" 
        type="text" 
        class="form-control" :class="{ 'is-invalid': ('writing_level' in errores) }">
      <div v-if="'writing_level' in errores" class="invalid-feedback">{{errores.writing_level}}</div>
    </div>

    <documento-requerido v-for="documento in Documentos" :key="documento.name"
      :archivo.sync="documento.archivo" 
      :location.sync="documento.pivot.location" 
      :errores.sync = "documento.errores"
      @enviaDocumento = "cargaDocumento" 
      v-bind="documento">
    </documento-requerido>

    <div class="col-12 my-3">
      <button @click="agregaLenguaExtranjera" class="btn btn-success"> Agregar </button>
      <button @click="actualizaLenguaExtranjera" class="mx-2 btn btn-primary"> Guardar </button>
    </div>
  </div>
</template>


<!-- Estilos del componente -->
<style scoped>

.pais {
  background-size: auto;
  background-repeat: no-repeat;
}

.alemania {
  background-image: url('/controlescolar/storage/academic-programs/alemania.png');
}

</style>
<!-- Fin estilos -->

<script>
import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  name: "lengua-extranjera",
  components: { DocumentoRequerido, InputSolicitud },
  props: {
    // Id.
    id: Number,

    // Id del expediente.
    archive_id: Number,

    // Estado del idioma.
    state: String,

    // Lengua extranjera.
    language: String,

    // Institución que otorgó el certificado.
    institution: String,

    // Puntaje de examen.
    score: Number,

    // Fecha de aplicación.
    presented_at: String,

    // Vigencia desde.
    valid_from: String,

    // Vigencia hasta.
    valid_to: String,

    // Dominio del idioma.
    language_domain: String,

    // Nivel conversacional.
    conversational_level: String,

    // Nivel de lectura.
    reading_level: String,

    // Nivel de escritura.
    writing_level: String,

    // Documentos probatorios.
    documentos: Array
  },

  data() {
    return {
      errores: {},
      mensajesExito: {},
      idiomas: [
        'Español',
        'Inglés',
        'Francés',
        'Alemán',
        'Otro'
      ],
      clases: {
        state: 'form-control',
        language: 'form-control',
        institution: 'form-control',
        score: 'form-control',
        presented_at: 'form-control',
        valid_from: 'form-control',
        valid_to: 'form-control',
        language_domain: 'form-control',
        conversational_level: 'form-control',
        reading_level: 'form-control',
        writing_level: 'form-control'
      }
    };
  },

  computed: {
    State: {
      get(){
        return this.state;
      },
      set(newVal){
        this.$emit('update:state', newVal);
      }
    },
    Language: {
      get(){
        return this.language;
      },
      set(newVal){
        this.$emit('update:language', newVal);
      }
    },
    Institution: {
      get(){
        return this.institution;
      },
      set(newVal){
        this.$emit('update:institution', newVal);
      }
    },
    Score: {
      get(){
        return this.score;
      },
      set(newVal){
        this.$emit('update:score', newVal);
      }
    },
    PresentedAt: {
      get(){
        return this.presented_at;
      },
      set(newVal){
        this.$emit('update:presented_at', newVal);
      }
    },
    ValidFrom: {
      get(){
        return this.valid_from;
      },
      set(newVal){
        this.$emit('update:valid_from', newVal);
      }
    },
    ValidTo: {
      get(){
        return this.valid_to;
      },
      set(newVal){
        this.$emit('update:valid_to', newVal);
      }
    },
    LanguageDomain: {
      get(){
        return this.language_domain
      }, 
      set(newVal){
        this.$emit('update:language_domain', newVal);
      }
    },
    ConversationalLevel: {
      get(){
        return this.conversational_level
      }, 
      set(newVal){
        this.$emit('update:conversational_level', newVal);
      }
    },
    ReadingLevel: {
      get(){
        return this.reading_level
      }, 
      set(newVal){
        this.$emit('update:reading_level', newVal);
      }
    },
    WritingLevel: {
      get(){
        return this.writing_level;
      }, 
      set(newVal){
        this.$emit('update:writing_level', newVal);
      }
    },

    Documentos: {
      get(){
        return this.documentos;
      },
      set(newVal){
        this.$emit('update:documentos', newVal);
      }
    }
  },
  methods:{

    agregaLenguaExtranjera(evento) {
      this.enviaLenguaExtranjera(evento, 'Completo');
    },

    actualizaLenguaExtranjera(evento){
      this.enviaLenguaExtranjera(evento, 'Incompleto');
    },

    enviaLenguaExtranjera(evento, estado){
      this.errores = {};

      axios.post('/controlescolar/solicitud/updateAppliantLanguage', {
        
        id: this.id,
        archive_id: this.archive_id,
        state: estado,
        language: this.language,
        institution: this.institution,
        score: this.score,
        presented_at: this.presented_at,
        valid_from: this.valid_from,
        valid_to: this.valid_to,
        language_domain: this.language_domain,
        conversational_level: this.conversational_level,
        reading_level: this.reading_level,
        writing_level: this.writing_level

      }).then(response => {
        
        // El resultado fue exitoso.
        Object.keys(response.data).forEach(dataKey => {
          var event = 'update:' + dataKey;
          this.$emit(event, response.data[dataKey]);
        });

      }).catch(error => {
        
        // La solicitud no fue procesada correctamente.
        this.State = 'Incompleto';
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    },

    cargaDocumento(requiredDocument, file) {
      
      var formData = new FormData();
      formData.append('id', this.id);
      formData.append('archive_id', this.archive_id);
      formData.append('requiredDocumentId', requiredDocument.id);
      formData.append('file', file);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/updateAppliantLanguageRequiredDocument',
        data: formData,
        headers: {
          'Accept' : 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        requiredDocument.datosValidos.file = '¡Archivo subido exitosamente!';
        requiredDocument.Location = response.data.location;        
        
      }).catch(error => {
        console.log(error);
        var errores = error.response.data['errors'];
        requiredDocument.Errores = { 
          file: 'file' in errores ? errores.file[0] : null,
          id: 'requiredDocumentId' in errores ? errores.requiredDocumentId[0] : null,
        };
      });
    },
  }
};
</script>