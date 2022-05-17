<template>
  <tr>
    <th scope="row">{{ index }}</th>
    <th v-if="academic_program != 'Doctorado en ciencias ambientales'" scope="row">
      {{ announcement_from[0] + announcement_from[1] + announcement_from[2] +announcement_from[3]}} -
      {{ announcement_to[0] + announcement_to[1] + announcement_to[2] + announcement_to[3]}}
    </th>

    <th v-else-if="announcement_from[6] == 1" scope="row">
      {{ announcement_from[0] + announcement_from[1] + announcement_from[2] +announcement_from[3]}} - I
    
    </th>

    <th v-else scope="row">
      {{ announcement_from[0] + announcement_from[1] + announcement_from[2] +announcement_from[3]}} - II
    </th>

    <td>{{ name }}</td>
    <td>{{ academic_program }}</td>
    <td>
      <a :href="location" target="_blank"> Ver expediente </a>
    </td>
  </tr>
</template>

<script>
export default {
  // Nombre del componente
  name: "archive",

  data() {
    return {
      array_to: null,
      array_from: null,
    };
  },

  // Propiedas.
  props: {
    index: {
      type: Number,
      default: 0,
    },

    // Id del expediente.
    id: {
      type: Number,
      default: -1,
    },

    // Fecha inicio postulacion
    announcement_from: {
      type: String,
      default: null,
    },

    // Fecha de terminacion postulacion
    announcement_to: {
      type: String,
      default: null,
    },

    name: {
      type: String,
      default: "",
    },

    academic_program: {
      type: String,
      default: "",
    },

    location: {
      type: String,
      default: "",
    },
  },

  methods: {
  },
};
</script>