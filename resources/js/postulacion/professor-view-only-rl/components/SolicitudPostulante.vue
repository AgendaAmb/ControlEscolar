<template>
  <div class="row justify-content-start align-items-center mx-1">
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
            <requisitos-ingreso :archive_id.sync="archive_id" :motivation.sync="motivation" :exanni_score.sync="exanni_score"
              :documentos.sync="entrance_documents" :user_id.sync="appliant.id" :viewer_id.sync="viewer.id"
              :images_btn="images_btn" :alias_academic_program.sync="academic_program.alias">
            </requisitos-ingreso>
          </b-card-body>
        </b-collapse>
      </b-card>
    </div>



  </div>
</template>

<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";
import RequisitosIngreso from "./RequisitosIngreso.vue";
export default {
  name: "solicitud-postulante",

  components: {
    RequisitosIngreso,
    DocumentoRequerido
  },

  computed:{
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
    styleContainerAccordionSection() {
      return {
        border: 'none',
      }
    }
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

    //archivos arreglo de {id_archive_required_docuent, id_archive, location}
    archives_recommendation_letters: Array,

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
    console.log(this.entrance_documents);
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
      images_btn: {},
    };
  },


};
</script>

