<template>
  <!-- Modal -->
  <div class="modal fade" id="DetalleEntrevista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog detalle-entrevista" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-blue text-center">
          <h5 class="modal-title" id="exampleModalLabel"> Registro de entrevistas </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="creaPeriodo">
            <div class="row mx-3 mt-3">
              <div class="col-lg-6 px-0">
                <h5 class="d-block fecha"> {{date}} </h5>
                <h5 class="d-block postulante mt-3"> {{appliant}} </h5>
                <p class="d-block mt-3 mb-0 title-prof-carta-intencion"> Carta de intención otorgada por: </p>
                <p class="d-block mt-0 prof-carta-intencion"> {{professor}} </p>
              </div>
              <div class="col-lg-6 my-auto px-0">
                <p class="d-block mt-0 sala"> Sala {{room}}, {{start_time}} - {{end_time}} </p>
              </div>
              <div class="col-12">
                <table class="table">
                  <thead class="areas-academicas">
                    <tr>
                      <th v-for="area in areas" :key="area.id">
                        <h5 class="d-block my-auto"> {{area.name}} </h5>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td v-for="area in areas" :key="area.id">
                        <p> {{area.professor_name}} </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!--
                <div class="row justify-content-between my-auto">
                  
                  <div v-for="area in areas" :key="area.id" class="col-2 px-0 my-auto">
                    <h5 class="d-block areas-academicas my-auto py-3 px-3"> {{area.name}} </h5>
                    <a class="registrar-participacion py-3" href="#">
                      <p> {{area.professor_name}} </p>
                    </a>
                  </div>
                  <div v-for="area in areas" :key="area.id" class="col-2 my-auto">
                    <h5 class="d-block my-auto"> {{area.name}} </h5>
                  </div>
                </div>-->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.detalle-entrevista {
  max-width: 750px;
}

.modal-header.modal-header-blue, .modal-footer button.btn-primary, .areas-academicas {
  background-color: #115089;
  font-family: 'Myriad Pro Bold';
  color: white;
}

.areas-academicas {
  text-align: center;
  font-size: 13px;
  text-transform: capitalize;
}

.modal-body label, .title-prof-carta-intencion, .sala {
  color: #115089;
}

.modal-body .fecha, .prof-carta-intencion {
  font-family: 'Myriad Pro Bold';
  color: #115089;
}

.registrar-participacion {
  background-color: white;
  color: #115089;
  font-family: 'Myriad Pro Regular';
  display: block;
  font-size: 12px;
  text-transform: capitalize;
  text-align: center;
}

.prof-carta-intencion {
  text-transform: capitalize;
}

.fecha::first-letter {
  text-transform: capitalize;
}

.modal-body .postulante {
  font-family: 'Myriad Pro Bold';
  color: #fecc56;
  text-transform: capitalize;
}

.modal-footer button.btn-secondary {
  color: white;
  font-family: 'Myriad Pro Bold';
}
</style>

<script>
export default {
  name: "detalle-entrevista",

  props: {
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

    // Áreas académicas de las entrevistas.
    areas: {
      type: Array,
      default() {
        return [];
      }
    },

    // Teachers
    users: {
      type: Array,
      default() {
        return [];
      }
    }
  },

  computed: {
  },

  methods: {
    creaPeriodo() {
    }
  },
};
</script>