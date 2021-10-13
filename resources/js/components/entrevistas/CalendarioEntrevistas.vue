<template>
  <div class="row my-5">
    <div class="col-12">
      <vue-scheduler :events="events" :event-dialog-config="InterviewDialog"></vue-scheduler>
    </div>
    <div class="col-12 mx-2">
      <button class="my-3 v-cal-button" @click="abreModal"> Programar periodo de entrevistas </button>
    </div>
  </div>
</template>

<style scoped>
div.col-12.mx-2 > button.my-3.v-cal-button{
  margin-left: 10px;
  border-radius: 5px;
}
</style>

<script>
import Periodo from './Periodo';

export default {
  name: "calendario-entrevistas",
  components: {Periodo},

  data() {
    return {
      users: [],
      periods: [],
      events: [],
      interview_fields: [{
          fields: [{
            name: "hora_inicio",
            type: 'time',
            label: "Hora de inicio.",
          },{
            name: "hora_fin",
            type: 'time',
            label: "Hora de fin.",
          }]
        },{
            name: "name",
            label: "Nombre del postulante",
            readonly: true,
        },{
          name: "sala",
          type: "text",
          required: true,
          label: "Número de sala",
        },{
          name: "observaciones",
          type: "textarea",
          label: "Observaciones",
      }],
    };
  },

  computed: {
    InterviewDialog: {
      get(){
        return {
          title: "Programar una entrevista",
          createButtonLabel: "Agendar entrevista",
          enableTimeInputs: false,
          fields: this.interview_fields
        };
      }
    },

    PeriodDialog: {
      get(){
        return {
          title: "Nuevo periodo",
          createButtonLabel: "Crear periodo",
          enableTimeInputs: false,
        };
      }
    }
  },

  mounted() {
    this.$nextTick(function () {
      axios
        .get("/controlescolar/users")
        .then((response) => {
          Vue.set(this, "users", response.data);
        })
        .catch((error) => {});

      axios
        .get("/controlescolar/entrevistas/periods")
        .then((response) => {
          Vue.set(this, 'periods', response.data);
        })
        .catch((error) => {});
    });
  },

  methods: {
    abreModal(){
      Periodo.show(this.PeriodDialog, []).$on('event-created', (event) => {
        this.events.push(event._e);
        this.$emit('event-created', event._e);
      });
    }
  }
};
</script>