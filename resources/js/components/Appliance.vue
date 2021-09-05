<template>
    <div class="mt-5 row justify-content-left">
        <div class="form-group col-md-12"> 
            <h4 class="mt-4"> Datos Personales </h4>
        </div>

        <slot></slot>

        <hr class="col-md-12" :style="color">
        <h4 class="col-md-9 my-4"> Datos Solicitud </h4>

        <slot name="datos_solicitud"></slot>
        <hr class="col-md-12" :style="color">

        <div class="col-12">
            <div class="row mt-5 mb-0">
                <h4 class="col-md-9"><strong> Información personal  </strong></h4>
            </div>

            <slot name="personal_documents"></slot>
        </div>
        <hr class="col-md-10">

        <div class="col-12">
            <div class="row mt-5 mb-0">
                <h4 class="col-md-9"><strong> Información académica  </strong></h4>
            </div>

            <slot name="academic_documents"></slot>
        </div>
        <hr class="col-md-10">

        <div class="col-12">
            <div class="row mt-5 mb-0">
                <h4 class="col-md-9"><strong> Formatos de ingreso </strong></h4>
            </div>
            
            <slot name="entrance_documents"></slot>
        </div>
        <hr class="col-md-10">

        <div class="col-12">
            <div class="row mt-5 mb-0">
                <h4 class="col-md-9"><strong> Documentos curriculares </strong></h4>
            </div>
            
            <slot name="curricular_documents"></slot>
        </div>
        <hr class="col-md-10">
    </div>
</template>

<script>
    export default {
        name: 'student-appliance',
        props: [ 'color' ],
        data: function () {
            return {
                countries: [],
                english_exams: []
            }
        },
        computed: {
            Countries: {
                get: function() {
                    return this.countries;
                },
                set: function(val){
                    this.countries = val;
                }
            },
            EnglishExams: {
                get: function() {
                    return this.english_exams;
                },
                set: function(val){
                    this.english_exams = val;
                }
            }
        },
        mounted() {

            this.$nextTick(function () {

                axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries/universities')
                .then(response => {
                    
                    this.Countries = response.data;
                    
                });

                axios.get('https://ambiental.uaslp.mx/apiagenda/api/englishExams')
                .then(response => {
                    
                    this.EnglishExams = response.data;
                });
            });

            console.log('Component mounted.');
        }
    }
</script>