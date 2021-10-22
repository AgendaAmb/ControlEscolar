<template>
  <div class="modal fade" id="NuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3 px-2" style="background-color: #8b96a8">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Nuevo trabajador</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
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
              <div class="col-lg-6 col-xl-3 mt-5">
                <h4> Roles </h4>
                <div v-for="role in roles" :key="role.id" class="form-check">
                    <input class="form-check-input" type="checkbox" :value="role.id" v-model="selected_roles">
                    <label class="form-check-label"> {{ role.name }} </label>
                </div>
              </div>

              <div class="col-lg-6 col-xl-3 mt-5">
                <h4> Áreas académicas </h4>
                <div v-for="area in academic_areas" :key="area.id" class="form-check">
                    <input class="form-check-input" type="checkbox" :value="area.id" v-model="selected_academic_areas">
                    <label class="form-check-label"> {{ area.name }} </label>
                </div>
              </div>

              <div class="col-lg-6 col-xl-3 mt-5">
                <h4> Entidades académicas </h4>
                <div v-for="entity in academic_entities" :key="entity.id" class="form-check">
                    <input class="form-check-input" type="checkbox" :value="entity.id" v-model="selected_academic_entities">
                    <label class="form-check-label"> {{ entity.name }} </label>
                </div>
              </div>

              <div class="col-lg-6 col-xl-3 mt-5">
                <h4> Comités académicos </h4>
                <div v-for="comitte in academic_comittes" :key="comitte.id" class="form-check">
                    <input class="form-check-input" type="checkbox" :value="comitte.id" v-model="selected_academic_comittes">
                    <label class="form-check-label"> {{ comitte.name }} </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-start my-3 px-0">
            <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE" @click="registraUsuario">Registrar</button>
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
    registraUsuario() {
        axios.post('/controlescolar/admin/newWorker', {
            id: this.id,
            type: 'workers',
            selected_roles: this.selected_roles,
            selected_academic_areas: this.selected_academic_areas,
            selected_academic_entities: this.selected_academic_entities,
            selected_academic_comittes: this.selected_academic_comittes
        }).then(response => {

        }).catch(error => {

        });
    },
  },

  mounted() {

  },
};
</script>