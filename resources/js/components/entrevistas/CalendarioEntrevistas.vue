<template>
  <div class="row my-5">
    <div class="col-12">
      <vue-scheduler v-if="IsActive === true"
       :events="events" 
       :event-dialog-config="InterviewDialog" 
       :min-date="MinDate" 
       :max-date="MaxDate" ></vue-scheduler>
    </div>
    <div v-if="IsActive === false" class="col-12 mx-2">
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
var moment = require('moment');

export default {
  name: "calendario-entrevistas",
  components: {Periodo},

  data() {
    return {
      users: [],
      period: null,
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
          name: "appliant_name",
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

      period_fields: [{
          name: "start_date",
          label: "Fecha de inicio",
          type: "date",
          required: true,
          value: null,
        },{
          name: "end_date",
          label: "Fecha de fin",
          type: "date",
          required: true,
          value: null,
        },{
          name: "num_salas",
          type: "number",
          label: "Número de salas",
          required: true,
          value: null,
      }],
    };
  },

  computed: {
    IsActive: {
      get() {
        return this.period !== null;
      }
    },

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
          title: "Nuevo periodo de entrevistas",
          createButtonLabel: "Crear periodo",
          enableTimeInputs: false,
        };
      }
    },

    MinDate: {
      get(){
        if (this.period === null)
          return null;

        return moment(this.period.start_date, 'YYYY-MM-DD'); 
      }
    },

    MaxDate: {
      get(){
        if (this.period === null)
          return null;

        return moment(this.period.end_date, 'YYYY-MM-DD'); 
      }
    }
  },

  /**
   * Jala los datos de los servidores de AA.
   */
  mounted() {
    this.$nextTick(function () {
      axios.get("/controlescolar/users")
        .then((response) => {
          Vue.set(this, "users", response.data);
        })
        .catch((error) => {});

      axios.get("/controlescolar/entrevistas/periods")
        .then((response) => {
          if (Object.keys(response.data).length > 0)
            Vue.set(this, 'period', response.data);
        })
        .catch((error) => {


        });
    });
  },

  methods: {
    abreModal(){
      var modal = Periodo.show(this.PeriodDialog, this.period_fields);

      modal.$on('event-created', (event) => {
        this.events.push(event._e);
        this.$emit('event-created', event._e);

      });
      
      modal.$on('new_period', (period) => {
        Vue.set(this, 'period', period);
      });
    }
  }
};
</script>