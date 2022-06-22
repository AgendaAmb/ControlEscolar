<template>
  <div class="row my-2">
    
    <!-- Requisitos de ingreso -->
    <div v-if="toString" class="col-12 my-2">
      <details>
        <summary class="mb-4 font-weight-bold h3">
          Requisitos de ingreso
        </summary>
        <requisitos-ingreso
          :archive_id="archive_id"
          :motivation.sync="motivation"
          :documentos.sync="entrance_documents"
          :user_id="appliant.id"
          :viewer_id="viewer.id"
          :alias_academic_program="academic_program.alias"
        >
        </requisitos-ingreso>
      </details>
      <hr class="my-4 col-12" :style="ColorStrip" />
    </div>
    
  </div>
</template>

<script>
import Postulante from "./Postulante.vue";
import GradoAcademico from "./GradoAcademico.vue";
import CapitalHumano from "./CapitalHumano.vue";
import ProduccionCientifica from "./ProduccionCientifica.vue";
import ExperienciaLaboral from "./ExperienciaLaboral.vue";
import LenguaExtranjera from "./LenguaExtranjera.vue";
import RequisitosIngreso from "./RequisitosIngreso.vue";
import CartaRecomendacion from "./CartaDeRecomendacion.vue";

export default {
  name: "solicitud-postulante",

  components: {
    Postulante,
    GradoAcademico,
    CapitalHumano,
    ProduccionCientifica,
    ExperienciaLaboral,
    LenguaExtranjera,
    RequisitosIngreso,
    CartaRecomendacion,
  },

  props: {
    //interview documemnts
    interview_documents:Array,
    // Id del expediente.
    archive_id: Number,

    // Documentos personales.
    personal_documents: Array,

    // Motivos de ingreso.
    motivation: String,

    // Documentos de ingreso.
    entrance_documents: Array,

    // curricular_documents: Array,

    // Programa académico.
    academic_program: Object,

    // Grados académicos del postulante.
    academic_degrees: Array,

    // Lenguas extranjeras del postulante.
    appliant_languages: Array,

    // Experiencias laborales del postulante.
    appliant_working_experiences: Array,

    // Producciones científicas del postulante.
    scientific_productions: Array,

    // Capitales humanos del postulante.
    human_capitals: Array,

    //archivos arreglo de {id_archive_required_docuent, id_archive, location}
    archives_recommendation_letters: Array,

    //Cartas de recomendacion Arreglo que contiene correos
    recommendation_letters: Array,

    // Postulante de la solicitud.
    appliant: Object,

    letters_Commitment: Array,

    //Persona que esta viendo el expediente
    viewer: Object,
  },

  computed: {
    ColorStrip: {
      get() {
        var color = "#FFFFFF";

        switch (this.academic_program.alias) {
          case "maestria":
            color = "#0598BC";
            break;
          case "doctorado":
            color = "#FECC50";
            break;
          case "enrem":
            color = "#FF384D";
            break;
          case "imarec":
            color = "#118943";
            break;
        }

        return {
          backgroundColor: color,
          height: "1px",
        };
      },
    },
  },

  data() {
    return {
      Countries: [],
      myUniversities: [],
      EnglishExams: [],
      EnglishExamTypes: [],
    };
  },

  mounted: function () {
    this.$nextTick(function () {
      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/countries/universities")
        .then((response) => {
          this.Countries = response.data;
        });

      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/englishExams")
        .then((response) => {
          this.EnglishExams = response.data;
        });

        console.log(this.entrance_documents);
    });
  },

  methods: {

    toString(){
      this.entrance_documents.forEach(element => {
          console.log(element.name);
      });
      return true;
    },

    getUniversities(state){
      let universities = [];
      for(let i=0; i<this.Countries.length;i++){
          if(state === this.Countries[i].name){
            universities = this.Countries[i].universities;
            break;
          }
      }
      return universities;
    },
    /*
       ESTADOS PARA : EXPERIENCIA LABORAL
    */

    agregaExperienciaLaboral() {
      axios
        .post("/controlescolar/solicitud/addWorkingExperience", {
          archive_id: this.archive_id,
          state: "Incompleto",
        })
        .then((response) => {
          Swal.fire({
            title: "Éxito al agregar nueva experiencia laboral!",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });

          //Add new model create to the current list
          this.appliant_working_experiences.push(response.data.model);
        })
        .catch((error) => {
          console.log(error.data.message);
          Swal.fire({
            title: ":( Error al agregar nueva experiencia laboral",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    //Escucha al hijo para eliminar de la lista actual
    eliminaExperienciaLaboralFromList(index) {
      this.appliant_working_experiences.splice(index, 1);
    },

    agregaLenguaExtranjera() {
      axios
        .post("/controlescolar/solicitud/addAppliantLanguage", {
          archive_id: this.archive_id,
          state: "Incompleto",
        })
        .then((response) => {
          Swal.fire({
            title: "Éxito al agregar nuevo idioma!",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
            //Add new model create to the current list
          });
          this.appliant_languages.push(response.data.model);

          // lenguaAgregado(appliant_languages[appliant_languages.length-1])
        })
        .catch((error) => {
          console.log(error.data.message);
          Swal.fire({
            title: ":( Error al agregar nuevo Idioma",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    eliminaLenguaExtranjeraFromList(index) {
      this.appliant_languages.splice(index, 1);
    },

    agregaHistorialAcademico() {
      axios
        .post("/controlescolar/solicitud/addAcademicDegree", {
          archive_id: this.archive_id,
          state: "Incompleto",
        })
        .then((response) => {
          Swal.fire({
            title: "Éxito al agregar nuevo Grado Academico!",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });
          this.academic_degrees.push(response.data.model);
        })
        .catch((error) => {
          console.log(error.data.message);
          Swal.fire({
            title: ":( Error al agregar nuevo Grado Academico",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    eliminaHistorialAcademicoFromList(index) {
      this.academic_degrees.splice(index, 1);
    },

    agregaProduccionCientifica() {
      axios
        .post("/controlescolar/solicitud/addScientificProduction", {
          archive_id: this.archive_id,
          state: "Incompleto",
        })
        .then((response) => {
          Swal.fire({
            title: "Éxito al agregar nueva producción científica!",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });

          //Add new model create to the current list
          this.scientific_productions.push(response.data.model);
        })
        .catch((error) => {
          console.log(error.data.message);
          Swal.fire({
            title: ":( Error al agregar nueva producción científica",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    eliminaProduccionCientificaFromList(index) {
      this.scientific_productions.splice(index, 1);
    },

    agregaCapitalHumano() {
      axios
        .post("/controlescolar/solicitud/addHumanCapital", {
          archive_id: this.archive_id,
          state: "Incompleto",
        })
        .then((response) => {
          Swal.fire({
            title: "Éxito al agregar nuevo capital humano!",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });

          //Add new model create to the current list
          this.human_capitals.push(response.data.model);
        })
        .catch((error) => {
          console.log(error.data.message);
          Swal.fire({
            title: ":( Error al agregar nuevo capital humano",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    eliminaCapitalHumanoFromList(index) {
      this.human_capitals.splice(index, 1);
    },
  },
};
</script>

