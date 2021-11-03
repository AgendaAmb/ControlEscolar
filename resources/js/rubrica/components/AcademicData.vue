<template>
    <div class="row mt-2 justify-content-center">
        <h4 class="col-11 myriad-bold blue rubric-title mb-3"> 2.- Información académica </h4>
        <div class="col-lg-11 table-responsive px-0">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="w-25"></th>
                        <th>
                            <p class="d-block mb-0"> Excelente </p>
                            <p class="d-block mb-0"> 75 - 100% </p>
                        </th>
                        <th>
                            <p class="d-block mb-0"> Muy Bien </p>
                            <p class="d-block mb-0"> 51 - 75% </p>
                        </th>
                        <th>
                            <p class="d-block mb-0"> Bien </p>
                            <p class="d-block mb-0"> 26 - 50%</p>
                        </th>
                        <th>
                            <p class="d-block mb-0"> Deficiente </p>
                            <p class="d-block mb-0"> 25 - 0%</p>
                        </th>
                        <th> Evaluación </th>
                        <th> Observaciones </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="concept in academic_concepts" :key="concept.id">
                        <td class="text-left w-25">{{concept.description}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="col-11 hr">
    </div>
</template>

<script>
export default {
    name: 'academic-data',
    
    props: {
        // Conceptos básicos.
        academic_concepts: {
            type: Array,
            default() {
                return [];
            }
        }
    },
}
</script>
