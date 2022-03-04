/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;

import axios from 'axios';
import Vue from 'vue';
import CandidateAnalysis from './components/CandidateAnalysis';
import DataCandidate from './components/DataCandidate';
import RelationshipWithCandidate from './components/RelationshipWithCandidate';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
    el: '#app',
    name: 'recommendation-letter',

    components: {
        CandidateAnalysis,
        DataCandidate,
        RelationshipWithCandidate,
    },
    data: {
        recommendation_letter: recommendation_letter,
        appliant: appliant,
        announcement: announcement,
        token: token,
        confirm_submit: false,
        // parameters: parameters,
        parameters: [
            {
                name: "Conocimiento y destrezas en su campo",
                score: null,
            },
            {
                name: "Dedicación al trabajo",
                score: null,
            },
            {
                name: "Imaginación y creatividad",
                score: null,
            },
            {
                name: "Habilidad para comunicarse",
                score: null,
            },
            {
                name: "Rendimiento",
                score: null,
            },
            {
                name: "Perseverancia",
                score: null,
            },
            {
                name: "Capacidad de convivencia con otras personas",
                score: null,
            },
            {
                name: "Disciplina de estudio",
                score: null,
            },
            {
                name: "Habilidad de investigación",
                score: null,
            },
            {
                name: "Habilidades de comunicación oral y escrita",
                score: null,
            },
            {
                name: "Hábitos de trabajo",
                score: null,
            },
            {
                name: "Organización",
                score: null,
            },
            {
                name: "Planificación",
                score: null,
            },
            {
                name: "Oportunidad",
                score: null,
            },
            {
                name: "Colaboración en equipo",
                score: null,
            },
            {
                name: "Iniciativa propia",
                score: null,
            },
        ],
        //otros parametros
        custom_parameters: [
            {
                name: "",
                score: "",
            },
        ],
    },

    methods: {
        /*
        Se necesita
        Informacion (en un solo objeto)
 
        data: {
            a: this.a
            b: this.b
        }
 
 
        */
        actualizaRecomendationLetter() {
            //tranforma los datos a objetos
            // let aux_score = [];
            // for(const index in this.score_parameters){
            //     aux_score.push({index})
            // }


            // if(this.confirm_submit){
            // axios.post(
            //     route(
            //         'recommendationLetter.store',
            //         {
            //             recommendation_letter_id: this.recommendation_letter.id, 
            //             answer: 1,
            //             token:this.token,
            //             email_evaluator: this.recommendation_letter.email_evaluator,
            //             time_to_meet: this.recommendation_letter.time_to_meet,
            //             how_meet: this.recommendation_letter.how_meet,
            //             kind_relationship: this.recommendation_letter.kind_relationship,
            //             experience_with_candidate: this.recommendation_letter.experience_with_candidate,
            //             qualifications_students: this.recommendation_letter.qualifications_students,
            //             special_skills: this.recommendation_letter.special_skills,
            //             why_recommendation: this.recommendation_letter.why_recommendation,
            //             //colecciones a evaluar separadas
            //             score_parameters: this.score_parameters,
            //             custom_parameters: this.custom_parameters,
            //         },
            //         this.appliant,
            //         this.announcement
            // )).then(response => {
            //     this.$emit
            // });
            // }else{
            //     alert("Confirma que la información sera confidencial para continuar");
            // }
            if (this.confirm_submit) {
                axios.post('/controlescolar/recommendationLetter/addRecommendationLetter', {
                    recommendation_letter_id: this.recommendation_letter.id,
                    answer: 1,
                    token: this.token,
                    email_evaluator: this.recommendation_letter.email_evaluator,
                    time_to_meet: this.recommendation_letter.time_to_meet,
                    how_meet: this.recommendation_letter.how_meet,
                    kind_relationship: this.recommendation_letter.kind_relationship,
                    experience_with_candidate: this.recommendation_letter.experience_with_candidate,
                    qualification_student: this.recommendation_letter.qualification_student,
                    special_skills: this.recommendation_letter.special_skills,
                    why_recommendation: this.recommendation_letter.why_recommendation,
                    //colecciones a evaluar separadas
                    score_parameters: this.parameters,
                    custom_parameters: this.custom_parameters,
                    appliant: this.appliant,
                    announcement: this.announcement
                }).then((response) => {
                    console.log(response);
                    // alert('Tu respuesta ha sido enviada, agradecemos tu cooperacion, puedes cerrar ya esta ventana');
                    
                }).catch((error) => {
                    //alert(error.response.data);
                    // alert('ERROR, no pudimos guardar tu respuesta');
                    console.log(error.response.data);
                });

            } else {
                alert("Confirma que la información sera confidencial para continuar");
            }
        }
    },
});