<template>
  <div class="row my-2 text-center justify-content-center">

    <div class="col-12 my-2 mx-2">
      <p class="display-4"><strong>Elige el expediente a visualizar</strong></p>
    </div>

    <div id="list-example" class="col-12 mx-2 my-2 list-group">
      <div
        v-for="(archive, index) in archives"
        @click="mostrarArchivo(archive.id)"
        :key="index"
        class="list-group-item list-group-item-action"
       >
        <p class="h4">{{ archive.announcement.academic_program.name }}</p>
      </div>
    </div>
  </div>
</template>
<style scoped>
.list-group-item {
  background-color: #fff;
  border-top: 1px solid #0091b5;
  border-bottom: none;
  border-left-color: #fff;
  border-right-color: #fff;
}

 .list-group-item:hover {
  background-color: #0598BC;
  color:#fff;
}
</style>
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

  created(){
    this.archives.forEach(element => {
      console.log(element.announcement.academic_program.name);
    });
  }
};
</script>

