<template>
    <div class="row mt-2 justify-content-center rubric-section">
        <h4 class="col-11 myriad-bold rubric-section-header mb-3"> {{ title }} </h4>
        <slot name="appliant_data"></slot>
        <div class="col-lg-11">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="text-justify concept"><b> Lengua extranjera (Ingles): </b> {{ english_score }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-justify concept"><b> EXANI: </b>{{ exani_score }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-justify concept"><b> Universidad de procedencia: </b>{{ university }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-justify concept"><b> Promedio de la licenciatura: </b>{{ estudio_score }} </td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Ponderación: {{ basicScore() }}</td>
                    </tr>
                </tfoot>
            </table>
            <!-- <div class="row appliant">
                <div v-if="country==='México'" class="col-lg-7">
                    <p class="d-block mb-0"> <b> Lengua extranjera (Ingles): </b> {{ english_score }}</p>
                    <p class="d-block mb-0 personal_data"> <b> EXANI: </b>{{ exani_score }} </p>
                    <p class="d-block mb-0 personal_data"> <b> Universidad de procedencia: </b>{{ university }} </p>
                    <p v-if="antype==='maestría'?true:false" d-block mb-0 personal_data> <b> Promedio de la
                            licenciatura: </b>{{
                        estudio_score }} </p>
                    <p v-else class="d-block mb-0 personal_data"> <b>Promedio de la maestría: </b>{{ estudio_score }}
                    </p>
                </div>
                <div v-else class="col-lg-7">
                    <p class="d-block mb-0"> <b> Lengua extranjera (Ingles): </b> {{ english_score }}</p>
                    <p v-if="antype==='maestría'?true:false" d-block mb-0 personal_data> <b> Promedio de la licenciatura
                            (Extranjero sin conversión ): </b>{{ estudio_score }} </p>
                    <p v-else class="d-block mb-0 personal_data"> <b>Promedio de la maestría (Extranjero sin
                            conversión): </b>{{ estudio_score }}
                    </p>
                </div>
            </div> -->
            <hr class="col-12 hr">
        </div>
    </div>
</template>

<script>
import { interfaceDeclaration } from '@babel/types';

export default {
    name: 'basic-data-rubric-section',
    
    props: {
        // Título de la sección.
        title: {
            type: String,
            default: ''
        },

        country: {
            type: String,
            default: ''
        },

        university: {
            type: String,
            default: ''
        },

        // Conceptos básicos.
        concepts: {
            type: Array,
            default() {
                return [];
            }
        },

        id:{
            type: Number
        },

        estudio_score:{
            type: Number
        },
        
        english_score: {
            type: Number
        },

        exani_score :{
            type: Number
        },

        antype:{
            type: String,
            default: ''
        }
    },

    mounted() {
        // console.log(this.antype);

    },

    methods: {
        detailsFrom(concept){
            if (concept.evaluation_concept_details.length === 0)
                return [{text:''},{text:''},{text:''},{text:''}];

            if (concept.type === 'research')
                return [];

            return concept.evaluation_concept_details;
        },

        basicScore(){
            // Factores de ponderación para datos basicos de los rubros
            let doctorado = 10;
            let maestria = 15;
            let score = `${this.antype}` === 'doctorado' ? (this.estudio_score * doctorado) / 10 : (this.estudio_score * maestria) / 10;
            return score;
        },

        // Calculo de la ponderacion
        sectionScore(concepts, id){
            // Factores de ponderación de los rubros
            let doctorado = [10,25,30,20,15];
            let maestria = [15,30,15,25,15];

            let score = 0.0; 

            concepts.forEach(function(concept) {
                score+=concept.score;
            });

            score = `${this.antype}` === 'doctorado'?
                ((score/concepts.length)*doctorado[`${this.id}`])/100:
                ((score/concepts.length)*maestria[`${this.id}`])/100;

            return score;
        },

        researchDetailsFrom(concept){
            if (concept.type !== 'research')
                return {};

            return concept.evaluation_concept_details;
        },
        
        isHeader(detail){
            return detail.type === 'header';
        },

        isTextInput(detail){
            return detail.type === 'text';
        },

        isTextArea(detail){
            return detail.type === 'textarea';
        },

        isRadioInput(detail){
            return detail.type === 'radio';
        },

        labelClassFor(detail){
            return {
                'd-block':true,
                'myriad-regular':!this.isHeader(detail),
                'myriad-bold':this.isHeader(detail),
                'text-left':true,
                'mt-0': true,
                'mb-1': true
            }
        },

        labelTextFor(detail){
            if (this.isHeader(detail))
                return detail.header;

            return detail.label;
        }
    },
}
</script>
