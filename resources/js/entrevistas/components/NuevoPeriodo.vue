<template>
  <!-- Modal -->
  <div class="modal fade" id="NuevoPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
            <div class="form-row mt-2 mb-1">
              <div class="form-group col-6">
                <label> Fecha de inicio </label>
                <input v-model="start_date" type="date" class="form-control" required>
              </div>
              <div class="form-group col-6">
                <label> Fecha de fin </label>
                <input v-model="end_date" type="date" class="form-control" required>
              </div>
            </div>
            <div class="form-row my-1">
              <div class="form-group col-12">
                <label> Convocatoria </label>
                <select v-model="announcement_id" class="form-control">
                  <option :value="null" selected>Escoge una convocatoria </option>
                  <option v-for="announcement in announcements" :key="announcement.id" :value="announcement.id"> {{
                      announcement.name
                  }} </option>
                </select>
              </div>
            </div>
            <div class="form-row my-1">
              <div class="form-group col-12">
                <label> Modalidad </label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                    v-on:change="modalidadSelected('presencial')" checked>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Presencial
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                    v-on:change="modalidadSelected('virtual')">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Virtual
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                    v-on:change="modalidadSelected('mixta')">
                  <label class="form-check-label radio" for="flexRadioDefault2">
                    Mixta (Virtual/Presencial)
                  </label>
                </div>
                <div v-if="modalidad === 'virtual' || modalidad === 'mixta'" class="my-1">
                  <label> Número de salas virtuales</label>
                  <input v-model.number="num_salas" type="number" class="form-control" required min="1">
                </div>
              </div>
            </div>
            <div class="form-row my-1">

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
.modal-header.modal-header-blue,
.modal-footer button.btn-primary {
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

  props: {
    // Convocatorias disponibles.
    announcements: {
      type: Array,
      default() {
        return [];
      }
    }
  },

  data() {
    return {
      event: {},
      start_date: null,
      end_date: null,
      announcement_id: null,
      num_salas: 1,
      modalidad: 'presencial'
    };
  },

  methods: {

    // loads the modality
    modalidadSelected(modalidad) {
      this.modalidad = modalidad;
    },

    creaPeriodo() {
      axios.post('/controlescolar/entrevistas/periods', {
        start_date: this.start_date,
        end_date: this.end_date,
        num_salas: this.num_salas,
        announcement_id: this.announcement_id,
        modality: this.modalidad
      }).then(response => {
        window.location.href = response.data.url;
      }).catch(error => {
        console.log(error);
      });
    },
  }
};
</script>