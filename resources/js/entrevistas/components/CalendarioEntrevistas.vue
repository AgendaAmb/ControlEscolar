<template>
  <div class="row my-5">
    <div class="order-2 col-sm-6 col-md-3 order-md-1 actions-left my-auto" v-if="IsActive === true">
      <div class="btn-group" role="group">
        <button :disabled="!isPrevAllowed" class="v-cal-button" @click="prev"> Prev </button>
        <button class="v-cal-button" v-if="showTodayButton" @click="goToToday" :class="TodayButtonClass"> Hoy </button>
        <button :disabled="!isNextAllowed" class="v-cal-button" @click="next"> Sig </button>
      </div>
    </div>
    <div class="order-1 col-md-6 order-md-2" v-if="IsActive === true" >
      <h1 class="v-cal-header__title mes">{{ calendarMonth }}</h1>
      <h1 class="d-block v-cal-header__title año">{{ calendarYear }}</h1>
    </div>
    <div class="col-sm-6 col-md-3 actions-right my-auto order-2 text-left text-sm-right" v-if="IsActive === true">
      <div class="btn-group" role="group">
        <button class="v-cal-button" @click="switchView('month')" :class="calendarViewButtonClass('month')"> Mes </button>
        <button class="v-cal-button" @click="switchView('week')" :class="calendarViewButtonClass('week')"> Semana </button>
        <button class="v-cal-button" @click="switchView('day')" :class="calendarViewButtonClass('day')"> Dia </button>
      </div>
    </div>

    <div class="col-lg-8 pr-lg-0 order-3" v-if="IsActive === true">
      <div class="v-cal">
        <component
          :is="activeView"
          :class="'v-cal-content--' + activeView"
          v-bind="activeViewProps"
          @day-clicked="abreModalEntrevistas"
          ></component>
        <footer class="v-cal-footer"></footer>
      </div>
    </div>
    <div class="col-lg-4 pl-lg-0 order-3" v-if="IsActive === true">
      <header class="dia-entrevista"><p>{{StringDate}}</p></header>
      <interview v-for="interview in getDayInterviews(activeDate)" 
        :key="interview.id"
        ></interview>
    </div>
    

      <!--
      <vue-scheduler v-if="IsActive === true"
       :events="interviews" 
       :min-date="MinDate" 
       :max-date="MaxDate" 
       :disable-dialog="true"
       @day-clicked="abreModalEntrevistas"></vue-scheduler>
    </div>
    <div class="col-lg-3 px-lg-0"> 
      <div class="notificaciones">{{StringDate}}</div>
    </div>-->
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

.notificaciones {
    margin-top: 101px;
    padding: 13px 0;
    background-color: #115089;
    color: white;
    font-family: 'Myriad Pro Bold';
    text-align: center;
}

.notificaciones::first-letter {
  text-transform: uppercase;
}

.mes {
  font-family: 'Myriad Pro Bold';
  font-size: 66px;
  text-align: center;
  color: #fecc56;
  margin-bottom: 0;
  text-transform: capitalize;
}

.año {
  font-family: 'Myriad Pro Regular';
  color: #115089;
  text-align: center;
  font-size: 66px;
}

.dia-entrevista {
  display: block;
  margin: 0 auto;
}

.dia-entrevista > p {
  font-family: 'Myriad Pro Bold';
  margin-top: 1px;
  padding: 12px 15px 12px 15px;
  background-color: #115089;
  color: white;
  font-size: 16px;
  text-align: center;
}

.dia-entrevista > p::first-letter {
  text-transform: uppercase;
}


</style>

<script>
import moment from 'moment';
import Event from './Event';
import Month from './views/Month';
import Week from './views/Week';
import Day from './views/Day';
import Interview from './Interview.vue';

export default {
  name: "calendario-entrevistas",

  components: { 
    Month, 
    Week, 
    Day,
    Interview
  },

  props: {
    // Periodo de entrevistas.
    period: Object,

    // Postulantes de la entrevista.
    appliants: Array,

    // Entrevistas agendadas.
    interviews: Array,
  },

  data(){
    return {
      locale: "es-mx",
      initialView: 'month',
      showTodayButton: true,
      today: moment(),
      activeView: '',
      activeDate: null,
      availableViews: ['month', 'week', 'day'],
      timeRange: [0,23],
      labels: {
        today: "Hoy",
        back: "Atrás",
        next: "Siguiente",
        month: "Mes",
        week: "Semana",
        day: "Día",
        all_day: "Todo el día",
      }
    };
  },

  filters: {
    capitalizeFirstLetter(string) {
      return string ? string.charAt(0).toUpperCase() + string.slice(1) : '';
    }
  },
    
  watch: {
    initialDate() {
      this.activeDate = moment(this.initialDate);
    },

    initialView() {
      this.activeView = this.initialView;
    },

    activeDate() {
      this.$emit(this.activeView + '-changed', this.activeDate.toDate() );
    },

    activeView() {
      this.$emit('view-changed', this.activeView);
    }
  },

  computed: {
    newEvents() {
      return this.interviews.map(e => {
        return new Event(e).bindGetter('displayText', this.eventDisplay);
      });
    },

    isPrevAllowed() {
      if ( this.MinDate ) {
        const prevRef = moment(this.activeDate).subtract(1, this.activeView + 's');
        return this.MinDate.isSameOrBefore(prevRef, this.activeView);
      }
      return true
    },

    isNextAllowed() {
      if ( this.MaxDate ) {
        const afterRef = moment(this.activeDate).add(1, this.activeView + 's');
        return this.MaxDate.isSameOrAfter(afterRef, this.activeView);
      }
      return true
    },

    activeViewProps: {
      get() {
        let props = {
          activeDate: this.activeDate,
          minDate: this.MinDate,
          maxDate: this.MaxDate,
          use12: true,
          events: this.newEvents.filter(interview => {
            return interview.date.isSame(this.activeDate, this.activeView);
          })
        };

        if ( this.activeView === 'week' || this.activeView === 'day') {
          props.allDayLabel = this.labels.all_day;
          props.timeRange = this.timeRange;
          props.showTimeMarker = this.showTimeMarker;
        }
        return props;
      }
    },

    calendarTitle: {
      get () {
        if ( this.activeDate === null )
          return '';

        if ( this.activeView === 'month') {
          return this.activeDate.format('MMMM YYYY');
        }

        if (this.activeView === 'week' ) {
          const weekStart = moment(this.activeDate).day(0);
          const weekEnd = moment(this.activeDate).day(6);
          return weekStart.format('MMM D') + ' - ' + weekEnd.format('MMM D');
        }

        if ( this.activeView === 'day' ) {
          return this.activeDate.format('dddd MMM D')
        }
      }
    },

    calendarMonth: {
      get () {
        if ( this.activeDate === null )
          return '';

        return this.activeDate.format('MMMM');
      }
    },

    calendarYear: {
      get () {
        if ( this.activeDate === null )
          return '';

        return this.activeDate.format('YYYY');
      }
    },

    IsActive: {
      get() {
        return this.period !== null;
      }
    },

    MinDate: {
      get(){
        if (this.period === null)
          return null;

        return moment(this.period.start_date, 'YYYY-MM-DD').subtract(1, 'd'); 
      }
    },

    MaxDate: {
      get(){
        if (this.period === null)
          return null;

        return moment(this.period.end_date, 'YYYY-MM-DD'); 
      }
    },

    CalendarClass: {
      get(){
        return {
          'col-12': !this.dayClicked,
          'col-lg-9': this.dayClicked,
          'pr-lg-0': true
        }
      }
    },

    TodayButtonClass: {
      get() {
        return { 
          'v-cal-button--is-active': this.activeDate && this.activeDate.isSame(this.today, 'day' )
        };
      }
    },

    StringDate: {
      get(){
        if (this.period === null)
          return "";

        var event = new Date(this.period.start_date);
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            
        return event.toLocaleDateString('es-MX', options);
      }
    }
  },

  methods: {

    getDayInterviews(date) {
      var moment_date = moment(date, 'YYYY-MM-DD');
      
      return this.interviews.filter(interview => {
        return moment(interview.date).isSame(moment_date);
      });
    },

    abreModalEntrevistas(date){
      if (moment(date.toLocaleDateString()).isBefore(this.MinDate))
        return false;

      if (moment(date.toLocaleDateString()).isAfter(this.MaxDate))
        return false;

      this.$emit("update:date", moment(date.toLocaleDateString()).format('YYYY-MM-DD'));
      this.activeDate = moment(date);
      
      $('#NuevaEntrevista').modal('show');
    },

    goToToday() {
      this.activeDate = moment(this.today);
    },
    
    prev() {
      this.activeDate = moment(this.activeDate.subtract(1, this.activeView + 's'));
    },
    
    next() {
      this.activeDate = moment(this.activeDate.add(1, this.activeView + 's'));
    },
    
    switchView(view) {
      this.activeView = view;
    },

    calendarViewButtonClass(view) {
      return { 
        'v-cal-button--is-active': this.activeView === view 
      };
    },
  },

  mounted() {
  //  Initial setup
    this.activeView = this.initialView;
    this.activeDate = moment(this.initialDate);
  },
};
</script>