<template>
    
    <tr class=" row pt-2 justify-content-center">
        <td class="col-8 align-self-start"><span>{{ name }}</span> </td>
        <td class="col-1 align-self-center"><form class="form-check"><input v-model="Score" class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Excelente"></form></td>
        <td class="col-1 align-self-center"><form class="form-check"><input v-model="Score" class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Bueno"></form></td>
        <td class="col-1 align-self-center"><form class="form-check"><input v-model="Score" class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Regular"></form></td>
        <td class="col-1 align-self-center"><form class="form-check"><input v-model="Score" class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Deficiente"></form></td>
    </tr>
    
     
</template>

<script>
export default {
    name: 'analysis-parameter',

    props: {
        // Nombre del parámetro
        name: {
            type: String,
            default: null,
        },
    
        // Valor del parámetro
        score: {
            type: String,
            default: null,
        },

        //valuesRadioBtns: ['Excelente','Bueno','Regular','Deficiente']
    },

    computed: {
        // Devuelve o altera el nivel del parámetro.
        Score: {
            get() {
                return this.score;
            },

            set(value) {
                this.$emit('update:score', value);
            }
        }
    }
}
</script>