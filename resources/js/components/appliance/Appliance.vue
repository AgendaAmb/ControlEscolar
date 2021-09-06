<template>
    <div class="mt-5 row justify-content-left">
        <div class="form-group col-md-12"> 
            <h4 class="mt-4"> Datos Personales </h4>
        </div>

        <appliant-data>
            <template v-slot:identity>
                <form-input id="curp" input_type="text" clase="col-12 mt-3" :readonly="true"> CURP: </form-input>
                <form-input id="name" input_type="text" clase="col-12 mt-3" :readonly="true"> Nombre(s): </form-input>
                <form-input id="middlename" input_type="text" clase="col-md-6 mt-3" :readonly="true"> Primer Apellido: </form-input>
                <form-input id="surname" input_type="text" clase="col-md-6 mt-3" :readonly="true"> Segundo Apellido: </form-input>
            </template>
            <template v-slot:personal_data>
                <form-input id="fechaNacimiento" input_type="date" clase="form-group col-xl-4" :readonly="true"> Fecha de Nacimiento: </form-input>
                <form-input id="genero" clase="form-group col-lg-6 col-xl-4" :readonly="true"> Género: </form-input>
                <form-input id="paisResidencia" clase="form-group col-lg-6 col-xl-4" :readonly="true"> País de residencia: </form-input>
                <form-input id="paisNacimiento" clase="form-group col-lg-6 col-xl-4" :readonly="true"> País de nacimiento: </form-input>
                <form-input id="edoNacimiento" clase="form-group col-lg-6 col-xl-4" :readonly="true"> Estado de nacimiento: </form-input>
                <form-input id="telContacto" input_type="tel" clase="form-group col-lg-4" :readonly="true"> Teléfono de contacto: </form-input>
                <form-input id="email" input_type="email" clase="form-group col-lg-4 col-xl-6" :readonly="true"> Correo electrónico: </form-input>
                <form-input id="emailAlt" input_type="email" clase="form-group col-lg-4 col-xl-6" :readonly="true"> Correo de contacto alterno: </form-input>
            </template>
        </appliant-data>

        <hr class="col-md-12" :style="color">
        <h4 class="col-md-9 my-4"> Datos Solicitud </h4>

        <slot name="datos_solicitud"></slot>
        <hr class="col-md-12" :style="color">

        <div class="col-12">
            <div class="row mt-5 mb-0">
                <h4 class="col-md-9"><strong> Información personal  </strong></h4>
            </div>

            <form-input id="tituloObtenido" clase="form-group col-12"> 
                Grado de estudios (como se muestra en el documento probatorio): 
            </form-input> 

            <form-select id="PaisEstudios" clase="form-group col-md-6" v-bind:options="Countries" 
                        v-on:update:selected_index="cambiaPaisEstudios"> 
                País donde realizaste tus estudios 
            </form-select>

            <form-select id="UniversidadProcedencia" clase="form-group col-md-6" v-bind:options="CountryUniversities" 
                        v-on:update:selected_index="cambiaUniversidadProcedencia"> 
                Universidad de procedencia
            </form-select>

            
            <form-input id="FechaAprobacion" clase="form-group col-md-6" input_type="date"> 
                Fecha de aprobación de tu examen profesional: 
            </form-input>
            
            <div class="form-group col-12 my-0"></div>

            <form-input id="calificacionMinima" clase="form-group col-md-6"> 
                Calificación mínima aprobatoria: 
            </form-input>

            <form-input id="calificacionMaxima" clase="form-group col-md-6"> 
                Calificación máxima aprobatoria: 
            </form-input>

            <form-input id="promedio" clase="form-group col-md-6"> 
                Promedio obtenido: 
            </form-input>

            <form-input id="PuntajeEXANI" clase="form-group col-md-6"> 
                Puntaje EXANI III: 
            </form-input>
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