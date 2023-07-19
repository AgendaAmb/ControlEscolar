<template>
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="interview-program-header">
                <tr>
                    <th> Horario </th>
                    <th> Lugar </th>
                    <th> Nombre </th>
                    <th> Expediente </th>
                    <th v-if="!$root.loggedUserIsAdmin() && !$root.loggedUserIsSchoolControl() && !$root.loggedUserIsCoordinador() && !$root.loggedUserIsCA()">
                        Rúbrica de evaluación 
                    </th>
                    <th v-else> 
                        Rúbricas de evaluación 
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="interview in interviews" :key="interview.id">
                    <td>{{interview.start_time + " a " + interview.end_time}}</td>
                    <td> {{interview.site}} </td>
                    <td class="appliant">{{interview.appliant}}</td>

                    <!-- Expediente-->
                    <td v-if="$root.loggedUserIsSchoolControl()"><a target="_blank">Ver documentos ca</a>
                    </td>
                    <td v-else><a :href="interview.archive_url" target="_blank">Ver documentos</a>
                    </td>
                    <!-- \Expediente -->

                    <!-- Rubricas -->
                    <!-- Coordinador y administración -->
                    <td v-if="$root.loggedUserIsCoordinador() || $root.loggedUserIsAdmin()">
                        <a class="d-block text-capitalize text-decoration-none"
                            v-for="rubric in interview.rubrics" :key="rubric.location"
                            :href="rubric.location" target="_blank">
                            {{ rubric.user.name }} {{ rubric.user.middlename }} {{ rubric.user.surname
                            }}
                        </a>
                        <hr>
                        <a class="d-block text-capitalize text-decoration-none"
                            :href="interview.average_rubric">
                            Rúbrica promedio
                        </a>
                        <hr>
                    </td>

                    <!-- Profesores -->
                    <td v-if="$root.loggedUserIsPNB()">
                        <a class="d-block" v-for="rubric in interview.rubrics" :key="rubric.location"
                            :href="rubric.location" target="_blank">Formato de evaluación</a>
                    </td>

                    <!-- Control escolar -->
                    <td v-if="$root.loggedUserIsSchoolControl()">
                        <a class="d-block text-capitalize text-decoration-none"
                            v-for="rubric in interview.rubrics" :key="rubric.location">
                            {{ rubric.user.name }} {{ rubric.user.middlename }} {{ rubric.user.surname
                            }}
                        </a>
                        <hr>
                        <a class="d-block text-capitalize text-decoration-none"
                            :href="interview.average_rubric">
                            Rúbrica promedio
                        </a>
                        <hr>
                    </td>
                    <!-- \Rubricas -->
                </tr>
            </tbody>
        </table>
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
    },
}
</script>
