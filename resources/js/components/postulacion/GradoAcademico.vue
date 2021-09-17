<template>
    <div class="row my-3">
        <h4 class="form-group col-12 my-5"> {{ id }}.- {{ Universidad }} </h4>
        <div class="form-group col-sm-6 col-md-4">
            <label> Nivel de escolaridad: </label>

            <select v-model="Escolaridad" class="form-control">
                <option value="" selected> Escoge una opción </option>   
                <option v-for="escolaridad in escolaridades" :key="escolaridad" :value="escolaridad"> {{escolaridad}} </option> 
            </select>
        </div>

        <div class="form-group col-sm-6 col-md-8">
            <label> Titulo: </label>
            <input type="text" v-model="Titulo" class="form-control">
        </div>

        <div class="form-group col-md-4"> 
            <div class="row">
                <div class="form-group col-12">
                    <label> Estatus: </label>
                    <select v-model="Estatus" class="form-control">
                        <option value="" selected> Escoge una opción </option>   
                        <option v-for="estatusEstudio in estatusEstudios" :key="estatusEstudio" :value="estatusEstudio"> {{estatusEstudio}} </option> 
                    </select>
                </div>
                <div class="form-group col-lg-6" v-if="Estatus === 'Grado obtenido'"> 
                    <label> Cédula profesional: </label>
                    <input type="text" v-model="Cedula" class="form-control">
                </div> 
                <div class="form-group col-lg-6" v-if="Estatus === 'Grado obtenido'"> 
                    <label> Fecha de titulación: </label>
                    <input type="date" v-model="FechaObtencion" class="form-control">
                </div> 
                <div class="form-group col-12" v-else-if="Estatus === 'Pasante'"> 
                    <label> Fecha de obtención de pasantía: </label>
                    <input type="date" v-model="FechaObtencion" class="form-control">
                </div> 
                <div class="form-group col-12" v-else-if="Estatus === 'Título o grado en proceso'"> 
                    <label> Fecha de presentación de examen: </label>
                    <input type="date" v-model="FechaObtencion" class="form-control">
                </div> 
            </div>
        </div> 

        <div class="form-group col-md-8"> 
            <div class="row" v-if="Estatus === 'Grado obtenido'">
                <div class="form-group col-lg-4"> 
                    <label> País donde realizaste tus estudios: </label>

                    <select v-model="PaisEstudios" class="form-control" @change="escogePais">
                        <option value="" selected> Escoge una opción </option>   
                        <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name"> {{PaisEstudio.name}} </option> 
                    </select>
                </div> 

                <div class="form-group col-md-6 col-lg-4"> 
                    <label> Universidad de estudios: </label>

                    <select v-model="Universidad" class="form-control">
                        <option value="" selected> Escoge una opción </option>  
                        <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name"> {{Universidad.name}} </option>  
                    </select>
                </div>

                <div class="form-group col-6 col-sm-4">
                    <label> Modo de titulación: </label>
                    <select v-model="Estatus" class="form-control">
                        <option value="" selected> Escoge una opción </option>   
                    </select>
                </div>

                <div class="form-group col-6 col-sm-4"> 
                    <label> Promedio obtenido: </label>
                    <input type="text" v-model="Promedio" class="form-control">
                </div> 

                <div v-if="PaisEstudios !== 'México'" class="form-group col-6 col-sm-4"> 
                    <label> Calificación mínima: </label>
                    <input type="text" v-model="CalMin" class="form-control">
                </div> 

                <div v-if="PaisEstudios !== 'México'" class="form-group col-6 col-sm-4"> 
                    <label> Calificación máxima: </label>
                    <input type="text" v-model="CalMax" class="form-control">
                </div> 
            </div>

            <div class="row" v-else>
                <div class="form-group col-sm-6"> 
                    <label> País donde realizaste tus estudios: </label>

                    <select v-model="PaisEstudios" class="form-control" @change="escogePais">
                        <option value="" selected> Escoge una opción </option>   
                        <option v-for="PaisEstudio in paises" :key="PaisEstudio.id" :value="PaisEstudio.name"> {{PaisEstudio.name}} </option> 
                    </select>
                </div> 

                <div class="form-group col-6"> 
                    <label> Universidad de estudios: </label>

                    <select v-model="Universidad" class="form-control">
                        <option value="" selected> Escoge una opción </option>  
                        <option v-for="Universidad in Universidades" :key="Universidad.id" :value="Universidad.name"> {{Universidad.name}} </option>  
                    </select>
                </div>

                <div class="form-group col-6 col-sm-4"> 
                    <label> Promedio obtenido: </label>
                    <input type="text" v-model="Promedio" class="form-control">
                </div> 

                <div v-if="PaisEstudios !== 'México'" class="form-group col-6 col-sm-4"> 
                    <label> Calificación mínima: </label>
                    <input type="text" v-model="CalMin" class="form-control">
                </div> 

                <div v-if="PaisEstudios !== 'México'" class="form-group col-6 col-sm-4"> 
                    <label> Calificación máxima: </label>
                    <input type="text" v-model="CalMax" class="form-control">
                </div> 
            </div>
        </div> 

        <div class="col-12"></div> 
        <div class="form-group col-xl-4 my-auto"> 
            <div class="row my-2">
                <div class="form-group col-lg-12"> 
                    <h5 class="mt-4 d-block"><strong> 6.- Constancia de promedio </strong></h5>
                    <p class="mt-3 mb-1 d-block"><strong> Etiqueta: </strong> 06_Promedio_Año_iniciales(Apellidos,Nombres)  </p>
                    <p class="my-0 d-block"><strong> Ejemplo: </strong> 06_Promedio_2021_CJG  </p>
                </div>
                <div class="form-group col-lg-12 my-auto"> 
                    <label class="cargarArchivo my-3"> 
                        <input type="file" class="form-control d-none">
                    </label>
                </div>
            </div> 
        </div>
        <div class="form-group col-xl-4 my-auto"> 
            <div class="row my-2">
                <div class="form-group col-lg-12"> 
                    <h5 class="mt-4 d-block"><strong> 7.- Certificado de promedio </strong></h5>
                    <p class="mt-3 mb-1 d-block"><strong> Etiqueta: </strong>  07_Certf_Año_iniciales(Apellidos,Nombres)   </p>
                    <p class="my-0 d-block"><strong> Ejemplo: </strong>  07_Certf_2021_CJG   </p>
                </div>
                <div class="form-group col-lg-12 my-auto"> 
                    <label class="cargarArchivo my-3"> 
                        <input type="file" class="form-control d-none">
                    </label>
                </div>
            </div> 
        </div>

        <div class="form-group col-xl-4 my-auto"> 
            <div class="row my-2">
                <div class="form-group col-lg-12"> 
                    <h5 class="mt-4 d-block"><strong> 8.- Cédula profesional escaneada </strong></h5>
                    <p class="mt-3 mb-1 d-block"><strong> Etiqueta: </strong>08_Cédula_Año_iniciales(Apellidos,Nombres) </p>
                    <p class="my-0 d-block"><strong> Ejemplo: </strong>08_Cédula_2021_CJG  </p>
                </div>
                <div class="form-group col-lg-12 my-auto"> 
                    <a v-if="doccedula !== null && doccedula.url !== null" class="d-inline-block verArchivo my-3" :href="doccedula.url" target="_blank"></a>
                    
                    <label class="cargarArchivo my-3"> 
                        <input type="file" class="form-control d-none" @change="cargaCedulaProfesional">
                    </label>
                </div>
            </div> 
        </div>
    </div>
</template>

<style scoped>
.cargarArchivo {
    background: url(/controlescolar/storage/archive-buttons/seleccionar.png);
    background-size: 90px 40px;
    background-repeat: no-repeat;
    width: 90px;
    height: 40px;
}

.verArchivo {
    background: url(/controlescolar/storage/archive-buttons/ver.png);
    background-size: 90px 40px;
    background-repeat: no-repeat;
    width: 90px;
    height: 40px;
}
</style>

<script>
export default {
    name: 'grado-academico',
    
    props: {
        paises: {
            type: Array,
            required: true
        },
        id: {
            type: Number,
        }
    },

    data: function(){
        return {
            escolaridad: null,
            titulo: '',
            estatus: '',
            cedula: '',
            fechaobtencion: '',
            paisestudios: '',
            universidad: 'Coloca tu información académica',
            modotitulacion: '',
            promedio: '',
            calmin: '',
            calmax: '',
            doccedula: null,
            docconstancia: null,
            docpromedio: null,
            universidades: [],

            escolaridades: [
                'Licenciatura',
                'Maestría',
                'Doctorado'
            ],
            estatusEstudios: [
                'Pasante',
                'Grado obtenido',
                'Título o grado en proceso'
            ],
        };
    },
    
    computed: {
        Escolaridad: {
            get: function() {
                return this.escolaridad;
            },
            set: function(value) {
                this.escolaridad = value;
                this.$emit('update:escolaridad', value);
            }
        },
        Titulo: {
            get: function() {
                return this.titulo;
            },
            set: function(value) {
                this.titulo = value;
                this.$emit('update:titulo', value);
            }
        },
        Estatus: {
            get: function() {
                return this.estatus;
            },
            set: function(value) {
                this.estatus = value;
                this.$emit('update:estatus', value);
            }
        },
        Cedula: {
            get: function() {
                return this.cedula;
            },
            set: function(value) {
                this.cedula = value;
                this.$emit('update:cedula', value);
            }
        },
        ModoTitulacion: {
            get: function() {
                return this.modoTitulacion;
            },
            set: function(value) {
                this.modoTitulacion = value;
                this.$emit('update:modoTitulacion', value);
            }
        },
        
        FechaObtencion: {
            get: function() {
                return this.fechaobtencion;
            },
            set: function(value) {
                this.fechaobtencion = value;
                this.$emit('update:fechaobtencion', this.value);
            }
        },
        
        PaisEstudios: {
            get: function() {
                return this.paisestudios;
            },
            set: function(value) {
                this.paisestudios = value;
                this.$emit('update:paisestudios', value);
            }
        },
        Universidad: {
            get: function() {
                return this.universidad;
            },
            set: function(value) {
                this.universidad = value;
                this.$emit('update:universidad', value);
            }
        },

        ModoTitulacion: {
            get: function() {
                return this.modotitulacion;
            },
            set: function(value) {
                this.modotitulacion = value;
                this.$emit('update:modotitulacion', value);
            }
        },
        
        Promedio: {
            get: function() {
                return this.promedio;
            },
            set: function(value) {
                this.promedio = value;
                this.$emit('update:promedio', value);
            }
        },

        CalMin: {
            get: function() {
                return this.calmin;
            },
            set: function(value) {
                this.calmin = value;
                this.$emit('update:calmin', value);
            }
        },

        CalMax: {
            get: function() {
                return this.calmax;
            },
            set: function(value) {
                this.calmax = value;
                this.$emit('update:calmax', value);
            }
        },

        Universidades: {
            get: function() {
                return this.universidades;
            },
            set: function(value) {
                this.universidades = value;
            }
        },

        DocCedula: {
            get: function() {
                return this.doccedula;
            },
            set: function(value) {
                this.doccedula = value;
                this.$emit('update:doccedula', value);
            }
        },
        
    },
    methods: {
        escogePais(evento) {
            this.Universidades = this.paises[evento.target.selectedIndex - 1].universities;
        },

        cargaCedulaProfesional(e){
            console.log('typescript');

            this.$nextTick(function() {
                let reader = new FileReader();

                reader.onload = (event) => {
                    this.DocCedula = {
                        documento: e.target.files[0],
                        url: event.target.result
                    };
                };

                reader.readAsDataURL(e.target.files[0]);
            });
        }
    }
}
</script>