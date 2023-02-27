/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 window.Vue = require('vue').default;
 window.Event = new Vue();
 import CandidateData from './components/CandidateData';
 import { GridPlugin } from '@syncfusion/ej2-vue-grids';
 import { BootstrapVue,BootstrapVueIcons  } from 'bootstrap-vue';
 import { Buffer } from 'buffer'
 globalThis.Buffer = Buffer


 Vue.use(GridPlugin);
 Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 const app = new Vue({
     el: '#app',
 
     data: {
       user: user,
       user_roles:user_roles,
     },
 
     components: {
         'candidate-data': CandidateData,
     },
 
     methods: {
 
 
         
     },
 });