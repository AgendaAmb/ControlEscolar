<template>
  <div class="row">
    <div class="form-group col-md-4">
      <label> Nombre del curso: </label>
      <input type="text" class="form-control" v-model="CourseName">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha: </label>
      <input type="date" class="form-control" v-model="AssistedAt">
    </div>

    <div class="form-group col-md-4">
      <label> Nivel de escolaridad: </label>
      <input type="text" class="form-control" v-model="ScolarshipLevel">
    </div>

    <div class="col-12 my-3">
      <button @click="agregaCapitalHumano" class="btn btn-success"> Agregar </button>
      <button @click="actualizaCapitalHumano" class="mx-2 btn btn-primary"> Guardar </button>
    </div>
  </div>
</template>


<script>
export default {
  name: "capital-humano",

  props: {
    // id del capital humano.
    id: Number,

    // id del expediente.
    archive_id: Number,

    // Estado de control.
    state: String,

    // Nombre del curso.
    course_name: String,

    // Fecha del curso.
    assisted_at: String,

    // Nivel de escolaridad.
    scolarship_level: String
  },

  data(){
    return {
      errores: {}
    };
  },

  computed: {
    CourseName: {
      get(){
        return this.course_name;
      },
      set(newVal){
        this.$emit('update:course_name', newVal);
      }
    },
    AssistedAt: {
      get(){
        return this.assisted_at;
      },
      set(newVal){
        this.$emit('update:assisted_at', newVal);
      }
    },
    ScolarshipLevel: {
      get(){
        return this.scolarship_level;
      },
      set(newVal){
        this.$emit('update:scolarship_level', newVal);
      }
    }
  },

  methods: {
    agregaCapitalHumano(evento){
      this.enviaCapitalHumano(evento, 'Completo');
    },
    actualizaCapitalHumano(evento){
      this.enviaCapitalHumano(evento, 'Incompleto');
    },
    enviaCapitalHumano(evento, estado){
      this.errores = {};

      axios.post('/controlescolar/solicitud/updateHumanCapital', {

        id: this.id,
        archive_id: this.archive_id,
        state: estado,
        course_name: this.course_name,
        assisted_at: this.assisted_at,
        scolarship_level: this.scolarship_level,

      }).then(response => {
        Object.keys(response.data).forEach(dataKey => {
          var event = 'update:' + dataKey;
          this.$emit(event, response.data[dataKey]);
        });
 
      }).catch(error => {
        this.State = 'Incompleto';
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    }
  }
};
</script>