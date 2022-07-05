/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import Vue from 'vue';
 import RequisitosIngreso from './components/RequisitosIngreso.vue';
 import SolicitudPostulante from './components/SolicitudPostulante.vue';
 
 window.Vue = require('vue').default;
 
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

         RequisitosIngreso,
         SolicitudPostulante,
     },
 
     data: {
         archive: archiveModel,
         appliant: appliantModel,
         academic_program: academicProgram,
         recommendation_letters: recommendation_letters,
         archives_recommendation_letters: archives_recommendation_letters,
         letters_Commitment:letters_Commitment,
         viewer:viewer
     },
 
     methods: {
         actualizaSolicitud(){
             // console.log('hola');
         }
     }
 });