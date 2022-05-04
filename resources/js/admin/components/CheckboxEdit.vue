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

    data:{
        type:Array,
        default:null
    }
  },

   data() {
    return {
       check:false
    };
  },

  computed: {
    Checked: {
      get() {   

          return check;

       

       
      },
      set(newVal) {
           //   search in data if the name is checked or not
        this.data.forEach(function (value, i) {
          if (value.name.localeCompare(this.name) === 0 ) {
            check = true;
          }
        });


        if(check!= true && check)
        this.$emit("update:[index]", newVal);
      },
    },
  },
};
</script>