/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import DocumentoRequeridoPorActualizar from "./components/DocumentoRequeridoPorActualizar.vue";
import DocumentoRequerido from "./components/DocumentoRequerido.vue";
import ActualizaDocumentos from "./components/ActualizaDocumentos.vue";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faTrashCan } from "@fortawesome/free-solid-svg-icons";
import { faUpload } from "@fortawesome/free-solid-svg-icons";
import { faDownload } from "@fortawesome/free-solid-svg-icons";
import { faFloppyDisk } from "@fortawesome/free-solid-svg-icons";
import { faEye } from "@fortawesome/free-solid-svg-icons";
import { faCirclePlus } from "@fortawesome/free-solid-svg-icons";
import { faPaperPlane } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faTrashCan);
library.add(faUpload);
library.add(faDownload);
library.add(faFloppyDisk);
library.add(faEye);
library.add(faCirclePlus);
library.add(faPaperPlane);

Vue.component("font-awesome-icon", FontAwesomeIcon);
Vue.config.productionTip = false;

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
        "documento-requerido-porActualizar": DocumentoRequeridoPorActualizar,
        "documento-requerido": DocumentoRequerido,
        "actualiza-documentos": ActualizaDocumentos,
    },

    data: {
        // Archive with all the ids
        archive: archiveModel,

        // Extra information
        appliant: appliantModel,
        academic_program: academicProgram,
        header_academic_program: header_academic_program,

        //  list of ids files to change
        personal_documents_ids: personal_documents_ids,
        entrance_documents_ids: entrance_documents_ids,
        academic_documents_ids: academic_documents_ids,
        language_documents_ids: language_documents_ids,
        working_documents_ids: working_documents_ids,
    },

    methods: {},
});
