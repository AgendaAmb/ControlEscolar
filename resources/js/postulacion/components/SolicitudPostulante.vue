<template>
  <div class="row justify-content-start align-items-center mx-1">
    <!-- Google translate element -->
    <div class="col-12 mt-3">
      <b-form-group label-cols="1" label-cols-sm="1" label-size="lg" label="Idioma" label-class="p d-flex my-auto align-items-center text-center justify-content-center"
      label-for="input-sm" label-align-sm="right">
      <v-google-translate :defaultLanguageCode="defaultLanguageCode" :defaultPageLanguageCode="defaultPageLanguageCode"
        :fetchBrowserLanguage="false" @select="languageSelectedHandler" id="input-sm" />
    </b-form-group>
    </div>
    
    <!-- Info postulante -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-1 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Datos personales</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <postulante v-bind="appliant" :archive_id="archive_id" :images_btn="images_btn"
              :documentos.sync="personal_documents" :alias_academic_program.sync="academic_program.alias">
            </postulante>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Historial academico -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-2 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2"></b-icon>
            <p class="h2 my-2">Historial Académico</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-2" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <grado-academico v-for="(grado, index) in academic_degrees" v-bind="grado"
              v-bind:key="`${index}-${grado.id}-AcademicDegree`" :index="index + 1"
              :alias_academic_program.sync="academic_program.alias" :state.sync="grado.state" :cvu.sync="grado.cvu"
              :knowledge_card.sync="grado.knowledge_card" :digital_signature.sync="grado.digital_signature"
              :cedula.sync="grado.cedula" :status.sync="grado.status" :degree.sync="grado.degree"
              :average.sync="grado.average" :min_avg.sync="grado.min_avg" :max_avg.sync="grado.max_avg"
              :country.sync="grado.country" :university.sync="grado.university" :degree_type.sync="grado.degree_type"
              :titration_date.sync="grado.titration_date" :required_documents.sync="grado.required_documents"
              :paises.sync="Countries" :images_btn="images_btn" @delete-item="eliminaHistorialAcademicoFromList">
            </grado-academico>
            <div class="row align-items-center mt-0">
              <div class="col-lg-12">
                <b-button pill class="d-flex" @click="agregaHistorialAcademico" variant="danger"
                  v-b-popover.hover="'Agregar un nuevo Grado Academico al historial'" title="Inserta otro registro"
                  :style="styleBtnAccordionSection">
                  <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                  <p class="h4 my-2">Agregar</p>
                </b-button>
              </div>
            </div>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Requisitos de ingreso -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-3 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Requisitos de Ingreso</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-3" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <requisitos-ingreso :archive_id="archive_id" :motivation.sync="motivation" :exanni_score.sync="exanni_score"
              :documentos.sync="entrance_documents" :user_id.sync="appliant.id" :viewer_id.sync="viewer.id"
              :images_btn="images_btn" :alias_academic_program.sync="academic_program.alias">
            </requisitos-ingreso>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Dominio de idiomas -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-4 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Dominio de idiomas</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-4" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>

            <lengua-extranjera v-for="(language, index) in appliant_languages" v-bind="language"
              v-bind:key="`${index}-${language.id}-Language`" :index="index + 1"
              :alias_academic_program.sync="academic_program.alias" :state.sync="language.state"
              :language.sync="language.language" :institution.sync="language.institution" :score.sync="language.score"
              :presented_at.sync="language.presented_at" :valid_from.sync="language.valid_from"
              :valid_to.sync="language.valid_to" :language_domain.sync="language.language_domain"
              :conversational_level.sync="language.conversational_level" :reading_level.sync="language.reading_level"
              :writing_level.sync="language.writing_level" :exam_presented.sync="language.exam_presented"
              :kind_of_exam.sync="language.kind_of_exam" :documentos.sync="language.required_documents"
              @delete-item="eliminaLenguaExtranjeraFromList" :images_btn="images_btn">
            </lengua-extranjera>

            <div class="row align-items-center mt-0">
              <div class="col-lg-12">
                <b-button pill class="d-flex" @click="agregaLenguaExtranjera" :style="styleBtnAccordionSection"
                  v-b-popover.hover="'Agregar una nueva lengua al registro'" title="Inserta otro registro">
                  <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                  <p class="h4 my-2">Agregar</p>
                </b-button>
              </div>
            </div>

          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>
    <!-- Experiencia laboral -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-5 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Experiencia laboral (Opcional)</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-5" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>

            <experiencia-laboral v-for="(experience, index) in appliant_working_experiences" v-bind="experience"
              v-bind:key="`${index}-${experience.id}-$WorkingExperience}`" :index="index + 1"
              :state.sync="experience.state" :institution.sync="experience.institution"
              :working_position.sync="experience.working_position" :from.sync="experience.from" :to.sync="experience.to"
              :knowledge_area.sync="experience.knowledge_area" :field.sync="experience.field"
              :working_position_description.sync="
                experience.working_position_description
              " :achievements.sync="experience.achievements" :images_btn="images_btn"
              @delete-item="eliminaExperienciaLaboralFromList">
            </experiencia-laboral>

            <div class="row align-items-center mt-0">
              <div class="col-lg-12">
                <b-button pill class="d-flex" @click="agregaExperienciaLaboral" :style="styleBtnAccordionSection"
                  v-b-popover.hover="'Agregar nueva experiencia laboral al registro'" title="Inserta otro registro">
                  <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                  <p class="h4 my-2">Agregar</p>
                </b-button>
              </div>
            </div>

          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Requisitos curriculares -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-6 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Requisitos curriculares</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-6" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <!-- Produccion cientifica subseccion -->
            <div class="col-lg-12">
              <p class="h4">
                <strong> Producción científica (Opcional) </strong>
              </p>
            </div>

            <produccion-cientifica v-for="(production, index) in scientific_productions" v-bind="production"
              v-bind:key="`${index}-${production.id}-ScientificProduction`" :index="index + 1"
              :state.sync="production.state" :type.sync="production.type" :title.sync="production.title"
              :publish_date.sync="production.publish_date" :magazine_name.sync="production.magazine_name"
              :article_name.sync="production.article_name" :institution.sync="production.institution"
              :post_title_memory.sync="production.post_title_memory"
              :post_title_document.sync="production.post_title_document"
              :post_title_review.sync="production.post_title_review" :documentos.sync="curricular_documents"
              :images_btn="images_btn" @delete-item="eliminaProduccionCientificaFromList">
            </produccion-cientifica>

            <div class="col-lg-12 my-2">
              <b-button pill class="d-flex" @click="agregaProduccionCientifica" :style="styleBtnAccordionSection">
                <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                <p class="h4 my-2">Agregar</p>
              </b-button>
            </div>

            <hr class="d-block my-4" :style="ColorStrip" />

            <div class="col-lg-12 my-2">
              <p class="h4">
                <strong> Capital humano (Cursos impartidos) [Opcional] </strong>
              </p>
            </div>
            <capital-humano v-for="(humanCapital, index) in human_capitals" v-bind="humanCapital"
              v-bind:key="`${index}-${humanCapital.id}-CapitalHumano`" :index="index"
              :course_name.sync="humanCapital.course_name" :assisted_at.sync="humanCapital.assisted_at"
              :scolarship_level.sync="humanCapital.scolarship_level" :images_btn="images_btn"
              @delete-item="eliminaCapitalHumanoFromList">
            </capital-humano>


            <div class="col-lg-12 my-2">
              <b-button pill class="d-flex" @click="agregaCapitalHumano" :style="styleBtnAccordionSection">
                <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                <p class="h4 my-2">Agregar</p>
              </b-button>
            </div>
            <!-- Capital humano subseccion -->

          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Cartas de recomendacion -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-7 variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Carta de recomendación</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-7" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <carta-recomendacion :appliant="appliant" :archive_id="archive_id" :academic_program="academic_program"
              :recommendation_letters="recommendation_letters" :images_btn="images_btn" />
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <div class="d-flex justify-content-start align-items-center mb-4">
      <div class="col-lg-12">
        <b-button style="width:100%; height:75px;" v-b-modal.ActualizaExpediente pill variant="primary">
          <p class="h3"> Finalizar revisión </p>
        </b-button>
      </div>
    </div>

    <!-- <div class="col-12 align-items-center my-4 ">
      <div class="row my-2 mx-1 justify-content-center">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 justify-content-center text-center">
          <b-button v-b-popover.hover="'El postulante no cumple con los requisitos mínimos para el ingreso al Posgrado'"
            title="¿Qué significa?" v-b-modal.RechazarExpediente pill variant="danger" :style="btnStyle">
            <p class="h3">No cumple</p>
          </b-button>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 justify-content-center text-center">
          <b-button v-b-popover.hover="'El postulante necesita modificar uno o varios documentos'"
            title="¿Qué significa?" v-b-modal.ActualizaExpediente pill variant="warning" :style="btnStyle">
            <p class="h3">Corregir</p>
          </b-button>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 justify-content-center text-center">
          <b-button v-b-popover.hover="'El postulante cumple con todos los requisitos y pasa a la etapa de entrevista'"
            title="¿Qué significa?" @click="EnviarRevision('Aceptar')" pill variant="success" :style="btnStyle">
            <p class="h3">Aceptar</p>
          </b-button>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 justify-content-center text-center">
          <b-button
            v-b-popover.hover="'El postulante debera de entregar un documento fuera de tiempo, pero cumple con lo demas solicitado y pasa a la etapa de entrevista'"
            title="¿Qué significa?" @click="EnviarRevision('Condicionado')" pill variant="info" :style="btnStyle">
            <p class="h3">Condicionado</p>
          </b-button>
        </div>
      </div>
    </div> -->
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
    interview_documents: Array,
    // Id del expediente.
    archive_id: Number,

    // Documentos personales.
    personal_documents: Array,

    //Documentos curriculares
    curricular_documents: Array,

    // Motivos de ingreso.
    motivation: String,

    // Exanni score
    exanni_score: Number,

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

    //Cartas de recomendacion Arreglo que contiene correos
    recommendation_letters: Array,

    // Postulante de la solicitud.
    appliant: Object,

    //Persona que esta viendo el expediente
    viewer: Object,

    //Estado del expediente
    status: Number,
  },


  created() {
    // console.log(this.language);
    axios
      .get("/controlescolar/solicitud/getAllButtonImage")
      .then((response) => {
        // console.log('recibiendo imagenes' + response.data.ver);
        this.images_btn = response.data;
        // console.log('imagenes buttons: ' + this.images.ver);
      })
      .catch((error) => {
        console.log(error);
      });
  },

  data() {
    return {
      Countries: [],
      myUniversities: [],
      EnglishExams: [],
      EnglishExamTypes: [],
      images_btn: {},
      defaultLanguageCode: "es",
      defaultPageLanguageCode: "es-MX"
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

  computed: {
    btnStyle: {
      get() {
        return {
          height: '75px!important',
          width: '100%!important',
          color: 'white'
        }
      }
    },

    styleHeaderContainerAccordionSection() {
      return {
        border: 'none',
      }
    },

    styleBtnAccordionSection() {

      var color = "rgb(215, 219, 221,0.9)";

      color = "#1266f1";

      color = "rgba(0,96,175,255)";
      // color = "#6092c9";

      // switch (this.academic_program.alias) {
      //   case "maestria":

      //     color = "rgb(5, 152, 188, 0.75)";
      //     break;
      //   case "doctorado":
      //     color = "rgb(254, 204, 80, 0.75)";
      //     break;
      //   case "enrem":
      //     color = "rgb(255, 56, 77, 0.75)";
      //     break;
      //   case "imarec":
      //     color = "rgb(17, 137, 67,0.75)";
      //     break;
      // }


      return {
        backgroundColor: color,
        color: 'rgb(244, 244, 244)',
        border: 'none',
        display: 'flex',
        alignItems: 'center',
      }
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
        height: '5px'
      };
    },

    styleContainerAccordionSection() {
      return {
        border: 'none',
      }
    }
  },


  methods: {
    languageSelectedHandler(info) {
      console.log(info);
    },
    
    getUniversities(state) {
      let universities = [];
      for (let i = 0; i < this.Countries.length; i++) {
        if (state === this.Countries[i].name) {
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
            title: "¡Éxito al agregar nuevo Grado Académico!",
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
            title: ":( Error al agregar nuevo Grado Académico",
            text: response.data.message, // Imprime el mensaje del controlador
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

    EnviarRevision(status) {
      let id_status = 1;

      if (status === "Aceptar") {
        id_status = 5;
      } else if (status === "Rechazar") {
        id_status = 6;
      } else if (status === "Condicionado") {
        id_status = 7;
      }

      axios
        .post("/controlescolar/solicitud/whoModifyArchive", {
          archive_id: this.archive_id,
        })
        .then((response) => {
          if (status != "Corregir") {
            Swal.fire({
              title: "¿Estas seguro de realizar el cambio?",
              text: "Actulizar el expediente a " + status.toUpperCase(),
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
                    status: id_status,
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
        })
        .catch((error) => {
          console.log(error);
          Swal.fire({
            title: "Error al actualizar",
            text: "El usuario que esta revisando, no se encuentra en el sistema",
            showCancelButton: false,
            icon: "error",
          });
        });
    },
  },
};
</script>

