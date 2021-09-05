<template>
    <div v-bind:class="clase">
        <label v-bind:for="id">
            <slot></slot>
        </label>
        <input v-bind:type="input_type" class="form-control" 
                v-bind:id="id" v-model="input" v-bind:name="id" 
                v-bind:style="input_style" v-bind:readonly="readonly">
    </div>
</template>

<script>
export default {
    name: 'form-input',
    props: ['id','input_type','input_style','clase', 'readonly'],
    data: function() {
        return {
            Input: '',
        }
    },
    computed: {
        input: {
            get: function() {
                return this.Input;
            }, 
            
            set: function(val) {
                this.Input = val;
                this.$emit('update:input', val);
            }
        }

    },
};
</script>