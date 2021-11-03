<template>
    <div class="row mt-2 justify-content-center">
        <h4 class="col-11 myriad-bold blue rubric-title mb-3"> {{ title }} </h4>
        <slot name="appliant_data"></slot>
        <div class="col-lg-11 table-responsive px-0">
            <table class="table rubric">
                <thead>
                    <tr>
                        <th class="concept"></th>
                        <th class="score-category myriad-bold">
                            <p class="excelent d-block mb-0"> Excelente </p>
                            <p class="myriad-light d-block mb-0"> 75 - 100% </p>
                        </th>
                        <th class="score-category myriad-bold">
                            <p class="very-good d-block mb-0"> Muy Bien </p>
                            <p class="myriad-light d-block mb-0"> 51 - 75% </p>
                        </th>
                        <th class="score-category myriad-bold">
                            <p class="good d-block mb-0"> Bien </p>
                            <p class="myriad-light d-block mb-0"> 26 - 50%</p>
                        </th>
                        <th class="score-category myriad-bold">
                            <p class="goofy d-block mb-0"> Deficiente </p>
                            <p class="myriad-light d-block mb-0"> 25 - 0%</p>
                        </th>
                        <th class="myriad-bold score blue"><p class="d-block mt-0"> Evaluación </p></th>
                        <th class="myriad-bold notes blue"><p class="d-block mt-0"> Observaciones </p></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="concept in concepts" :key="concept.id">
                        <td class="text-justify concept">{{concept.description}}</td>
                        <td class="text-justify" v-for="detail in detailsFrom(concept)" :key="detail.id">{{detail.text}}</td>
                        <td >
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="col-11 hr">
    </div>
</template>

<style scoped>

.rubric {
    text-align: center;
}

.rubric > thead th, .rubric > tbody td {
    border-style: solid;
    border-color:gray;
    border-width: 0px 1px 1px 0px;
}

.rubric > tbody td {
    font-size:13px;
}

.excelent, .very-good, .good, .goofy {
    font-size:18px;
}

.excelent {
    color: #009cff;
}

.very-good {
    color: #ffa500;
}

.good {
    color: #8ACC25;
}

.goofy {
    color: #fcb063;
}

.excelent + p, .very-good + p:first-of-type {
    color: black;
    font-size: 14px;
}

.concept, .score-category, .notes {
    width: 15%;
}

.score {
    width: 10%;
}


.table-input {
    display: block;
}
</style>

<script>
export default {
    name: 'evaluation-rubric-section',
    
    props: {
        // Título de la sección.
        title: {
            type: String,
            default: ''
        },

        // Conceptos básicos.
        concepts: {
            type: Array,
            default() {
                return [];
            }
        }
    },

    methods: {
        detailsFrom(concept){
            if (concept.evaluation_concept_details.length === 0)
                return [{text:''},{text:''},{text:''},{text:''}];

            return concept.evaluation_concept_details;
        }
    },
}
</script>
