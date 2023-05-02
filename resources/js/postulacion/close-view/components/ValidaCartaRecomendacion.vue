<template>
    <div class="col-12">
        <div class="row align-items-center">
            <!-- Nombre y notas -->
            <div class="col-12">
                <b-form-group
                    label-size="xl"
                    :label="'Correo ' + index"
                    label-for="input-email"
                >
                    <b-form-input
                        id="input-email"
                        v-model="myEmail"
                        :readonly="true"
                    ></b-form-input>
                </b-form-group>
            </div>
        </div>

        <div class="row mt-0 mb-1">
            <div class="col-12">
                <!-- Se corrobora el estado del archivo (cambiar a numerico )-->
                <template v-if="checkUpload() === 1">
                    <i>Estado:</i> <i class="text-success">Completado</i>
                </template>
                <template v-else-if="checkUpload() === 0">
                    <i>Estado:</i>
                    <i class="text-warning">Esperando respuesta</i>
                </template>
                <template v-else>
                    <i>Estado:</i>
                    <i class="text-danger">No se ha enviado correo</i>
                </template>
            </div>

            <div class="col-12">
                <div
                    v-if="checkUpload() === 1 && userCanSeeAnswered() === true"
                    class="d-flex justify-content-start my-1"
                    style="max-height: 45px; width: 100%"
                >
                    <label>
                        <a
                            :href="
                                '/controlescolar/solicitud/seeAnsweredRecommendationLetter/' +
                                archive_id +
                                '/' +
                                recommendation_letter.id
                            "
                            target="_blank"
                            style="height: 45px; width: 100%"
                        >
                            <button class="uaslp-btn">
                                <font-awesome-icon
                                    icon="fa-solid fa-download"
                                />
                                <span>Descargar</span>
                            </button>
                        </a>
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert2";
window.Swal = swal;

export default {
    name: "valida-carta-recomendacion",

    data() {
        return {
            emailToSent: String,
            isReadonly: {
                type: Boolean,
                default: false,
            },
            values: {
                1: true,
                0: false,
                2: false,
            },

            userIsStudent: {
                type: Boolean,
                default: false,
            },
        };
    },

    props: {
        images_btn: {
            type: Object,
            default: {},
        },

        email: {
            type: String,
            default: "example@example.com",
        },

        recommendation_letter: {
            type: Object,
            default: null,
        },

        archive_id: {
            type: Number,
            default: null,
        },

        appliant: {
            type: Object,
            default: null,
        },

        index: Number,

        academic_program: Object,
        errors: Array,
        status_checkBox: {
            type: Boolean,
            default: false,
        },
    },

    computed: {
        StatusCheckBox: {
            get() {
                return this.status_checkBox;
            },
            set(newValue) {
                this.$emit("update:status_checkBox", newValue);
            },
        },

        myEmail: {
            get() {
                this.emailToSent = this.email;
                return this.email;
            },
            set(newVal) {
                this.$emit("update:email", newVal);
                this.emailToSent = newVal;
            },
        },
    },
    created() {
        axios
            .get("/controlescolar/recommendationLetter/userCanSeeAnswered", {})
            .then((response) => {
                console.log(
                    "respuesta para carta de recomendacion: " + response.data
                );
                if (response.data === 1) {
                    this.userIsStudent = true;
                }
            })
            .catch((error) => {
                this.userIsStudent = false;
            });
    },

    methods: {
        userCanSeeAnswered() {
            return this.userIsStudent;
        },

        inputClassFor() {
            return {
                "form-control": true,
                // "is-invalid": (errors.values())?true:false,
            };
        },

        // -1  : Correo no enviado
        //  0  : En espera de respuesta del externo
        //  1  : Completado

        checkUpload() {
            let res = 2;
            if (this.recommendation_letter != null) {
                if (this.recommendation_letter["email_evaluator"]) {
                    res = parseInt(this.recommendation_letter["answer"]); // 0 o 1
                }
            }
            console.log("res: " + res);
            return res;
        },

        verCartaRecomendacion() {
            if (
                this.recommendation_letter == null ||
                this.appliant == null ||
                this.archive_id == null
            ) {
                Swal.fire({
                    title: "Ups!",
                    text: "El usuario con la carta de recomendación a ver no existe",
                    icon: "error",
                });
            } else {
                axios
                    .get(
                        "/controlescolar/recommendationLetter/seeAnsweredRecommendationLetter",
                        {
                            params: {
                                rl_id: this.recommendation_letter["id"],
                                archive_id: this.archive_id,
                                user_id: this.appliant["id"],
                            },
                        }
                    )
                    .then((response) => {})
                    .catch((error) => {
                        console.log(error);
                        Swal.fire({
                            title: "Error al hacer busqueda",
                            text: error.response.data,
                            icon: "error",
                        });
                    });
            }
        },

        enviarCorreoCartaRecomendacion() {
            let request;

            //Ya existe carta de recomendacion
            if (this.recommendation_letter != null) {
                request = {
                    email: this.emailToSent,
                    appliant: this.appliant,
                    recommendation_letter: this.recommendation_letter,
                    academic_program: this.academic_program,
                    letter_created: 1,
                };
            } else {
                // No existe carta se necesita crear
                request = {
                    email: this.emailToSent,
                    appliant: this.appliant,
                    academic_program: this.academic_program,
                    letter_created: 0,
                };
            }

            axios
                .post(
                    "/controlescolar/solicitud/sentEmailRecommendationLetter",
                    request
                )
                .then((response) => {
                    console.log("message: " + response.data.message);
                    if (
                        response.data.message ==
                        "Exito, el correo ha sido enviado"
                    ) {
                        Swal.fire({
                            title: "El correo se ha enviado correctamente",
                            text: "Ahora solo queda esperar a que la persona responda el formulario",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Aceptar",
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error al enviar carta",
                            text: response.data.message,
                            showCancelButton: true,
                            cancelButtonColor: "#d33",
                            cancelButtonText: "Entendido",
                        });
                    }
                })
                .catch((error) => {
                    console.log("message: " + error.data.message);

                    Swal.fire({
                        title: "Error al mandar carta de recomendacion",
                        icon: "error",
                        title: error.data.message,
                        showCancelButton: true,
                        cancelButtonColor: "#d33",
                        cancelButtonText: "Entendido",
                    });
                    // alert('Ha ocurrido un error, intenta mas tarde');
                    console.log(error);
                });
        },
    },
};
</script>
