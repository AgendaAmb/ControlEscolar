<template>
  <tr>
    <th scope="row" class="text-center"> {{index}} </th>
    <th scope="row" class="text-center"> {{id}} </th>
    <td class="text-center"> {{name}} </td>
    <td> {{academic_program}} </td>
    <td class="text-center"> {{Status}} </td>
    <td class="text-center">
      <a :href="archive_location">📝</a> 
    </td>
  </tr>
</template>

<script>

export default {
  name: "expediente",

  props: {
    //Index de expediente
    index:Number,

    // Programas académicos.
    id: Number,

    // Nombre del postulante
    name: String,

    // Programa académico.
    academic_program: String,

    // Estado.
    status: Number,

    // Url de expediente.
    archive_location: String,
  },

  computed: {
    Status: {
      get(){
        return this.estados[this.status];
      }
    }
  },
  
  data(){
    return {
      estados: [
        'En proceso de postulación',
        'En proceso de entrevistas',
        'Rechazado',
        'Aceptado'
      ],
    };
  },
};
</script>