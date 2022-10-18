<template>
  <div class="row">
    <div class="form-group col-md-4">
      <label> Título del documento de trabajo: </label>
      <input type="text" class="form-control" v-model="Title" :readonly="true">
    </div>

    <div class="form-group col-md-4">
      <label> Título de la publicación: </label>
      <input type="text" class="form-control" v-model="PostTitleDocument" :readonly="true">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha de publicación: </label>
      <input type="date" class="form-control" v-model="PublishDate" :readonly="true">
    </div>
  </div>
</template>

<script>
export default {
  name: "documento-trabajo",
   props: {
    // Nombre de la reseña.
    title: String,

    // Nombre de la revista.
    post_title_document: String,

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
    PostTitleDocument: {
      get() {
        return this.post_title_document;
      },
      set(newVal) {
        // console.log('hoja : ' + this.post_title_document);
        this.$emit("update:post_title_document", newVal);
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