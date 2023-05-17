<template>
    <!-- Forms para carta de recomendacion -->
    <div class="col-12 my-2">
        <!-- Caso general -->
        <div class="row">
            <!-- Email contiene datos genericos con el maximo de cartas permitidas -->
            <div
                v-for="(my_email, index) in emails"
                :key="index"
                class="form-group col-6"
            >
                <!-- Ya existe la carta acorde al indexado -->
                <div v-if="recommendationLetterPerIndex(index) === true">
                    <valida-carta-recomendacion
                        :email="recommendation_letters[index].email_evaluator"
                        :recommendation_letter="recommendation_letters[index]"
                        :appliant="appliant"
                        :archive_id="archive_id"
                        :academic_program="academic_program"
                        :images_btn="images_btn"
                        :index="index + 1"
                        :status_checkBox="status_checkBox"
                    >
                    </valida-carta-recomendacion>
                </div>
                <!-- No existe carta, tendra que ser rellenada -->
                <div v-else>
                    <valida-carta-recomendacion
                        :email="my_email.email"
                        :archive_id="archive_id"
                        :appliant="appliant"
                        :academic_program="academic_program"
                        :index="index + 1"
                        :images_btn="images_btn"
                        :status_checkBox="status_checkBox"
                    >
                    </valida-carta-recomendacion>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ValidaCartaRecomendacion from "./ValidaCartaRecomendacion.vue";

export default {
    name: "carta-recomendacion",

    components: {
        ValidaCartaRecomendacion,
    },

    data() {
        return {
            emails: [
                { email: "example@example.com" },
                { email: "example@example.com" },
            ],
            status_checkBox: false,
        };
    },

    methods: {
        sizeRecommendationLetter() {
            return this.recommendation_letters.length;
        },
        recommendationLetterPerIndex(index) {
            let res = false;
            if (this.recommendation_letters.length > index) {
                res = true;
            }

            //console.log('rl lenght ' + this.recommendation_letters.length);
            //console.log('index: ' + index);
            return res;
        },
    },

    props: {
        //Cartas de recomendacion (tabla a rellenar)
        //Aqui se cambian los correos

        images_btn: {
            type: Object,
            default: {},
        },

        appliant: {
            type: Object,
        },

        academic_program: {
            type: Object,
        },

        //recibe los emails de la carta de recomendacion como en un arreglo para comparar
        recommendation_letters: {
            type: Array,
        },

        archive_id: {
            type: Number,
            default: null,
        },
    },
};
</script>
