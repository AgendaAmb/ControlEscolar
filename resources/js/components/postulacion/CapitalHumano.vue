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
};
</script>