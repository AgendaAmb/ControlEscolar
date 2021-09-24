<template>
  <div class="row">
    <div class="col-12">
      <h2 class="d-block my-5"><strong> Datos Personales </strong></h2>
      <datos-personales :informacionpersonal="informacionpersonal"></datos-personales>
      <hr class="d-block" style="background-color:#FECC50; height: 1px;">
    </div>
  
    <div class="col-12">
      <h2 class="d-block my-4"><strong> Historial académico </strong></h2>
      <grado-academico :gradoacademico="gradoacademico"></grado-academico>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Requisitos de ingreso </strong></h2>
      <requisitos-ingreso :requisitosIngreso="requisitosIngreso"></requisitos-ingreso>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Dominio de idiomas </strong></h2>
      <lengua-extranjera :lenguaextranjera="lenguaextranjera"></lengua-extranjera>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Trayectoria profesional </strong></h2>
      <experiencia-laboral></experiencia-laboral>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Producción científica </strong></h2>
      <produccion-cientifica></produccion-cientifica>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Capital humano (cursos impartidos) </strong></h2>
      <capital-humano></capital-humano>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
    </div>
  </div>
</template>

<script>
import DatosPostulante from '../../clases/DatosPostulante';
import GradoAcademicoModel from '../../clases/GradoAcademico';
import LenguaExtranjeraModel from '../../clases/LenguaExtranjera';
import RequisitosIngresoModel from '../../clases/RequisitosIngreso';
import CapitalHumano from './CapitalHumano.vue';
import DatosPersonales from './Postulante.vue';
import GradoAcademico from './GradoAcademico.vue';
import LenguaExtranjera from './LenguaExtranjera.vue';
import RequisitosIngreso from './RequisitosIngreso.vue';

export default {
  components: { DatosPersonales, GradoAcademico, LenguaExtranjera, RequisitosIngreso, CapitalHumano },
  name: "solicitud-postulante",

  data() {
    return {
      errores: [],
      informacionpersonal: new DatosPostulante(),
      lenguaextranjera: new LenguaExtranjeraModel(),
      gradoacademico: new GradoAcademicoModel(),
      requisitosIngreso: new RequisitosIngresoModel(),
    };
  },

};
</script>