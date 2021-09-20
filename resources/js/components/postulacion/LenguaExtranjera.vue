<template>
  <div class="row">
    <h4 class="form-group col-12 my-5"> 1.- Nuevo idioma</h4>
    <div class="form-group col-sm-6 col-md-4">
      <label> Institución que otorgó el certificado: </label>

      <input type="text" v-model="institucion" class="form-control">
    </div>

    <div class="form-group col-sm-6 col-md-8">
      <label> Idioma: </label>
      <input type="text" v-model="idioma" class="form-control">
    </div>

    <div class="form-group col-xl-6">
      <div class="row mt-4">
        <div class="form-group col-sm-6">
          <label> Grado de dominio: </label>
          <input type="text" v-model="gradoDominio" class="form-control">
        </div>

        <div class="form-group col-sm-6">
          <label> Nivel conversacional: </label>
          <input type="text" v-model="nivelConversacion" class="form-control">
        </div>

        <div class="form-group col-sm-6">
          <label> Nivel de lectura: </label>
          <input type="text" v-model="nivelLectura" class="form-control">
        </div>

        <div class="form-group col-sm-6">
          <label> Nivel de escritura: </label>
          <input type="text" v-model="nivelEscritura" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-6 d-none d-xl-block">
          <label> Puntaje obtenido: </label>
          <input type="text" v-model="puntuacion" class="form-control">
        </div>
        <div class="form-group col-6 d-none d-xl-block">
          <label> Fecha de aplicación: </label>
          <input type="date" v-model="fechaAplicacion" class="form-control">
        </div>

        <div class="form-group col-6 d-none d-xl-block">
          <label> Vigencia desde: </label>
          <input type="date" v-model="vigenciaDesde" class="form-control">
        </div>

        <div class="form-group col-6 d-none d-xl-block">
          <label> Vigencia hasta: </label>
          <input type="date" v-model="vigenciaHasta" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group d-none d-xl-block col-xl-4 my-auto">
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
    <div class="form-group d-none d-xl-block col-xl-2 my-auto">
      <label class="cargarArchivo my-3">
        <input type="file" class="form-control d-none">
      </label>
    </div>

    <div class="form-group col-xl-6 d-block d-xl-none">
      <div class="row">
        <div class="form-group col-md-6">
          <label> Puntaje obtenido: </label>
          <input type="text" v-model="puntuacion" class="form-control">
        </div>
        <div class="form-group col-md-6">
          <label> Fecha de aplicación: </label>
          <input type="date" v-model="fechaAplicacion" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label> Vigencia desde: </label>
          <input type="date" v-model="vigenciaDesde" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label> Vigencia hasta: </label>
          <input type="date" v-model="vigenciaHasta" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group d-block d-xl-none col-9">
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
    <div class="form-group d-block d-xl-none col-3 my-auto">
      <label class="cargarArchivo">
        <input type="file" class="form-control d-none">
      </label>
    </div>
  </div>
</template>

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
</style>


<script>
export default {
  name: "grado-academico",

  data() {
    return {
      id: '',
      institucion: '',
      idioma: '',
      gradoDominio: '',
      nivelConversacion: '',
      nivelLectura: '',
      nivelEscritura: '',
      certificacion: '',
      fechaAplicacion: null,
      vigenciaDesde: null,
      vigenciaHasta: null,
      puntuacion: 0,
    };
  }
};
</script>