<template>
  <div class="row">
    <div class="form-group col-md-6">
      <label> Título del artículo: </label>
      <input type="text" class="form-control" v-model="TituloArticulo">
    </div>

    <div class="form-group col-md-6">
      <autor-articulo></autor-articulo>
    </div>

    <div class="form-group col-md-6">
      <label> Nombre de la revista: </label>
      <input type="text" class="form-control" v-model="NombreRevista">
    </div>

    <div class="form-group col-md-6">
      <label> Año de publicación: </label>
      <input type="text" class="form-control" v-model="AnoPublicacion">
    </div>
  </div>
</template>

<script>
import AutorArticulo from './AutorArticulo.vue'

export default {
  name: "publicacion-articulo",
  components: {AutorArticulo},
  props: {
    tituloArticulo: String,
    autores: Array,
    nombreRevista: String,
    anoPublicacion: String,
  },

  computed: {
    TituloArticulo: {
      get() {
        return this.nombreArticulo;
      },
      set(newVal) {
        this.$emit("update:nombreArticulo", newVal);
      },
    },
    Autores: {
      get() {
        return this.autores;
      },
      set() {
        this.$emit("update:autores", newVal);
      },
    },
    NombreRevista: {
      get() {
        return this.nombreRevista;
      },
      set(newVal) {
        this.$emit("update:nombreRevista", newVal);
      },
    },
    AnoPublicacion: {
      get() {
        return this.anoPublicacion;
      },
      set(newVal) {
        this.$emit("update:anoPublicacion", newVal);
      },
    },
  },
};
</script>