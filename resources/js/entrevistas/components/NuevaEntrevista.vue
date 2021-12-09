<template>
  <!-- Modal -->
  <div class="modal fade" id="NuevaEntrevista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-blue">
          <h5 class="modal-title" id="exampleModalLabel"> Nueva entrevista </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="creaEntrevista">
            <div class="mt-4 mb-2 form-row">
              <div class="form-group col-12">
                <label> Fecha </label>
                <input v-model="date" type="date" class="form-control" :min="MinDate" :max="max_date">
              </div>

              <div class="form-group col-md-5">
                <label> Hora de inicio </label>
                <input v-model="start_time" type="time" class="form-control">
              </div>

              <div class="form-group col-md-5">
                <label> Hora de fin </label>
                <input v-model="end_time" type="time" class="form-control">
              </div>

              <div class="form-group col-12">
                <label> Postulante </label>
                <select v-model="appliant" class="form-control">
                  <option :value="null" selected>Escoge un postulante </option>
                  <option v-for="appliant in appliants" :key="appliant.id" :value="appliant"> 
                    {{ appliant.name }} 
                  </option>
                </select>
              </div>
    
              <div class="form-group col-12">
                <label> Profesor que otorgó la carta de intención </label>
                <input v-model="IntentionLetterProfessor" type="text" class="form-control" readonly>
              </div>

              <div class="form-group col-12">
                <label> Número de sala </label>
                <select v-model="room" class="form-control">
                  <option :value="null" selected>Escoge una sala </option>
                  <option v-for="(room, roomNumber) in rooms" :key="room.id" :value="room"> {{ roomNumber + 1 }} </option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="creaEntrevista"> Registrar </button>
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
import moment from 'moment';
export default {
  name: "nueva-entrevista",

  props: {
    // Id del periodo.
    period_id: Number,

    // Fecha mínima del inicio del periodo.
    min_date: String,

    // Fecha máxima del inicio del periodo.
    max_date: String,

    // Postulantes.
    appliants: Array,

    // Salas disponibles.
    rooms: Array
  },

  data() {
    return {
      id: -1,
      date: '',
      isActive: false,
      intention_letter_professor: null,
      event: {},
      start_time: null,
      end_time: null,
      appliant: null,
      professor: null,
      room: null,
    };
  },

  computed: {
    /**
     * Fecha mínima.
     */
    MinDate() {
      if (this.min_date === null)
        return null;

      return moment(this.min_date).subtract(1, 'days').format('YYYY-MM-DD');
    },

    /**
     * Nombre del profesor que otorgó la carta de intención.
     */
    IntentionLetterProfessor: {
      get () {
        if (this.appliant === null)
          return null;

        return this.appliant.intention_letter_professor.name;
      }
    },
  },

  methods: {
    /**
     * Genera la entrevista.
     */
    creaEntrevista() {
      
      axios.post('/controlescolar/entrevistas/nuevaEntrevista', {
        period_id: this.period_id,
        user_id: this.appliant.id,
        user_type: this.appliant.type,
        date: this.date,
        start_time: this.start_time,
        end_time: this.end_time,
        room_id: this.room.id
      
      }).then(response =>  {
        var data = response.data;

        this.$emit('nuevaentrevista', {
          id: data.id,
          date: data.date,
          start_time: data.start_time,
          room_id: data.room_id,
          end_time: data.end_time,
          appliant: data.appliant,
          intention_letter_professor: data.intention_letter_professor,
          academic_areas:data.academic_areas
        });

        this.id = -1;
        this.date = '';
        this.intention_letter_professor = null;
        this.event = {};
        this.start_time = null;
        this.end_time = null;
        this.appliant = null;

        $('#NuevaEntrevista').modal('hide');
      }).catch(error => {

      });
    }
  }
};
</script>