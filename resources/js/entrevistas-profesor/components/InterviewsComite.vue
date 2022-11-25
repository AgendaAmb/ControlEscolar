<template>
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="interview-program-header">
                <tr>
                    <th> Horario </th>
                    <td> Lugar</td>
                    <th> Nombre </th>
                    <th> Expediente </th>
                    <th> Rubricas </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="interview in interviews_ordered" :key="interview.id">
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
                        <!-- ! Exédientes -->
                        <a class="d-block text-capitalize text-decoration-none" v-if="!loggedUserIsSchoolControl()" :href="interview.archive_url" target="_blank">Ver documentos</a>
                        <a class="d-block text-capitalize text-decoration-none" v-if="loggedUserIsSchoolControl()" href="#" >Documentos</a>
                    </td>
                    <td>
                        <!-- ! Rubricas -->
                        <div v-if="!loggedUserIsSchoolControl()">
                            <a class="d-block text-capitalize text-decoration-none" 
                                v-for="rubric in interview.rubrics"
                                :key="rubric.location" 
                                :href="rubric.location"
                                target="_blank"
                                >
                                {{ rubric.user.name }} {{ rubric.user.middlename }} {{ rubric.user.surname }}
                            </a>
                        </div>
                        <div v-else>
                            <a class="d-block text-capitalize text-decoration-none" 
                                v-for="rubric in interview.rubrics" 
                                :key="rubric.location"
                                href="#" 
                                >
                                {{ rubric.user.name }} {{ rubric.user.middlename }} {{ rubric.user.surname }}
                            </a>
                        </div>
                        <div v-if="!loggedUserIsPNB()">
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
        loggedUserIsPNB() {
            var roles = user.roles.filter(role => {
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
