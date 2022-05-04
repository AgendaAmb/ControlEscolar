<template>
  <tr class="text-center">
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
  </tr>
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
      data: {},
    };
  },

  methods: {
    /**
     * Envía una notificación para modificar al usuario
     */
    toggleModal(id,roles,academic_areas,academic_entities, academic_comittes) {
      Event.$emit('toggleModal', id,roles,academic_areas,academic_entities, academic_comittes);
    },
    

    /**
     * Envía una notificación para eliminar al trabajador
     */
    eliminaTrabajador() {
      this.$emit("deleteWorker", this.id);
    },
  },
};
</script>