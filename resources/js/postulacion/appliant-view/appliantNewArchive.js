/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import Vue from 'vue';
 import AcademicProgram from './components/AcademicProgram.vue';

 window.Vue = require('vue').default;
 import swal from "sweetalert2";
window.Swal = swal;

 
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
         'academic-program': AcademicProgram,
     },
 
     data: {
         // Archive with all the ids 
         academic_programs: academic_programs,
         selected_academic_program: null,
     },
 
     methods: {
        nuevoProgramaAcademico(academic_program){
            this.selected_academic_program = academic_program;
            Swal.fire({
                title: "¿Estas seguro de continuar?",
                text: "Crearas un nuevo expediente para el programa " + academic_program.name , // Imprime el mensaje del controlador
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Continuar",
                cancelButtonText: "Cerrar",
              });
        }
     }
 });