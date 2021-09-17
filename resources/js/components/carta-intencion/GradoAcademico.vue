<template>
  <div class="row my-3">
    <div class="col-lg-4">
      <h5 class="d-block my-4">
        <strong> {{id}}.- </strong> {{titulo}}
      </h5>
      <h5 class="d-block my-2">
        <strong> País donde realizó sus estudios: </strong> {{paisEstudios}}
      </h5>
      <h5 class="d-block my-2">
        <strong> Universidad de procedencia: </strong> 
      </h5>
      <h5 class="d-block my-2"><strong> Estatus: </strong>{{estatus}}</h5>
      <h5 class="d-block my-2">
        <strong> Fecha de titulación: </strong> {{fechaTitulacion}}
      </h5>
      <h5 class="d-block my-2"><strong> Promedio obtenido: </strong> {{promedio}}</h5>
    </div>

    <div class="col-lg-8 my-4">
      <div class="d-flex justify-content-between">
        <h5>Cédula profesional</h5>
        <a class="verArchivo" href="#"></a>
      </div>
    </div><!--
    <div class="col-lg-3 my-4">
      <h5 class="d-block">Constancia de promedio</h5>
      <a class="d-inline-block verArchivo" href="#"></a>
    </div>

    <div class="col-lg-3 my-4">
      <h5 class="d-block">Certificado de promedio</h5>
      <a class="d-inline-block verArchivo" href="#"></a>
    </div>


      <div class="row my-4 d-block d-lg-none">
        <div class="col-12 my-3 d-flex justify-content-between">
          <h5 class="d-inline-block">Cédula profesional escaneada</h5>
          <a class="d-inline-block verArchivo" href="#"></a>
        </div>
        <div class="col-12 my-3 d-flex justify-content-between">
          <h5 class="d-inline-block">Constancia de promedio</h5>
          <a class="d-inline-block verArchivo" href="#"></a>
        </div>
        <div class="col-12 my-3 d-flex justify-content-between">
          <h5 class="d-inline-block">Certificado de promedio</h5>
          <a class="d-inline-block verArchivo" href="#"></a>
        </div>
    </div>
      </div>-->
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
  name: "grado-academico-postulante",

  props: {
    id: Number,
    titulo: String,
    paisEstudios: String,
    estatus: String,
    fechaTitulacion: String,
    promedio: Number,
    calMin: Number,
    calMax: Number,
    numCedula: String,
    urlCedula: String,
    urlConstanciaPromedio: String,
    urlCertificadoPromedio: String,
  },

  data: function () {
    return {
    };
  },

  computed: {
    
  },
};
</script>