<template>
  <div class="row">
    <div class="form-group col-md-6">
      <label> Título del capítulo: </label>
      <input type="text" class="form-control" v-model="TituloCapitulo">
    </div>

    <div class="form-group col-md-6">
      <autor-articulo></autor-articulo>
    </div>

    <div class="form-group col-md-6">
      <label> Nombre del artículo: </label>
      <input type="text" class="form-control" v-model="NombreArticulo">
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
  name: "publicacion-capitulo",
  components: {AutorArticulo},
  props: {
    tituloCapitulo: String,
    autores: Array,
    nombreArticulo: String,
    anoPublicacion: String,
  },

  computed: {
    TituloCapitulo: {
      get() {
        return this.tituloCapitulo;
      },
      set(newVal) {
        this.$emit("update:tituloCapitulo", newVal);
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
    NombreArticulo: {
      get() {
        return this.nombreArticulo;
      },
      set(newVal) {
        this.$emit("update:nombreArticulo", newVal);
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