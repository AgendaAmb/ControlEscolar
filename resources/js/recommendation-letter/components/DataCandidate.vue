<template>
  <div id="dataCandidate">
    <!-- Inicio de carta  -->
    <p class="h1 titleSection">Formulario de recomendación</p>
    <hr class="d-block titleSection" />

    <!-- datos del candidato 
        nombre                                      Tiempo de convocatoria
        licenciatura                                Postulacion     (Maestria o doctorado)
        nacionalidad                                Area en cargada (Gestion ambiental)

        numero telefonico (agenda ambiental)
        correo electronico (agenda ambiental)
     -->
    <h2>Datos del candidato</h2>
    <div class="d-block d-lg-flex flex-lg-row justify-content-between">
      <div class="d-block d-lg-inline-block">
        <!-- Datos del aplicante -->
        <p class="d-block mb-0 myriad-bold">
          {{
            appliant.name + " " + appliant.middlename + " " + appliant.surname
          }}
        </p>
        <p class="d-block myriad-light appliant-email">
          {{ appliant.nationality }}
        </p>
        <p class="d-block myriad-light appliant-curp">
          {{ appliant.academic_degree }}
        </p>

        <p class="mb-3"></p>
        <p class="mb-1" v-for="(data, index) in areaInCharge" :key="index">
          {{ data }}
        </p>
      </div>
      <div class="d-block d-lg-inline-block">
        <p class="d-block mb-0 myriad-bold">{{ announcement_date }}</p>
        <p class="d-block myriad-light appliant-email">
          {{ announcement.academic_program.name }}
        </p>
        <p class="d-block myriad-light appliant-curp">Agenda Ambiental</p>
      </div>
      <div class="d-block d-lg-inline-block"></div>
    </div>
  </div>
</template>



<script>
const moment = require("moment");
export default {
  name: "data-candidate",

  data(){
    return{
      areaInCharge:{
        phoneNumber: "4441737711",
        mail: "agenda@agenda.mx",
      }
    }
  },


  props: {
    appliant: {
      type: Object,
      default: {
        id: "1",
        name: "ulises",
        grade: "8 semestre",
        nacionality: "mexicana",
      },
    },

    announcement: {
      type: Object,
      default: {
        session: "Febrero 2022",
        postulation: "Maestria 1",
        areaInCharge: "Agenda Ambiental",
      },
    },
  },
  computed: {
    announcement_date() {
      if (this.announcement.to === "") return "";

      var to = moment(this.announcement.to).locale("es-MX").format("MMMM YYYY");
      to = to.charAt(0).toUpperCase() + to.slice(1);

      return "Convocatoria " + to;
    },
  },
};
</script>