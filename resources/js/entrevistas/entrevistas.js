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

            Vue.set(this, 'appliants', this.appliants.filter(appliant => {
                return appliant.id !== entrevista.appliant.id
            }));
        },

        /**
         * Despliega el modal de los detalles de la entrevista.
         * @param {*} period 
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
                end_time: interview.end_time,
                confirmed: interview.confirmed
            };

            $('#DetalleEntrevista').modal('show');
        },

        /**
         * Elimina una entrevista del calendario.
         * @param {*} period 
         */
         removeInterview(interview_id) {
            var filtered = this.period.interviews.filter(interview => {
                return interview.id !== interview_id;
            });

            Vue.set(this.period, 'interviews', filtered);
        },

        /**
         * Determina si el usuario autenticado es administrador.
         * @param {*} period 
         */
        loggedUserIsAdmin(){
            var roles = this.loggedUser.roles.filter(role => {
                return role.name === 'admin';
            });
    
            return roles.length > 0;
        },

        /**
         * Determina si el usuario autenticado es administrador.
         * @param {*} period 
         */
        loggedUserIsSchoolControl(){
            var roles = this.loggedUser.roles.filter(role => {
                return role.name === 'control_escolar';
            });
    
            return roles.length > 0;
        },

        /**
         * Confirma una entrevista.
         */
        confirmInterview(newValue){
            var interview = this.period.interviews.find(interview => {
                return interview.id === this.selectedInterview.id;
            })

            if (interview !== null) {
                interview.confirmed = newValue;
                this.selectedInterview.confirmed = newValue;
            }
        },
    },

    /**
     * Jala los datos de los servidores de AA.
     */
    mounted() {
        this.$root.$on('show_details', this.interviewDetails);
    },
});