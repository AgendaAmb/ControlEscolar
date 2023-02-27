<template>
    <div class="row mt-2 justify-content-center">
        <h4 class="col-11 myriad-bold blue rubric-title"> 1.- Datos básicos </h4>
        <div class="col-lg-11">
            <div class="row">
                <div class="col-lg-4">
                    <p class="d-block  mb-0 myriad-bold appliant">{{ appliant.name }}</p>
                    <p class="d-block myriad-light appliant-email">{{ appliant.email }}</p>
                    <p class="d-block myriad-light appliant-curp">{{ appliant.curp }}</p>
                </div>
                <div class="col-lg-4">
                    <p class="d-block mb-0 myriad-light direccion">Manuel Nava #201, ultimo piso</p>
                    <p class="d-block mb-0 myriad-light direccion">Col. Universitaria, Cp. 78210</p>
                    <p class="d-block mb-0 myriad-light direccion">San Luis Potosí, S.L.P. México</p>
                </div>
                <div class="col-lg-4">
                    <p class="d-block  mb-0 myriad-bold convocatoria"> {{announcement_date}}</p>
                    <p class="d-block  mb-0 myriad-light convocatoria"> {{announcement.academic_program}} </p>
                    <p class="d-block  mb-0 myriad-light convocatoria">  </p>
                </div>
            </div>
        </div>
        <hr class="col-11 hr">
        <div class="col-lg-11 table-responsive px-0">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="w-25"></th>
                        <th>
                            <p class="d-block mb-0"> Excelente </p>
                            <p class="d-block mb-0"> 75 - 100% </p>
                        </th>
                        <th>
                            <p class="d-block mb-0"> Muy Bien </p>
                            <p class="d-block mb-0"> 51 - 75% </p>
                        </th>
                        <th>
                            <p class="d-block mb-0"> Bien </p>
                            <p class="d-block mb-0"> 26 - 50%</p>
                        </th>
                        <th>
                            <p class="d-block mb-0"> Deficiente </p>
                            <p class="d-block mb-0"> 25 - 0%</p>
                        </th>
                        <th> Evaluación </th>
                        <th> Observaciones </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="concept in basic_concepts" :key="concept.id">
                        <td class="text-left w-25">{{concept.description}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="col-11 hr">
    </div>
</template>

<style scoped>
.appliant-email, .appliant-curp, .direccion, .appliant, .convocatoria {
    font-size: 19px;
}

.appliant, .convocatoria {
    text-transform: capitalize;
}

.convocatoria {
    text-transform: none;
}

.convocatoria::first-letter {
    text-transform: capitalize;
}

</style>

<script>
const moment = require('moment');
export default {
    name: 'basic-data',
    
    props: {
        // Postulante de la entrevista.
        appliant: {
            type: Object,
            default(){
                return {
                    name: '',
                    email:'',
                    curp: ''
                }
            }
        },

        // Postulante de la entrevista.
        announcement: {
            type: Object,
            default(){
                return {
                    academic_program: '',
                    from:'',
                    to: ''
                }
            }
        },

        // Conceptos básicos.
        basic_concepts: {
            type: Array,
            default() {
                return [];
            }
        }
    },

    computed: {
        announcement_date(){
            if (this.announcement.to === '')
                return '';

            var to = moment(this.announcement.to).locale('es-MX').format("MMMM YYYY");
            to = to.charAt(0).toUpperCase() + to.slice(1);

            return 'Convocatoria de ' + to;
        }
    }
}
</script>
