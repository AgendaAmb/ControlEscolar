<template>
  <div class="row">
    <h4 class="form-group col-12 my-5"> 1.- Nuevo idioma</h4>
    
    <!-- Datos principales -->
    <div class="form-group col-4 my-auto">
      <img v-if="idioma === 'Alemán'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/alemania.png">
      <img v-else-if="idioma === 'Español'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/mexico.png">
      <img v-else-if="idioma === 'Inglés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/emojis/inglaterra.png">
      <img v-else-if="idioma === 'Francés'" class="d-block mx-auto" width="120px" src="/controlescolar/storage/academic-programs/francia.png">
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

        <div class="form-group col-11">
          <label> Institución que otorgó el certificado: </label>
          <input type="text" v-model="institucion" class="form-control">
        </div>
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

        <div class="form-group col-lg-6 d-none d-md-block">
          <label> Institución que otorgó el certificado: </label>
          <input type="text" v-model="institucion" class="form-control">
        </div>

        <div v-if="idioma === 'Inglés'"  class="form-group col-md-6">
          <label> ¿Qué examen de inglés presentaste? </label>
          <input type="text" v-model="examenIngles" class="form-control">
        </div>

        <div v-if="idioma === 'Inglés'"  class="form-group col-md-6">
          <label> Escoge un tipo de examen </label>
          <input type="text" v-model="tipoExamenIngles" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label> Puntaje obtenido: </label>
          <input type="text" v-model="puntuacion" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label> Fecha de aplicación: </label>
          <input type="date" v-model="fechaAplicacion" class="form-control">
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Vigencia desde: </label>
          <input type="date" v-model="vigenciaDesde" class="form-control">
        </div>

        <div class="form-group d-none d-lg-block col-lg-6">
          <label> Vigencia hasta: </label>
          <input type="date" v-model="vigenciaHasta" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Vigencia desde: </label>
      <input type="date" v-model="vigenciaDesde" class="form-control">
    </div>

    <div class="form-group d-lg-none col-md-6">
      <label> Vigencia hasta: </label>
      <input type="date" v-model="vigenciaHasta" class="form-control">
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Grado de dominio: </label>
      <input type="text" v-model="gradoDominio" class="form-control">
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel conversacional: </label>
      <input type="text" v-model="nivelConversacion" class="form-control">
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel de lectura: </label>
      <input type="text" v-model="nivelLectura" class="form-control">
    </div>

    <div class="form-group col-md-6 col-lg-3">
      <label> Nivel de escritura: </label>
      <input type="text" v-model="nivelEscritura" class="form-control">
    </div>

    <div class="form-group col-9 my-auto">
      <h5 class="mt-4 d-block font-weight-bold"> 13.- Certificado de idioma </h5>
      <p class="mt-3 mb-1 d-block">
        <strong> Etiqueta: </strong> 
        13_Certf_Año_iniciales(Apellidos,Nombres)
      </p>
      <p class="my-0 d-block"> 
        <strong> Ejemplo: </strong> 
        13_Certf_2021_CJG
      </p>
    </div>
    <div class="form-group col-3 my-auto">
      <label class="cargarArchivo d-block mx-auto">
        <input type="file" class="form-control d-none">
      </label>
    </div>
  </div>
</template>


<!-- Estilos del componente -->
<style scoped>
.cargarArchivo {
  background: url(/controlescolar/storage/archive-buttons/seleccionar.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}

.verArchivo {
  background: url(/controlescolar/storage/archive-buttons/ver.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}

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
      id: '',
      institucion: '',
      idioma: '',
      otroIdioma: '',
      examenIngles: '',
      tipoExamenIngles: '',
      gradoDominio: '',
      nivelConversacion: '',
      nivelLectura: '',
      nivelEscritura: '',
      certificacion: '',
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
  }
};
</script>