<template>
    <div class="row mt-2 justify-content-center rubric-section">
        <!-- <h4 class="col-11 myriad-bold rubric-section-header mb-3"> Titulo </h4> -->
        <slot name="appliant_data"></slot>
        <div class="col-lg-11 px-0">
            <table style="overflow-x:scroll;" class="table table-hover table-responsive overflow-auto">
                <thead>
                    <tr>
                        <th class="score-category myriad-bold table-secondary">
                            <p class="excelent d-block mb-0"> Nombre del aspirante </p>
                        </th>
                        <th class="score-category myriad-bold table-secondary">
                            <p class="very-good d-block mb-0"> Nombre del profesor evaluador</p>
                        </th>
                        <th class="table-info">Ponderación sección 1</th>
                        <th class="table-info">Ponderación sección 2</th>
                        <th class="table-info">Ponderación sección 3 </th>
                        <th class="table-info">Ponderación sección 4</th>
                        <th class="table-info">Ponderación sección 5</th>
                        <th class="table-primary">Ponderación de rúbrica </th>
                        <th class="table-success">Ponderación promedio de rúbricas</th>
                        <!-- <th class="table-secondary" v-for="(concept, index) in rubrics[0].basic_concepts" :key="index"> -->
                        <!-- 1.{{ index + 1 }}
                        </th> -->
                        <th class="table-secondary" v-for="(concept, index) in rubrics[0].academic_concepts"
                            :key="index">
                            <!-- {{concept.description}} -->
                            2.{{ index + 1 }}
                        </th>
                        <th class="table-secondary" v-for="(concept, index) in rubrics[0].research_concepts"
                            :key="index">
                            <!-- {{concept.description}} -->
                            3.{{ index + 1 }}
                        </th>
                        <th class="table-secondary" v-for="(concept, index) in rubrics[0].working_experience_concepts"
                            :key="index">
                            4.{{ index + 1 }}
                            <!-- {{concept.description}} -->
                        </th>
                        <th class="table-secondary" v-for="(concept, index) in rubrics[0].personal_attributes_concepts"
                            :key="index">
                            5.{{ index + 1 }}
                            <!-- {{concept.description}} -->
                        </th>
                        <th class="table-success">Comentario o aportación</th>
                        <th class="table-success">Información detectada por la comisión de evaluación
                        </th>
                        <th class="table-success">Dictamen individual</th>
                        <th class="table-success">Dictamen de la comisión evaluadora</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(rubric, index) in rubrics" :key="index" class="score-category myriad-bold">
                        <th class="table-secondary">{{appliant.name}}</th>
                        <th class="table-secondary">{{rubric.user}}</th>
                        <!-- Ponderaciones -->
                        <th class="table-info">{{ scores[index].basic.toFixed(2) }}</th>
                        <th class="table-info">{{ scores[index].academic.toFixed(2) }}</th>
                        <th class="table-info">{{ scores[index].research.toFixed(2) }}</th>
                        <th class="table-info">{{ scores[index].exp.toFixed(2) }}</th>
                        <th class="table-info">{{ scores[index].personal.toFixed(2) }}</th>
                        <th class="table-primary">{{ scores[index].rubric_total.toFixed(2) }}</th>
                        <th class="table-success">{{getPonderacion()}}</th>
                        <!-- <th class="table-secondary" v-for="(concept, index) in rubric.basic_concepts" :key="index">
                            10
                        </th> -->
                        <th class="table-secondary" v-for="(concept, index) in rubric.academic_concepts" :key="index">
                            {{concept.notes}}
                        </th>
                        <th class="table-secondary" v-for="(concept, index) in rubric.research_concepts" :key="index">
                            {{concept.notes}}
                        </th>
                        <th class="table-secondary" v-for="(concept, index) in rubric.working_experience_concepts"
                            :key="index">
                            {{concept.notes}}
                        </th>
                        <th class="table-secondary" v-for="(concept, index) in rubric.personal_attributes_concepts"
                            :key="index">
                            {{concept.notes}}
                        </th>
                        <th class="table-success">{{ rubric.considerations }}</th>
                        <th class="table-success">{{ rubric.additional_information }}</th>
                        <th class="table-success">{{ rubric.dictamen_individual }}</th>
                        <th class="table-success">{{ rubric.dictamen_general }}</th>
                    </tr>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <hr class="col-11 hr">
    </div>
</template>

<style>
    .notes-text{
        min-height: 15vh;
    }
</style>

<script>
import { interfaceDeclaration } from '@babel/types';
import { columnSelectionComplete } from '@syncfusion/ej2-grids';

export default {
    name: 'average-rubric ',
    
    props: {
        rubrics,
        appliant,
        appliant_details,
        scores
    },

    mounted(){
        // console.log(this.getPonderacion());
        // console.log(this.scores.length)
    },

    methods: {
        getPonderacion(){
            let ponderacion = 0.0;
            scores.forEach(element => {
                ponderacion+=element.rubric_total;
            });
            return (ponderacion/scores.length).toFixed(2);
        }
    },
}
</script>
