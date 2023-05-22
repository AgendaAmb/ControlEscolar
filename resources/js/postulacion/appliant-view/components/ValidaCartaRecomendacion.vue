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
                        :readonly="stateRL() === 1"
                    ></b-form-input>
                </b-form-group>
            </div>
        </div>

        <div class="row mt-0 mb-1">
            <div class="col-12">
                <!-- Se corrobora el estado del archivo (cambiar a numerico )-->
                <template v-if="stateRL() === 1">
                    <i>Estado:</i> <i class="text-success">Completado</i>
                </template>
                <template v-else-if="stateRL() === 0">
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
                    v-if="stateRL() != 1"
                    class="form-group"
                    style="width: 100%; max-height: 45px !important"
                >
                    <button
                        class="uaslp-btn"
                        @click="enviarCorreoCartaRecomendacion()"
                    >
                        <font-awesome-icon icon="fa-solid fa-download" />
                        <span>Guardar</span>
                    </button>
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

            state_rl: -2,
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
        if (this.recommendation_letter != null) {
            if (this.recommendation_letter["email_evaluator"]) {
                this.state_rl = parseInt(this.recommendation_letter["answer"]); // 0 o 1
            }
        }
    },

    methods: {
        inputClassFor() {
            return {
                "form-control": true,
                // "is-invalid": (errors.values())?true:false,
            };
        },

        // -1  : Correo no enviado
        //  0  : En espera de respuesta del externo
        //  1  : Completado

        stateRL() {
            return this.state_rl;
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
                        // letter send
                        this.state_rl = 0;
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
                    if (
                        error.data.message ==
                        "No puedes usar correos registrados en esta cuenta"
                    ) {
                        Swal.fire({
                            title: "Direcciones de correo erroneas",
                            icon: "error",
                            title: error.data.message,
                            showCancelButton: true,
                            cancelButtonColor: "#d33",
                            cancelButtonText: "Entendido",
                        });
                    } else {
                        Swal.fire({
                            title: "Error al mandar correo",
                            icon: "error",
                            title: error.data.message,
                            showCancelButton: true,
                            cancelButtonColor: "#d33",
                            cancelButtonText: "Entendido",
                        });
                    }

                    // alert('Ha ocurrido un error, intenta mas tarde');
                    console.log(error);
                });
        },
    },
};
</script>
