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
          <form @submit.prevent="confirmaEntrevista">
            <div class="row mx-3 mt-3">
              <div class="col-lg-6 px-0">
                <h5 class="d-block fecha"> {{date}} </h5>
                <h5 class="d-block postulante mt-3"> {{appliant}} </h5>
                <p class="d-block mt-3 mb-0 prof-carta-intencion"> Carta de intención otorgada por: </p>
                <p class="d-block mt-0 prof-carta-intencion"> {{professor}} </p>
              </div>
              <div class="col-lg-6 my-auto px-0">
                <p class="d-block mt-0 sala"> Sala {{room}}, {{start_time}} - {{end_time}} </p>
              </div>
              <div class="col-12 table-responsive px-0">
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
                      <td v-for="(area, index) in areas" :key="area.id">
                        <p class="prof-area" v-if="area.professor_name !== false"> {{area.professor_name}} </p>
                        <a v-else-if="!isSuscribed && !$root.loggedUserIsAdmin()" href="#" @click="inscribirUsuario(index)">
                          <p> Inscribirme </p>
                        </a>
                        <a v-if="loggedUserName === area.professor_name" href="#" @click="cancelarRegistro(index)"> 
                          <p> Cancelar registro </p>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5">
                        <button class="btn btn-primary" type="submit"> Confirmar entrevista </button>
                        <button class="btn btn-danger ml-1"> Cerrar </button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
tfoot > tr > td > button {
  color: white;
  font-family: 'Myriad Pro Bold';
}
</style>
<script>
export default {
  name: "detalle-entrevista",

  props: {
    // Id de la entrevista.
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
    },
  },

  computed: {
    loggedUserName(){
      var loggedUser = this.$root.loggedUser;

      return (loggedUser.name + " " + loggedUser.middlename + " " + loggedUser.surname).toLowerCase();
    },

    isSuscribed() {
      var loggedUser = this.loggedUserName;
      
      return this.areas.filter(area => {
        return area.professor_name === loggedUser;
      
      }).length > 0;
    }
  },

  methods: {
    inscribirUsuario(index){
      if (confirm('¿Estás segure que deseas participar en esta entrevista?') === false)
        return false;

      axios.post('/controlescolar/entrevistas/interviewUser', {
        interview_id: this.id,
        user_id: this.$root.loggedUser.id,
        user_type: this.$root.loggedUser.user_type,
      
      }).then(response => {
        const result = {
          id: response.data.id,
          name: response.data.name,
          professor_name: this.loggedUserName
        };

        Vue.set(this.areas, index, result);
      }).catch(error => { 
      });

      return false;
    },

    cancelarRegistro(index){
      if (confirm('¿Estás segure que deseas cancelar tu participación en la entrevista?') === false)
        return false;

      console.log(this.$root.loggedUser);

      axios.delete('/controlescolar/entrevistas/interviewUser', {
        data: {
          interview_id: this.id,
          user_id: this.$root.loggedUser.id,
          user_type: this.$root.loggedUser.user_type,
        }
      }).then(response => {
        Vue.set(this.areas, index, {
          'id': -1,
          'name': 'Área Académica Disponible',
          'professor_name': false,
        });
      }).catch(error => { 

      });

      return false;
    },

    confirmaEntrevista(){
      if (confirm('¿Estás segure que deseas confirmar esta entrevista?') === false)
        return false;

      axios.post('/controlescolar/entrevistas/confirmInterview', {
        interview_id: this.id
      }).then(response => {
        
      }).catch(error => { 
      });

      return false;
    }
  },
};
</script>