<template>

  <b-modal size="xl" class="modal fade" :class="{ 'is-active': active }" id="EditaUsuario" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true" hide-footer title="Editar trabajador">
    <div class="modal-body">
      <form v-on:submit.prevent="actualizaUsuario">
        <div class="row">
          <div class="col-md-4">
            <label> RPE de usuario </label>
            <input type="text" class="form-control" v-model="id" :readonly="true" />
          </div>
        </div>
        <div class="row">
          <div class="mt-5 col-lg-6 col-xl-3">
            <p class="h3">Roles</p>

            <form action="">
              <checkbox-edit v-for="(role, index) in roles" :key="role.id" :name="role.name" :id="role.id"
                :pivot="role.pivot" :index="index" :array_data="selected_roles" :tipo="'roles'"
                @actualizaLista="actualizaLista"></checkbox-edit>
            </form>
          </div>

          <div class="mt-5 col-lg-6 col-xl-3">
            <p class="h3">Áreas académicas</p>
            <form action="">
              <checkbox-edit v-for="(role, index) in academic_areas" :key="role.id" :name="role.name" :id="role.id"
                :pivot="role.pivot" :index="index" :array_data="selected_academic_areas" :tipo="'academic_areas'"
                @actualizaLista="actualizaLista"></checkbox-edit>
            </form>
          </div>

          <div class="mt-5 col-lg-6 col-xl-3">
            <p class="h3">Entidades académicas</p>
            <form action="">
              <checkbox-edit v-for="(role, index) in academic_entities" :key="role.id" :name="role.name" :id="role.id"
                :pivot="role.pivot" :index="index" :array_data="selected_academic_entities" :tipo="'academic_entities'"
                @actualizaLista="actualizaLista"></checkbox-edit>
            </form>
          </div>

          <div class="mt-5 col-lg-6 col-xl-3">
            <p class="h3">Comités académicos</p>
            <form action="">
              <checkbox-edit v-for="(role, index) in academic_comittes" :key="role.id" :name="role.name" :id="role.id"
                :pivot="role.pivot" :index="index" :array_data="selected_academic_comittes" :tipo="'academic_comittes'"
                @actualizaLista="actualizaLista"></checkbox-edit>
            </form>
          </div>
        </div>
      </form>
    </div>
    <div class="px-0 my-3 modal-footer justify-content-start">
      <button class="btn btn-primary" style="background-color: #0160ae" @click="actualizaUsuario">
        Guardar Cambios
      </button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">
        Cerrar
      </button>
    </div>
  </b-modal>
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
      console.log('Actualiza lista nombre: ' + name + ' valor: ' + res + ' lista: ' + tipo);

      let index = -1;
      switch (tipo) {
        case "roles":
          lista_selected = this.selected_roles ? this.selected_roles : [];
          lista_selected_id = this.selected_roles_id ? this.selected_roles_id : [];
          lista = this.roles;
          break;
        case "academic_areas":
          lista_selected = this.selected_academic_areas ? this.selected_academic_areas : [];
          lista_selected_id = this.selected_academic_areas_id ? this.selected_academic_areas_id : [];
          lista = this.academic_areas;
          break;
        case "academic_entities":
          lista_selected = this.selected_academic_entities ? this.selected_academic_entities : [];
          lista_selected_id = this.selected_academic_entities_id ? this.selected_academic_entities_id : [];
          lista = this.academic_entities;
          break;
        case "academic_comittes":
          lista_selected = this.selected_academic_comittes ? this.selected_academic_comittes : [];
          lista_selected_id = this.selected_academic_comittes_id ? this.selected_academic_comittes_id : [];
          lista = this.academic_comittes;
          break;
      }
      console.log("lista_selected : ", lista_selected);

      //Eliminar
      if (!res) {

        // Se recorre la lista de los seleccionados
        if (lista_selected.length > 0) {
          //  Busca en la lista el dato indicado
          lista_selected.forEach(function (value, i) {

            if (value['name']) {
              if (value['name'].toLowerCase() === name.toLowerCase()) {
                index = i;
                console.log('lo encontre ');
              }
            }

          });
          // El dato encontrado se elimina de la lista de seleccionados
          if (index >= 0) {
            lista_selected.splice(index, 1);
            lista_selected_id.splice(index, 1);
          }
        }
        // Agregar
      } else {

        //   Buscar en la lista general si existe el nombre seleccionado
        lista.forEach(function (value, i) {
          if (value['name'].toLowerCase() === name.toLowerCase()) {
            index = i;
          }
        });

        // El dato recibido se compara con los de toda la lista

        lista_selected.forEach(function (value, i) {
          // Si se encuentra ya en la lista seleccionada no se agrega
          if (value['name'].toLowerCase() === name.toLowerCase()) {
            index = -1;
          }
        });

        //Si la posición es entera positiva se agrega a la lista de los seleccionados
        if (index >= 0) {
          lista_selected.push(lista[index]);
          // lista_selected_id.push(lista[index]['id']);
        }
        lista_selected_id = [];
        lista_selected.forEach(function(value,i) {
            lista_selected_id.push(value['id']);
        });
      }


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
      console.log('id roles');
      console.log(this.selected_roles_id);
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });

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
          Toast.fire({
            icon: 'success',
            title: 'Usuario ' + this.id + " modificado"
          })
        })
        .catch((error) => {
          Toast.fire({
            icon: 'warning',
            title: 'Error al actualizar'
          })

        });
    },
  },

  created() {
    Event.$on(
      "toggleModal",
      (id, roles, academic_areas, academic_entities, academic_comittes) => {
        this.selected_roles.length = 0;
        this.selected_academic_areas.length = 0;
        this.selected_academic_entities.length = 0;
        this.selected_academic_comittes.length = 0;
        this.selected_roles_id.length = 0;
        this.selected_academic_areas_id.length = 0;
        this.selected_academic_entities_id.length = 0;
        this.selected_academic_comittes_id.length = 0;
        this.id = id;
        if (academic_comittes != null && academic_comittes.length > 0) {
          this.selected_academic_comittes = academic_comittes;
          academic_comittes.forEach((item) => {
            this.selected_academic_comittes_id.push(item.id);
          });
        }

        if (academic_entities != null && academic_entities.length > 0) {
          this.selected_academic_entities = academic_entities;
          academic_entities.forEach((item) => {
            this.selected_academic_entities_id.push(item.id);
          });
        }

        if (roles != null && roles.length > 0) {
          this.selected_roles = roles;

          roles.forEach((item) => {
            this.selected_roles_id.push(item.id);
          });
        }

        if (academic_areas != null && academic_areas.length > 0) {
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