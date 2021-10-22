<template>
  <div class="row my-5">
    <div class="col-lg-9">
      <vue-scheduler v-if="IsActive === true"
       :events="interviews" 
       :min-date="MinDate" 
       :max-date="MaxDate" 
       :disable-dialog="true"
       @day-clicked="abreModalEntrevistas"></vue-scheduler>
    </div>
    <div class="col-lg-3">
    </div>
    <div v-if="IsActive === false" class="col-12 mx-2">
      <button class="my-3 v-cal-button" data-toggle="modal" data-target="#NuevoPeriodo"> Programar periodo de entrevistas </button>
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
var moment = require('moment');

export default {
  name: "calendario-entrevistas",

  props: {
    // Periodo de entrevistas.
    period: Object,

    // Postulantes de la entrevista.
    appliants: Array,

    // Entrevistas agendadas.
    interviews: Array,
  },

  computed: {
    IsActive: {
      get() {
        return this.period !== null;
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

  methods: {

    abreModalEntrevistas(date){
      if (moment(date.toLocaleDateString()).isBefore(this.MinDate))
        return false;

      if (moment(date.toLocaleDateString()).isAfter(this.MaxDate))
        return false;

      this.$emit("update:date", moment(date.toLocaleDateString()).format('YYYY-MM-DD'));
      $('#NuevaEntrevista').modal('show');
    }
  }
};
</script>