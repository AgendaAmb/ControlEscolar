<template>
  <div class="row my-5">
    <div class="col-12">
      <vue-scheduler :events="events" :event-dialog-config="dialogConfig"></vue-scheduler>
    </div>
  </div>
</template>

<script>
export default {
  name: "calendario-entrevistas",

  data() {
    return {
      users: [],
      events: [],

      dialogConfig: {
        title: "Programar una entrevista",
        createButtonLabel: "Agendar entrevista",
        enableTimeInputs: false,
        enableDateInput: false,

        fields: [{
          fields: [{
            name: "hora_inicio",
            type: 'time',
            label: "Hora de inicio.",
          },{
            name: "hora_fin",
            type: 'time',
            label: "Hora de fin.",
          }]
        },{
            name: "name",
            label: "Nombre del postulante",
            readonly: true,
        },{
          name: "sala",
          type: "text",
          required: true,
          label: "Número de sala",
        },{
          name: "observaciones",
          type: "textarea",
          label: "Observaciones",
        }],
      },
    };
  },

  mounted() {
    this.$nextTick(function () {
      axios
        .get("/controlescolar/users")
        .then((response) => {
          Vue.set(this, "users", response.data);
        })
        .catch((error) => {});

      axios
        .get("/controlescolar/interviews")
        .then((response) => {
          var meetings = response.data.meetings;

          meetings.forEach((meeting) => {
            var start_date = new Date(Date.parse(meeting.start_time));
            var end_date = new Date(
              Date.parse(meeting.start_time) + meeting.duration * 60000
            );

            this.events.push({
              id: meeting.id,
              start_date: start_date.toString(),
              end_date: end_date.toString(),
            });
          });
        })
        .catch((error) => {});
    });
  },
};
</script>