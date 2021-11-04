/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const moment = require('moment');

    
window.Vue = require('vue').default;
import InterviewDay from './components/InterviewDay.vue';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
    el: '#app',
    name:'professor-interviews',

    components: {
        InterviewDay
    },

    data: {
        interviews: interviews,
        loggedUser: user,
    },

    methods: {
        StringDate(date){     
            return moment(date).locale('es-MX').format("dddd D \\d\\e MMMM \\d\\e\\l YYYY");
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
    }
});