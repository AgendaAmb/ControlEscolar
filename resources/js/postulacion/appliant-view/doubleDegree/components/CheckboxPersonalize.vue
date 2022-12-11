<template>

  <div v-if="isOther() === false" class="row my-2">
    <div class="col-12">
      <b-form-checkbox switch v-model="Checked" size="lg">
        <p class="h5">{{ label }}</p>
      </b-form-checkbox>
    </div>

  </div>

  <div v-else class="row my-2">
    <div class="col-4">
      <b-form-checkbox switch v-model="Checked" size="lg">
        <p class="h5">{{ label }}</p>
      </b-form-checkbox>
    </div>
    <div class="col-8">
      <input v-model="OtherText" type="text" class="form-control" placeholder="">
    </div>
  </div>


</template>
  
  
<script>
export default {
  name: "checkbox-personalize",

  props: {
    id: {
      type: Number,
      default: null,
    },

    label: {
      type: String,
      default: null,
    },

    value: {
      type: String,
      default: null,
    },


    index: {
      type: Number,
      default: null,
    },

  },

  data() {
    return {
      check: false,
      first_time: 0,
      local_name: "",
    };
  },

  created() {
  },

  methods: {
    isOther() {
      if (this.label === 'Other'
        || this.label === 'Online research (please keyword)'
        || this.label === 'Media (which)'
        || this.label === 'Fair or Conference (name and year)'
        || this.label === 'Master portal pages (name)'
        || this.label === 'From my university'
      ) {
        return true;
      }
      return false;
    }
  },


  computed: {
    OtherText: {
      get() {
        return this.value;
      },

      set(newVal) {
        this.$emit("update:value", newVal);
      },
    },

    Checked: {
      get() {
        return this.check;
      },

      set(newVal) {
        this.$emit("actualizaLista", this.label, this.value, newVal);
        // console.log('nombre: ' + this.local_name + ' valor: ' + newVal + ' lista: ' + this.tipo);
        this.check = newVal;
        // console.log('name: ', this.name, ' value:', this.check );
      },
    },
  },
};
</script>