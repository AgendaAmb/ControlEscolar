<template>
    <div v-bind:class="clase">
        <label v-bind:for="id">
            <slot></slot>
        </label>
        <input v-bind:type="input_type" class="form-control" 
                v-bind:id="id" v-model="input" v-bind:name="id" 
                v-bind:style="input_style" @change="$emit('update:input', input)" required>
    </div>
</template>

<script>
export default {
    name: 'form-input',
    props: {
        id: String,
        clase: String,
        input_type : String,
        input_style : String,
        input : String,
    },
};
</script>