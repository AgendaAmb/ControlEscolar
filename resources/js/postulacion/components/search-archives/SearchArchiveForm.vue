<template>
    <form @submit.prevent="buscaExpedientes" class="d-block w-50">
        <div class="form-group">
            <label>Nombre del postulante</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label> Programa académico </label>
            <select v-model="academic_program" class="form-control">
                <option :value="null" selected>Escoge una opción</option>
                <option v-for="academicProgram in academic_programs" :key="academicProgram.id" :value="academicProgram.id">{{ academic_program.name}}</option>
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
            name: '',
            academic_program: null,
        }
    },

    methods: {
        buscaExpedientes(){

            axios.get('/controlescolar/solicitud/archives', {

            }).then(response => {

            }).catch(error => {

            });


            return false;
        }
    }
}
</script>