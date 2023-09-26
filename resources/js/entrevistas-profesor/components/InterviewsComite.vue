<template>
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="interview-program-header">
                <tr>
                    <th> Fecha </th>
                    <th> Horario </th>
                    <th> Lugar </th>
                    <th> Nombre </th>
                    <th> Programa academico </th>
                    <th> Expediente </th>
                    <th> Rubricas </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="interview in interviews_ordered" :key="interview.id">
                    <td>
                        {{ interview.date }}
                    </td>
                    <td>
                        {{interview.start_time + " a " + interview.end_time}}
                    </td>
                    <td>
                        {{ interview.site }}
                    </td>
                    <td class="appliant">
                        {{interview.appliant}}
                    </td>
                    <td>
                        {{ interview.academicprogram }}
                    </td>
                    <td>
                        <!-- ! Exédientes -->
                        <a class="d-block text-capitalize text-decoration-none" v-if="(loggedUserIsCoordinador() || loggedUserIsAdmin() || loggedUserIsPNB())" :href="interview.archive_url" target="_blank"> Ver documentos</a>
                        <a class="d-block text-capitalize text-decoration-none" v-else-if="loggedUserIsSchoolControl()" href="#">Documentos 1</a>
                        <a class="d-block text-capitalize text-decoration-none" v-else href="#">Indefinido</a>
                    </td>
                    <td>
                        <!-- ! Rubricas -->
                        <div v-if="!loggedUserIsSchoolControl()">
                            <a class="d-block text-capitalize text-decoration-none" 
                                v-for="rubric in interview.rubrics"
                                :key="rubric.id" 
                                :href="rubric.location"
                                target="_blank"
                                >
                                {{ rubric.user.name }} {{ rubric.user.middlename }} {{ rubric.user.surname }}
                            </a>
                        </div>
                        <div v-if="loggedUserIsPNB()">
                            <a class="d-block text-capitalize text-decoration-none" 
                                v-for="rubric in interview.rubrics" 
                                :key="rubric.location"
                                href="#" 
                                >
                                {{ rubric.user.name }} {{ rubric.user.middlename }} {{ rubric.user.surname }}
                            </a>
                        </div>
                        <div v-if="!loggedUserIsPNB() || loggedUserIsCoordinador()">
                            <hr>
                            <a
                                class="d-block text-capitalize text-decoration-none" 
                                :href="interview.average_rubric"
                                target="_blank"
                                >
                                Rúbrica promedio
                            </a>
                        </div>
                        
                    </td>
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
    name: 'interviews-comite',

    mounted(){
    },

    methods:{

        filteredInterviews(rubrics)
        {
            console.log(rubrics);
            return rubrics;
        },

        loggedUserIsPNB() {
            let roles = user.roles.filter(role => {
                return role.name === 'profesor_nb';
            });

            return roles.length > 0;
        },

        loggedUserIsAdmin() {
            let roles = user.roles.filter(role => {
                return role.name === 'admin';
            });

            return roles.length > 0;
        },

        loggedUserIsSchoolControl() {
            var roles = user.roles.filter(role => {
                return role.name === 'control_escolar';
            });

            return roles.length > 0;
        },

        loggedUserIsCA() {
            var roles = user.roles.filter(role => {
                return role.name === 'comite_academico';
            });

            return roles.length > 0;
        },

        loggedUserIsCoordinador() {
            var roles = user.roles.filter(role => {
                return role.name === 'coordinador';
            });

            return roles.length > 0;
        }
    },

    props:{
        // las entrevistas
        interviews_ordered: {
            type: Array,
            default() {
                return {
                    interviews_ordered: []
                };
            }
        },
        user
    },

    computed: {
        id(){
            return 'interviews-' + this.academic_program; 
        },

        href(){
            return '#'+ this.id;
        },
    },
}
</script>