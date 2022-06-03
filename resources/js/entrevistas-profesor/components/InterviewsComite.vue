<template>
    <div class="col-10 text-center my-4">
         <h4 class="d-block interview-day"> {{academic_program}} </h4>
         <div class="table-responsive">
            <table class="table text-center">
                <thead class="interview-program-header">
                    <tr>
                        <th> Horario </th>
                        <th> Nombre </th>
                        <th> Expediente </th>
                        <th> Evaluación promedio </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="interview in interviews_ordered" :key="interview.id"> 
                        <td>{{interview.start_time + " a " + interview.end_time}}</td>
                        <td class="appliant">{{interview.appliant}}</td>
                        <td><a :href="interview.archive_url" target="_blank">Ver documentos</a></td>
                        <!-- Rubricas -->
                        <td >
                            <a class="d-block text-decoration-none" href="#">
                                Rubrica promedio (TO DO)
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
.interview-program-header {
    font-family: 'Myriad Pro Bold';
    background-color: #fecc56;
    color: white;
}

.appliant {
    text-transform: capitalize;
}
</style>

<script>
export default {
    name: 'interviews-comite',

    props:{

        // Programa academico 
        academic_program: {
            type: String,
            default: ''
        },

        // las entrevistas
        interviews_ordered: {
            type: Object,
            default() {
                return {
                    interviews_ordered: {}
                };
            }
        }
    },

    computed: {
        id(){
            return 'interviews-' + this.academic_program; 
        },

        href(){
            return '#'+ this.id;
        },

        key(){
            return 'key-' + this.academic_program; 
        },
    }
}
</script>
