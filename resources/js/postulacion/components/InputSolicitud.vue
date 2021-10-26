<template>
  <div :class="clase">
    <label><slot></slot></label>
    <input :type="tipo" v-model="value" class="form-control">
  </div>
</template>

<script>
export default {
  name: "input-solicitud",

  model: {
    prop: 'value',
    event: 'input',
  },
  
  props: ['clase','tipo'],

  data(){
    return {
      valor: '',
    }
  },

  computed:{
    value:{
      get: function(){
        return this.valor;
      },
      set: function(val){
        this.valor = val;
        this.$emit('input', val);
      }
    }
  }
};
</script>