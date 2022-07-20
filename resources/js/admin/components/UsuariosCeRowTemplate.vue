<template>
<div>

</div>

<!-- <div class="overflow-auto">
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

    <b-table
      id="my-table"
      :items="items"
      :per-page="perPage"
      :current-page="currentPage"
      small
    ></b-table>
  </div> -->
  <!-- <tr class="text-center">
    <td>{{ id }}</td>
    <td>
      <ul>
        <li v-for="role in roles" :key="role.id" class="list-group">
          {{ role.name }}
        </li>
      </ul>
    </td>
    <td>
      <ul>
        <li v-for="area in academic_areas" :key="area.id" class="list-group">
          {{ area.name }}
        </li>
      </ul>
    </td>
    <td>
      <ul>
        <li
          v-for="entity in academic_entities"
          :key="entity.id"
          class="list-group"
        >
          {{ entity.name }}
        </li>
      </ul>
    </td>
    <td class="row">
      <div class="col-6">

        <button
          @click.prevent="toggleModal(id,roles,academic_areas,academic_entities, academic_comittes)"
          data-toggle="modal"
          data-target="#EditaUsuario"
          class="btn btn-primary"
        >
          Modificar
        </button>
      </div>
      <div class="col-6">
        <button @click="eliminaTrabajador" class="btn btn-danger">
          Eliminar
        </button>
      </div>
    </td>
  </tr> -->
</template>

<script>
export default {
  name: "usuarios-ce-row-template",

  props: {
    id: {
      type: Number,
      default: null,
    },
    roles: {
      type: Array,
      default: null,
    },
    academic_areas: {
      type: Array,
      default: null,
    },
    academic_entities: {
      type: Array,
      default: null,
    },
    academic_comittes:{
      type:Array,
      default: null,
    }
  },

  data() {
    return {
         perPage: 3,
        currentPage: 1,
        items: [
          { id: 1, first_name: 'Fred', last_name: 'Flintstone' },
          { id: 2, first_name: 'Wilma', last_name: 'Flintstone' },
          { id: 3, first_name: 'Barney', last_name: 'Rubble' },
          { id: 4, first_name: 'Betty', last_name: 'Rubble' },
          { id: 5, first_name: 'Pebbles', last_name: 'Flintstone' },
          { id: 6, first_name: 'Bamm Bamm', last_name: 'Rubble' },
          { id: 7, first_name: 'The Great', last_name: 'Gazzoo' },
          { id: 8, first_name: 'Rockhead', last_name: 'Slate' },
          { id: 9, first_name: 'Pearl', last_name: 'Slaghoople' }
        ]
    };
  },

  methods: {
    /**
     * Envía una notificación para modificar al usuario
     */
    toggleModal(id,roles,academic_areas,academic_entities, academic_comittes) {
      Event.$emit('toggleModal', id,roles,academic_areas,academic_entities, academic_comittes);
      // console.log('Seleccione editar');
    },
    

    /**
     * Envía una notificación para eliminar al trabajador
     */
    eliminaTrabajador() {
      axios
        .post(
          "/controlescolar/admin/deleteWorker",{
              id: this.id,
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
            
            this.$emit("deleteWorker", this.id);
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
          // alert('Ha ocurrido un error, intenta mas tarde');
          console.log(error);
        });

     
    },
  },
};
</script>