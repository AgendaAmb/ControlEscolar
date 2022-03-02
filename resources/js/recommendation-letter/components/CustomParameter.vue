<template>
  <tr class="row pt-2 justify-content-center" >
    <td class="col-8 align-self-start">
      <div class="d-flex align-items-center justify-content-center">
        <input type="text" class="form-control" v-model="Name" />
        <span class="align-items-center justify-content-center ml-5 mr-5">
          <i
            class="fas fa-minus-circle"
            style="width: 25px; height: 25px; color: red; border-radius: 50%"
            @click="remove(index)"
          ></i>
        </span>
      </div>
    </td>

    <td class="col-1 align-self-center">
      <form class="form-check align-items-center justify-content-center">
        <input
          v-model="Score"
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault1"
          value="Bueno"
        />
      </form>
    </td>
    <td class="col-1 align-self-center">
      <form class="form-check align-items-center justify-content-center">
        <input
          v-model="Score"
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault1"
          value="Excelente"
        />
      </form>
    </td>
    <td class="col-1 align-self-center">
      <form class="form-check align-items-center justify-content-center">
        <input
          v-model="Score"
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault1"
          value="Regular"
        />
      </form>
    </td>
    <td class="col-1 align-self-center">
      <form class="form-check align-items-center justify-content-center">
        <input
          v-model="Score"
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault1"
          value="Deficiente"
        />
      </form>
    </td>
  </tr>
</template>


<script>
export default {
  name: "custom-parameter",

  props: {
    index: {
      type: Number,
    },
    
    remove: {
      type: Function
    },

    // Valor del parámetro
    score: {
      type: String,
      default: null,
    },

    // Nombre del parámetro
    name: {
      type: String,
      default: null,
    },
  },

  computed: {
    // Devuelve o altera el nivel del parámetro.
    Score: {
      get() {
        return this.score;
      },

      set(value) {
        this.$emit("update:score", value);
      },
    },
    Name: {
      get() {
        return this.name;
      },
      set(value) {
        this.$emit("update:name", value);
      },
    },
  },
};
</script>