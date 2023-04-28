<template>
    <div v-if="requiredForAcademicProgram() === true" class="col-12">
        <div class="row d-flex align-items-center my-2" style="width: 100%">
            <div class="col-1 col-md-1 col-xs-1 text-center">
                <b-form-checkbox
                    size="lg"
                    style="transform: scale(1.25)"
                    v-model="StatusCheckBox"
                ></b-form-checkbox>
            </div>
            <!-- Nombre y notas -->
            <div class="form-group col-10 col-md-10 col-xs-9">
                <h5 class="mt-2 d-block">
                    <strong> {{ name }} </strong>
                    <template v-if="checkUpload() === true">
                        <i>Estado:</i> <i class="text-success">Subido</i>
                    </template>
                    <template v-else>
                        <i>Estado:</i> <i class="text-danger">Sin subir</i>
                    </template>
                </h5>

                <!-- Carta Compromiso y manifiesto -->
                <p v-if="isLetterCommitment() === true" class="my-2 d-block">
                    <strong>
                        Observaciones: Descargar carta
                        <!-- Maestrias PMPCA -->
                        <a
                            v-if="
                                alias_academic_program === 'maestria' ||
                                alias_academic_program === 'enrem'
                            "
                            href="https://ambiental.uaslp.mx/pmpca/docs/CartaCompromiso_MCA.docx"
                            target="_blank"
                            >dando clic aquí</a
                        >
                        <!-- Maestria imarec -->
                        <a
                            v-else-if="alias_academic_program === 'imarec'"
                            href="https://ambiental.uaslp.mx/imarec/docs/CartaCompromiso_IMaREC.docx"
                            target="_blank"
                            >dando clic aquí</a
                        >
                        <!-- Doctorado PMPCA  -->
                        <a
                            v-else
                            href="https://ambiental.uaslp.mx/pmpca/docs/CartaCompromiso_DCA.docx"
                            target="_blank"
                            >dando clic aquí</a
                        >
                    </strong>
                </p>

                <!-- Solo hay algo en notas por lo que se adjunta -->
                <p v-else-if="notes !== null" class="my-2 d-block">
                    <strong>
                        Observaciones: <span v-html="notes"></span
                    ></strong>
                </p>

                <p class="my-2 d-block">
                    <strong> Etiqueta: </strong> {{ label }}
                </p>
                <p class="my-2 d-block">
                    <strong> Ejemplo: </strong> {{ example }}
                </p>
            </div>

            <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
                <div
                    v-if="checkUpload() === true"
                    class="d-flex justify-content-center my-1"
                    style="max-height: 45px; width: 100%"
                >
                    <label>
                        <a
                            :href="
                                '/controlescolar/solicitud/expediente/' +
                                location
                            "
                            style="height: 45px; width: 100%"
                            target="_blank"
                        >
                            <button class="uaslp-btn">
                                <font-awesome-icon icon="fa-solid fa-eye" />
                                <span>Ver</span>
                            </button>
                        </a>
                    </label>
                </div>

                <!-- <div v-if="isIntentionLetter() === false" class="d-flex justify-content-center"
          style="max-height:45px !important; width: 100%">
          <label>
            <img :src="images_btn.seleccionar" alt="" style=" max-height: 45px !important;">
            <input type="file" class="form-control d-none" style="max-height: 45px !important; width: 100%"
              @change="cargaDocumento">
          </label>
        </div> -->
            </div>
        </div>

        <!-- <div class="d-flex align-items-center justify-content-start my-2" style="width:100%;">
      <div v-if="isEXANNI() === true" class="form-group col-12">
        <div class="d-flex align-items-center justify-content-start my-2">
          <div class="col-xl-4 col-md-6 col-xs-6">
            <label> Puntaje obtenido</label>
            <input v-model.number="ExanniScore" type="number" class="form-control" />
          </div>
          <div class="col-xl-4 col-md-6 col-xs-6">
            <b-button @click="actualizaPuntajeExanni" pill class="d-flex" :style="styleBtn">
              <p class="h4">Guardar Puntaje</p>
            </b-button>
          </div>
        </div>

      </div>
    </div> -->
    </div>
</template>

<script>
export default {
    name: "documento-requerido",

    props: {
        user_id: {
            type: Number,
            default: -1,
        },

        images_btn: {
            type: Object,
            default: {},
        },

        viewer_id: {
            type: Number,
            default: -1,
        },

        id: {
            type: Number,
        },

        name: {
            type: String,
        },

        notes: {
            type: String,
        },

        label: {
            type: String,
        },

        example: {
            type: String,
        },

        archivo: {
            type: File,
        },

        location: {
            type: String,
        },

        alias_academic_program: {
            type: String,
            default: null,
        },

        index_carta: {
            type: Number,
            default: 0,
        },

        exanni_score: {
            type: Number,
            default: -1,
        },

        status_checkBox: {
            type: Boolean,
            default: false,
        },
    },

    data() {
        return {
            errores: {},
            datosValidos: {},
            textStateUpload: "",
            academiLetterCommitment: "",
            images: null,
        };
    },

    computed: {
        styleBtn() {
            return {
                backgroundColor: "rgba(0,96,175,255)",
                color: "rgb(244, 244, 244)",
                border: "none",
                alignItems: "center",
                height: "100%",
            };
        },

        StatusCheckBox: {
            get() {
                return this.status_checkBox;
            },
            set(newValue) {
                this.$emit("update:status_checkBox", newValue);
            },
        },
        Archivo: {
            get() {
                return this.archivo;
            },
            set(newValue) {
                this.$emit("update:archivo", newValue);
            },
        },
        Location: {
            get() {
                return this.location;
            },
            set(newValue) {
                this.$emit("update:location", newValue);
            },
        },
        Errores: {
            get() {
                return this.errores;
            },
            set(newValue) {
                this.errores = newValue;
                this.$emit("update:errores", newValue);
            },
        },

        ExanniScore: {
            get() {
                return this.exanni_score;
            },
            set(newValue) {
                this.$emit("update:exanni_score", newValue);
            },
        },
    },

    methods: {
        bkgCargarArchivo(type) {
            // console.log(this.language);
            axios
                .get("/controlescolar/solicitud/getButtonImage", {
                    params: {
                        type: type,
                    },
                })
                .then((response) => {
                    // console.log('hola' + response.data);
                    return response.data;
                })
                .catch((error) => {
                    // console.log(error);
                    return null;
                });
        },

        isEXANNI() {
            if (
                this.name ===
                "13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros, comprobante de pago del examen si no tienen resultados o no lo han presentado)"
            ) {
                return true;
            }
            //return a value
            return false;
        },

        requiredForAcademicProgram() {
            let res = true;

            // Documents for Maestria en ciencias ambientales and imarec
            if (
                this.alias_academic_program === "maestria" ||
                this.alias_academic_program === "imarec"
            ) {
                switch (this.name) {
                    case "5.- Título de preparatoria":
                        res = false;
                        break;
                    case "5B.- Título de maestría o acta de examen":
                        res = false;
                        break;
                    case "6B.- Certificado de materias de la maestría":
                        res = false;
                        break;
                    case "7B.- Constancia de promedio de la maestría.":
                        res = false;
                        break;
                    case "8B.- Cédula de la maestría":
                        res = false;
                        break;
                    case "5C.- Carta de pasantía":
                        res = false;
                        break;
                    case "9.- Application":
                        res = false;
                        break;
                    case "9A.- Application DAAD":
                        res = false;
                        break;
                    case "14.- Propuesta de proyecto avalada por el profesor postulante":
                        res = false;
                        break;
                    case "16.- Proof Experience Document":
                        res = false;
                        break;
                    case "17.- ConfirmationEMP":
                        res = false;
                        break;
                    case "18.- FormatoEuropass":
                        res = false;
                        break;
                }
            }
            //Documents for doctorado
            else if (this.alias_academic_program === "doctorado") {
                switch (this.name) {
                    case "5.- Título de preparatoria":
                        res = false;
                        break;
                    case "5A.- Título de licenciatura o acta de examen":
                        res = false;
                        break;
                    case "6A.- Certificado de materias de la licenciatura":
                        res = false;
                        break;

                    case "7A.- Constancia de promedio de la licenciatura.":
                        res = false;
                        break;

                    case "8A.- Cédula de la licenciatura":
                        res = false;
                        break;
                    case "5C.- Carta de pasantía":
                        res = false;
                        break;
                    case "9.- Application":
                        res = false;
                        break;
                    case "9A.- Application DAAD":
                        res = false;
                        break;

                    case "16.- Proof Experience Document":
                        res = false;
                        break;
                    case "17.- ConfirmationEMP":
                        res = false;
                        break;
                    case "18.- FormatoEuropass":
                        res = false;
                        break;
                }
            }

            //Documents for doctorado
            else if (this.alias_academic_program === "enrem") {
                switch (this.name) {
                    // case "14.- Propuesta de proyecto avalada por el profesor postulante":
                    //   res = false;
                    //   break;
                    case "5B.- Título de maestría o acta de examen":
                        res = false;
                        break;
                    case "6B.- Certificado de materias de la maestría":
                        res = false;
                        break;
                    case "7B.- Constancia de promedio de la maestría.":
                        res = false;
                        break;
                    case "8B.- Cédula de la maestría":
                        res = false;
                        break;
                    case "5C.- Carta de pasantía":
                        res = false;
                        break;
                    case "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)":
                        res = false;
                        break;
                    case "13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)":
                        res = false;
                        break;
                }
            }

            // return the answer accordin to academic program and name of the required document
            // console.log('res: ' + res + ' name: ' + this.name);
            return res;
        },

        isLetterCommitment() {
            if (
                this.name ===
                "11.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)"
            ) {
                return true;
            }
            //return a value
            return false;
        },

        isIntentionLetter() {
            //If return 0 is intention letter of professor

            if (
                this.name ===
                "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)"
            ) {
                // console.log(this.name);
                return true;
            }
            return false;
        },

        actualizaPuntajeExanni() {
            this.$emit("nuevoPuntajeExanni", this.exanni_score);
        },

        checkUpload() {
            if (this.location !== null && this.location !== undefined) {
                return true;
            } else {
                return false;
            }
        },
        cargaDocumento(e) {
            var name = e.target.files[0].name;
            this.Errores = {};

            if (!name.endsWith(".pdf")) {
                this.Errores = {
                    file: "El archivo debe de contener formato pdf.",
                };
                return false;
            }

            this.$emit("enviaDocumento", this, e.target.files[0]);
        },
    },
};
</script>
