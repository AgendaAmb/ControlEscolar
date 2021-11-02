<template>
    <div class="row mt-2 justify-content-center">
        <h4 class="col-10 myriad-bold blue"> 1.- Datos básicos </h4>
        <div class="col-lg-10">
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
                    <p class="d-block  mb-0 myriad-bold convocatoria"> Convocatoria del {{announcement.from}} al {{announcement.to}} </p>
                    <p class="d-block  mb-0 myriad-light convocatoria"> {{announcement.academic_program}} </p>
                    <p class="d-block  mb-0 myriad-light convocatoria">  </p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.appliant-email, .appliant-curp, .direccion {
    font-size: 16px;
}

.appliant, .convocatoria {
    text-transform: capitalize;
    font-size: 16px;
}

.convocatoria {
    text-transform: none;
}

.convocatoria::first-letter {
    text-transform: capitalize;
}

</style>

<script>
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
    }
}
</script>
