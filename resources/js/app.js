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
Vue.component('grado-academico', require('./components/postulacion/GradoAcademico.vue').default);
Vue.component('datos-personales', require('./components/postulacion/DatosPersonales.vue').default);
Vue.component('documento-requerido', require('./components/postulacion/DocumentoRequerido.vue').default);
Vue.component('lengua-extranjera', require('./components/postulacion/LenguaExtranjera.vue').default);
Vue.component('grado-academico-postulante', require('./components/carta-intencion/GradoAcademico.vue').default);
Vue.component('informacion-postulante', require('./components/carta-intencion/InformacionPostulante.vue').default);