<template>
  <div class="row">
    <div class="col-12">
      <div class="form-row">
        <div class="form-group col-8 col-md-6 col-lg-4">
          <label> ¿Perteneces a la UASLP? </label>
          <select v-model="PerteneceUASLP" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option value="Si"> Si </option>
            <option value="No"> No </option>
          </select>
        </div>
      </div>

      <slot></slot>
    </div>
  </div>
</template>

<script>


export default {
  name: "crear-cuenta",

  props: {
    perteneceUaslp: String,
  },

  computed: {
    PerteneceUASLP: {
      get(){
        return this.perteneceUaslp;
      },
      set(newVal){
        this.$emit('update:perteneceUaslp', newVal);
      }
    },
  },
};
</script>