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
        idArchive: idArchive,
        recommendation_letter: recommendation_letter,
        appliant: appliant,
        announcement: announcement,
        parameters: parameters,
        index: index,
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



            axios.post('controlescolar/recommendationLetter/addRecommendationLetter', {
                recommendation_letter_id: this.archiveRl.id, 
                archive_id: this.idArchive,
                token:this.token,
                answer: 1,
                email_evaluator: this.archiveRl.email_evaluator,
                time_to_meet: this.archiveRl.time_to_meet,
                how_meet: this.archiveRl.how_meet,
                kind_relationship: this.archiveRl.kind_relationship,
                experience_with_candidate: this.archiveRl.experience_with_candidate,
                qualifications_students: this.archiveRl.qualifications_students,
                special_skills: this.archiveRl.special_skills,
                why_recommendation: this.archiveRl.why_recommendation,
                //colecciones a evaluar separadas
                score_parameters: this.score_parameters,
                custom_parameters: this.custom_parameters,
            }).then(response => {
                this.$emit
            });
        }
    },
});