<template>
  <!-- Modal -->
  <div class="modal fade" id="NuevoPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-blue">
          <h5 class="modal-title" id="exampleModalLabel"> Nuevo periodo de entrevistas </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="creaPeriodo">
            <div class="form-row mt-4 mb-2">
              <div class="form-group col-6">
                <label> Fecha de inicio </label>
                <input v-model="start_date" type="date" class="form-control" required>
              </div>
              <div class="form-group col-6">
                <label> Fecha de fin </label>
                <input v-model="end_date" type="date" class="form-control" required>
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-group col-9">
                <label> Número de salas </label>
                <input v-model.number="num_salas" type="number" class="form-control" required min="1">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="creaPeriodo"> Registrar </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal-header.modal-header-blue, .modal-footer button.btn-primary {
  background-color: #115089;
  color: white;
  font-family: 'Myriad Pro Bold';
}

.modal-body label {
  color: #115089;
}

.modal-footer button.btn-secondary {
  color: white;
  font-family: 'Myriad Pro Bold';
}
</style>

<script>
export default {
  name: "nuevo-periodo",

  data() {
    return {
      event: {},
      start_date: null,
      end_date: null,
      num_salas: 1,
    };
  },

  methods: {
    creaPeriodo() {
      
      axios.post('/controlescolar/entrevistas/periods', {
        start_date: this.start_date,
        end_date: this.end_date,
        num_salas: this.num_salas,
      
      }).then(response =>  {
        var period = response.data;
        this.$emit('nuevoperiodo', period);
        
        $('#NuevoPeriodo').modal('hide');
      }).catch(error => {

      });
    },
  }
};
</script>