<template>
  <div class="row my-3 justify-content-left">
    <div class="d-none d-lg-block form-group col-7">
      <div class="row">
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Idioma: </h5>
          <h5 class="d-inline-block my-0 ml-2"> Inglés </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Examen de inglés presentado: </h5>
          <h5 class="d-inline-block my-0 ml-2"> TOEFL </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Tipo de examen: </h5>
          <h5 class="d-inline-block my-0 ml-2"> ITP </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> puntaje obtenido: </h5>
          <h5 class="d-inline-block my-0 ml-2"> 630 </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Fecha de aplicación: </h5>
          <h5 class="d-inline-block my-0 ml-2"> 24/09/2021 </h5>
        </div>
      </div>
    </div>
    

    <documento-requerido :documento="{
      nombre:'13.- Certificado de idioma',
      etiqueta:'13_Certf_Año_iniciales(Apellidos,Nombres)',
      ejemplo:'13_Certf_2021_CJG'
    }">
    </documento-requerido>
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
import DocumentoRequerido from './DocumentoRequerido.vue';
export default {
  components: { DocumentoRequerido },
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