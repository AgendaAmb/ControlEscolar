/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import CapitalHumano from './components/CapitalHumano.vue';
import DocumentoRequerido from './components/DocumentoRequerido.vue';
import Expedientes from './components/Expedientes.vue';
import ExperienciaLaboral from './components/ExperienciaLaboral.vue';
import GradoAcademico from './components/GradoAcademico.vue';
import LenguaExtranjera from './components/LenguaExtranjera.vue';
import Postulante from './components/Postulante.vue';
import ProduccionCientifica from './components/ProduccionCientifica.vue';
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
        CapitalHumano,
        DocumentoRequerido,
        Expedientes,
        ExperienciaLaboral,
        GradoAcademico,
        LenguaExtranjera,
        Postulante,
        ProduccionCientifica,
        RequisitosIngreso,
        SolicitudPostulante,
    },

    data: {
        archive: archiveModel,
        appliant: appliantModel,
        academic_program: academicProgram,
        recommendation_letters: recommendation_letters,
        archives_recommendation_letters: archives_recommendation_letters
    },

    methods: {
        actualizaSolicitud(){
            // console.log('hola');
        }
    }
});