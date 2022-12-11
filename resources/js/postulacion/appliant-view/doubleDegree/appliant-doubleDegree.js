/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import Vue from 'vue';
import WorkingExperiece from './components/WorkingExperience.vue';
import SecondaryEducation from './components/SecondaryEducation.vue'
import ReasonsToChoise from './components/ReasonsToChoise.vue';
import PersonalData from './components/PersonalData.vue';
import LettersOfRecommendation from './components/LettersOfRecommendation';
import LanguageSkills from './components/LanguageSkills.vue';
import HigherEducation from './components/HigherEducation.vue';
import HearAboutProgram from './components/HearAboutProgram.vue';
import FuturePlansExpectations from './components/FuturePlansExpectations.vue';
import FinancingStudies from './components/FinancingStudies.vue';
import FielsOfInterest from './components/FieldsOfInterest.vue';
import EnvironmentRelatedSkills from './components/EnvironmentRelatedSkills.vue';
import CorrespondenceAddress from './components/CorrespondenceAddress.vue';
import CheckboxPersonalize from './components/CheckboxPersonalize.vue';
import SolicitudPostulante from './components/SolicitudPostulante.vue';
 import { BootstrapVue,BootstrapVueIcons  } from 'bootstrap-vue';
 import { GridPlugin } from '@syncfusion/ej2-vue-grids';
 Vue.use(GridPlugin);
 Vue.use(BootstrapVue);
 Vue.use(BootstrapVueIcons);
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
        SecondaryEducation,
        WorkingExperiece,
        ReasonsToChoise,
        PersonalData,
        LettersOfRecommendation,
        LanguageSkills,
        HigherEducation,
        HearAboutProgram,
        FuturePlansExpectations,
        FinancingStudies,
        FielsOfInterest,
        EnvironmentRelatedSkills,
        CorrespondenceAddress,
        CheckboxPersonalize,
        SolicitudPostulante
     },
 
     data: {
         archive: archiveModel,
         appliant: appliantModel,
         academic_program: academicProgram,
         recommendation_letters: recommendation_letters,
         archives_recommendation_letters: archives_recommendation_letters,
         viewer:viewer 
     },
 
     methods: {
         actualizaSolicitud(){
         }
     }

     
 });