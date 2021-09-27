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
          <input class="form-control" type="text" v-model="idioma" readonly>
        </div>

        <div class="form-group col-11">
          <label> Institución que otorgó el certificado: </label>
          <input class="form-control" type="text" v-model="institucion" readonly>
        </div>
      </div>
    </div>

    <div class="form-group col-md-8">
      <div class="row justify-content-end">
        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Idioma: </label>
          <input class="form-control" type="text" v-model="idioma" readonly>
        </div>

        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Institución que otorgó el certificado: </label>
          <input class="form-control" type="text" v-model="idioma" readonly>
        </div>

        <div v-if="idioma === 'Inglés'" class="form-group col-lg-6 d-none d-md-block">
          <label> Qué examen de inglés presentaste? </label>
          <input class="form-control" type="text" v-model="examenIngles" readonly>
        </div>

        <div v-if="idioma === 'Inglés'" class="form-group col-lg-6 d-none d-md-block">
          <label> Escoge un tipo de examen </label>
          <input class="form-control" type="text" v-model="tipoExamenIngles" readonly>
        </div>

        <div class="form-group col-md-6">
          <label> Puntaje obtenido: </label>
          <input class="form-control" type="text" v-model="puntuacion" readonly>
        </div>

        <div class="form-group col-md-6">
          <label> Fecha de aplicación:  </label>
          <input class="form-control" type="date" v-model="fechaAplicacion" readonly>
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Vigencia desde: </label>
          <input class="form-control" type="date" v-model="vigenciaDesde" readonly>
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Vigencia hasta:  </label>
          <input class="form-control" type="date" v-model="vigenciaHasta" readonly>
        </div>
      </div>
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Vigencia desde:  </label>
      <input class="form-control" type="date" v-model="vigenciaDesde" readonly>
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Vigencia hasta:  </label>
      <input class="form-control" type="date" v-model="vigenciaHasta" readonly>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Grado de dominio:  </label>
      <input class="form-control" type="text" v-model="gradoDominio" readonly>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel conversacional: </label>
      <input class="form-control" type="text" v-model="nivelConversacional" readonly>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel de lectura:  </label>
      <input class="form-control" type="text" v-model="nivelLectura" readonly>
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel de escritura: </label>
      <input class="form-control" type="text" v-model="nivelEscritura" readonly>
    </div>

<!--

    <input-solicitud clase="form-group col-md-6 col-lg-3" v-model="vigenciaDesde"> 
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

    <documento-requerido v-bind="{
            name: '13.- Certificado de idioma',
            label: '13_Certf_Año_iniciales(Apellidos,Nombres) ',
            example: '13_Certf_2021_CJG ',
    }"></documento-requerido>-->
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
export default {
  name: "lengua-extranjera",

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
      gradoDominio: '',
      nivelConversacional: '',
      nivelLectura: '',
      nivelEscritura: '',

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