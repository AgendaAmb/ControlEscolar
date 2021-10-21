<template>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
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
    Periodo,
    Entrevista
  },

  data() {
    return {
      appliants: [],
      period: null,
      events: [],
    };
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

  /**
   * Jala los datos de los servidores de AA.
   */
  mounted() {
    this.$nextTick(function () {
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