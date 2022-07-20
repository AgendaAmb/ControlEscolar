<template>
  <div class="row align-items-center">

    <!-- Tittle and add or asign new data to User -->
    <div class="container">
      <div class="row">
        <div class="col-6 d-flex flex-column my-auto align-items-center">
          <h3 class="ml-2">Administración de usuarios</h3>
        </div>
        <div class="col-6 d-flex flex-column my-auto align-items-center">
          <b-button data-toggle="modal" data-target="#NuevoUsuario" pill variant="outline-success" style="width:75%;"
            class="align-items-center text-center">
            <b-icon icon="person-plus-fill" aria-hidden="true"></b-icon> Agregar usuario
          </b-button>
        </div>
      </div>
    </div>

    <div class="container-fluid my-4">
      <div class="col-12">
        <div class="overflow-auto">

          <!-- Pagination upper the table -->
          <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" class="my-4" align="fill">
            <template #first-text>
              <b-icon icon="chevron-double-left" aria-hidden="true"></b-icon>
            </template>
            <template #prev-text>
              <b-icon icon="chevron-left" aria-hidden="true"></b-icon>
            </template>
            <template #next-text>
              <b-icon icon="chevron-right" aria-hidden="true"></b-icon>
            </template>
            <template #last-text>
              <b-icon icon="chevron-double-right" aria-hidden="true"></b-icon>
            </template>
          </b-pagination>

          <!-- User table -->
          <b-table striped hover head-variant="blue" id="my-table" :items="data" :fields="fields" :per-page="perPage"
            :current-page="currentPage" class="text-center">
            <template v-slot:cell(Acciones)="{ item }">
              <div class="row">
                <div class="col-6 justify-content-center">
                  <b-btn
                    @click.prevent="toggleModal(item.id, item.roles, item.academic_areas, item.academic_entities, item.academic_comittes)"
                    data-toggle="modal" data-target="#EditaUsuario" pill variant="outline-primary" style="width:100%;">
                    <b-icon icon="pencil-square" aria-hidden="true"></b-icon> Editar
                  </b-btn>
                </div>
                <div class="col-6 justify-content-center">


                  <b-button @click="eliminaTrabajador(item.id)" pill variant="outline-danger"
                    class="align-items-center text-center" style="width:100%;">
                    <b-icon icon="x-circle-fill" aria-hidden="true"></b-icon> Eliminar
                  </b-button>
                </div>
              </div>
            </template>

            <template v-slot:cell(RPE)="{ item }">
              <span>
                <p class="h5">{{ item.id }}</p>
              </span>
            </template>

            <template v-slot:cell(Roles)="{ item }">
              <ul>
                <li v-for="role in item.roles" :key="role.id" class="list-group">
                  {{ role.name }}
                </li>
              </ul>
            </template>

            <template v-slot:cell(Áreas_Académicas)="{ item }">
              <ul>
                <li v-for="area in item.academic_areas" :key="area.id" class="list-group">
                  {{ area.name }}
                </li>
              </ul>
            </template>

            <template v-slot:cell(Entidades_Académicas)="{ item }">
              <ul>
                <li v-for="entity in item.academic_entities" :key="entity.id" class="list-group">
                  {{ entity.name }}
                </li>
              </ul>
            </template>

          </b-table>

          <!-- Paginatinn bottom -->
          <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" class="my-4" align="fill">
            <template #first-text>
              <b-icon icon="chevron-double-left" aria-hidden="true"></b-icon>
            </template>
            <template #prev-text>
              <b-icon icon="chevron-left" aria-hidden="true"></b-icon>
            </template>
            <template #next-text>
              <b-icon icon="chevron-right" aria-hidden="true"></b-icon>
            </template>
            <template #last-text>
              <b-icon icon="chevron-double-right" aria-hidden="true"></b-icon>
            </template>
          </b-pagination>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import UsuariosCeRowTemplate from "./UsuariosCeRowTemplate.vue";
import swal from "sweetalert2";
window.Swal = swal;

export default {
  name: "usuarios-ce",

  components: {
    UsuariosCeRowTemplate,
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
  computed: {
    rows() {
      return this.data.length;
    }
  },

  data() {
    return {
      perPage: 10,
      currentPage: 1,
      data: [],
      // fields: ['RPE', 'Roles', 'Áreas_Académicas', 'Entidades_Académicas', 'Acciones'],
      fields: [
        {
          key: 'RPE',
          sortable: true
        },
        {
          key: 'Roles',
          sortable: true
        },
        {
          key: 'Áreas_Académicas',
          label: 'Áreas Académicas',
          sortable: true,
        },
        {
          key: 'Entidades_Académicas',
          label: 'Entidades Académicas',
          sortable: true,
        },
        {
          key: 'Acciones',
          sortable: false,
        }
      ],

      rowTemplate() {
        return {
          template: UsuariosCeRowTemplate,
        };
      },
    };
  },

  mounted() {
    axios
      .get("/controlescolar/admin/workers")
      .then((response) => {
        var data = response.data.data;

        data.forEach(element => {

        });

        Vue.set(this, "data", data);
        // console.log(this.data);
      })
      .catch((error) => { });
  },

  methods: {

    eliminaTrabajador(id) {
      axios
        .post(
          "/controlescolar/admin/deleteWorker", {
          id: id,
          module_id: 2,
          type: 'workers'
        }
        )
        .then((response) => {
          Swal.fire({
            title: "El usuario ha sido eliminado",
            text: "Podras volver a insertarlo cuando desees",
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar",
          });

          this.$emit("deleteWorker", id);
        })
        .catch((error) => {
          Swal.fire({
            title: "Error al eliminar al usuario",
            icon: "error",
            title: error.data.message,
            showCancelButton: true,
            cancelButtonColor: "#d33",
            cancelButtonText: "Entendido",
          });
          // console.log(error);
        });


    },


    toggleModal(id, roles, academic_areas, academic_entities, academic_comittes) {
      Event.$emit('toggleModal', id, roles, academic_areas, academic_entities, academic_comittes);
    },

    deleteWorkerFromList(id) {
      s
      let index;

      this.data.forEach(function (value, i) {
        if (value.id == id) {
          itemDelete = value;
          index = i;
        }
      });

      this.data.splice(index, 1);
    },

    DataNotEmpty() {
      if (this.data.length > 0) {
        return true;
      }
      return false;
    },
  },
};
</script>