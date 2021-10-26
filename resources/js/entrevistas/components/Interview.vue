<template>
  <div class="row mx-3">
    <div class="col-7">
      <p class="my-1"> {{ appliant }} </p>
      <p class="my-1"> Carta de intención otorgada por: </p>
      <p class="my-1"> {{ professor }} </p>
    </div>
    <div class="col-5 text-right">
      <p class="my-1"> {{ room }} </p>
      <p class="my-1"> {{ time }} </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "interview",

  props: {
    // Postulante de la entrevista.
    appliant: String,

    // Profesor de la carta de intención.
    professor: String,

    // Número de sala.
    room: String,

    // Horario.
    time: String,
  }
};
</script>