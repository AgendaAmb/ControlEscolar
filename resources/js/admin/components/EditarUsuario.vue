<template>
  <div
    class="modal fade"
    :class="{ 'is-active': active }"
    id="EditaUsuario"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div
        class="px-2 modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3"
        style="background-color: #8b96a8"
      >
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Editar trabajador</h2>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="actualizaUsuario">
            <div class="row">
              <div class="col-md-4">
                <label> RPE de usuario </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="id"
                  :readonly="true"
                />
              </div>
            </div>
            <div class="row">
              <div class="mt-5 col-lg-6 col-xl-3">
                <h4>Roles</h4>
                <checkbox-edit
                  v-for="(role, index) in roles"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_roles"
                  :tipo="'roles'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4>Áreas académicas</h4>
                <checkbox-edit
                  v-for="(role, index) in academic_areas"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_academic_areas"
                  :tipo="'academic_areas'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4>Entidades académicas</h4>
                <checkbox-edit
                  v-for="(role, index) in academic_entities"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_academic_entities"
                  :tipo="'academic_entities'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <h4>Comités académicos</h4>
                <checkbox-edit
                  v-for="(role, index) in academic_comittes"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_academic_comittes"
                  :tipo="'academic_comittes'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>
            </div>
          </form>
        </div>
        <div class="px-0 my-3 modal-footer justify-content-start">
          <button
            id="submit"
            type="submit"
            class="btn btn-primary"
            style="background-color: #0160ae"
            @click="actualizaUsuario"
          >
            Guardar Cambios
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
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
    CheckboxEdit,
  },

  props: {
    // Roles de usuario.
    roles: {
      type: Array,
      default: [],
    },

    // Áreas académicas.

    academic_areas: {
      type: Array,
      default: [],
    },

    // Entidades académicas.
    academic_entities: {
      type: Array,
      default: [],
    },

    // Comités académicas.
    academic_comittes: {
      type: Array,
      default: [],
    },
  },

  data() {
    return {
      active: false,
      id: null,
      tipousuario: "workers",
      selected_roles: [],
      selected_academic_areas: [],
      selected_academic_entities: [],
      selected_academic_comittes: [],

      selected_roles_id: [],
      selected_academic_areas_id: [],
      selected_academic_entities_id: [],
      selected_academic_comittes_id: [],
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
    SelectedRoles(index) {
      return true;
    },

    show() {
      this.active = true;
    },

    actualizaLista(name, res, tipo) {
      let lista_selected = [];
      let lista = [];
      let lista_selected_id = [];

      let index = -1;
      switch (tipo) {
        case "roles":
          lista_selected = this.selected_roles ? this.selected_roles : [];
          lista = this.roles;
          break;
        case "academic_areas":
          lista_selected = this.selected_academic_areas
            ? this.selected_academic_areas
            : [];
          lista = this.academic_areas;
          break;
        case "academic_entities":
          lista_selected = this.selected_academic_entities
            ? this.selected_academic_entities
            : [];
          lista = this.academic_entities;
          break;
        case "academic_comittes":
          lista_selected = this.selected_academic_comittes
            ? this.selected_academic_comittes
            : [];
          lista = this.academic_comittes;
          break;
      }

      //Eliminar
      if (!res) {
        // console.log('estamos elimiando');
        if (lista_selected.length > 0) {
          //   search in data if the name is checked or not
          lista_selected.forEach(function (value, i) {
            if (value.name.localeCompare(name) === 0) {
              index = i;
            }
          });
          if (index >= 0) {
            lista_selected.splice(index, 1);
          }
        }
      } else {
        //   search in data if the name is checked or not
        lista.forEach(function (value, i) {
          if (value.name.localeCompare(name) === 0) {
            index = i;
          }
        });

        if (lista_selected.length > 0) {
          lista_selected.forEach(function (value, i) {
            if (value.name.localeCompare(lista[index].name) === 0) {
              index = -1;
            }
          });
        }

        if (index >= 0) {
          lista_selected.push(lista[index]);
        }
      }

      if (lista_selected.length > 0) {
        lista_selected.forEach(function (value, i) {
          lista_selected_id.push(value.id);
        });
      }

      // console.log("lista selected : ", lista_selected);

      if (index >= 0) {
        switch (tipo) {
          case "roles":
            this.selected_roles = lista_selected;
            this.selected_roles_id = lista_selected_id;

            break;
          case "academic_areas":
            this.selected_academic_areas = lista_selected;
            this.selected_academic_areas_id = lista_selected_id;
            break;
          case "academic_entities":
            this.selected_academic_entities = lista_selected;
            this.selected_academic_entities_id = lista_selected_id;

            break;
          case "academic_comittes":
            this.selected_academic_comittes = lista_selected;
            this.selected_academic_comittes_id = lista_selected_id;
            break;
        }
      }
    },

    actualizaUsuario() {
      console.log("academic areas: ", this.selected_academic_areas_id);
      console.log("roles : ", this.selected_roles_id);
      console.log("academic entities : ", this.selected_academic_entities_id);
      console.log("academic_comittes : ", this.selected_academic_comittes_id);

      axios
        .post("/controlescolar/admin/updateWorker", {
          id: this.id,
          type: this.tipousuario,
          selected_roles: this.selected_roles_id,
          selected_academic_areas: this.selected_academic_areas_id,
          selected_academic_entities: this.selected_academic_entities_id,
          selected_academic_comittes: this.selected_academic_comittes_id,
        })
        .then((response) => {
          Swal.fire({
            title: "El usuario con el id " + this.id + " ha sido modificado",
            // text: response.data,
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar",
          });
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
          Swal.fire({
            title: "Error al actualizar",
            showCancelButton: false,
            icon: "error",
          });
        });
    },
  },

  created() {
    Event.$on(
      "toggleModal",
      (id, roles, academic_areas, academic_entities, academic_comittes) => {
        this.id = id;

        if (academic_comittes!=null && academic_comittes.length > 0) {
          this.selected_academic_comittes = academic_comittes;
          academic_comittes.forEach((item) => {
            this.selected_academic_comittes_id.push(item.id);
          });
        }

        if (academic_entities!=null && academic_entities.length > 0) {
          this.selected_academic_entities = academic_entities;
          academic_entities.forEach((item) => {
            this.selected_academic_entities_id.push(item.id);
          });
        }

        if (roles!=null && roles.length > 0) {
          this.selected_roles = roles;

          roles.forEach((item) => {
            this.selected_roles_id.push(item.id);
          });
        }

        if (academic_areas!=null &&academic_areas.length > 0) {
          this.selected_academic_areas = academic_areas;
          academic_areas.forEach((item) => {
            this.selected_academic_areas_id.push(item.id);
          });
        }

        this.show();
        // console.log("selected_roles: ", this.selected_roles);
      }
    );
  },
};
</script>