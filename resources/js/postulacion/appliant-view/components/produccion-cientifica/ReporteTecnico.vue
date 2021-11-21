<template>
  <div class="row">
    <div class="form-group col-md-4">
      <label> Título: </label>
      <input type="text" class="form-control" v-model="Title">
    </div>

    <div class="form-group col-md-4">
      <label> Institución a la que se presenta el reporte: </label>
      <input type="text" class="form-control" v-model="Institution">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha de publicación: </label>
      <input type="date" class="form-control" v-model="PublishDate">
    </div>
  </div>
</template>

<script>
export default {
  name: "reporte-tecnico",
  props: {
    // Nombre del artículo
    title: String,

    // Nombre de la revista.
    institution: String,

    // Fecha de publicación.
    publish_date: String,
  },

  computed: {
    Title: {
      get() {
        return this.title;
      },
      set(newVal) {
        this.$emit("update:title", newVal);
      },
    },
    Institution: {
      get() {
        return this.institution;
      },
      set(newVal) {
        this.$emit("update:institution", newVal);
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