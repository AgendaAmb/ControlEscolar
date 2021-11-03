<template>
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

            <hr class="col-12 hr">
        </div>
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
    name: 'appliant-data',
    
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