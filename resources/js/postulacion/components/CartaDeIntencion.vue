<template>
    <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
            <p class="my-2 d-block">
                <strong>
                    12.- Carta de intención de un profesor del núcleo básico (el
                    profesor la envía directamente)</strong
                >
            </p>
            <p class="my-2 d-block">
                Escriba aqui el correo electronico del profesor que enviara la
                carta de intencion
            </p>
        </div>

        <div class="row">
            <!-- Email contiene datos genericos con el maximo de cartas permitidas -->
            <div
                v-for="(my_email, index) in emails"
                :key="index"
                class="form-group col-6"
            >

                <input type="text" v-model="emailToSent" placeholder="Ingrese la dirección de correo electrónico">

                <!-- Ya existe la carta acorde al indexado -->
                <label>
                    <a style="height: 45px; width: 100%" target="_blank">
                        <button
                            class="uaslp-btn"
                            @click="enviarCorreoCartaRecomendacion()"
                        >
                            <span>Enviar</span>
                        </button>
                    </a>
                </label>
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
            emails: [
                { email: "example@example.com" },
            ],

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

            console.log(this.emailToSent);

            request = {
                email: this.emailToSent,
                appliant: 'Ricardo',
                recommendation_letter: 'JAJA SALU3',
                academic_program: 'Valo',
                letter_created: '1',
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
