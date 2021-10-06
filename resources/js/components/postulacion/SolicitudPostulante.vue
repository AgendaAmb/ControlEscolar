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
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <h2 class="col-12 my-4"><strong> Requisitos de ingreso </strong></h2>  
    <slot name="requisitosingreso"></slot>
    <hr class="col-12 my-4" style="background-color:#FECC50; height: 1px;">

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Dominio de idiomas </strong></h2>
      <slot name="dominioidiomas"></slot>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Experiencia laboral </strong></h2>
      <slot name="experiencialaboral"></slot>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Producción científica </strong></h2>
      <slot name="prodcientifica"></slot>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
      <hr class="d-block my-4" style="background-color:#FECC50; height: 1px;">
    </div>

    <div class="col-12">
      <h2 class="d-block my-4"><strong> Capital humano (cursos impartidos) </strong></h2>
      <slot name="caphumano"></slot>
      <button class="d-block my-3 btn btn-success"> Agregar </button>
    </div>
  </div>
</template>

<script>

export default {
   name: "solicitud-postulante",
};
</script>