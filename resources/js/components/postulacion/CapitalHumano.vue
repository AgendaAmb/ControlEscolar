<template>
  <div class="row">
    <div class="form-group col-md-4">
      <label> Nombre del curso: </label>
      <input type="text" class="form-control" v-model="capitalHumano.nombreCurso">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha: </label>
      <input type="date" class="form-control" v-model="capitalHumano.fechaCurso">
    </div>

    <div class="form-group col-md-4">
      <label> Nivel de escolaridad: </label>
      <input type="text" class="form-control" v-model="capitalHumano.nivelEscolaridad">
    </div>
  </div>
</template>


<script>
import CapitalHumanoModel from '../../clases/CapitalHumano.js';

export default {
  name: "capital-humano",

  data(){
    return {
      capitalHumano: new CapitalHumanoModel()
    }
  }
};
</script>