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
                        <th class="table-info">Ponderación sección 1</th>
                        <th class="table-info">Ponderación sección 2</th>
                        <th class="table-info">Ponderación sección 3 </th>
                        <th class="table-info">Ponderación sección 4</th>
                        <th class="table-info">Ponderación sección 5</th>
                        <th class="table-success">Ponderación promedio de rúbricas</th>
                        <!-- CE -->
                        <th class="table-info">Comentarios sección 2</th>
                        <th class="table-info">Comentarios sección 3</th>
                        <th class="table-info">Comentarios sección 4</th>
                        <th class="table-info">Comentarios sección 5</th>

                        <th class="table-success">Comentario o aportación</th>
                        <th class="table-success">Información detectada por la comisión de evaluación
                        </th>
                        <th class="table-success">Dictamen individual
                        </th>
                        <th class="table-success">Dictamen general
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-secondary">{{appliant.name}}</th>
                        <!-- Ponderaciones -->
                        <th class="table-info">{{ scores.basic.toFixed(2) }}</th>
                        <th class="table-info">{{ scores.academic.toFixed(2) }}</th>
                        <th class="table-info">{{ scores.research.toFixed(2) }}</th>
                        <th class="table-info">{{ scores.exp.toFixed(2) }}</th>
                        <th class="table-info">{{ scores.personal.toFixed(2) }}</th>
                        <th class="table-success">{{scores.rubric_total.toFixed(2)}}</th>
                        <th class="table-info">{{ rubric.academic_concepts.join("\r\n\n") }}</th>
                        <th class="table-info">{{ rubric.research_concepts.join("\r\n\n") }}</th>
                        <th class="table-info">{{ rubric.working_concepts.join("\r\n\n") }}</th>
                        <th class="table-info">{{ rubric.personal_concepts.join("\r\n\n") }}</th>
                        <!-- CE -->
                        <th class="table-success">{{ rubric.considerations.join("\r\n\n") }}</th>
                        <th class="table-success">{{ rubric.additional_information.join("\r\n\n") }}</th>
                        <th class="table-success">{{ rubric.dictamen_individual.join("\r\n\n") }}</th>
                        <th class="table-success">{{ rubric.dictamen_general.join("\r\n\n") }}</th>
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
    name: 'average-rubric-ca ',
    
    props: {
        rubric,
        appliant,
        scores
    },

    mounted(){
        // console.log(this.getPonderacion());
        // console.log(this.scores.length)
    },

    methods: {
    },
}
</script>
