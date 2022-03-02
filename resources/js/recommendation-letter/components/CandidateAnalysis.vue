<template>
  <div id="candidateAnalysis">
    <!-- Title -->
    <hr class="d-block" />
    <h2>Análisis del candidato</h2>

    <!-- 
      Multiple options
      Deficiente
      Regular
      Bueno
      Excelente
     -->
    <div class="d-flex flex-column" id="multipleOptions-Analisys">
      <table class="col-lg-12 candidate-analysis-table">
        <thead>
          <tr class="row align-items-start">
            <th class="col-8">Parámetros</th>
            <th class="col-1">Excelente</th>
            <th class="col-1">Bueno</th>
            <th class="col-1">Regular</th>
            <th class="col-1">Deficiente</th>
          </tr>
        </thead>
        <tbody>
          <!-- parametros definidos en formulario -->
          <analysis-parameter
            v-for="parameter in parameters"
            :key="parameter.name"
            v-bind="parameter"
            :score.sync="parameter.score"
          >
            <!-- parametros propios por calificador -->
          </analysis-parameter>
          <hr class="d-block mt-3 mb-2" />
          <custom-parameter
            v-for="(parameter, index) in custom_parameters"
            :key="index"
            v-bind="parameter"
            :remove="deleteCustomParameter"
            :index = "index"
            :score.sync="parameter.score"
            :name.sync="parameter.name"
          >
          </custom-parameter>
        </tbody>
        <!-- <div v-for ="parameter in parameters" :key ="parameter.name" class="mt-3">Selected: <strong>{{ parameter.score }}</strong></div> -->

        <!-- Agregar un paramero propio personalizado -->
        <tfoot class="d-block">
          <tr>
            <td colspan="5">
              <label class="d-block mt-3">Otra que desee especificar</label>
              <button @click="addCustomParameter()" class="btn btn-primary">
                Agregar otro parametro
              </button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- Inputs text  -->
    <label class="mt-4">
      Comente las habilidades y debilidades que usted desee destacar en el
      candidato, especialmente en términos del rendimiento y desempeño en su
      trabajo/escuela y en proyectos de investigación.
    </label>
    <textarea class="form-control" rows="4" v-model="specialSkills"></textarea>

    <label class="mt-4">
      En síntesis ¿Por qué recomienda al aspirante para ingresar al PMPCA?
    </label>
    <textarea
      class="form-control"
      rows="4"
      v-model="whyRecommendation"
    ></textarea>

    <!-- Confirmacion de datos -->
    <label class="mt-4">
      <input type="checkbox" name="confirmation_form" />
      Al guardar confirmo que esta información es exacta y veridica y autorizo
      que sea utilizada en la evaluación del aspirante por el Comité Académico
      del PMPCA.
    </label>

    <label
      ><strong>Nota: </strong>&nbsp; Esta información es confidencial y no será
      del conocimiento del candidato.</label
    >

    <hr class="d-block" />
  </div>
</template>

<script>
import AnalysisParameter from "./AnalysisParameter.vue";
import CustomParameter from "./CustomParameter.vue";

export default {
  name: "candidate-analysis",

  components: {
    AnalysisParameter,
    CustomParameter,
  },

  computed: {
    specialSkills: {
      get() {
        return this.special_skills;
      },

      set(value) {
        this.$emit("update:special_skills", value);
      },
    },

    whyRecommendation: {
      get() {
        return this.why_recommendation;
      },

      set(value) {
        this.$emit("update:why_recommendation", value);
      },
    },
  },

  methods: {
    addCustomParameter() {
      this.custom_parameters.push({ name: "", score: "" }); //agregar a la lista
      console.log(this.custom_parameters.length);
    },

    deleteCustomParameter(index) {
      console.log(index);
      // this.custom_parameters.splice(index,1);

      this.$delete(this.custom_parameters, index);
    },
  },

  props: {
    // Otros parámetros que se quieran especificar, para la carta
    // de recomendación.

    //parametros requeridos
    special_skills: String,
    why_recommendation: String,
    //parametros definidos para el análisis del candidato.
    parameters: {
      type: Array,
      default() {
        return [
          {
            name: "Conocimiento y destrezas en su campo",
            score: null,
          },
          {
            name: "Dedicación al trabajo",
            score: null,
          },
          {
            name: "Imaginación y creatividad",
            score: null,
          },
          {
            name: "Habilidad para comunicarse",
            score: null,
          },
          {
            name: "Rendimiento",
            score: null,
          },
          {
            name: "Perseverancia",
            score: null,
          },
          {
            name: "Capacidad de convivencia con otras personas",
            score: null,
          },
          {
            name: "Disciplina de estudio",
            score: null,
          },
          {
            name: "Habilidad de investigación",
            score: null,
          },
          {
            name: "Habilidades de comunicación oral y escrita",
            score: null,
          },
          {
            name: "Hábitos de trabajo",
            score: null,
          },
          {
            name: "Organización",
            score: null,
          },
          {
            name: "Planificación",
            score: null,
          },
          {
            name: "Oportunidad",
            score: null,
          },
          {
            name: "Colaboración en equipo",
            score: null,
          },
          {
            name: "Iniciativa propia",
            score: null,
          },
        ];
      },
    },

    //otros parametros
    custom_parameters: {
      type: Array,
      default() {
        return [
          {
            name: "",
            score: "",
          },
        ];
      },
    },
  },
};
</script>