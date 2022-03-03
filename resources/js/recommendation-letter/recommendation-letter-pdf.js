/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 window.Vue = require('vue').default;

 import axios from 'axios';
 import Vue from 'vue';
 import CandidateAnalysis from './components/CandidateAnalysis';
 import DataCandidate from './components/DataCandidate';
 import RelationshipWithCandidate from './components/RelationshipWithCandidate';
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 const app = new Vue({
     el: '#app',
     name: 'recommendation-letter',
 
     components: {
         CandidateAnalysis,
         DataCandidate,
         RelationshipWithCandidate,
     },
     data: {
         recommendation_letter: recommendation_letter,
         appliant: appliant,
         announcement: announcement,
         token: token,
         confirm_submit: false,
         parameters: parameters,
         //otros parametros
         custom_parameters: [
             {
                 name: "",
                 score: "",
             },
         ],
     },
 
     methods: {
         /*
         Se necesita
         Informacion (en un solo objeto)
  
         data: {
             a: this.a
             b: this.b
         }
  
  
         */
         actualizaRecomendationLetter() {
             
         }
     },
 });