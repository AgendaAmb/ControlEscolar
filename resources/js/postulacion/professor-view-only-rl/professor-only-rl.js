/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import RequisitosIngreso from "./components/RequisitosIngreso.vue";
import SolicitudPostulante from "./components/SolicitudPostulante.vue";
import { BootstrapVue, BootstrapVueIcons } from "bootstrap-vue";
import { GridPlugin } from "@syncfusion/ej2-vue-grids";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faTrashCan } from "@fortawesome/free-solid-svg-icons";
import { faUpload } from "@fortawesome/free-solid-svg-icons";
import { faDownload } from "@fortawesome/free-solid-svg-icons";
import { faFloppyDisk } from "@fortawesome/free-solid-svg-icons";
import { faEye } from "@fortawesome/free-solid-svg-icons";
import { faCirclePlus } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faTrashCan);
library.add(faUpload);
library.add(faDownload);
library.add(faFloppyDisk);
library.add(faEye);
library.add(faCirclePlus);

Vue.component("font-awesome-icon", FontAwesomeIcon);
Vue.config.productionTip = false;

Vue.use(GridPlugin);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
    el: "#app",

    components: {
        RequisitosIngreso,
        SolicitudPostulante,
    },

    data: {
        archive: archiveModel,
        appliant: appliantModel,
        academic_program: academicProgram,
        recommendation_letters: recommendation_letters,
        archives_recommendation_letters: archives_recommendation_letters,
        viewer: viewer,
    },

    methods: {
        actualizaSolicitud() {
            // console.log('hola');
        },
    },
});
