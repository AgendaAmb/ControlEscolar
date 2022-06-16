<template>
  <a class="row mx-3 card my-1" @click="showDetails">
    <div class="col-12 text-left">
      <h5 class="my-1 appliant"> {{ appliant }} </h5>
      <div class="row">
        <div class="col-6">
          <p class="mt-1 mb-0 detail"> Carta de intención otorgada por: </p>
          <p class="my-0"> {{ professor }} </p>
        </div>
        <div v-if="site.includes('Zoom')" class="col-6">
          <p class="mt-2 mb-0 detail" v-if="confirmed"> Enlace de la reunión: </p>
          <p class="my-0" v-if="confirmed"> <a :href="url" target="_blank">{{ url }}</a> </p>
        </div>
        <div v-else>
          <p class="mt-2 mb-0 detail" v-if="confirmed"> Reunión presencial </p>
        </div>
      </div>
      <p class="my-2 detail text-right"> {{ site }} , {{ start_time }} - {{ end_time }}</p>
    </div>
  </a>
</template>

<style scoped>
.appliant {
  font-family: 'Myriad Pro Bold';
  color: #115089;
  display: block;
  text-transform: capitalize;
}

.detail {
  font-family: 'Myriad Pro Regular';
  font-size: 13px;
  color: #115089;
  display: block;
}

p.detail+p:not(.detail) {
  font-family: 'Myriad Pro Bold';
  font-size: 13px;
  color: #115089;
  text-transform: capitalize;
}

.card {
  cursor: hand;
  text-decoration: none;
}

.card:hover {
  border: 1px solid #115089;
}
</style>

<script>
export default {
  name: "interview",

  props: {
    site: {
      type: String,
      default: "Indefinido"
    },
    // Clave de la entrevista.
    id: {
      type: Number,
      default: -1
    },

    // Nombre del postulante de la entrevista.
    appliant: {
      type: String,
      default: "Indefinido"
    },

    // Nombre del postulante de la entrevista.
    date: {
      type: String,
      default: "Indefinido"
    },

    // Profesor que otorgó la carta de intención
    professor: {
      type: String,
      default: "Indefinido"
    },

    // Número de sala.
    room: {
      type: Number,
      default: -1
    },

    // Hora de inicio.
    start_time: {
      type: String,
      default: "Indefinido"
    },

    // Hora de fin.
    end_time: {
      type: String,
      default: "Indefinido"
    },

    // Hora de fin.
    confirmed: {
      type: Boolean,
      default: false
    },

    // Hora de inicio.
    url: {
      type: String,
      default: "Indefinido"
    },
    // Áreas académicas.
    areas: {
      type: Array,
      default() {
        return [];
      }
    }
  },

  methods: {
    showDetails() {
      this.$root.$emit('show_details', this);

      return false;
    }
  }
};
</script>