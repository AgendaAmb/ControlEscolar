<template>
  <div class="modal fade" id="NuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="px-2 modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3" style="background-color: #B0BEC5">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Nuevo trabajador</h2>
          <b-icon data-dismiss="modal" scale="3" aria-label="Close" icon="x-circle"></b-icon>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="registraUsuario">
            <div class="row">
              <div class="col-md-4">
                <label> Coloca el RPE </label>
                <input type="text" class="form-control" v-model="id">
              </div>
            </div>
            <div class="row">
              <div class="mt-5 col-lg-6 col-xl-3">
                <h4> Roles </h4>
                <div v-for="role in roles" :key="role.id" class="form-check">
                  <!-- <b-form-checkbox switch v-model="selected_roles" size="lg">
                    <p class="h5">{{ getName(role.name) }}</p>
                  </b-form-checkbox> -->
                  <input class="form-check-input" type="checkbox" :value="role.id" v-model="selected_roles">
                  <label class="form-check-label"> {{ role.name }} </label>
                </div>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4> Áreas académicas </h4>
                <div v-for="area in academic_areas" :key="area.id" class="form-check">
                  <input class="form-check-input" type="checkbox" :value="area.id" v-model="selected_academic_areas">
                  <label class="form-check-label"> {{ area.name }} </label>
                </div>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4> Entidades académicas </h4>
                <div v-for="entity in academic_entities" :key="entity.id" class="form-check">
                  <input class="form-check-input" type="checkbox" :value="entity.id"
                    v-model="selected_academic_entities">
                  <label class="form-check-label"> {{ entity.name }} </label>
                </div>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4> Comités académicos </h4>
                <div v-for="comitte in academic_comittes" :key="comitte.id" class="form-check">
                  <input class="form-check-input" type="checkbox" :value="comitte.id"
                    v-model="selected_academic_comittes">
                  <label class="form-check-label"> {{ comitte.name }} </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="px-0 my-3 modal-footer justify-content-start">
          <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE"
            @click="registraUsuario">Registrar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "nuevo-usuario",
  props: {
    // Roles de usuario.
    roles: Array,

    // Áreas académicas.
    academic_areas: Array,

    // Entidades académicas.
    academic_entities: Array,

    // Comités académicas.
    academic_comittes: Array,
  },

  data() {
    return {
      id: null,
      selected_roles: [],
      selected_academic_areas: [],
      selected_academic_entities: [],
      selected_academic_comittes: []
    };
  },

  methods: {
    getName(name) {
      let local_name = "";
      switch (name) {
        case 'admin':
          local_name = 'Administrador';
          break;
        case 'aspirante_extranjero':
          local_name = 'Aspirante Extranjero';
          break;
        case 'aspirante_foraneo':
          local_name = 'Aspirante Local';
          break;
        case 'comite_academico':
          local_name = 'Comité Academico';
          break;
        case 'control_escolar':
          local_name = 'Control Escolar';
          break;
        case 'coordinador':
          local_name = 'Coordinador';
          break;
        case 'personal_apoyo':
          local_name = 'Personal de Apoyo';
          break;
        case 'profesor_colaborador':
          local_name = 'Profesor colaborador';
          break;
        case 'profesor_nb':
          local_name = 'Profesor Nucleo Básico';
          break;
        case 'UASLP_FACULTAD DE CIENCIAS QUÍMICAS':
          local_name = 'Facultad de Ciencias Químicas';
          break;
        case 'UASLP_FACULTAD DE INGENIERÍA':
          local_name = 'Faculdata de Ingeniería';
          break;
        case 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS':
          local_name = 'Instituto de investigación de zonas desérticas';
          break;
        case 'UASLP_FACULTAD DE AGRONOMÍA':
          local_name = 'Facultad de Agronomía';
          break;
        case 'UASLP_COORDINACIÓN ACADÉMICA REGIÓN ALTIPLANO':
          local_name = 'Coordinación Académica (Altiplano)';
          break;
        case 'UASLP_CIACYT':
          local_name = 'CIACYT';
          break;
        case 'UASLP_FACULTAD DE MEDICINA':
          local_name = 'Facultad de Medicina';
          break;
        case 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES':
          local_name = 'Facultad de Ciencias Sociales y Humanidades';
          break;
        case 'FACULTAD DE PSICOLOGÍA':
          local_name = 'Facultad de Psicología';
          break;
        case 'UASLP_FACULTAD DE INGENIERÍA':
          local_name = 'Administrador';
          break;
        case 'UASLP_UNIDAD ACADÉMICA MULTIDISCIPLINARIA ZONA HUASTECA':
          local_name = 'Unidad Académica Multidisciplinaria (Huasteca)';
          break;
        case 'UASLP_FACULTAD DE DERECHO':
          local_name = 'Facultad de Derecho';
          break;
        case 'UASLP_FACULTAD DEL HÁBITAT':
          local_name = 'Facultad del Hábitad';
          break;
        default:
          local_name = this.name;
          break;
      }

      return name;
    },

    registraUsuario() {

      // console.log("academic areas: ", this.selected_academic_areas);
      // console.log("roles : ", this.selected_roles);
      // console.log("academic entities : ", this.selected_academic_entities);
      // console.log("academic_comittes : ", this.selected_academic_comittes);

      axios.post('/controlescolar/admin/newWorker', {
        id: this.id,
        type: 'workers',
        selected_roles: this.selected_roles,
        selected_academic_areas: this.selected_academic_areas,
        selected_academic_entities: this.selected_academic_entities,
        selected_academic_comittes: this.selected_academic_comittes
      }).then(response => {
        Swal.fire({
          title: "Exito",
          text: "Se ha agregado un nuevo usuario a la lsita",
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
        });

        console.log(response);
      }).catch(error => {
        console.log(error);
      });
    },
  }
};
</script>