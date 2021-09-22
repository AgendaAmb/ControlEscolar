<template>
  <div class="col-12">
    <div class="row my-3">
      <div class="form-group col-9 my-auto">
        <h5 class="mt-4 d-block"><strong> {{ documento.nombre }} </strong></h5>
        <p class="mt-3 mb-1 d-block"><strong> Etiqueta: </strong> {{ documento.etiqueta }} </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ documento.ejemplo }} </p>
      </div>
      <div class="form-group col-3 my-auto">
        <a v-if="'archivo' in documento && documento.archivo !== null && documento.url !== null" class="verArchivo d-block my-2 ml-auto" :href="documento.url" target="_blank"></a>
        <label class="cargarArchivo d-block ml-auto my-auto">
          <input type="file" class="form-control d-none" @change="cargaDocumento">
        </label>
      </div>
    </div>
  </div>
</template>

<style scoped>
.cargarArchivo {
  background: url(/controlescolar/storage/archive-buttons/seleccionar.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}

.verArchivo {
  background: url(/controlescolar/storage/archive-buttons/ver.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}
</style>

<script>
export default {
  name: "documento-requerido",

  model: {
    prop: 'documento',
    event: 'change',
  },
  
  props: {
    documento: Object,
  },

  data() {
    return {
      errores: []
    };
  },

  
  methods: {
    cargaDocumento(e) {

      this.$nextTick(function () {
        let reader = new FileReader();

        reader.onload = (event) => {
          Vue.set(this.documento, 'archivo', e.target.files[0]);
          Vue.set(this.documento, 'url', event.target.result);
        };

        reader.readAsDataURL(e.target.files[0]);
      });
    },
  },
};
</script>