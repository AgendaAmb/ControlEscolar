<template>
    <form @submit.prevent="buscaExpedientes" class="d-block w-50">
        <div class="form-group">
            <label> Programa académico </label>
            <select v-model="announcement" class="form-control">
                <option :value="null" selected>Escoge una opción</option>
                <option v-for="academicProgram in academic_programs" :key="academicProgram.id" :value="academicProgram.latest_announcement.id">{{ academicProgram.name}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    // Nombre del componente
    name: 'search-archive-form',

    // Propiedades no reactivas.
    props: {
        // Programas académicos.
        academic_programs: {
            type: Array,
            default() {
                return [];
            }
        }
    },

    // Propiedades reactivas.
    data() {
        return {
            announcement: null,
        }
    },

    methods: {
        buscaExpedientes(){

            // Parámetros de búsqueda.
            var params = {}

            if (this.announcement !== null) {
                params = {
                    params: {
                        'filter[announcement.id]': this.announcement
                    }
                };
            }

            axios.get('/controlescolar/solicitud/archives', params).then(response => {
                this.$emit('archives-found', response.data);
            }).catch(error => {

            });


            return false;
        }
    }
}
</script>