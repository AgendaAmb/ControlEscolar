<template>
    <form @submit.prevent="buscaExpedientes" class="d-block w-50">
        <div class="form-group">
            <label> Programa académico </label>
            <select v-model="announcement" class="form-control">
                <option :value="null" selected>Escoge una opción</option>
                <option v-for="academicProgram in academic_programs" :key="academicProgram.id" :value="academicProgram.latest_announcement.id">{{ academicProgram.name}}</option>
            </select>
        </div>
        <div class="row mx-1">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <div v-if="dataLength !== null" class="mx-3">
                {{dataLength}} <span> Resultados encontrados</span>
            </div>
        </div>
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
            dataLength: null
        }
    },

    methods: {
        buscaExpedientes(){

            // Parámetros de búsqueda.
            var params = {}

            if (this.announcement !== null) { //si existe una fecha de convocatoria abierta
                params = {
                    params: {
                        'filter[announcement.id]': this.announcement
                    }
                };
            }

            axios.get('/controlescolar/solicitud/archives', params).then(response => {
                this.dataLength = response.data.length;
                this.$emit('archives-found', response.data);
            }).catch(error => {

            });


            return false;
        }
    }
}
</script>