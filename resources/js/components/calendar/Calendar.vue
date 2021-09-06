<template>
  <div class="row">
    <scheduler class="col-lg-9 left-container" :events="events" @event-updated="logEventUpdate"></scheduler>
    <div class="col-lg-3 px-5 py-4 right-container">
      <h3 class="d-block"> Notificaciones </h3>
      <ul class="scheduler-messages">
        <li class="scheduler-message" v-for="message in messages" v-bind:key="message.id">{{message.text}}</li>
      </ul>
    </div>
  </div>
</template>


<script>
import Scheduler from "./Scheduler.vue";

export default {
  name: "calendar",
  components: { Scheduler },

  data() {
    return {
      events: [
        {
          id: 1,
          start_date: "2020-01-20 6:00",
          end_date: "2020-01-20 10:00",
          text: "Postulante:" +
                "<br><br>María Eugenia Almendárez García" + 
                "<br><br>Profesor que otorgó la carta de intención: <br><br>",
        },
        {
          id: 2,
          start_date: "2020-01-23 6:00",
          end_date: "2020-01-23 20:00",
          text: "Event 2",
        },
      ],
      messages: [{
          id: 1,
          text: "Foo",
      },{
          id: 2,
          text: "Bar",
      },{
          id: 3,
          text: "Baz",
      }],
    };
  },
  methods: {
    addMessage(message) {
      this.messages.unshift(message);
      if (this.messages.length > 40) {
        this.messages.pop();
      }
    },

    logEventUpdate(id, mode, ev) {
      let text = ev && ev.text ? ` (${ev.text})` : "";
      let message = `Event ${mode}: ${id} ${text}`;
      this.addMessage(message);
    },
  },
};
</script>
 
<style>

.calendar-container {
  height: 100%;
  width: 100%;
}

.left-container {
  overflow: hidden;
  position: relative;
  height: 100vh;
  display: inline-block;
  width: 82vw;
}

.right-container {
  float: right;
  height: 100%;
  width: 340px;
  position: relative;
  z-index: 2;
}

.scheduler-messages {
  list-style-type: none;
  height: 50%;
  margin: 0;
  overflow-x: hidden;
  overflow-y: auto;
  padding-left: 5px;
}

.scheduler-messages > .scheduler-message {
  background-color: #f4f4f4;
  box-shadow: inset 5px 0 #d69000;
  font-family: Geneva, Arial, Helvetica, sans-serif;
  font-size: 14px;
  margin: 5px 0;
  padding: 8px 0 8px 10px;
}
</style>