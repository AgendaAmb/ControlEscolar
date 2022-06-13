<template>
  <div  class="row">
    <!-- Info postulante -->
    <div class="col-12">
      <h2 class="my-5 d-block font-weight-bold">Datos Personales</h2>
      <postulante
        v-bind="appliant"
        :archive_id="archive_id"
        :documentos.sync="personal_documents"
      >
      </postulante>
      <hr class="d-block" :style="ColorStrip" />
    </div>
    <!-- Historial academico -->
    <div class="col-12">
      <details>
        <summary class="mb-4 font-weight-bold h3">Historial académico</summary>
        <grado-academico
          v-for="(grado, index) in academic_degrees"
          v-bind="grado"
          v-bind:key="grado.id + index"
          :index="index + 1"
          :alias_academic_program.sync="academic_program.alias"
          :state.sync="grado.state"
          :cvu.sync="grado.cvu"
          :knowledge_card.sync="grado.knowledge_card"
          :digital_signature.sync="grado.digital_signature"
          :cedula.sync="grado.cedula"
          :status.sync="grado.status"
          :degree.sync="grado.degree"
          :average.sync="grado.average"
          :min_avg.sync="grado.min_avg"
          :max_avg.sync="grado.max_avg"
          :country.sync="grado.country"
          :university.sync="grado.university"
          :degree_type.sync="grado.degree_type"
          :titration_date.sync="grado.titration_date"
          :required_documents.sync="grado.required_documents"
          :paises.sync="Countries"
          @delete-item="eliminaHistorialAcademicoFromList"
        >
        </grado-academico>
        <div class="row align-items-center mb-0 mt-2">
          <div class="col-12">
            <label>
              <strong>Nota: </strong>
              Selecciona el siguiente botón para agregar una nueva licenciatura
              o maestría según corresponda
            </label>
          </div>
        </div>
        <div class="row align-items-center mt-0">
          <div class="col-12">
            <button
              @click="agregaHistorialAcademico"
              class="btn btn-success"
              style="height: 45px; width: 250px"
            >
              Agregar Escolaridad
            </button>
          </div>
        </div>
      </details>
      <hr class="my-4 d-block" :style="ColorStrip" />
    </div>
    <!-- Requisitos de ingreso -->
    <div class="col-12">
      <details>
        <summary class="mb-4 font-weight-bold h3">
          Requisitos de ingreso
        </summary>
        <requisitos-ingreso
          :archive_id="archive_id"
          :motivation.sync="motivation"
          :documentos.sync="entrance_documents"
          :user_id.sync="appliant.id"
          :viewer_id.sync="viewer.id"
          :letters_Commitment.sync="letters_Commitment"
          :alias_academic_program.sync="academic_program.alias"
        >
        </requisitos-ingreso>
      </details>
      <hr class="my-4 col-12" :style="ColorStrip" />
    </div>
    <!-- Dominio de idiomas -->
    <div class="col-12">
      <details>
        <summary class="mb-4 font-weight-bold h3">Dominio de idiomas</summary>
        <lengua-extranjera
          v-for="(language, index) in appliant_languages"
          v-bind="language"
          v-bind:key="language.id"
          :index="index + 1"
          :alias_academic_program.sync="academic_program.alias"
          :state.sync="language.state"
          :language.sync="language.language"
          :institution.sync="language.institution"
          :score.sync="language.score"
          :presented_at.sync="language.presented_at"
          :valid_from.sync="language.valid_from"
          :valid_to.sync="language.valid_to"
          :language_domain.sync="language.language_domain"
          :conversational_level.sync="language.conversational_level"
          :reading_level.sync="language.reading_level"
          :writing_level.sync="language.writing_level"
          :exam_presented.sync="language.exam_presented"
          :kind_of_exam.sync="language.kind_of_exam"
          :documentos.sync="language.required_documents"
          @delete-item="eliminaLenguaExtranjeraFromList"
        >
        </lengua-extranjera>

        <div class="row align-items-center mb-0 mt-2">
          <div class="col-12">
            <label>
              <strong>Nota: </strong>
              Selecciona el siguiente botón para agregar un nuevo idioma
            </label>
          </div>
        </div>
        <div class="row align-items-center mt-0">
          <div class="col-12">
            <button
              @click="agregaLenguaExtranjera"
              class="btn btn-success"
              style="height: 45px; width: 250px"
            >
              Agregar Idioma
            </button>
          </div>
        </div>
      </details>
      <hr class="my-4 d-block" :style="ColorStrip" />
    </div>
    <!-- Experiencia laboral -->
    <div class="col-12">
      <details>
        <summary class="mb-4 font-weight-bold h3">
          Experiencia laboral (Opcional)
        </summary>

        <experiencia-laboral
          v-for="(experience, index) in appliant_working_experiences"
          v-bind="experience"
          v-bind:key="experience.id"
          :index="index + 1"
          :state.sync="experience.state"
          :institution.sync="experience.institution"
          :working_position.sync="experience.working_position"
          :from.sync="experience.from"
          :to.sync="experience.to"
          :knowledge_area.sync="experience.knowledge_area"
          :field.sync="experience.field"
          :working_position_description.sync="
            experience.working_position_description
          "
          :achievements.sync="experience.achievements"
          @delete-item="eliminaExperienciaLaboralFromList"
        >
        </experiencia-laboral>

        <div class="row align-items-center mb-0 mt-2">
          <div class="col-12">
            <label>
              <strong>Nota: </strong>
              Selecciona el siguiente botón para agregar una nueva experiencia laboral
            </label>
          </div>
        </div>
        <div class="row align-items-center mt-0">
          <div class="col-12">
            <button
              @click="agregaExperienciaLaboral"
              class="btn btn-success"
              style="height: 45px; width:250px"
            >
              Agregar Experiencia Laboral
            </button>
          </div>
        </div>
      </details>
      <hr class="my-4 d-block" :style="ColorStrip" />
    </div>
    <!-- Requisitos curriculares -->
    <div class="col-12">
      <details>
        <summary class="mb-4 font-weight-bold h3">
          Requisitos curriculares
        </summary>

        <!-- Produccion cientifica subseccion -->
        <h5 class="mt-4 d-block">
          <strong> Producción científica (Opcional) </strong>
        </h5>
        <produccion-cientifica
          v-for="(production, index) in scientific_productions"
          v-bind="production"
          v-bind:key="production.id"
          :index="index + 1"
          :state.sync="production.state"
          :type.sync="production.type"
          :title.sync="production.title"
          :publish_date.sync="production.publish_date"
          :magazine_name.sync="production.magazine_name"
          :article_name.sync="production.article_name"
          :institution.sync="production.institution"
          :post_title_memory.sync="production.post_title_memory"
          :post_title_document.sync="production.post_title_document"
          :post_title_review.sync="production.post_title_review"
          :documentos.sync="curricular_documents"
          @delete-item="eliminaProduccionCientificaFromList"
        >
        </produccion-cientifica>

         <div class="row align-items-center mb-0 mt-2">
          <div class="col-12">
            <label>
              <strong>Nota: </strong>
              Selecciona el siguiente botón para agregar una nueva publicación para Producción Científica
            </label>
          </div>
        </div>
        <div class="row align-items-center mt-0">
          <div class="col-12">
            <button
              @click="agregaProduccionCientifica"
              class="btn btn-success"
              style="height: 45px; width:250px"
            >
              Agregar Producción Científica
            </button>
          </div>
        </div>
            <hr class="d-block" :style="ColorStrip" />

        <!-- Capital humano subseccion -->
        <h5 class="mt-4 d-block">
          <strong> Capital humano (Cursos impartidos) [Opcional] </strong>
        </h5>
        <capital-humano
          v-for="(humanCapital, index) in human_capitals"
          v-bind="humanCapital"
          v-bind:key="humanCapital.id"
          :index="index"
          :course_name.sync="humanCapital.course_name"
          :assisted_at.sync="humanCapital.assisted_at"
          :scolarship_level.sync="humanCapital.scolarship_level"
          @delete-item="eliminaCapitalHumanoFromList"
        >
        </capital-humano>

        <div class="row align-items-center mb-0 mt-2">
          <div class="col-12">
            <label>
              <strong>Nota: </strong>
              Selecciona el siguiente botón para agregar un nuevo curso para Capital Humano
            </label>
          </div>
        </div>
        <div class="row align-items-center mt-0">
          <div class="col-12">
            <button
              @click="agregaCapitalHumano"
              class="btn btn-success"
              style="height: 45px; width:250px"
            >
              Agregar Capital Humano
            </button>
          </div>
        </div>
        
      </details>
      <hr class="my-4 d-block" :style="ColorStrip" />
    </div>
    <!-- Cartas de recomendacion -->
    <div class="col-12">
      <details>
        <summary class="mb-4 font-weight-bold h3">
          Carta de recomendación
        </summary>
        <carta-recomendacion
          :appliant="appliant"
          :archive_id="archive_id"
          :academic_program="academic_program"
          :recommendation_letters="recommendation_letters"
          :archives_recommendation_letters="archives_recommendation_letters"
        />
      </details>
      <hr class="my-4 d-block" :style="ColorStrip" />
    </div>

     <div class="col-12 align-items-center my-4 mx-2">
      
      <div class="row my-2 mx-1 justify-content-center">
        <div class="col-4 justify-content-center">
          <!-- <button
            @click="EnviarRevision('Rechazar')"
            class="btn btn-danger"
            style="height: 45px; width: 150px"
            
          > -->
          <button
           data-toggle="modal"
            data-target="#RechazarExpediente"
            class="btn btn-danger"
            style="height: 45px; width: 150px"
          >
            <strong>No cumple</strong>
          </button>
        </div>

        <div class="col-8">
          <span>El postulante no cumple con los requisitos mínimos para el ingreso al Posgrado</span>
        </div>

      </div>
      <div class="row my-2 mx-1 justify-content-center">
        <div class="col-4 justify-content-center">
          <button
           data-toggle="modal"
            data-target="#ActualizaExpediente"
            class="btn btn-warning"
            style="height: 45px; width: 150px"
          >
            <strong>Corregir</strong>
          </button>
        </div>

        <div class="col-8">
          <span>El postulante necesita modificar uno o varios documentos</span>
        </div>
        
      </div>
      <div class="row my-2 mx-1 justify-content-center">
        <div class="col-4 align-content-center">
          <button
            @click="EnviarRevision('Aceptar')"
            class="btn btn-success"
            style="height: 45px; width: 150px"
          >
            <strong>Aceptar</strong>
          </button>
        </div>

        <div class="col-8">
          <span>El postulante cumple con todos los requisitos y pasa a la etapa de entrevista</span>
        </div>
      </div>
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
    // Id del expediente.
    archive_id: Number,

    // Documentos personales.
    personal_documents: Array,

    //Documentos curriculares 
    curricular_documents: Array,

    // Motivos de ingreso.
    motivation: String,

    // Documentos de ingreso.
    entrance_documents: Array,

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
    });
  },

  methods: {

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

    ColorStrip() {
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

    EnviarRevision(status){
      let id_status = 1;

      if(status === "Aceptar"){
        id_status = 5;
      }else if (status === "Rechazar"){
        id_status = 6;
      }

      if(status != 'Corregir'){
         Swal.fire({
          title: "¿Estas seguro de realizar el cambio?",
          text: "Actulizar el expediente por " + status ,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
          axios
            .post("/controlescolar/solicitud/updateStatusArchive", {
              
              // Status id to change the state
              archive_id: this.archive_id,
              status : id_status,
              
            })
            .then((response) => {
              Swal.fire({
                title: "El expediente del postulante ha sido modificado",
                text: "Se le informara al alumno de dicha verificación de documentos",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar",
              }).then((result) => {
                window.location.href = "/controlescolar/solicitud/";
              });
              
            })
            .catch((error) => {
              console.log(error);
              Swal.fire({
                title: "Error al actualizar",
                showCancelButton: false,
                icon: "error",
              });
            });
        }
        });
      }
      
    }
  },
};
</script>

