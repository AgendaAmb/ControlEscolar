<template>
  <div class="">
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
      default: [],
    },

    tipo:{
      type:String,
      default: "roles"
    },
  },

  data() {
    return {
      check: false,
      first_time: 0,
    };
  },

  computed: {
    Checked: {
      get() {
        let first_time = this.first_time;
        let newVal = this.check;
        let array =  this.array_data ?  this.array_data : []; 
        if (first_time <= 0 && array.length > 0) {
          let name = this.name;

          //   search in data if the name is checked or not
          array.forEach(function (value, i) {
            if (value.name.localeCompare(name) === 0) {
              newVal = true;
              first_time = 1;
            }
          });
        }

        if (first_time > 0) {
          // this.$emit("update:first_time", first_time);
          this.check = newVal;
          this.first_time = 1;
          // console.log('name ',this.name,' value:',this.check);
        }

        return this.check;
      },

      set(newVal) {
        this.$emit("actualizaLista",this.name,newVal,this.tipo );
        this.check = newVal;
        // console.log('name: ', this.name, ' value:', this.check );
      },
    },
  },
};
</script>