<template>
    <div class="row mt-2 justify-content-center rubric-section">
        <h4 class="col-11 myriad-bold rubric-section-header mb-3"> {{ title }} </h4>
        <slot name="appliant_data"></slot>
        <div class="col-lg-11 table-responsive px-0">
            <table class="table rubric-section-body">
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
                        <td class="text-justify" v-for="detail_data in researchDetailsFrom(concept)" :key="detail_data.id">
                            <div v-for="(detail, index) in detail_data" :key="index" class="d-block mb-4">
                                <label :class="labelClassFor(detail)"> {{ labelTextFor(detail) }} </label> 
                                <div v-for="(choice,index) in detail.choices" :key="index" class="form-check form-check-inline">
                                    <input class="form-check-input my-auto" type="radio" v-model="detail.value" :value="choice">
                                    <label class="form-check-label"> {{ choice }} </label>
                                </div>

                                <textarea v-if="isTextArea(detail)" class="form-control" rows="2" v-model="detail.value"></textarea>
                            </div>
                        </td>

                        <td class="score"><input v-model.number="concept.score" type="number"></td>
                        <td class="notes"><input v-model="concept.notes" type="text"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="col-11 hr">
    </div>
</template>

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

            if (concept.type === 'research')
                return [];

            return concept.evaluation_concept_details;
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
