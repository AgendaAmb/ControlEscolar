<template>
  <div class="d-flex form-row my-4 justify-content-center align-items-center">
    <div id="list-example" class="col-12 list-group">
      <div
        @click="mostrarArchivo(archive.id)"
        v-for="(archive, index) in archives"
        :key="index"
        class="list-group-item list-group-item-action"
      >
        <p class="display-5">{{ archive.announcement.academicProgram.name }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    archives: {
      type: Array,
      default: [],
    },

  },
  data() {
    return {
      alias_selected: null,
    };
  },

  name: "programas-academicos-registrados",

  computed: {},

  methods: {
    mostrarArchivo(archive_id) {
      window.location.href =
        "/controlescolar/solicitud/expediente/" + archive_id;
    },
  },
};
</script>

