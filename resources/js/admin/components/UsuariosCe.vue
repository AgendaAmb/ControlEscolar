<template>
  <div class="row align-items-center">
    <div class="col-6 d-flex flex-column my-auto align-items-center">
      <h3 class="ml-2">Administración de usuarios</h3>
    </div>

    <div class="col-6 d-flex flex-column my-auto align-items-center">
      <button
        class="btn btn-success w-50"
        data-toggle="modal"
        data-target="#NuevoUsuario"
      >
        Agregar usuario.
      </button>
    </div>

    <div class="container my-4">
      <table
        class="
          col-12
          table table-striped table:border
          secondary-5:border
          align-items:center
        "
      >
        <thead>
          <tr>
            <th
              v-for="td in tableHeader"
              :key="td"
              class="between:flex center:items text-center"
            >
              <span class="h5">{{ td }}</span>
            </th>
          </tr>
        </thead>

        <tbody v-if="DataNotEmpty">
          <usuarios-ce-row-template
            v-for="(user, index) in data"
            v-bind="user"
            v-bind:key="user.id"
            :index="index"
            @updateWorker="updateWorkerFromList"
            @deleteWorker="deleteWorkerFromList"
          >
          </usuarios-ce-row-template>
        </tbody>

        <tbody v-else>
          <tr>
            <span class="h1"> No existen datos</span>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- <div class="col-12 mt-5">
            <ejs-grid :data-source="data" class="table" :rowTemplate="rowTemplate" width="100%"> 
                <e-columns>
                    <e-column field="id" headerText="RPE" textAlign="Center" width="10%"></e-column>
                    <e-column field="roles" headerText="Roles" textAlign="Center" width="15%"></e-column>
                    <e-column field="academic_areas" headerText="Áreas académicas" textAlign="Center" width="15%"></e-column>
                    <e-column field="academic_entities" headerText="Entidades académicas" textAlign="Center" width="30%"></e-column>
                    <e-column field="academic_entities" headerText="Acciones" textAlign="Center" width="30%"></e-column>
                </e-columns>
            </ejs-grid>
            
        </div> -->
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

  data() {
    return {
      tableHeader: [
        "RPE",
        "Roles",
        "Áreas Académicas",
        "Entidades Académicas",
        "Acciones",
      ],

      data: [],

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
        var users = response.data.data;

        Vue.set(this, "data", users);
        console.log(this.data);
      })
      .catch((error) => {});
  },

  methods: {
    updateWorkerFromList(id) {
     
    },

    deleteWorkerFromList(id) {
      let itemDelete;
      let index;

      // for (let i = 0; i <= this.data.length; i++) {
      //   if(this.data[i].id === id){
      //     itemDelete = this.data[i]; 
      //     index = i;
      //   }
      // }
      this.data.forEach(function (value,i){
        if(value.id == id){
          itemDelete = value; 
          index = i;
        }
      });

      this.data.splice(index,1);
    },

    DataNotEmpty() {
      if (this.data.lenght > 0) {
        return true;
      }
      return false;
    },
  },
};
</script>