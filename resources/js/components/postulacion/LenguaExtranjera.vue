<template>
  <div class="row">
    <h4 class="form-group col-12 my-5"> 1.- Nuevo idioma</h4>
    
    <!-- Datos principales -->
    <div class="form-group col-4 my-auto">
      <img v-if="lenguaextranjera.idioma === 'Alemán'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/alemania.png">
      <img v-else-if="lenguaextranjera.idioma === 'Español'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/mexico.png">
      <img v-else-if="lenguaextranjera.idioma === 'Inglés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/inglaterra.png">
      <img v-else-if="lenguaextranjera.idioma === 'Francés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/academic-programs/francia.png">
    </div>
    <div class="form-group col-8 d-md-none">
      <div class="row justify-content-end">
        <div class="form-group col-11">
          <label> Idioma: </label>
          <select v-model="lenguaextranjera.idioma" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>
        </div>

        <input-solicitud clase="form-group col-11" v-model="lenguaextranjera.institucion"> 
          Institución que otorgó el certificado:
        </input-solicitud>
      </div>
    </div>

    <div class="form-group col-md-8">
      <div class="row justify-content-end">

        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Idioma: </label>
          <select v-model="lenguaextranjera.idioma" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option v-for="idioma in idiomas" :key="idioma" :value="idioma"> {{ idioma }} </option>
          </select>
        </div>

        <input-solicitud clase="form-group col-lg-6 d-none d-md-block" v-model="lenguaextranjera.institucion"> 
          Institución que otorgó el certificado:
        </input-solicitud>

        <input-solicitud v-if="lenguaextranjera.idioma === 'Inglés'"   clase="form-group col-md-6" v-model="lenguaextranjera.examenIngles"> 
          Qué examen de inglés presentaste?
        </input-solicitud>

        <input-solicitud v-if="lenguaextranjera.idioma === 'Inglés'"   clase="form-group col-md-6" v-model="lenguaextranjera.tipoExamenIngles"> 
          Escoge un tipo de examen
        </input-solicitud>

        <input-solicitud clase="form-group col-md-6" v-model="lenguaextranjera.puntuacion"> 
          Puntaje obtenido:
        </input-solicitud>

        <input-solicitud tipo="date" clase="form-group col-md-6" v-model="lenguaextranjera.fechaAplicacion"> 
          Fecha de aplicación: 
        </input-solicitud>

        <input-solicitud tipo="date" clase="form-group d-none d-lg-block col-lg-6" v-model="lenguaextranjera.vigenciaDesde"> 
          Vigencia desde:
        </input-solicitud>

        <input-solicitud tipo="date" clase="form-group d-none d-lg-block col-lg-6" v-model="lenguaextranjera.vigenciaHasta"> 
          Vigencia hasta:
        </input-solicitud>
      </div>
    </div>

    <input-solicitud tipo="date" clase="form-group d-lg-none col-md-6" v-model="lenguaextranjera.vigenciaDesde"> 
      Vigencia desde:
    </input-solicitud>

    <input-solicitud tipo="date" clase="form-group d-lg-none col-md-6" v-model="lenguaextranjera.vigenciaHasta"> 
      Vigencia hasta:
    </input-solicitud>

    <input-solicitud clase="fform-group col-md-6 col-lg-3" v-model="lenguaextranjera.vigenciaDesde"> 
      Grado de dominio:
    </input-solicitud>

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="lenguaextranjera.vigenciaHasta"> 
      Nivel conversacional:
    </input-solicitud>

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="lenguaextranjera.vigenciaDesde"> 
      Nivel de lectura:
    </input-solicitud>

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="lenguaextranjera.vigenciaHasta"> 
      Nivel de escritura:
    </input-solicitud>

    <documento-requerido :documento="lenguaextranjera.docprobatorio"></documento-requerido>
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

  data() {
    return {
      lenguaextranjera: {
        institucion: '',
        idioma: '',
        examenIngles: '',
        tipoExamenIngles: '',
        otroIdioma: '',
        fechaAplicacion: null,
        vigenciaDesde: null,
        vigenciaHasta: null,
        puntuacion: 0,
        docprobatorio: {
          nombre:"13.- Certificado de idioma",
          etiqueta:"13_Certf_Año_iniciales(Apellidos,Nombres) ",
          ejemplo:"13_Certf_2021_CJG"
        }
      },

      id: '',
      gradoDominio: '',
      nivelConversacion: '',
      nivelLectura: '',
      nivelEscritura: '',
      certificacion: '',

      idiomas: [
        'Español',
        'Inglés',
        'Francés',
        'Alemán',
        'Otro'
      ]
    };
  }
};
</script>