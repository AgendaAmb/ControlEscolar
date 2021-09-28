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
    <div class="form-group col-8 d-md-none">
      <div class="row justify-content-end">
        <div class="form-group col-11">
          <label> Idioma: </label>
          <select v-model="idioma" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>
        </div>

        <input-solicitud clase="form-group col-11" v-model="institucion"> 
          Institución que otorgó el certificado:
        </input-solicitud>
      </div>
    </div>

    <div class="form-group col-md-8">
      <div class="row justify-content-end">

        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Idioma: </label>
          <select v-model="idioma" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>
        </div>

        <input-solicitud clase="form-group col-lg-6 d-none d-md-block" v-model="institucion"> 
          Institución que otorgó el certificado:
        </input-solicitud>

        <input-solicitud v-if="idioma === 'Inglés'"   clase="form-group col-md-6" v-model="examenIngles"> 
          Qué examen de inglés presentaste?
        </input-solicitud>

        <input-solicitud v-if="idioma === 'Inglés'"   clase="form-group col-md-6" v-model="tipoExamenIngles"> 
          Escoge un tipo de examen
        </input-solicitud>

        <input-solicitud clase="form-group col-md-6" v-model="puntuacion"> 
          Puntaje obtenido:
        </input-solicitud>

        <input-solicitud tipo="date" clase="form-group col-md-6" v-model="fechaAplicacion"> 
          Fecha de aplicación: 
        </input-solicitud>

        <input-solicitud tipo="date" clase="form-group d-none d-lg-block col-lg-6" v-model="vigenciaDesde"> 
          Vigencia desde:
        </input-solicitud>

        <input-solicitud tipo="date" clase="form-group d-none d-lg-block col-lg-6" v-model="vigenciaHasta"> 
          Vigencia hasta:
        </input-solicitud>
      </div>
    </div>

    <input-solicitud tipo="date" clase="form-group d-lg-none col-md-6" v-model="vigenciaDesde"> 
      Vigencia desde:
    </input-solicitud>

    <input-solicitud tipo="date" clase="form-group d-lg-none col-md-6" v-model="vigenciaHasta"> 
      Vigencia hasta:
    </input-solicitud>

    <input-solicitud clase="fform-group col-md-6 col-lg-3" v-model="vigenciaDesde"> 
      Grado de dominio:
    </input-solicitud>

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="vigenciaHasta"> 
      Nivel conversacional:
    </input-solicitud>

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
    </documento-requerido>
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
    documentos: Array
  },

  computed: {
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
      institucion: '', 
      idioma: '',
      examenIngles: '',
      tipoExamenIngles: '',
      otroIdioma: '',
      fechaAplicacion: null,
      vigenciaDesde: null,
      vigenciaHasta: null,
      puntuacion: 0,

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