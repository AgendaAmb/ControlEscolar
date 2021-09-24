<template>
  <div class="row">
    <div class="col-12">
      <datos-personales :informacionpersonal="informacionpersonal"></datos-personales>
    </div>
    <hr class="col-md-12" style="background-color:#FECC50; height: 1px;">
    <h2 class="col-md-9 my-4"><strong> Historial académico </strong></h2>
    <div class="col-12">
      <grado-academico :gradoacademico="gradoacademico"></grado-academico>
    </div>

    <hr class="col-md-12" style="background-color:#FECC50; height: 1px;">
    <h2 class="col-md-9 my-4"><strong> Dominio de idiomas </strong></h2>
    <div class="col-12">
      <lengua-extranjera :lenguaextranjera="lenguaextranjera"></lengua-extranjera>
    </div>

    <hr class="col-md-12" style="background-color:#FECC50; height: 1px;">
    <h2 class="col-md-9 my-4"><strong> Trayectoria profesional </strong></h2>
    <div class="col-12">
      <experiencia-laboral></experiencia-laboral>
    </div>

    <hr class="col-md-12" style="background-color:#FECC50; height: 1px;">
    <h2 class="col-md-9 my-4"><strong> Producción científica </strong></h2>

    <div class="col-12">
      <produccion-cientifica></produccion-cientifica>
    </div>
  </div>
</template>

<script>
import DatosPostulante from '../../clases/DatosPostulante';
import GradoPostulante from '../../clases/GradoPostulante';
import IdiomaPostulante from '../../clases/IdiomaPostulante';
import DatosPersonales from './DatosPersonales.vue';
import GradoAcademico from './GradoAcademico.vue';
import LenguaExtranjera from './LenguaExtranjera.vue';

export default {
  components: { DatosPersonales, GradoAcademico, LenguaExtranjera },
  name: "solicitud-postulante",

  data() {
    return {
      errores: [],
      informacionpersonal: new DatosPostulante(),
      lenguaextranjera: new IdiomaPostulante(),
      gradoacademico: new GradoPostulante(),
    };
  },

};
</script>