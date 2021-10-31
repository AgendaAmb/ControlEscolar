<template>
  <div class="row my-5">
    <div class="col-12">
      <vue-scheduler v-if="IsActive === true"
       :events="events" 
       :min-date="MinDate" 
       :max-date="MaxDate" 
       :disable-dialog="true"
       @day-clicked="abreModalEntrevistas"></vue-scheduler>
    </div>
    <div v-if="IsActive === false" class="col-12 mx-2">
      <button class="my-3 v-cal-button" @click="abreModalPeriodo"> Programar periodo de entrevistas </button>
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
import Entrevista from './Entrevista';
var moment = require('moment');

export default {
  name: "calendario-entrevistas",
  components: {
    // Permite crear periodos de entrevistas.
    Periodo,

    // Permite agendar una nueva entrevista.
    Entrevista
  },

  // Propiedades inmutables
  props: {
    // Usuario autenticado.
    auth_user: Object
  },

  data() {
    return {
      // Postulantes a los que se les puede agendar una
      // entrevista.
      appliants: [],

      // Periodo de entrevistas.
      period: null,

      // Entrevistas.
      events: [],
    };
  },

  /**
   * Propiedades reactivas.
   */
  computed: {
    /**
     * Disponibilidad para programar / ver los postulantes
     * que serán entrevistados.
     */
    IsActive: {
      get() {
        return this.period !== null;
      }
    },

    /**
     * Fecha de inicio del periodo de entrevistas.
     */
    MinDate: {
      get(){
        if (this.period === null)
          return null;

        return moment(this.period.start_date, 'YYYY-MM-DD'); 
      }
    },

    /**
     * Fecha límite del periodo de entrevistas.
     */
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
    this.$nextTick(function() {
      axios.get("/controlescolar/users/appliants")
        .then((response) => {
          Vue.set(this, "appliants", response.data);
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



    console.log($('h3.v-cal-header__title').text());
    
  },

  methods: {
    abreModalPeriodo(){
      var modal = Periodo.show(this.PeriodDialog, []);

      modal.$on('event-created', (event) => {
        this.events.push(event._e);
        this.$emit('event-created', event._e);

      });
      
      modal.$on('new_period', (period) => {
        Vue.set(this, 'period', period);
      });
    },

    abreModalEntrevistas(date){
      if (moment(date.toLocaleDateString()).isBefore(this.MinDate))
        return false;

      if (moment(date.toLocaleDateString()).isAfter(this.MaxDate))
        return false;

      var modal = Entrevista.show(this.InterviewDialog, this.period.id, this.appliants, this.period.rooms, date);

      modal.$on('nuevaEntrevista', (event) => {
        this.events.push({
          id: event.id
        });
        this.$emit('event-created', event._e);
      });
    }
  }
};
</script>