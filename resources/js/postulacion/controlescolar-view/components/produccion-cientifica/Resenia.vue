<template>
  <div class="row">
    <div class="form-group col-md-4">
      <label> Título de la reseña: </label>
      <input type="text" class="form-control" v-model="Title">
    </div>

    <div class="form-group col-md-4">
      <label> Título de la publicación: </label>
      <input type="text" class="form-control" v-model="PostTitleReview">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha de publicación: </label>
      <input type="date" class="form-control" v-model="PublishDate">
    </div>
  </div>
</template>

<script>
export default {
  name: "resenia",
  props: {
    // Nombre de la reseña.
    title: String,

    // Nombre de la revista.
    post_title_review: String,

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
    PostTitleReview: {
      get() {
        return this.post_title_review;
      },
      set(newVal) {
        this.$emit("update:post_title_review", newVal);
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