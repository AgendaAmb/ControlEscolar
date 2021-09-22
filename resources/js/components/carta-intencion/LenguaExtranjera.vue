<template>
  <div class="row my-3 justify-content-left">
    <div class="d-none d-lg-block form-group col-7">
      <div class="row">
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Grado obtenido: </h5>
          <h5 class="d-inline-block my-0 ml-2"> Licenciatura </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> País de estudios: </h5>
          <h5 class="d-inline-block my-0 ml-2"> México </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Universidad: </h5>
          <h5 class="d-inline-block my-0 ml-2"> Universidad Autónoma de San Luis Potosí </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Fecha de obtención de grado: </h5>
          <h5 class="d-inline-block my-0 ml-2"> 24/09/2021 </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Título obtenido: </h5>
          <h5 class="d-inline-block my-0 ml-2"> Ingeniero en computación </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Estatus: </h5>
          <h5 class="d-inline-block my-0 ml-2"> Graduado </h5>
        </div>
        <div class="form-group col-12">
          <h5 class="d-inline-block my-0 font-weight-bold"> Promedio obtenido: </h5>
          <h5 class="d-inline-block my-0 ml-2"> 8.2 </h5>
        </div>
      </div>
    </div>
    
    <!-- Imagen del tipo de título -->
    <div class="form-group col-4 mb-auto">
      <img class="d-block mr-auto" width="120px" src="/controlescolar/storage/emojis/graduated.png">
    </div>


    <documento-requerido :documento="{
        nombre: '5.- Título de licenciatura o acta de examen.',
        etiqueta: '05_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
        ejemplo: '05A_TitLicenciatula_2021_CJG'
    }">
    </documento-requerido>

    <documento-requerido :documento="{
        nombre: '6.- Constancia de promedio',
        etiqueta: '06_Promedio_Año_iniciales(Apellidos,Nombres)',
        ejemplo: '06_Promedio_2021_CJG'
      }">
    </documento-requerido>

    <documento-requerido :documento="{
        nombre:'7.- Certificado de promedio',
        etiqueta:'07_Certf_Año_iniciales(Apellidos,Nombres)',
        ejemplo:'07_Certf_2021_CJG'
      }">
    </documento-requerido>

    <documento-requerido :documento="{
        nombre:'8.- Cédula profesional escaneada', 
        etiqueta:'08_Cédula_Año_iniciales(Apellidos,Nombres)',
        ejemplo:'08_Cédula_2021_CJG'
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