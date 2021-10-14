/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
    
window.Vue = require('vue').default;

// Componentes para las entrevistas.
import VueScheduler from "v-calendar-scheduler";
import CalendarioEntrevistas from './components/entrevistas/CalendarioEntrevistas.vue';

// Import styles
import "v-calendar-scheduler/lib/main.css";

Vue.config.productionTip = false;
Vue.use(VueScheduler, {
    locale: "es",
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

    components: {
        CalendarioEntrevistas,
    },
});