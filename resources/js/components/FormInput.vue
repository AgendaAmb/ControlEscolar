<template>
    <div v-bind:class="clase">
        <label v-bind:for="id">
            <slot></slot>
        </label>
        <input v-bind:type="input_type" class="form-control" 
                v-bind:id="id" v-model="input" v-bind:name="id" 
                v-bind:style="input_style" @change="$emit('update:changed', input)" required>
    </div>
</template>

<script>
export default {
    name: 'form-input',
    props: ['id','clase','input_type', 'input_style'],
    data() {
        return {
            Input: '',
        }
    },
    computed: {
        input: {
            get: function() {
                return this.Input;
            },
            set: function(value) {
                this.Input = value;
            }
        },
    },
};
</script>