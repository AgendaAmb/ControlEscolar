<template>
  <div class="row justify-content-start align-items-center mx-1">

    <!-- Info postulante -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-personal-data variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Personal Data</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-personal-data" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <personal-data v-bind="appliant" :archive_id="archive_id"
              :alias_academic_program.sync="academic_program.alias">
            </personal-data>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Correspondence Address -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-correspondence-address variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Correspondence Address</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-correspondence-address" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <correspondence-address v-for="(address, index) in address" v-bind="address"
              v-bind:key="`${index}-${address.id}-CorrespondenceAddress`" :index="index + 1"
              :archive_id="archive_id" :care_of="address.care_of" :street_and_number="address.street_and_number"
              :city="address.city" :postal_code="address.postal_code" :state_country="address.state_country">
            </correspondence-address>

          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Secondary Education -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-secondary-education variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Secondary Education (High School)</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-secondary-education" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <secondary-education  v-for="(se, index) in secondary_education" v-bind="se"
              v-bind:key="`${index}-${se.id}-SecondaryEducation`" :index="index + 1"
              :archive_id="se.archive_id"
              :school_certificade="se.school_certificade"
              :final_score="se.final_score"
              :name_of_institution="se.name_of_institution"
              :from="se.from"
              :to="se.to"
              :city_country="se.city_country"
              >

            </secondary-education>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Higher Education -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-higher-education variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2"> Higher Education</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-higher-education" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <higher-education v-for="(grado, index) in academic_degrees" v-bind="grado"
              v-bind:key="`${index}-${grado.id}-AcademicDegree`" :index="index + 1"
              :alias_academic_program.sync="academic_program.alias" :state.sync="grado.state" :cvu.sync="grado.cvu"
              :knowledge_card.sync="grado.knowledge_card" :digital_signature.sync="grado.digital_signature"
              :cedula.sync="grado.cedula" :status.sync="grado.status" :degree.sync="grado.degree"
              :average.sync="grado.average" :min_avg.sync="grado.min_avg" :max_avg.sync="grado.max_avg"
              :country.sync="grado.country" :university.sync="grado.university" :degree_type.sync="grado.degree_type"
              :titration_date.sync="grado.titration_date" :required_documents.sync="grado.required_documents"
              :paises.sync="Countries"  @delete-item="eliminaHistorialAcademicoFromList">

            </higher-education>

            <div class="row align-items-center my-1">
              <div class="col-lg-12">
                <b-button pill class="d-flex" @click="agregaHistorialAcademico" variant="danger"
                  v-b-popover.hover="'Add another register for higher education'" title="New Register"
                  :style="styleBtnAccordionSection">
                  <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                  <p class="h4 my-2">Add</p>
                </b-button>
              </div>
            </div>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Dominio de idiomas -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-language-skills variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Language Skills</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-language-skills" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>

            <language-skills v-for="(language, index) in appliant_languages" v-bind="language"
              v-bind:key="`${index}-${language.id}-Language`" :index="index + 1"
              :alias_academic_program.sync="academic_program.alias" :state.sync="language.state"
              :language.sync="language.language" :institution.sync="language.institution" :score.sync="language.score"
              :presented_at.sync="language.presented_at" :valid_from.sync="language.valid_from"
              :valid_to.sync="language.valid_to" :language_domain.sync="language.language_domain"
              :conversational_level.sync="language.conversational_level" :reading_level.sync="language.reading_level"
              :writing_level.sync="language.writing_level" :exam_presented.sync="language.exam_presented"
              :kind_of_exam.sync="language.kind_of_exam" :documentos.sync="language.required_documents"
              @delete-item="eliminaLenguaExtranjeraFromList" >
            </language-skills>

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
    
      <!-- Environment Related Skills -->
      <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-environment-related-skills variant="dark"
            :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Environment Related Skills</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-environment-related-skills" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <environment-related-skills v-for="(env, index) in enviroment_related_skills" v-bind="env"
            v-bind:key="`${index}-${env.id}-Environment`" :index="index + 1"
            :message_review.sync="env.message_review"
            :archive_id="env.archive_id"
            :id="env.id"></environment-related-skills>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Work experiences -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-working-experiences variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Working Experiences
            </p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-working-experiences" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <working-experiece v-for="(experience, index) in appliant_working_experiences" v-bind="experience"
              v-bind:key="`${index}-${experience.id}-$WorkingExperience}`" :index="index + 1"
              :state.sync="experience.state" :institution.sync="experience.institution"
              :working_position.sync="experience.working_position" :from.sync="experience.from" :to.sync="experience.to"
              :knowledge_area.sync="experience.knowledge_area"
              :working_position_description.sync="
                experience.working_position_description" 
                :images_btn="images_btn"
              @delete-item="eliminaExperienciaLaboralFromList">

            </working-experiece>

            <div class="row align-items-center my-1">
              <div class="col-lg-12">
                <b-button pill class="d-flex" @click="agregaHistorialAcademico" variant="danger"
                  v-b-popover.hover="'Add another register for working experiences'" title="New Register"
                  :style="styleBtnAccordionSection">
                  <b-icon icon="plus-lg" class="mx-2" font-scale="2"></b-icon>
                  <p class="h4 my-2">Add</p>
                </b-button>
              </div>
            </div>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Special reasons for your choice of the Master Program -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-reasons-to-choise variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Special reasons for your choice of the Master Program</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-reasons-to-choise" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <reasons-to-choise v-for="(rea, index) in reasons_to_choise" v-bind="rea"
              v-bind:key="`${index}-${rea.id}-$ReasonsToChoise}`" :index="index + 1"
              :archive_id="archive_id" :images_btn="images_btn" 
              :first_choise.sync="rea.first_choise"
              :reasons_choise.sync="rea.reasons_choise" 
              :other_choises.sync="rea.other_choises" 
              :selected_choises.sync="rea.selected_choises"
              >
            </reasons-to-choise>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>


    <!-- Future Plans and Expectations -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-future-plans variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Future plans and expectations</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-future-plans" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <future-plans-expectations  v-for="(plansEx, index) in future_plans" v-bind="plansEx"
              v-bind:key="`${index}-${plansEx.id}-$ReasonsToChoise}`" :index="index + 1"
              :images_btn="images_btn"
              :archive_id="archive_id"
              :pursue_future.sync="plansEx.pursue_future"
              :explain_pursue_future.sync="plansEx.explain_pursue_future"
              ></future-plans-expectations>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Fields of interest -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-fields-of-interest variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Fields of interests</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-fields-of-interest" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <fiels-of-interest  v-for="(foi, index) in fields_of_interest" v-bind="foi"
              v-bind:key="`${index}-${foi.id}-$FieldsOfInterest}`" :index="index + 1"
              :images_btn="images_btn"
              :archive_id="archive_id"
              :keywords_proyect_idea="foi.keywords_proyect_idea"
              :proyect_idea="foi.proyect_idea"
              :research_area_mexico.sync="foi.research_area_mexico"
              :research_area_german.sync="foi.research_area_german"
              :professor_research_german.sync="foi.professor_research_german"
              :professor_research_mexico.sync="foi.professor_research_mexico"
              :elective_modules_PMPCA.sync="foi.elective_modules_PMPCA"
              :elective_modules_ITT.sync="foi.elective_module_ITT"
            ></fiels-of-interest>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Financing your studies and stay abroad -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-financing-studies variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Financing your studies and Stay abroad</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-financing-studies" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <financing-studies  v-for="(fs, index) in financing_studies" v-bind="fs"
              v-bind:key="`${index}-${fs.id}-$FinancingStudies`" :index="index + 1"
              :financing_options.sync="fs.financing_options"
            ></financing-studies>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>


    <!-- Letters of recommendation -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-letters-of-recommendation variant="dark"
            :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">Letters of recommendation</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-letters-of-recommendation" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <letters-of-recommendation v-for="(rl_enrem, index) in recommendation_letter_enrem" v-bind="rl_enrem"
              v-bind:key="`${index}-${rl_enrem.id}-$RecommendationLetterENREM`" :index="index + 1"
              :archive_id="archive_id"
              :images_btn="images_btn"
              :type.sync="rl_enrem.type"
              :date.sync="rl_enrem.date"
              :title.sync="rl_enrem.title"
              :position.sync="rl_enrem.position"
              :organization.sync="rl_enrem.organization"
              :telephone.sync="rl_enrem.telephone"
              :full_name="rl_enrem.full_name"
              :email="rl_enrem.email"
              ></letters-of-recommendation>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

    <!-- Letters of recommendation -->
    <div class="col-12">
      <b-card no-body class="my-2" :style="styleContainerAccordionSection">
        <b-card-header header-tag="header" class="p-1" role="tab" :style="styleHeaderContainerAccordionSection">
          <b-button block v-b-toggle.accordion-hear-about-program variant="dark" :style="styleBtnAccordionSection">
            <b-icon icon="arrow-up" class="mx-4" font-scale="2" style="border:10px"></b-icon>
            <p class="h2 my-2">How did you hear about this master programme?</p>
          </b-button>
        </b-card-header>
        <b-collapse id="accordion-hear-about-program" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <hear-about-program 
            
            ></hear-about-program>
          </b-card-body>
        </b-collapse>
      </b-card>
      <hr class="d-block" :style="ColorStrip" />
    </div>

  

    <div class="d-flex justify-content-start align-items-center mb-4">
      <div class="col-lg-12">

        <b-button style="width:100%; height:75px;" @click="EnviarExpediente" variant="primary">
          <p class="h3"> Send responses </p>
        </b-button>
      </div>
    </div>
  </div>
</template>
  
<script>
import WorkingExperiece from './WorkingExperience.vue';
import SecondaryEducation from './SecondaryEducation.vue'
import ReasonsToChoise from './ReasonsToChoise.vue';
import PersonalData from './PersonalData.vue';
import LettersOfRecommendation from './LettersOfRecommendation';
import LanguageSkills from './LanguageSkills.vue';
import HigherEducation from './HigherEducation.vue';
import HearAboutProgram from './HearAboutProgram.vue';
import FuturePlansExpectations from './FuturePlansExpectations.vue';
import FinancingStudies from './FinancingStudies.vue';
import FielsOfInterest from './FieldsOfInterest.vue';
import EnvironmentRelatedSkills from './EnvironmentRelatedSkills.vue';
import CorrespondenceAddress from './CorrespondenceAddress.vue';
import CheckboxPersonalize from './CheckboxPersonalize.vue';


export default {
  name: "solicitud-postulante",

  components: {
    WorkingExperiece,
    SecondaryEducation,
    ReasonsToChoise,
    PersonalData,
    LettersOfRecommendation,
    LanguageSkills,
    HigherEducation,
    HearAboutProgram,
    FuturePlansExpectations,
    FinancingStudies,
    FielsOfInterest,
    EnvironmentRelatedSkills,
    CorrespondenceAddress,
    CheckboxPersonalize,
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


  props: {
    recommendation_letter_enrem:Array,
    financing_studies:Array,
    fields_of_interest:Array,
    future_plans:Array,
    secondary_education: Array,
    address: Array,
    
    enviroment_related_skills:Array,

    reasons_to_choise: Array,
    
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

    // Correspondence address
    correspondence_address : Array, 

  },


  created() {
   
  },

  data() {
    return {
      Countries: [],
      myUniversities: [],
      EnglishExams: [],
      EnglishExamTypes: [],
      defaultLanguageCode: "es",
      defaultPageLanguageCode: "es-MX",
      images_btn: [],
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
    EnviarExpediente() {
      Swal.fire({
        title: "¿Estas seguro que todo esta completo?",
        text: "Estas a punto de enviar tu expediente, se revisara y se validara, caso contrario te haremos saber de los cambios necesarios",
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
              status: 2,
            })
            .then((response) => {
              Swal.fire({
                title: "Tu expediente ha sido actualizado",
                text: "Te recomendamos estar al pendiente del correo que registraste con nosotros para cualquier aviso y/o cambio",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar",
              }).then((result) => {
                window.location.href = "/controlescolar/home";
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
    },

    isENREM() {
      let res = false;
      if (this.academic_program.alias === 'enrem') {
        res = true;
      }
      return res;
    },

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
  
  