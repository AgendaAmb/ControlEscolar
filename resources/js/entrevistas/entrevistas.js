/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
    
window.Vue = require('vue').default;

// Componentes para las entrevistas.
import VueScheduler from "v-calendar-scheduler";
import CalendarioEntrevistas from './components/CalendarioEntrevistas.vue';
import NuevoPeriodo from './components/NuevoPeriodo.vue';
import NuevaEntrevista from './components/NuevaEntrevista.vue';
import DetalleEntrevista from './components/DetalleEntrevista.vue';

// Import styles
import "v-calendar-scheduler/lib/main.css";

Vue.config.productionTip = false;
Vue.use(VueScheduler, {
    locale: "es-mx",
    minDate: null,
    maxDate: null,
    labels: {
        today: "Hoy",
        back: "Atrás",
        next: "Siguiente",
        month: "Mes",
        week: "Semana",
        day: "Día",
        all_day: "Todo el día",
    },
    initialView: 'month',
    initialDate: new Date(),
    use12: true,
    showTodayButton: true,
    eventDisplay: null,
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
    el: '#app',
    data:{
        appliants: appliants,
        loggedUser: user,
        period: period,
        date: null,
        selectedInterview: null,
        announcements: announcements
    },

    components: {
        CalendarioEntrevistas,
        NuevoPeriodo,
        NuevaEntrevista,
        DetalleEntrevista
    },

    methods:{
        
        /**
         * Actualiza el periodo de entrevistas.
         * @param {*} period 
         */
        actualizaPeriodo(period){
            if (period.hasOwnProperty('id'))
                Vue.set(this, 'period', period);
                
            Vue.set(this, 'interviews', period.interviews);
        },

        /**
         * Agrega una nueva entrevista.
         * @param {*} period 
         */
        agregaEntrevista(entrevista){
            this.period.interviews.push(entrevista);
        },

        /**
         * 
         */
        interviewDetails(interview) {
            this.selectedInterview = {
                id: interview.id,
                appliant: interview.appliant,
                areas: interview.areas,
                date: interview.date,
                professor: interview.professor,
                room: interview.room,
                start_time: interview.start_time,
                end_time: interview.end_time
            };

            $('#DetalleEntrevista').modal('show');
        }
    },

    /**
     * Jala los datos de los servidores de AA.
     */
    mounted() {
        this.$root.$on('show_details', this.interviewDetails);
    },
});