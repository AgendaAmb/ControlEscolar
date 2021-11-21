<template>
  <div class="d-flex flex-column">
    <div v-if="IsActive === true" class="calendar-header">
      <div class="btn-group" role="group">
        <button :disabled="!isPrevAllowed" class="v-cal-button" @click="prev"> Prev </button>
        <button :disabled="!isNextAllowed" class="v-cal-button" @click="next"> Sig </button>
      </div>
      <div>
        <h1 class="v-cal-header__title mes">{{ calendarMonth }}</h1>
        <h1 class="d-block v-cal-header__title año">{{ calendarYear }}</h1>
      </div>
      <div class="btn-group" role="group">
        <button class="v-cal-button" @click="switchView('month')" :class="calendarViewButtonClass('month')"> Mes </button>
        <button class="v-cal-button" @click="switchView('week')" :class="calendarViewButtonClass('week')"> Semana </button>
        <button class="v-cal-button" @click="switchView('day')" :class="calendarViewButtonClass('day')"> Día </button>
      </div>
    </div>
    <div v-if="period !== null && isProfessor === false" class="new-interview">
      <button class="v-cal-button" @click="muestraModalNuevaEntrevista"> Nueva Entrevista </button>
    </div>

    <div v-if="IsActive" class="calendar-body">
      <div class="v-cal">
        <component
          :is="activeView"
          :class="'v-cal-content--' + activeView"
          v-bind="activeViewProps"
          @day-clicked="muestraEntrevistas"
          ></component>
        <footer class="v-cal-footer"></footer>
      </div>
      <div class="interview-day">
        <header>
          <p>{{StringDate}}</p>
        </header>
        <interview v-for="interview in ActiveDateInterviews" 
          v-bind="interviewDataFrom(interview)"
          :key="interview.id"
          ></interview>
      </div>
    </div>
    <div v-if="IsActive === false" class="mx-auto">
      <button class="my-3 v-cal-button" data-toggle="modal" data-target="#NuevoPeriodo"> Programar periodo de entrevistas </button>
    </div>
  </div>
</template>

<style scoped>
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
    period: {
      type: Object,
      default: null
    },

    // Usuario autenticado.
    auth_user: {
      type: Object,

      default() {
        return {
          id: -1,
          type: null,
          name: null,
          middlename: null,
          surname: null,
          roles: []
        }
      }
    },

    // Vistas disponibles del calendario.
    availableViews: {
      type: Array,

      default(){
        return ['month', 'week', 'day'];
      }
    },

    // Configuración de la hora (locale).
    locale: {
      type: String,
      default: 'es-mx'
    },

    // Plantillas / visualizaciones disponibles para
    // el calendario.
    labels: {
      type: Object,

      default() {
        return {
          today: "Hoy",
          back: "Atrás",
          next: "Siguiente",
          month: "Mes",
          week: "Semana",
          day: "Día",
          all_day: "Todo el día",
        };
      }
    },

    // Rango de horas disponibles para
    // el calendario.
    timeRange: {
      type: Array,

      default() {
        return [0,23];
      }
    },

    // Colorea el día actual.
    showTodayButton: {
      type: Boolean,
      default: true,
    },

    // Día actual.
    today: {
      type: Object,

      default() {
        return moment();
      }
    }
  },

  data(){
    return {
      initialView: 'month',
      activeView: 'month',
      activeDate: moment(),
    };
  },

  filters: {
    capitalizeFirstLetter(string) {
      return string ? string.charAt(0).toUpperCase() + string.slice(1) : '';
    }
  },
    
  watch: {
    activeDate() {
      this.$emit(this.activeView + '-changed', this.activeDate.toDate());
    },

    activeView() {
      this.$emit('view-changed', this.activeView);
    }
  },

  computed: {
    ActiveDate() {
      if (this.activeDate.isBefore(this.MinDate))
        return this.MinDate;

      if (this.activeDate.isAfter(this.MaxDate))
        return this.MaxDate;

      return this.activeDate;
    },

    canCreateInterviewPeriod() {
      return this.$root.loggedUserIsAdmin() || this.$root.loggedUserIsSchoolControl();
    },

    isProfessor(){
      var roles = this.auth_user.roles.filter(role => {
        return role.name === 'profesor_nb';
      });

      return roles.length > 0;
    },

    isAdmin(){
      var roles = this.auth_user.roles.filter(role => {
        return role.name === 'administrator';
      });

      return roles.length > 0;
    },

    isSchoolControl(){
      var roles = this.auth_user.roles.filter(role => {
        return role.name === 'control_escolar';
      });

      return roles.length > 0;
    },

    newEvents() {
      return this.period.interviews.map(e => {
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
        const afterRef = moment(this.ActiveDate).add(1, this.activeView + 's');
        return this.MaxDate.isSameOrAfter(afterRef, this.ActiveView);
      }
      return true
    },

    activeViewProps: {
      get() {

        let props = {
          activeDate: this.ActiveDate,
          minDate: this.MinDate,
          maxDate: this.MaxDate,
          use12: true,
          events: this.newEvents
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
          return this.ActiveDate.format('MMMM YYYY');
        }

        if (this.activeView === 'week' ) {
          const weekStart = moment(this.ActiveDate).day(0);
          const weekEnd = moment(this.ActiveDate).day(6);
          return weekStart.format('MMM D') + ' - ' + weekEnd.format('MMM D');
        }

        if ( this.activeView === 'day' ) {
          return this.ActiveDate.format('dddd MMM D')
        }
      }
    },

    calendarMonth: {
      get () {
        if ( this.ActiveDate === null )
          return '';

        return this.ActiveDate.format('MMMM');
      }
    },

    calendarYear: {
      get () {
        if ( this.ActiveDate === null )
          return '';

        return this.ActiveDate.format('YYYY');
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
          'col-lg-8': true,
          'pr-lg-0': true,
          'order-3': true,
        }
      }
    },

    StringDate(){        
      if (this.ActiveDate === null)
        return this.ActiveDate;
        
      return this.ActiveDate.format("dddd, DD \\d\\e MMMM \\d\\e\\l YYYY");
    },

    ActiveDateInterviews() {
      const activeDate = this.ActiveDate.format('YYYY-MM-DD');

      return this.period.interviews.filter(interview => {
        const interviewDate = moment(interview.date);
        return interviewDate.isSame(activeDate);
      });
    },
  },

  methods: {
    muestraEntrevistas(date){
      if (moment(date.toLocaleDateString()).isBefore(this.MinDate))
        return false;

      if (moment(date.toLocaleDateString()).isAfter(this.MaxDate))
        return false;

      this.$emit("update:date", moment(date.toLocaleDateString()).format('YYYY-MM-DD'));
      this.activeDate = moment(date);
    },

    muestraModalNuevaEntrevista(){
      if (!this.isProfessor)
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

    interviewDataFrom(interview){
      var start_time = moment(interview.start_time, 'hh:mm:ss').format('hh:mm A');
      var end_time = moment(interview.end_time, 'hh:mm:ss').format('hh:mm A');

      return {
        'id': interview.id,
        'room': interview.room_id,
        'areas': interview.academic_areas,
        'date': this.StringDate,
        'appliant': interview.appliant.name.toLowerCase(),
        'professor': interview.intention_letter_professor.name.toLowerCase(),
        'start_time': start_time,
        'end_time': end_time,
        'confirmed': interview.confirmed,
        'url':interview.url
      };
    }
  },

  
};
</script>