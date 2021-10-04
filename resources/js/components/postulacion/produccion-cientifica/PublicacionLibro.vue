<template>
  <div class="row">
    <div class="form-group col-md-6">
      <label> Título del libro: </label>
      <input type="text" class="form-control" v-model="TituloLibro">
    </div>

    <div class="form-group col-md-6">
      <autor-articulo></autor-articulo>
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
  name: "publicacion-libro",
  components: {AutorArticulo},
  props: {
    tituloLibro: String,
    autores: Array,
    anoPublicacion: String,
  },

  computed: {
    TituloLibro: {
      get() {
        return this.tituloLibro;
      },
      set(newVal) {
        this.$emit("update:tituloLibro", newVal);
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