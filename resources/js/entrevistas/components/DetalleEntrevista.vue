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
              <div class="col-lg-6">
                <h5 class="d-block fecha"> Lunes 4 de octubre, 2021 </h5>
                <h5 class="d-block postulante mt-3"> Córdova Molina Cynthia del Carmen </h5>
                <p class="d-block mt-3 mb-0 title-prof-carta-intencion"> Carta de intención otorgada por: </p>
                <p class="d-block mt-0 prof-carta-intencion"> Dr. Antonio Cardona Benavides </p>
              </div>
              <div class="col-lg-6 my-auto">
                <p class="d-block mt-0 sala"> Sala 1, 8:00 a 9:30 </p>
              </div>
              <div class="col-12">
                <div class="row mt-3 justify-content-between areas-academicas my-auto py-2">
                  <div class="col-2 my-auto">
                    <h5 class="d-block my-auto"> Evaluación </h5>
                  </div>
                  <div class="col-2 my-auto">
                    <h5 class="d-block my-auto"> Prevención </h5>
                  </div>
                  <div class="col-2 my-auto">
                    <h5 class="d-block my-auto"> Recursos naturales </h5>
                  </div>
                  <div class="col-2 my-auto">
                    <h5 class="d-block my-auto"> Gestión Ambiental </h5>
                  </div>
                  <div class="col-2 my-auto">
                    <h5 class="d-block my-auto"> Salud Ambiental </h5>
                  </div>
                </div>
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

.modal-body label, .title-prof-carta-intencion, .sala {
  color: #115089;
}

.modal-body .fecha, .prof-carta-intencion {
  font-family: 'Myriad Pro Bold';
  color: #115089;
}

.modal-body .postulante {
  font-family: 'Myriad Pro Bold';
  color: #fecc56;
}

.modal-footer button.btn-secondary {
  color: white;
  font-family: 'Myriad Pro Bold';
}
</style>

<script>
export default {
  name: "detalle-entrevista",

  data() {
    return {
      event: {},
      start_date: null,
      end_date: null,
      num_salas: 1,
    };
  },

  methods: {
    creaPeriodo() {
    },
  }
};
</script>