<template>
  <div class="form-check">
    <input
      class="form-check-input"
      type="checkbox"
      :value="id"
      v-model="Checked"
    />
    <label class="form-check-label"> {{ name }} </label>
  </div>
</template>


<script>
export default {
  name: "checkbox-edit",

  props: {
    id: {
      type: Number,
      default: null,
    },

    name: {
      type: String,
      default: null,
    },
    pivot: {
      type: Object,
      default: null,
    },

    index: {
      type: Number,
      default: null,
    },

    array_data: {
      type: Array,
      default: null,
    },

    first_time:{
      type: Number,
      default: 0,
    }
  },

  data() {
    return {
      check: false,
    };
  },


  computed: {
    Checked: {
      get() {
         let name = this.name
          
           //   search in data if the name is checked or not
          this.array_data.forEach(function (value, i) {
            if (value.name.localeCompare(name) === 0) {
              
              console.log('si coincide');
            }
          });

        return this.check;
      },
      set(newVal) {
        
        let first_time = this.first_time;
        if(this.first_time == 0){
          let name = this.name
          
           //   search in data if the name is checked or not
          this.array_data.forEach(function (value, i) {
            if (value.name.localeCompare(name) === 0) {
              newVal = true;
              first_time = 1;
            }
          });
        }
        this.$emit("update:first_time", first_time);
        this.$emit("update:check", newVal);
      },
    },
  },
};
</script>