<template>
  <!-- Modal -->
  <div class="modal fade" id="DetalleEntrevista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog detalle-entrevista" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-blue text-center">
          <h5 class="modal-title" id="exampleModalLabel"> Registro de entrevistas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="prevent">
            <div class="row mx-3 mt-3">
              <div class="col-lg-6 px-0">
                <h5 class="d-block fecha"> {{ date }} </h5>
                <!-- <h5 class="d-block postulante mt-3"> {{ appliant }} </h5> -->
                <!-- <p class="d-block mt-3 mb-0 prof-carta-intencion"> Carta de intención otorgada por: </p>
                <p class="d-block mt-0 prof-carta-intencion"> {{ professor }} </p> -->
              </div>
              <div class="col-lg-6 my-auto px-0">
                <p class="d-block mt-0 sala"> {{ room }}, {{ start_time }} - {{ end_time }} </p>
              </div>
              <div class="col-12 table-responsive px-0">
                <table class="table">
                  <thead class="areas-academicas">
                    <tr>
                      <th v-for="area in areas" :key="area.id">
                        <h5 class="d-block my-auto"> {{ area.name }} </h5>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td v-for="(area, index) in areas" :key="index">
                        <p class="prof-area" v-if="area.professor_name !== false"> {{ area.professor_name }} </p>
                        <a v-else-if="(isSubscribed == false && $root.loggedUserIsSchoolControl() == false && confirmed == false)" href="#"
                          @click="inscribirUsuario(index)">
                          <p> Inscribirme </p>
                        </a>
                        <a v-if="canRemoveUser(area)" href="#" @click="cancelarRegistro(index)">
                          <p> Cancelar registro </p>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-12 mt-4 px-0">
                <p class="d-block prof-carta-intencion mb-4" for="exampleFormControlSelect1">
                  Redactor del dictamen general: {{ dictamen_redactor }}
                </p>
                <div v-if="($root.loggedUserIsSchoolControl() === true && isConfirmable) || $root.loggedUserIsAdmin() === true" class="form-group">
                  <label for="exampleFormControlSelect1">Cambiar redactor </label>
                  <select 
                    class="form-control" 
                    id="exampleFormControlSelect1"
                    v-model="redactor"
                    @change="setRedactor()"
                    >
                    <option value="null">Selecciona un nuevo redactor</option>
                    <option v-for="area in notEmptyAreas" :key="area.id" :value="area"> {{ area.professor_name }} </option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal_footer d-flex flex-row align-items-center justify-content-end m-3 ">
          <button 
            :disabled="dictamen_redactor == 'Indefinido'" 
            v-if="isConfirmable && !spinnerVisible" 
            class="btn btn-primary" 
            @click="confirmaEntrevista"
            > 
            Confirmar entrevista
          </button>
          <button class="btn btn-primary" disabled v-if="spinnerVisible">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
            </span>
            Confirmando entrevista...
          </button>
          <button v-if="isReopenable" class="btn btn-primary" @click="reabreEntrevista"> Reabrir
            entrevista </button>
          <button v-if="isRemovable" class="btn btn-danger ml-1" @click="eliminarEntrevista"> Cancelar
            entrevista </button>
          <button class="btn btn-danger ml-1" type="button" data-dismiss="modal" aria-label="Close">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
tfoot>tr>td>button {
  color: white;
  font-family: 'Myriad Pro Bold';
}
</style>
<script>
export default {
  name: "detalle-entrevista",

  mounted(){
    this.redactor = null;
  },

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
      type: String,
      default: "Indefinido"
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
    dictamen_redactor: {
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

    // La entrevista ya fue confirmada.
    confirmed: {
      type: Boolean,
      default: false
    }


  },

  computed: {
    notEmptyAreas(){
      let fill_areas = this.areas.filter(area => area.professor_name !== false);
      return fill_areas;
    },

    loggedUserName() {
      let loggedUser = this.$root.loggedUser;

      return (loggedUser.name + " " + loggedUser.middlename + " " + loggedUser.surname).toLowerCase();
    },

    isSubscribed() {
      let loggedUser = this.loggedUserName;

      return this.areas.some(area => {
        // console.log("Esta inscrito: " + area.professor_name);
        return area.professor_name && area.professor_name === loggedUser;
      });
    },

    isReopenable() {
      return this.confirmed === true && this.$root.loggedUserIsAdmin();
    },

    isConfirmable() {

      // Entrevista ya confimada
      if (this.confirmed === true)
        return false;

      // Validacion de roles
      return this.$root.loggedUserIsSchoolControl() || this.$root.loggedUserIsAdmin();
      /*
      return this.areas.filter(area => {
        return area.professor_name !== false;
      
      }).length > 2;*/
    },

    isRemovable() {
      return !this.confirmed && (this.$root.loggedUserIsAdmin() || this.$root.loggedUserIsSchoolControl());
    },

    Confirmed: {
      get() {
        return this.confirmed;
      },
      set(value) {
        this.$emit('update:confirmed', value);
      }
    }
  },

  data() {
    return {
      spinnerVisible: false, 
      redactor: null
    }
  },

  methods: {
    setRedactor(){
      let data = {
        interview_id: this.id,
        professor_id: this.redactor.professor_id
      };
      axios.post('/controlescolar/entrevistas/setDictamenRedactor', data).then(response => {
        this.dictamen_redactor = this.redactor.professor_name,
        this.redactor = null
        // console.log(response.data)
      }).catch(error => {
      });
    },

    canRemoveUser(area) {
      if (area.professor_name === false)
        return false;

      if (this.confirmed === true)
        return false;

      // Cancelar - solo por el profesor inscrito y el administrador
      return this.loggedUserName === area.professor_name || this.$root.loggedUserIsAdmin();
    },

    inscribirUsuario(index) {
    if(this.loggedUserName != this.professor )
    {

      if (confirm('¿Estás seguro(a) que deseas participar en esta entrevista?') === false)
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
        // console.log("Usuario inscrito: " + response.data.name);

        Vue.set(this.areas, index, result);
      }).catch(error => {
      });

      return false;
    }
    else
      alert('El profesor que otorgó la carta de intención no puede inscribirse a la entrevista');
    },

    cancelarRegistro(index) {
      if (confirm('¿Estás seguro(a) que deseas cancelar tu participación en la entrevista?') === false)
        return false;

      // console.log(this.$root.loggedUser);

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

    confirmaEntrevista() {
      //Cambio de botón pa que de vueltitas :v
      this.spinnerVisible = true;

      if (confirm('¿Estás seguro(a) que deseas confirmar esta entrevista?') === false)
        return false;

      axios.post('/controlescolar/entrevistas/confirmInterview', {
        id: this.id,
        alumno: this.appliant,
        room: this.room,
      }).then(response => {
        // console.log(response.data);
        this.Confirmed = true;
        this.spinnerVisible = false;
        $('#DetalleEntrevista').modal('hide');
      }).catch(error => {
        this.spinnerVisible = false;
      });

      return false;
    },

    reabreEntrevista() {
      if (confirm('¿Estás seguro(a) que deseas reabrir esta entrevista?') === false)
        return false;

      axios.post('/controlescolar/entrevistas/reopenInterview', {
        id: this.id
      }).then(response => {
        this.Confirmed = false;
        $('#DetalleEntrevista').modal('hide');
      }).catch(error => {
      });

      return false;
    },

    eliminarEntrevista() {
      if (confirm('¿Estás seguro(a) que deseas eliminar esta entrevista?') === false)
        return false;

      axios.post('/controlescolar/entrevistas/deleteInterview', {
        id: this.id
      }).then(response => {
        // console.log(response.data)
        this.$emit('interview_deleted', this.id);
        $('#DetalleEntrevista').modal('hide');
      }).catch(error => {
      });

      return false;
    },

    prevent() {
      return false;
    }
  },
};
</script>