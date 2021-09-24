<template>
  <div class="row">
    <documento-requerido v-for="documento in requisitosIngreso.documentos" 
      :key="documento.nombre"
      :documento="documento">
    </documento-requerido>
  </div>
</template>


<script>
import RequisitoIngreso from '../../clases/RequisitoIngreso.js';

export default {
  name: "requisitos-ingreso",

  props: {
    requisitosIngreso: RequisitoIngreso,
  }
};
</script>