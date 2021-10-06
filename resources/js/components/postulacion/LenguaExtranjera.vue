<template>
  <div class="row">
    <h4 class="form-group col-12 my-2"> </h4>
    
    <!-- Datos principales -->
    <div class="form-group col-4 my-auto">
      <img v-if="idioma === 'Alemán'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/alemania.png">
      <img v-else-if="idioma === 'Español'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/mexico.png">
      <img v-else-if="idioma === 'Inglés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/inglaterra.png">
      <img v-else-if="idioma === 'Francés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/francia.png">
    </div>

    <!--
      Visualización a partir de tamaños medianos o más pequeños.
    -->
    <div class="form-group col-8 d-md-none">
      <div class="row justify-content-end">
        <div class="form-group col-11">
          <label> Idioma: </label>
          <select v-model="Language" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>
        </div>

        <div class="form-group col-11">
          <label> Institución que otorgó el certificado: </label>
          <input v-model="Institution" type="text" class="form-control">
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
          <select v-model="Language" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>
        </div>

        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Institución que otorgó el certificado: </label>
          <input v-model="Institution" type="text" class="form-control">
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
          <input v-model="Score" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label> Fecha de aplicación:  </label>
          <input v-model="fechaAplicacion" type="date" class="form-control">
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Vigencia desde: </label>
          <input v-model="vigenciaDesde" type="date" class="form-control">
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Hasta: </label>
          <input v-model="vigenciaHasta" type="date" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Vigencia desde: </label>
      <input v-model="vigenciaDesde" type="date" class="form-control">
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Hasta: </label>
      <input v-model="vigenciaHasta" type="date" class="form-control">
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Grado de dominio: </label>
      <input v-model="language_domain" type="text" class="form-control">
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel conversacional: </label>
      <input v-model="language_domain" type="text" class="form-control">
    </div>


    <!--

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="vigenciaDesde"> 
      Nivel de lectura:
    </input-solicitud>

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="vigenciaHasta"> 
      Nivel de escritura:
    </input-solicitud>

    <documento-requerido v-for="documento in Documentos" :key="documento.name"
      :archivo.sync="documento.archivo" 
      :location.sync="documento.location" 
      :errores.sync = "documento.errores"
      @enviaDocumento = "cargaDocumento" 
      v-bind="documento">
    </documento-requerido>-->
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

    // Lengua extranjera.
    language: String,

    // Institución que otorgó el certificado.
    institution: String,

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

  computed: {
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

    Documentos: {
      get(){
        return this.documentos;
      },
      set(newVal){
        this.$emit('update:documentos', newVal);
      }
    }
  },

  data() {
    return {

      idiomas: [
        'Español',
        'Inglés',
        'Francés',
        'Alemán',
        'Otro'
      ]
    };
  },
  methods:{
    cargaDocumento(requiredDocument, file) {
      
      var formData = new FormData();
      formData.append('requiredDocumentId', requiredDocument.id);
      formData.append('file', file);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/guardaDocumentoPersonal',
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