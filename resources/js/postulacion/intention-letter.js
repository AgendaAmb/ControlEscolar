/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import Vue from 'vue';
 import SearchArchiveForm from './components/search-archives/SearchArchiveForm.vue';
 import Archives from './components/search-archives/Archives.vue';
 import Archive from './components/search-archives/Archive.vue';

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
    name: 'search-archives',
    components: {
        SearchArchiveForm,
        Archives,
        Archive
    },

    data: {
        auth_user: authUser,
        academic_programs: academicPrograms,
        archives: []
    },

    methods: {
        /**
         * Actualiza los expedientes, con base al evento "archives_found", 
         * emitido por alguno de los componentes hijos
         */
        updateArchives(archives){
            Vue.set(this, 'archives', archives);
        }
    }
});