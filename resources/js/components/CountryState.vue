<template>
    <div class="form-group col-md-4 was-validated">
        <label for="State"> {{ label }} </label>
        <select id="State" class="form-control" v-model="State" v-on:change="$emit('changed', this.state)" name="State">
          <option disabled value="" selected>Estado</option>
          <option v-for="state in states" :key="state.id" :value="state.name">{{ state.name }}</option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'country-state',
    props: ['label'],
    data() {
        return {
            State: this.State,
            States: [],
        }
    },
    computed: {
        state: {
            get: function() {
                return this.State;
            },
            set: function(value) {
                this.State = value;
            }
        },
        states: {
            get: function() {
                return this.States;
            },
            set: function(value) {
                this.States = value;
            }
        },
    },
};
</script>