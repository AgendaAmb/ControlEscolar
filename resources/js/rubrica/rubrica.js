/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
    
import Rubrica from './components/Rubrica';
import { GridPlugin } from '@syncfusion/ej2-vue-grids';

window.Vue = require('vue').default;
Vue.use(GridPlugin);

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
        rubric: rubric,
    },

    components: {
        Rubrica
    }
});