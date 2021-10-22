/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;

import AcademicProgram from "./components/AcademicProgram.vue";
import CrearCuenta from "./components/CrearCuenta.vue";
import DatosMiPortal from "./components/DatosMiPortal.vue";
import DatosPersonales from "./components/DatosPersonales.vue";
import DatosUaslp from "./components/DatosUaslp.vue";
import PreRegistro from "./components/PreRegistro.vue";

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
        AcademicProgram, 
        CrearCuenta, 
        DatosMiPortal, 
        DatosPersonales, 
        DatosUaslp,
        PreRegistro
    },
    data: {
        academic_programs: academicPrograms,
        selected_academic_program: null,
    },
});