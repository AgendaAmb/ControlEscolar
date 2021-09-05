/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuex from 'vuex';

window.Vue = require('vue').default;
Vue.use(Vuex);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('academic-program-header', require('./components/Header.vue').default);
Vue.component('academic-program-card', require('./components/AcademicProgramCard.vue').default);
Vue.component('countries', require('./components/Country.vue').default);
Vue.component('country-state', require('./components/CountryState.vue').default);
Vue.component('yes-no-select', require('./components/YesNoSelect.vue').default);
Vue.component('modal-registro', require('./components/ModalRegistro.vue').default);
Vue.component('gender', require('./components/Gender.vue').default);
Vue.component('form-input', require('./components/FormInput.vue').default);
Vue.component('form-select', require('./components/FormSelect.vue').default);
Vue.component('required-document', require('./components/RequiredDocument.vue').default);
Vue.component('student-appliance', require('./components/Appliance.vue').default);
Vue.component('appliant-data', require('./components/Appliant.vue').default);

