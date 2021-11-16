/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import AppliantData from './components/AppliantData';
import EvaluationRubricSection from './components/EvaluationRubricSection';
import { GridPlugin } from '@syncfusion/ej2-vue-grids';
import axios from 'axios';

window.Vue = require('vue').default;
Vue.use(GridPlugin);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
    el: '#app',
    data: {
        id: rubric.id,
        basic_concepts: rubric.basic_concepts,
        academic_concepts: rubric.academic_concepts,
        research_concepts: rubric.research_concepts,
        research_concepts_details: rubric.research_concepts_details,
        working_experience_concepts: rubric.working_experience_concepts,
        personal_attributes_concepts: rubric.personal_attributes_concepts,
        loggedUser: user,
        appliant: appliant,
        announcement: announcement,
        considerations: rubric.considerations,
        additional_information: rubric.additional_information,
        dataModal: "",
        visbleSave:false,
        visbleSend:false
    },

    components: {
        AppliantData,
        EvaluationRubricSection
    },
   
    methods: {
        getConceptData(concepts) {
            return concepts.map(concept => {
                var concept_data = {
                    id: concept.id,
                    notes: concept.notes,
                    score: concept.score
                };

                if (concept.type === 'research')
                    concept_data['evaluation_concept_details'] = concept.evaluation_concept_details;

                return concept_data;
            });
        },

        guardaRubrica(state) {
            state=="save"?this.visbleSave=true:this.visbleSave=false;
            state=="send"?this.visbleSend=true:this.visbleSend=false;
            const rubric_id = this.id;
            const basic_concepts = this.getConceptData(this.basic_concepts);
            const academic_concepts = this.getConceptData(this.academic_concepts);
            const research_concepts = this.getConceptData(this.research_concepts);
            const working_experience_concepts = this.getConceptData(this.working_experience_concepts);
            const personal_attributes_concepts = this.getConceptData(this.personal_attributes_concepts);
            
            axios.put('/controlescolar/entrevistas/rubrica/' + rubric_id, {
                
                state: state,
                basic_concepts: basic_concepts,
                academic_concepts: academic_concepts,
                research_concepts: research_concepts,
                working_experience_concepts: working_experience_concepts,
                personal_attributes_concepts: personal_attributes_concepts,
                considerations: this.considerations,
                additional_information: this.additional_information
            }).then(response => {
                this.visbleSave=false,
                this.visbleSend=false,
                alert('Tu información se ha guardado con exito.')
                
            }).catch(error => {
                this.visbleSave=false,
                this.visbleSend=false,
                alert('Lo sentimos tu información no se ha guardado con exito. Recuerda llenar todos los campos necesarios')
            });
        }
    }
});