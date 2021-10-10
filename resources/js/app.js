/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
Vue.config.productionTip = false;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('scheduler', require('./components/calendar/Scheduler.vue').default);
Vue.component('calendar', require('./components/calendar/Calendar.vue').default);


/**
 * Componentes para el pre-registro.
 */
Vue.component('academic-program', require('./components/pre-registro/AcademicProgram.vue').default);
 Vue.component('pre-registro', require('./components/pre-registro/PreRegistro.vue').default);
 Vue.component('crear-cuenta', require('./components/pre-registro/CrearCuenta.vue').default);
 Vue.component('datos-personales', require('./components/pre-registro/DatosPersonales.vue').default);

/**
 * Componentes para la vista de postulación.
 */
Vue.component('solicitud-postulante', require('./components/postulacion/SolicitudPostulante.vue').default);
Vue.component('postulante', require('./components/postulacion/Postulante.vue').default);
Vue.component('requisitos-ingreso', require('./components/postulacion/RequisitosIngreso.vue').default);
Vue.component('grado-academico', require('./components/postulacion/GradoAcademico.vue').default);
Vue.component('experiencia-laboral', require('./components/postulacion/ExperienciaLaboral.vue').default);
Vue.component('produccion-cientifica', require('./components/postulacion/ProduccionCientifica.vue').default);
Vue.component('documento-requerido', require('./components/postulacion/DocumentoRequerido.vue').default);
Vue.component('capital-humano', require('./components/postulacion/CapitalHumano.vue').default);
Vue.component('lengua-extranjera', require('./components/postulacion/LenguaExtranjera.vue').default);

/**
 * Componentes para la carta de intención.
 */
Vue.component('ci-solicitud-postulante', require('./components/carta-intencion/SolicitudPostulante.vue').default);
Vue.component('ci-postulante', require('./components/carta-intencion/Postulante.vue').default);
Vue.component('ci-grado-academico', require('./components/carta-intencion/GradoAcademico.vue').default);
Vue.component('ci-documento-requerido', require('./components/carta-intencion/DocumentoPostulante.vue').default);
Vue.component('ci-lengua-extranjera', require('./components/carta-intencion/LenguaExtranjera.vue').default);
Vue.component('ci-produccion-cientifica', require('./components/carta-intencion/ProduccionCientifica.vue').default);
Vue.component('ci-capital-humano', require('./components/carta-intencion/CapitalHumano.vue').default);