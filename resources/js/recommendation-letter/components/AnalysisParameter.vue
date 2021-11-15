<template>
    <tr>
        <td> {{ name }} </td>
        <td> 
            <input type="radio" v-model="Score" class="form-control w-50 h-50 mx-auto" value="Excelente">
        </td>
        <td>
            <input type="radio" v-model="Score" class="form-control w-50 h-50 mx-auto" value="Bueno">
        </td>
        <td>
            <input type="radio" v-model="Score" class="form-control w-50 h-50 mx-auto" value="Regular">
        </td>
        <td>
            <input type="radio" v-model="Score" class="form-control w-50 h-50 mx-auto" value="Deficiente">
        </td>
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
        }
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