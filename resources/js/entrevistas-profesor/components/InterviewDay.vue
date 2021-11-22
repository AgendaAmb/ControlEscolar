<template>
    <div class="col-10 text-center my-4">
        <a class="d-block interview-day text-decoration-none" data-toggle="collapse" :href="href" aria-expanded="false" :aria-controls="id">
            <p class="my-0 py-0"> {{interview_date}} </p>
        </a>
        <div class="collapse" :id="id">
            <div class="card">
                <div v-for="(interviews, interview_room) in interview_rooms" :key="interview_room" class="card-body">    
                    <h4 class="d-block room-details"> Sala {{interview_room}} </h4>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="interview-program-header">
                                <tr>
                                    <th> Horario </th>
                                    <th> Nombre </th>
                                    <th> Expediente </th>
                                    <th v-if="!$root.loggedUserIsAdmin() && !$root.loggedUserIsSchoolControl()"> Rúbrica de evaluación </th>
                                    <th v-else> Rúbricas de evaluación </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="interview in interviews" :key="interview.id"> 
                                    <td>{{interview.start_time + " a " + interview.end_time}}</td>
                                    <td class="appliant">{{interview.appliant}}</td>
                                    <td><a :href="interview.archive_url" target="_blank">Ver documentos</a></td>
                                    <td v-if="!$root.loggedUserIsAdmin() && !$root.loggedUserIsSchoolControl()">
                                        <a class="d-block" v-for="rubric in interview.rubrics" :key="rubric.location" :href="rubric.location"> Formato de evaluación</a>
                                    </td>
                                    <td v-else>
                                        <a class="d-block text-capitalize text-decoration-none" v-for="rubric in interview.rubrics" :key="rubric.location" :href="rubric.location">
                                            Profesor {{rubric.professor}}
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    name: 'interview-day',

    props:{

        // Fecha de las entrevistas.
        interview_date: {
            type: String,
            default: ''
        },

        // Salas de las entrevistas
        interview_rooms: {
            type: Object,
            default() {
                return {
                    interview_room: []
                };
            }
        }
    },

    computed: {
        id(){
            return 'interviews-' + this.interview_date.replaceAll(' ', '-'); 
        },

        href(){
            return '#'+ this.id;
        }
    }
}
</script>
