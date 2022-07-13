<template>
  <div class="row my-2">
    <!-- Requisitos de ingreso -->
    <div class="col-12 my-2">
      <details>
        <summary class="mb-4 font-weight-bold h3">
          Requisitos de ingreso
        </summary>
        <requisitos-ingreso :archive_id="archive_id" :motivation.sync="motivation" :exanni_score.sync="exanni_score"
          :documentos.sync="entrance_documents" :user_id.sync="appliant.id" :viewer_id.sync="viewer.id"
          :images_btn="images_btn"
          :alias_academic_program.sync="academic_program.alias">
        </requisitos-ingreso>
      </details>
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
      images_btn: {},
    };
  },


};
</script>

