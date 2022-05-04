<template>
    <div class="modal fade" :class="{ 'is-active': active }" id="EditaUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="px-2 modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3" style="background-color: #8b96a8">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Nuevo trabajador</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="actualizaUsuario">
            <div class="row">
              <div class="col-md-4">
                <label> Coloca el RPE </label>
                <input type="text" class="form-control" v-model="id">
              </div>
            </div>
            <div class="row">
              <div class="mt-5 col-lg-6 col-xl-3">
                <h4> Roles </h4>
                   <!-- <checkbox-edit
                     v-for="role in roles" :key="role.id" 
                     v-bind="role"
                     :data="roles"
                   ></checkbox-edit> -->
                    <input class="form-check-input" type="checkbox" :value="role.id" v-model="selected_roles">
                    <label class="form-check-label"> {{ role.name }} </label>
                
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
                    <input class="form-check-input" type="checkbox" :value="entity.id" v-model="selected_academic_entities">
                    <label class="form-check-label"> {{ entity.name }} </label>
                </div>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4> Comités académicos </h4>
                <div v-for="comitte in academic_comittes" :key="comitte.id" class="form-check">
                    <input class="form-check-input" type="checkbox" :value="comitte.id" v-model="selected_academic_comittes">
                    <label class="form-check-label"> {{ comitte.name }} </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="px-0 my-3 modal-footer justify-content-start">
            <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE" @click="actualizaUsuario">Registrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>

import CheckboxEdit from "./CheckboxEdit.vue";
export default {
  name: "editar-usuario",
  
  components: {
    CheckboxEdit
  },

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
        active:false,
        id:null,
        selected_roles: [],
        selected_academic_areas: [],
        selected_academic_entities: [],
        selected_academic_comittes: []
    };
  },

  computed: {
    // SelectedRoles: {
    //   get(index) {
    //     return this.selected_roles[index];
    //   },
    //   set(newVal) {
    //     this.$emit("update:publish_date[index]", newVal);
    //   },
    // },
  },

  methods: {

    SelectedRoles(index){
      return true;
    },

    show() {
      this.active = true;
    },

    actualizaUsuario() {
        axios.post('/controlescolar/admin/updateWorker', {
            id: this.id,
            type: 'workers',
            selected_roles: this.selected_roles,
            selected_academic_areas: this.selected_academic_areas,
            selected_academic_entities: this.selected_academic_entities,
            selected_academic_comittes: this.selected_academic_comittes
        }).then(response => {
             Swal.fire({
                title: "El usuario con el id " + this.id + " ha sido modificado",
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
  },

  created() {
    window.Event.$on('toggleModal', (id,roles,academic_areas,academic_entities, academic_comittes) => {
      this.id = id;
      this.selected_academic_areas = academic_areas,
      this.selected_roles = roles,
      this.selected_academic_entities = academic_entities,
      this.selected_academic_comittes = academic_comittes
      this.show();
      console.log('selected_roles: ', this.selected_roles, 
    );
    });
  }
};
</script>