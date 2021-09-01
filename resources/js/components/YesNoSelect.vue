<template>
    <div class="form-row">
        <div v-bind:class="clase">
            <label v-bind:for="id">{{ label }}</label>
            <select id="inputPertenecesUASLP" class="form-control" v-model="Value" required v-on:change="$emit('changed', Value)">
                <option disabled value="">Opción</option>
                <option>Si</option>
                <option>No</option>
            </select>
        </div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'yes-no-select',
    props: ['id', 'label', 'clase'],
    data() {
        return {
            Value: '',
        }
    },
    computed: {
        value: {
            get: function() {
                return this.Value;
            },
            set: function(value) {
                this.value = value;
            }
        }
    }
};
</script>