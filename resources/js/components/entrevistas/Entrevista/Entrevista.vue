<template>
  <transition name="zoom-out">
    <div class="v-cal-dialog" v-if="isActive">
      <div class="v-cal-dialog__bg" @click="cancel"></div>
      <div class="v-cal-dialog-card">
        <form @submit.prevent="creaPeriodo">
          <header class="v-cal-dialog-card__header">
            <h5 class="v-cal-dialog__title">{{ title }}</h5>
            <button
              type="button"
              class="v-cal-dialog__close"
              @click="cancel"
            ></button>
          </header>
          <section class="v-cal-dialog-card__body form-row">
            <div class="form-group col-12">
              <label> Fecha </label>
              <input v-model="date" type="date" class="modal-input" readonly>
            </div>

            <div class="form-group col-md-5">
              <label> Hora de inicio </label>
              <input v-model="start_time" type="time" class="modal-input">
            </div>

            <div class="form-group col-md-5">
              <label> Hora de fin </label>
              <input v-model="end_time" type="time" class="modal-input">
            </div>

            <div class="form-group col-12">
              <label> Postulante </label>
              <select v-model="appliant" class="modal-input">
                <option :value="null" selected>Escoge un postulante </option>
                <option v-for="appliant in appliants" :key="appliant.id" :value="appliant"> 
                  {{ appliant.name + " " + appliant.middlename + " " + appliant.surname }} 
                </option>
              </select>
            </div>
  
            <div class="form-group col-12">
              <label> Profesor que otorgó la carta de intención </label>
              <input type="text" class="modal-input" readonly>
            </div>

            <div class="form-group col-12">
              <label> Número de sala </label>
              <select v-model="room" class="modal-input">
                <option :value="null" selected>Escoge una sala </option>
                <option v-for="(room, roomNumber) in rooms" :key="room.id" :value="room"> {{ roomNumber + 1 }} </option>
              </select>
            </div>
          </section>
          <footer class="v-cal-dialog-card__footer">
            <button type="submit" class="v-cal-button is-rounded is-primary">
              {{ createButtonLabel }}
            </button>
          </footer>
        </form>
      </div>
    </div>
  </transition>
</template>


<style scoped>
.modal-input {
    transition: all 0.3s ease-in-out;
    display: block;
    font-family: inherit;
    width: 100%;
    border: 1px solid #E8E9EC;
    border-radius: 4px;
    padding: 10px 12px;
}
</style>

<script>
import Event from "../Event";
import moment from "moment";
import EventDialogInput from "./EventDialogInput";


export default {
  name: "modal-entrevista",
  components: { EventDialogInput },
  props: {
    title: String,
    intention_letter_professor: String,
    inputClass: String,
    overrideInputClass: Boolean,
    fields: Array,
    createButtonLabel: String,
    appliants: Array,
    rooms: Array
  },
  data() {
    return {
      isActive: false,
      event: {},
      date: null,
      start_time: null,
      end_time: null,
      appliant: null,
      professor: null,
      room: null,
    };
  },
  beforeMount() {
    let plainEvent = {};
    this.fields.map((field) => {
      if (!field.fields) plainEvent[field.name] = field.value;
      else {
        const fields = field.fields;
        fields.map((field) => {
          if (field.type === "time") {
            plainEvent[field.name] = field.value
              ? moment(field.value, "HH:mm")
              : null;
          } else plainEvent[field.name] = field.value;
        });
      }
    });

    this.event = new Event(plainEvent);
    //  Insert the Dialog component in body tag
    document.body.appendChild(this.$el);
  },
  mounted() {
    this.isActive = true;
  },
  methods: {

    /**
     * Genera el periodo de entrevistas.
     */
    creaPeriodo() {
      
      axios.post('/controlescolar/entrevistas/periods', {
        start_date: this.start_date,
        end_date: this.end_date,
        num_salas: this.num_salas,
      
      }).then(response =>  {
        var period = response.data;
        this.$emit('new_period', period);
        this.close();
      }).catch(error => {

      });


      /*
      this.$emit("event-created", this.event);
      this.close();*/
    },

    /**
     * Cancela la generación del periodo.
     */
    cancel() {
      this.close();
    },

    /**
     * Cierra el modal (ventana emergente).
     */
    close() {
      this.isActive = false;
      // Timeout for the animation complete before destroying
      setTimeout(() => {
        this.$destroy();
        this.$el.remove();
      }, 150);
    },
  },
};
</script>

<style scoped>
.zoom-out-enter-active,
.zoom-out-leave-active {
  transition: opacity 150ms ease-out;
}
.zoom-out-enter-active .animation-content,
.zoom-out-enter-active .animation-content,
.zoom-out-leave-active .animation-content,
.zoom-out-leave-active .animation-content {
  transition: transform 150ms ease-out;
}

.zoom-out-enter,
.zoom-out-leave-active {
  opacity: 0;
}
.zoom-out-enter .animation-content,
.zoom-out-enter .animation-content,
.zoom-out-leave-active .animation-content,
.zoom-out-leave-active .animation-content {
  transform: scale(1.05);
}
</style>