<template>
  <div class="form group">
    <!-- Se muestra como campo de agregado / edición. -->
    <label class="d-block"> Nombre del autor: </label>
    <input v-if="agregar || editar" 
      type="text" 
      class="form-control d-inline w-75"
      v-model="nombre"
    >
    <!-- Se muestra como campo de lectura. -->
    <input v-else-if="agregar === false && editar === false" 
      type="text" 
      class="form-control d-inline w-75"
      v-model="nombre"
      readonly
    >

    <button v-if="agregar === true && editar === false" 
      @click="agregaAutor" 
      class="btn btn-primary d-inline ml-3"
    >
      <i class="fas fa-user-plus"></i>
    </button>

    <button v-if="agregar === false && editar === true" 
      @click="actualizaAutor" 
      class="btn btn-primary d-inline ml-3"
    >
      <i class="fas fa-user-shield"></i>
    </button>


    <button v-if="agregar === false && editar === false" 
      @click="editaAutor" 
      class="btn btn-primary d-inline ml-3"
    >
      <i class="fas fa-user-edit"></i>
    </button>


  </div>
</template>

<script>

export default {
  name: "autor-articulo",
  data() {
    return {
      nombre: '',
      agregar: true,
      editar: false,
    }
  },
  methods: {
    agregaAutor(){
      this.agregar = false;
      this.editar = false;
      this.$emit('agregaAutor', this);
    },

    editaAutor(){
      this.agregar = false;
      this.editar = true;
    },

    actualizaAutor(){
      this.agregar = false;
      this.editar = false;
      this.$emit('actualizaAutor', this);
    }
  },
  computed:{
    Nombre: {
      get(){
        return this.nombre
      },
      set(newVal){

        this.$emit('update:nombre', newVal);
      }
    }
  }
};
</script>