<template>


  <!-- verifica si la carta de recomendacion en pdf corresponde a los datos de la tabla
          Si corresponde entonces se ha realizado 
          Si no entonces esta pendiente
         -->
  <div class="container mt-2">

    
    <!-- CASO 1 -->
    <!-- No existen cartas de recomendacion se crearan por primera vez -->
    <div class="row" v-if="sizeRecommendationLetter() == 0">
      <!-- Recorre la lista de correos de ejemplo, el usuario debera confirmar al aceptar -->
      <div
        class="form-group col-md-5 m-2 d-flex"
        v-for="(my_email, index) in emails"
        :key="index"
      >
        <!-- No existe carta de recomendacion pero se creara -->
        <valida-carta-recomendacion
          :email="my_email.email"
          :appliant="appliant"
          :academic_program="academic_program"
          :errors="errors"
        >
        </valida-carta-recomendacion>
      </div>
    </div>

    <div class="row" v-else-if="sizeRecommendationLetter() == 1">

      <div class="form-group col-md-5 m-2 d-flex">
      <valida-carta-recomendacion
        :email="recommendation_letters[0].email_evaluator"
        :recommendation_letter="recommendation_letters[0]"
        :archive_recommendation_letter="archives_recommendation_letters[0]"
        :appliant="appliant"
        :academic_program="academic_program"
      >
      </valida-carta-recomendacion>

      </div>
      <div class="form-group col-md-5 m-2 d-flex">

      <valida-carta-recomendacion
        :email="emails[0].email"
        :appliant="appliant"
        :academic_program="academic_program"
      >
      </valida-carta-recomendacion>
      </div>
    </div>

    <!-- CASO 3 -->
    <!-- Ya existen dos correos registrados para carta de recomendacion  -->
    <div class="row" v-else>
      <div
        class="form-group col-md-5 d-flex"
        v-for="(rl, index) in recommendation_letters"
        :key="index"
      >
        <!-- Se comprueba el estado de las dos cartas / Se pueden modificar campos aun -->
        <valida-carta-recomendacion
          :email="rl.email_evaluator"
          :recommendation_letter="recommendation_letters[index]"
          :archive_recommendation_letter="
            archives_recommendation_letters[index]
          "
          :appliant="appliant"
          :academic_program="academic_program"
        >
        </valida-carta-recomendacion>
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
    };
  },

  methods: {
    toString(rl) {
      console.log(rl);
    },

    sizeRecommendationLetter() {
      // console.log("archivos" + this.archives_recommendation_letters.length);
      // console.log("cartas" + this.recommendation_letters.length);
      return this.recommendation_letters.length;
    },
    
  },

  props: {
    //Cartas de recomendacion (tabla a rellenar)
    //Aqui se cambian los correos

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

    archives_recommendation_letters: {
      type: Array,
    },

    errors: Array,
  },
};
</script>