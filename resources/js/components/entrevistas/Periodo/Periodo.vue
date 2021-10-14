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
            <div class="col-12">
              <div class="form-row mt-4 mb-2">
                <div class="form-group col-6">
                  <label> Fecha de inicio </label>
                  <input v-model="start_date" type="date" class="modal-input" required>
                </div>
                <div class="form-group col-6">
                  <label> Fecha de fin </label>
                  <input v-model="end_date" type="date" class="modal-input" required>
                </div>
              </div>
              <div class="form-row my-2">
                <div class="form-group col-9">
                  <label> Número de salas </label>
                  <input v-model.number="num_salas" type="number" class="modal-input" required min="1">
                </div>
              </div>
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
  name: "periodo",
  components: { EventDialogInput },
  props: {
    title: String,
    inputClass: String,
    overrideInputClass: Boolean,
    fields: Array,
    createButtonLabel: String,
  },
  data() {
    return {
      isActive: false,
      event: {},
      start_date: null,
      end_date: null,
      num_salas: 1,
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