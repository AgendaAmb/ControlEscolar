<template>
  <div class="row">
    <documento-requerido v-for="documento in requisitosIngreso.documentos" 
      :key="documento.nombre"
      :documento="documento">
    </documento-requerido>
  </div>
</template>


<script>
import RequisitosIngresoModel from '../../clases/RequisitosIngreso.js';

export default {
  name: "requisitos-ingreso",

  props: {
    requisitosIngreso: RequisitosIngresoModel,
  }
};
</script>