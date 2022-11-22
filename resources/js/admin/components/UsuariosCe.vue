<template>
  <div class="container-fluid">

    <!-- Tittle and add or asign new data to User -->
      <div class="d-flex m-2 justify-content-center">
        <div class="col-12 ">
          <p class="display-4">
            Administración de usuarios
          </p>
        </div>

      </div>

      <div class="d-flex" style="height:44px!important;">
        <b-input-group size="lg" class="col-md-9 col-sm-8" style="height: 100% !important;">
          <b-form-input style="height: 100% !important;" type="search" v-model="search" placeholder="Buscar RPE">
          </b-form-input>
          <b-input-group-append is-text style="height: 100% !important;">
            <b-icon icon="search" aria-hidden="true"></b-icon>
          </b-input-group-append>
        </b-input-group>

        <div class="col-md-3 col-sm-4" style="height:100%!important;">
          <b-button data-toggle="modal" data-target="#NuevoUsuario" pill variant="outline-success"
            style="width:100%; height: 100% !important;" class="align-items-center text-center">
            <b-icon icon="person-plus-fill" aria-hidden="true"></b-icon>
          </b-button>
        </div>

      </div>
   

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
          <b-table striped hover head-variant="blue" id="my-table" :items="filteredList" :fields="fields"
            :per-page="perPage" :current-page="currentPage" class="text-center">
            <template v-slot:cell(Acciones)="{ item }">
              <div class="row">
                <div class="col-6 justify-content-center">
                  <b-btn
                    @click.prevent="toggleModal(item.id, item.roles, item.academic_areas, item.academic_entities, item.academic_comittes)"
                     pill variant="outline-primary">
                    <b-icon icon="pencil-square" aria-hidden="true"></b-icon> Editar
                  </b-btn>
                </div>
                <div class="col-6 justify-content-center" >
                  <b-button @click="eliminaTrabajador(item.id)" pill variant="outline-danger"
                    class="align-items-center text-center" >
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
                  {{ getName(role.name) }}
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
                  {{ getName(entity.name) }}
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

    filteredList() {
      let list = [];

      this.data.filter(user => {
        if (user.id.toString().toLowerCase().includes(this.search.toLowerCase())) {
          list.push(user);
        }
      })

      if (list.length <= 0) {
        list = this.data;
      }

      return list;
    },

    rows() {
      let list = [];

      this.data.filter(user => {
        if (user.id.toString().toLowerCase().includes(this.search.toLowerCase())) {
          list.push(user);
        }
      })

      if (list.length <= 0) {
        list = this.data;
      }

      return list.length;
    }
  },

  data() {
    return {
      search: '',
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

    getName(name_to_change) {
      var name = "";
      switch (name_to_change) {
        case 'admin':
          name = 'Administrador';
          break;
        case 'aspirante_extranjero':
          name = 'Aspirante Extranjero';
          break;
        case 'aspirante_foraneo':
          name = 'Aspirante Foraneo';
          break;
        case 'aspirante_local':
          name = 'Aspirante Local';
          break;
        case 'comite_academico':
          name = 'Comité Academico';
          break;
        case 'control_escolar':
          name = 'Control Escolar';
          break;
        case 'coordinador':
          name = 'Coordinador';
          break;
        case 'personal_apoyo':
          name = 'Personal de Apoyo';
          break;
        case 'profesor_colaborador':
          name = 'Profesor colaborador';
          break;
        case 'profesor_nb':
          name = 'Profesor Nucleo Básico';
          break;
        case 'UASLP_FACULTAD DE CIENCIAS QUÍMICAS':
          name = 'Facultad de Ciencias Químicas';
          break;
        case 'UASLP_FACULTAD DE INGENIERÍA':
          name = 'Faculdata de Ingeniería';
          break;
        case 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS':
          name = 'Instituto de investigación de zonas desérticas';
          break;
        case 'UASLP_FACULTAD DE AGRONOMÍA':
          name = 'Facultad de Agronomía';
          break;
        case 'UASLP_COORDINACIÓN ACADÉMICA REGIÓN ALTIPLANO':
          name = 'Coordinación Académica (Altiplano)';
          break;
        case 'UASLP_CIACYT':
          name = 'CIACYT';
          break;
        case 'UASLP_FACULTAD DE MEDICINA':
          name = 'Facultad de Medicina';
          break;
        case 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES':
          name = 'Facultad de Ciencias Sociales y Humanidades';
          break;
        case 'FACULTAD DE PSICOLOGÍA':
          name = 'Facultad de Psicología';
          break;
        case 'UASLP_FACULTAD DE INGENIERÍA':
          name = 'Administrador';
          break;
        case 'UASLP_UNIDAD ACADÉMICA MULTIDISCIPLINARIA ZONA HUASTECA':
          name = 'Unidad Académica Multidisciplinaria (Huasteca)';
          break;
        case 'UASLP_FACULTAD DE DERECHO':
          name = 'Facultad de Derecho';
          break;
        case 'UASLP_FACULTAD DEL HÁBITAT':
          name = 'Facultad del Hábitad';
          break;
        default:
          name = this.name;
          break;
      }
      return name;
    },

    eliminaTrabajador(id) {
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

      Swal.fire({
        title: "¿Segur@ que quieres borrar a este usuario?",
        text: 'El usuario perdera el acceso al sistema',
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post(
              "/controlescolar/admin/deleteWorker", {
              id: id,
              module_id: 2,
              type: 'workers'
            }
            )
            .then((response) => {
              Toast.fire({
                icon: 'success',
                title: 'Usuario eliminado'
              })

              this.$emit("deleteWorker", id);
            })
            .catch((error) => {
              Toast.fire({
                icon: 'success',
                title: 'Usuario agregado',
                text: error.data.message,
              })
            });
        }
      });




    },


    toggleModal(id, roles, academic_areas, academic_entities, academic_comittes) {

      this.$root.$emit("bv::show::modal", "EditaUsuario");
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