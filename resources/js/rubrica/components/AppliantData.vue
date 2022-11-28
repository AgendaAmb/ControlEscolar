<template>
    <div class="col-lg-11">
        <div class="row appliant">
            <div class="col-lg-7 mb-3">
                <p class="d-block mb-0"> <b> Nombre: </b>{{ appliant.name }}</p>
                <p class="d-block mb-0 personal_data"> <b>Correo electrónico: </b>{{ appliant.email }}</p>
                <p class="d-block mb-0 personal_data"> <b> País de nacimiento: </b>{{ appliant.birth_country }}</p>
                <p class="d-block mb-0 personal_data"> <b> Estado de nacimiento: </b> {{ appliant.birth_state }}</p>
                <p class="d-block mb-0 personal_data"> <b> País de resiencia: </b>{{ appliant.residence_country }}</p>
                <!-- <p class="d-block mb-0 myriad-light appliant-residence_state">Ciudad de residencia: {{ appliant.residence_state }}</p> -->
                <p class="d-block mb-0 personal_data"> <b> CURP: </b> {{ appliant.curp }} </p>
                <p class="d-block mb-0 personal_data"> <b> Estado civil: </b> {{ appliant.marital_state }} </p>
                <!-- <p class="d-block mb-0 myriad-light appliant-address">Dirección: {{ appliant.address }}</p> -->
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end">
                <p class="d-block mb-0 myriad-bold announcement-date"> {{announcement_date}}</p>
                <p class="d-block mb-0 myriad-light academic-program"> {{announcement.academic_program}} </p>
            </div>
            <hr class="col-12 hr">
        </div>
    </div>
</template>

<style>
    .personal_data{
        text-transform: none;
    }
</style>

<script>
const moment = require('moment');
export default {
    name: 'appliant-data',
    
    props: {
        // Postulante de la entrevista.
        appliant: {
            type: Object,
            default(){
                return {
                    name: '',
                    email:'',
                    curp: '',
                    birth_country: '',
                    birth_state: '', 
                    residence_country: '',
                    residence_state: '', 
                    marital_state: '',
                    address: '',
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
    },

    computed: {
        announcement_date(){
            if (this.announcement.to === '')
                return '';

            var to = moment(this.announcement.to).locale('es-MX').format("MMMM YYYY");
            to = to.charAt(0).toUpperCase() + to.slice(1);

            return 'Convocatoria ' + to;
        }
    }
}
</script>