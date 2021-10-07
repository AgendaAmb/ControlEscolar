<template>
  <div class="row">
    <div class="form-group col-md-6">
      <label> Título del artículo: </label>
      <input type="text" class="form-control" v-model="ArticleName">
    </div>

    <div class="form-group col-md-6">
      <slot></slot>
    </div>

    <div class="form-group col-md-6">
      <label> Nombre de la revista: </label>
      <input type="text" class="form-control" v-model="MagazineName">
    </div>

    <div class="form-group col-md-6">
      <label> Fecha de publicación: </label>
      <input type="date" class="form-control" v-model="PublishDate">
    </div>
  </div>
</template>

<script>
import AutorArticulo from './AutorArticulo.vue'

export default {
  name: "publicacion-articulo",
  components: {AutorArticulo},
  props: {
    // Nombre del artículo
    title: String,
    
    // Nombre de la revista.
    magazine_name: String,

    // Fecha de publicación.
    publish_date: String,
  },

  computed: {
    ArticleName: {
      get() {
        return this.title;
      },
      set(newVal) {
        this.$emit("update:title", newVal);
      },
    },
    MagazineName: {
      get() {
        return this.magazine_name;
      },
      set(newVal) {
        this.$emit("update:magazine_name", newVal);
      },
    },
    PublishDate: {
      get() {
        return this.publish_date;
      },
      set(newVal) {
        this.$emit("update:publish_date", newVal);
      },
    },
  },
};
</script>