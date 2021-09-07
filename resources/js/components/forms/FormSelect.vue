<template>
    <div v-bind:class="clase">
        <label v-bind:for="id"> 
            <slot></slot>
        </label>
        <select v-bind:id="id" class="form-control" v-model="SelectedValue" @change="updateIndex($event.target.selectedIndex)"> 
            <slot name="options">
                <option value="" selected> Escoge una opción </option>   
                <option v-for="option in options" :key="option.id" :value="option.name">{{ option.name }}</option> 
            </slot> 
        </select>
    </div>
</template>

<script>
export default {
    
    name: 'form-select',
    props: [ 'id', 'clase', 'Options' ],
    
    data: function(){
        return {
            SelectedValue: '',
            SelectedIndex: 0,
        };
    },

    mounted() { 
        console.log('El componente para escoger opciones ya se montó.')
    },
    computed: {
        selectedValue: {
            get: function() {
                return this.SelectedValue;
            },
            set: function(value) {
                this.SelectedValue = value;
                this.$emit('update:selected_value', this.SelectedValue);
                this.$emit('update:selected_index', this.SelectedIndex);
            }
        },
        options: {
            get: function() {
                return this.Options;
            },
            set: function(value) {
                this.Options = value;
            }
        }
    },
    methods: {
        updateIndex(index){
            this.SelectedIndex = index - 1;
            this.selectedValue = this.SelectedValue;
        }
    }
}
</script>