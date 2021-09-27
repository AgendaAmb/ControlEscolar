<template>
  <div class="row">
    <div class="col-12">
      <h2 class="d-block my-5 font-weight-bold"> Datos Personales </h2>
      <slot name="postulante"></slot>
      <hr class="d-block" style="background-color:#FECC50; height: 1px;">
    </div>
  
    
    <div class="col-12">
      <h2 class="d-block my-5 font-weight-bold"> Historial académico </h2>
      <slot name="historialacademico"></slot>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

<!--
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
    </div>-->
  </div>
</template>

<script>

export default {
   name: "solicitud-postulante",
};
</script>