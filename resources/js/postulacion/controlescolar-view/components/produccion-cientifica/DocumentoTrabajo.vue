<template>
  <div class="row">
    <div class="form-group col-md-4">
      <label> Título del documento de trabajo: </label>
      <input type="text" class="form-control" v-model="Title">
    </div>

    <div class="form-group col-md-4">
      <label> Título de la publicación: </label>
      <input type="text" class="form-control" v-model="PostTitle">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha de publicación: </label>
      <input type="date" class="form-control" v-model="PublishDate">
    </div>
  </div>
</template>

<script>
export default {
  name: "documento-trabajo",
  props: {
    // Nombre del artículo
    title: String,

    // Nombre de la revista.
    post_title: String,

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
    PostTitle: {
      get() {
        return this.post_title;
      },
      set(newVal) {
        this.$emit("update:post_title", newVal);
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