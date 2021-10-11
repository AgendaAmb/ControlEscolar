<template>
  <div class="form-row mt-5">
    <div class="form-group col-md-6">
      <label> Programa académico: </label>
      <select v-model="academic_program" class="form-control">
        <option :value="null" selected> Escoge una opción</option>
        <option v-for="academicProgram in academic_programs" 
          :key="academicProgram.id"  
          :value="academicProgram.id">{{academicProgram.name}}</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label> Número de resultados: </label>
      <select v-model="result_size" class="form-control">
        <option :value="null" selected> Escoge una opción</option>
        <option :value="25"> 25 </option>
        <option :value="50"> 50 </option>
        <option :value="100"> 100 </option>
        <option :value="200"> 200 </option>
      </select>
    </div>

    <div class="form-group col-12">
      <button class="d-block mb-3 btn btn-primary" @click="buscaExpedientes"> Buscar </button>
    </div>

    <div class="col-12">
      <table class="table">
        <thead>
          <tr v-if="archives.length > 0">
            <th scope="col" class="text-center"> # de expediente </th>
            <th scope="col"> Nombre completo </th>
            <th scope="col"> Programa académico </th>
            <th scope="col" class="text-center"> Estado </th>
            <th scope="col" class="text-center"> Detalles </th>
          </tr>
        </thead>
        <tbody>
          <expediente v-for="archive in archives" 
            :key="archive.id"
            v-bind="archive">
          </expediente>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Expediente from './Expediente.vue';

export default {
  components: { Expediente },
  name: "expedientes",

  props: {
    // Programas académicos.
    academic_programs: Array
  },

  data() {
    return {
      archives: [],
      academic_program: null,
      result_size: null
    };
  },

  methods: {
    buscaExpedientes(event) {
      axios.get('/controlescolar/solicitud/archives')
      .then(response => {
        this.archives = response.data;
      
      }).catch(error => {
        
      });
    }
  }
};
</script>