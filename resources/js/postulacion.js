/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 window.Vue = require('vue').default;

import CapitalHumano from './components/postulacion/CapitalHumano.vue';
import DocumentoRequerido from './components/postulacion/DocumentoRequerido.vue';
import Expedientes from './components/postulacion/Expedientes.vue';
import ExperienciaLaboral from './components/postulacion/ExperienciaLaboral.vue';
import GradoAcademico from './components/postulacion/GradoAcademico.vue';
import LenguaExtranjera from './components/postulacion/LenguaExtranjera.vue';
import Postulante from './components/postulacion/Postulante.vue';
import ProduccionCientifica from './components/postulacion/ProduccionCientifica.vue';
import RequisitosIngreso from './components/postulacion/RequisitosIngreso.vue';
import SolicitudPostulante from './components/postulacion/SolicitudPostulante.vue';

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
});