<template>
  <div class="form group mb-4">
    <label class="d-block"> Nombre del autor: </label>
    <input type="text" :class="ClassObject" v-model="Name">


    <button v-if="Addable" @click="agregaAutor" class="btn btn-success d-inline ml-3"><i class="fas fa-user-plus"></i></button>
    <button v-if="Modifiable" @click="actualizaAutor" class="btn btn-primary d-inline ml-3"><i class="fas fa-user-shield"></i></button>
    <div v-if="'name' in errores" class="invalid-feedback"> Por favor indica el nombre del autor.</div>
  </div>
</template>

<script>

export default {
  name: "autor-articulo",

  props: {
    // Id del autor.
    id: Number,

    // Id de la producción científica.
    scientific_production_id: Number,

    // Nombre del autor.
    name: String,
  },

  data(){
    return {
      errores: {}
    }
  },

  computed:{
    ClassObject: {
      get(){
        return {
          'form-control d-inline w-50': true,
          'is-invalid': 'name' in this.errores
        };
      }
    },
    Name: {
      get(){
        return this.name;
      },
      set(newVal){
        this.$emit('update:name', newVal);
      }
    }, 
    Addable: {
      get(){
        return this.id === -1;
      }
    },
    Modifiable: {
      get() {
        return this.id !== -1;
      }
    },
  },

  methods: {
    agregaAutor(){
      this.errores = {};

      if (this.name == null) {
        this.errores['name'] = 'Por favor coloca el nombre del autor';
        return false;
      }

      this.$emit('agregaAutor', this);
    },

    actualizaAutor(){
      this.errores = {};

      if (this.name == null) {
        this.errores['name'] = 'Por favor coloca el nombre del autor';
        return false;
      }

      this.$emit('actualizaAutor', this);
    }
  },
};
</script>