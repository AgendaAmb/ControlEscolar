<template>
  <tr class="text-center">
    <th scope="row">{{ index }}</th>
    <th
      v-if="academic_program != 'Doctorado en ciencias ambientales'"
      scope="row"
    >
      {{
        announcement_from[0] +
        announcement_from[1] +
        announcement_from[2] +
        announcement_from[3]
      }}
      -
      {{
        announcement_to[0] +
        announcement_to[1] +
        announcement_to[2] +
        announcement_to[3]
      }}
    </th>

    <th v-else-if="announcement_from[6] == 1" scope="row">
      {{
        announcement_from[0] +
        announcement_from[1] +
        announcement_from[2] +
        announcement_from[3]
      }}
      - I
    </th>

    <th v-else scope="row">
      {{
        announcement_from[0] +
        announcement_from[1] +
        announcement_from[2] +
        announcement_from[3]
      }}
      - II
    </th>

    <td>{{ name }}</td>
    <td>{{ academic_program }}</td>
    <td>
      <div :class="classObjectFor('name_status')" role="alert">
        {{ name_status }}
      </div>
    </td>
    <td>
      <a :href="location" target="_blank"> Ver expediente </a>
    </td>
  </tr>
</template>

<script>
import { defineLocale } from "moment";
export default {
  // Nombre del componente
  name: "archive",

  data() {
    return {
      array_to: null,
      array_from: null,
      name_status: null,
      errores: {},
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

    status: {
      type: Number,
      default: null,
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

  created() {
    switch (this.status) {
      case 1:
        this.name_status = "Incompleto";
        break;
      case 2:
        this.name_status = "En espera de revisión";
        break;
      case 3:
        this.name_status = "Por Actualizar";
        break;
      case 4:
        this.name_status = "¡Documentos nuevos!";
        break;
        case 5:
        this.name_status = "Completo";
        break;
        case 6:
        this.name_status = "No cumple";
        break;
        case 7:
          this.name_status = "Condicionado";
          break;
        default:
         this.name_status = "Incompleto";
          break;

    }
  },

  methods: {
    classObjectFor(key) {
      let color = null;
      switch (this.status) {
        case 1:
          color = "alert alert-secondary";
          break;
        case 2:
          color = "alert alert-warning";
          break;
        case 3:
          color = "alert alert-info";
          break;
        case 4:
          color = "alert alert-primary";
          break;
        case 5:
          color = "alert alert-success";
          break;
          case 6:
          color = "alert alert-danger";
          break;
          case 7:
            color = "alert alert-light";
            break;
        default:
          color = "alert alert-secondary";
          break;
      }

      return color;
    },
  },
};
</script>