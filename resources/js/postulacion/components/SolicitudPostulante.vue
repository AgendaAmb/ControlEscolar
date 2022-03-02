<template>
  <div class="row">
    <div class="col-12">
      <h2 class="my-5 d-block font-weight-bold"> Datos Personales </h2>
      <postulante 
        v-bind="appliant"
        :archive_id="archive_id"
        :documentos.sync="personal_documents">
      </postulante>
      <hr class="d-block" :style="ColorStrip">
    </div>
  
    <div class="col-12">
    <details>
    <summary>
      <h2 class="mb-5 d-block font-weight-bold"> Historial académico </h2>
    </summary>
      <grado-academico v-for="grado in academic_degrees"
        v-bind="grado"
        v-bind:key="grado.id"
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
        :required_documents.sync="grado.required_documents"
        :paises="Countries"
        @gradoAcademicoAgregado="gradoAcademicoAgregado"> 
      </grado-academico>
    </details>
      <hr class="my-4 d-block" :style="ColorStrip">
    </div>

  <details>
    <summary>
      <h2 class="my-4 col-12"><strong> Requisitos de ingreso </strong></h2> 
    </summary>  
    <requisitos-ingreso
      :archive_id="archive_id"
      :motivation.sync="motivation"
      :documentos.sync="entrance_documents">
    </requisitos-ingreso>
  </details> 
    <hr class="my-4 col-12" :style="ColorStrip">

    <div class="col-12">
      <details>
        <summary>
      <h2 class="my-4 d-block"><strong> Dominio de idiomas </strong></h2>
      </summary>
      <lengua-extranjera v-for="language in appliant_languages"
        v-bind="language"
        v-bind:key="language.id"
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
        :documentos.sync="language.required_documents">
      </lengua-extranjera>
      </details>
      <hr class="my-4 d-block" :style="ColorStrip">
    </div>

    <div class="col-12">
      <details>
        <summary>
          <h2 class="my-4 d-block"><strong> Experiencia laboral (Opcional) </strong></h2>
        </summary>
      
      <experiencia-laboral v-for="experience in appliant_working_experiences"
        v-bind="experience"
        v-bind:key="experience.id"
        :state.sync="experience.state"
        :institution.sync="experience.institution"
        :working_position.sync="experience.working_position"
        :from.sync="experience.from"
        :to.sync="experience.to"
        :knowledge_area.sync="experience.knowledge_area"
        :field.sync="experience.field"
        :working_position_description.sync="experience.working_position_description"
        :achievements.sync="experience.achievements">
      </experiencia-laboral>
      </details>
      <hr class="my-4 d-block" :style="ColorStrip">
    </div>

    <div class="col-12">
      <details>
        <summary>
      <h2 class="my-4 d-block"><strong> Producción científica (Opcional)</strong></h2>
      </summary>
      <produccion-cientifica v-for="production in scientific_productions"
        v-bind="production"
        v-bind:key="production.id"
        :state.sync="production.state"
        :type.sync="production.type"
        :title.sync="production.title"
        :publish_date.sync="production.publish_date"
        :magazine_name.sync="production.magazine_name"
        :article_name.sync="production.article_name"
        :institution.sync="production.institution"
        :post_title.sync="production.post_title">
      </produccion-cientifica>
    </details>
      <hr class="my-4 d-block" :style="ColorStrip">
    </div>

    <div class="col-12">
      <details>
        <summary>
          <h2 class="my-4 d-block"><strong> Capital humano (cursos impartidos)[Opcional] </strong></h2>
        </summary>
      <capital-humano v-for="humanCapital in human_capitals"
        v-bind="humanCapital"
        v-bind:key="humanCapital.id"
        :course_name.sync="humanCapital.course_name"
        :assisted_at.sync="humanCapital.assisted_at"
        :scolarship_level.sync="humanCapital.scolarship_level">
      </capital-humano>
      </details>
       <hr class="my-4 d-block" :style="ColorStrip">
    </div>

    <div class="col-12">
      <details>
        <summary>
      <h2 class="my-4 d-block"><strong> Carta de recomendación </strong></h2>
      </summary>
      <carta-recomendacion 
       :appliant = "appliant"
       :academic_program = "academic_program"
       :recommendation_letters = "recommendation_letters"
       :archives_recommendation_letters = "archives_recommendation_letters"
      />
    </details>
      <hr class="my-4 d-block" :style="ColorStrip">
    </div>
  </div>
</template>

<script>

import Postulante from './Postulante.vue';
import GradoAcademico from './GradoAcademico.vue';
import CapitalHumano from './CapitalHumano.vue';
import ProduccionCientifica from './ProduccionCientifica.vue';
import ExperienciaLaboral from './ExperienciaLaboral.vue';
import LenguaExtranjera from './LenguaExtranjera.vue';
import RequisitosIngreso from './RequisitosIngreso.vue';
import CartaRecomendacion from './CartaDeRecomendacion.vue';


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
    CartaRecomendacion
  },

  props: {
    // Id del expediente.
    archive_id: Number,

    // Documentos personales.
    personal_documents: Array,

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
    archives_recommendation_letters:Array,

    //Cartas de recomendacion Arreglo que contiene correos
    recommendation_letters:Array,

    // Postulante de la solicitud.
    appliant: Object
  },

  computed: {
    ColorStrip: {
      get(){

        var color = "#FFFFFF";

        switch(this.academic_program.alias)
        {
          case 'maestria': color = "#0598BC"; break;
          case 'doctorado': color = "#FECC50"; break;
          case 'enrem': color = "#118943"; break;
          case 'imarec': color = "#"; break;
        }

        return {
          backgroundColor: color,
          height: '1px'
        };
      }
    }
  },

  data(){
    return {
      Countries: [],
      CountryUniversities:[],
      EnglishExams: [],
      EnglishExamTypes: []
    };
  },

  mounted: function() {
    this.$nextTick(function () {
      axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries/universities')
      .then(response => {
        this.Countries = response.data;
      });

      axios.get('https://ambiental.uaslp.mx/apiagenda/api/englishExams')
      .then(response => {
                
        this.EnglishExams = response.data;
      });
    });
  },

  methods: { 
    gradoAcademicoAgregado(grado){
      var url = '/controlescolar/solicitud/' + archive.id + '/latestAcademicDegree';

      axios.get(url)
      .then(response => {
        archive.academic_degrees.push(response.data);
      
      }).catch(error => {
        
      });
    }
  }
};
</script>

