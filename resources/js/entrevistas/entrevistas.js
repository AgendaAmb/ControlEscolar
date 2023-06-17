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
        loggedUser: user,
        period: period,
        interviews: interviews,
        date: null,
        selectedInterview: null,
        announcements: announcements,
        lastestAnnouncements: lastestAnnouncements
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
                
            Vue.set(this, 'interviews', interviews);
        },

        // ! VA A FALLAR AQUI AL AGREGAR ENTREVISTA
        /**
         * Agrega una nueva entrevista.
         * @param {*} period 
         */
        agregaEntrevista(entrevista, selected_program){
            this.interviews.push(entrevista);

            selected_program.appliants = selected_program.appliants.filter(function(appliant) {
                return appliant.id;
            });
        },

        /**
         * Despliega el modal de los detalles de la entrevista.
         * @param {*} period 
         */
        interviewDetails(interview) {
            // Validad ambos casos virtual y presencial 
            var interview_room = null;
            if(this.period.modality === 'presencial'){
                for(let i = 0; i < this.period.rooms.length; i++){
                    if(this.period.rooms[i].id === interview.room)interview_room = this.period.rooms[i];
                }
            }else if(this.period.modality === 'virtual'){
                for(let i = 0; i < this.period.virtual_rooms.length; i++){
                    if(this.period.virtual_rooms[i].id === interview.room){
                        interview_room = this.period.virtual_rooms[i];
                        break;
                    }
                }
            }else{
                // Presencial 
                for(let i = 0; i < this.period.rooms.length; i++){
                    if(this.period.rooms[i].id === interview.room){
                        interview_room = this.period.rooms[i];
                        break;
                    }
                }
                if(interview_room == null){
                    for(let i = 0; i < this.period.virtual_rooms.length; i++){
                        if(this.period.virtual_rooms[i].id === interview.room){
                            interview_room = this.period.virtual_rooms[i];
                            break;
                        }
                    }
                }
            }

            this.selectedInterview = {
                id: interview.id,
                appliant: interview.appliant,
                areas: interview.areas,
                date: interview.date,
                professor: interview.professor,
                room: interview_room!==null?interview_room.site:"Error",
                start_time: interview.start_time,
                end_time: interview.end_time,
                confirmed: interview.confirmed,
                dictamen_redactor: interview.dictamen_redactor
            };

            console.log(this.selectedInterview);

            $('#DetalleEntrevista').modal('show');
        },

        /**
         * Elimina una entrevista del calendario.
         * @param {*} period 
         */
        removeInterview(interview_id) {
            this.interviews = this.interviews.filter(interview => {
                return interview.id !== interview_id;
            }); 
        },

        /**
         * Determina si el usuario autenticado es administrador.
         * @param {*} period 
         */
        loggedUserIsAdmin() {
            return this.loggedUser.roles.some(role => role.id === 8);
        },

        /**
         * Determina si el usuario autenticado es administrador.
         * @param {*} period 
         */
        loggedUserIsSchoolControl(){
            return this.loggedUser.roles.some(role => role.id === 6);
        },

        /**
         * Determina si el usuario autenticado es coordinador.
         * @param {*} period 
         */
        loggedUserIsCoordinador(){
            return this.loggedUser.roles.some(role => role.name == 'coordinador');
        },

        /**
         * Determina si el usuario autenticado es profesor de núcleo básico.
         * @param {*} period 
         */
        loggedUserIsPNB(){
            return this.loggedUser.roles.some(role => role.id === 4);
        },

        /**
         * Confirma una entrevista.
         */
        confirmInterview(newValue){
            
            var interview = this.interviews.find(interview => {
                return interview.id === this.selectedInterview.id;
            })
        
            // console.log(interview.id);

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
        // console.log(this.interviews)
    },
});