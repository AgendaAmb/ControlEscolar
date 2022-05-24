/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import Vue from 'vue';
 import DocumentoRequerido from './components/DocumentoRequerido.vue';
 
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
         DocumentoRequerido,
     },
 
     data: {
         archive: archiveModel,
         appliant: appliantModel,
         academic_program: academicProgram,
         header_academic_program: header_academic_program,
         required_documents:required_documents,
     },
 
     methods: {
       
     }
 });