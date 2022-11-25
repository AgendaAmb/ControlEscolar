/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import AppliantData from './components/AppliantData';
import EvaluationRubricSection from './components/EvaluationRubricSection';
import BasicDataRubricSection from './components/BasicDataRubricSection';
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
        estudio_score: 0,
        english_score: 0,
        exani_score: basicConcepts.exanni_score,
        university: '',
        basic_concepts: rubric.basic_concepts, // TODO va a ser remplazado
        basicConcepts: basicConcepts,
        dictamen_redactor: rubric.dictamen_redactor,
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
        dictamen_individual: rubric.dictamen_individual,
        dictamen_ce: rubric.dictamen_ce,
        dataModal: "",
        visbleSave:false,
        visbleSend:false,
        isComplete:rubric.isComplete,
        rubric_user_id: rubric.rubric_user_id
    },

    mounted() {
        console.log(rubric);
        //Obtemenos el escore de maestria o licencitara segun el caso
        try{
            if(this.announcement.type === 'maestría'){
                this.basicConcepts.academic_degrees.forEach(element => {
                    if(element.degree_type === 'Licenciatura'){
                        this.university = element.university;   //Cargar universidad
                        if(element.country==='México'){
                            if(element.average > 10){
                                element.average = element.average / 10;
                            }
                            this.estudio_score = element.average;
                        }else{
                            this.estudio_score = (10/element.max_avg)*element.average;
                        }
                    }
                });
            }else{
                this.basicConcepts.academic_degrees.forEach(element => {
                    if(element.degree_type === 'Maestría'){
                        this.university = element.university;   //Cargar universidad
                        if(element.country==='México'){
                            if(element.average > 10){
                                element.average = element.average / 10;
                            }
                            this.estudio_score = element.average;
                        }else{
                            this.estudio_score = (10/element.max_avg)*element.average;
                        }
                    }
                });
            };
        }catch{
            this.estudio_score = -1;
        }
        
        // Obtenemos los datos del ingles 
        this.basicConcepts.appliant_languages.forEach(element => {
            console.log(element.language);
            if(element.language==='Inglés'){
                this.english_score = element.score;
            }
        });
    },

    // var = (10/Max_average_sis)Max_average
 
    components: {
        AppliantData,
        EvaluationRubricSection,
        BasicDataRubricSection
    },
   
    methods: {
        /**
         * Determina si el usuario autenticado es profesor de núcleo básico.
         * @param {*} period 
         */

        loggedUserIsPNB(){
            var roles = this.loggedUser.roles.filter(role => {
                return role.name === 'profesor_nb';
            });
    
            return roles.length > 0;
        },



        // Autorizado para modifcar la rubrica 
        r_only(){
            var roles1 = this.loggedUser.roles.filter(role => {
                return role.name === 'profesor_nb';
            });

            var roles2 = this.loggedUser.roles.filter(role => {
                return role.name === 'admin';
            });
            
            // Si es administrador nunca
            if(roles2.length > 0)return false;
            console.log(this.isComplete?true:false);
            // Si ya esta completada obvio que si bby
            if(this.isComplete?true:false)return true;
            console.log(this.loggedUser.id + " - " + this.rubric_user_id);
            // Si no es el dueño obvio que si bby
            if(this.loggedUser.id != this.rubric_user_id)return true;

            // Default yes
            return false;
            
        },

        /**
         * Determina si el usuario autenticado es administrador.
         * @param {*} period 
         */
        loggedUserIsAdmin(){
            var roles = this.loggedUser.roles.filter(role => {
                return role.name === 'admin';
            });
    
            return roles.length > 0;
        },

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
            // const basic_concepts = this.getConceptData(this.basic_concepts);
            const academic_concepts = this.getConceptData(this.academic_concepts);
            const research_concepts = this.getConceptData(this.research_concepts);
            const working_experience_concepts = this.getConceptData(this.working_experience_concepts);
            const personal_attributes_concepts = this.getConceptData(this.personal_attributes_concepts);
            
            axios.put('/controlescolar/entrevistas/rubrica/' + rubric_id, {

                state: state,
                // basic_concepts: basic_concepts,
                academic_concepts: academic_concepts,
                research_concepts: research_concepts,
                working_experience_concepts: working_experience_concepts,
                personal_attributes_concepts: personal_attributes_concepts,
                considerations: this.considerations,
                additional_information: this.additional_information,
                dictamen_ce: this.dictamen_ce,
                dictamen_individual: this.dictamen_individual
            }).then(response => {
                this.visbleSave=false,
                this.visbleSend=false,
                state=="send"?alert('Tu información se ha enviado correctamente'):alert('Tu información se ha guardado con exito.'),
                window.location.reload()
            }).catch(error => {
                this.visbleSave=false,
                this.visbleSend=false,
                alert('Lo sentimos tu información no se ha guardado con exito. Recuerda llenar todos los campos necesarios')
            });
        }
    }
});