<template>
    <div class="form-group col-md-4 was-validated">
        <label for="Pais"> {{ label }} </label>
        <select v-bind:id="id" class="form-control" v-model="Pais"  v-bind:name="id"  @change="updateIndex($event.target.selectedIndex)">
            <option disabled value="" selected>País</option>
            <option v-for="country in countries" :key="country.id" :value="country.name">{{ country.name }}</option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'countries',
    props: ['label', 'id', 'Countries'],
    data: function(){
        return {
            Pais: '',
            SelectedIndex: 0,
        };
    },
    computed: {
        pais: {
            get: function() {
                return this.Pais;
            },
            set: function(value) {
                this.Pais = value;
                this.$emit('updated', this.SelectedIndex);
            }
        },
        countries: {
            get: function() {
                return this.Countries;
            },
            set: function(value) {
                this.Countries = value;
            }
        }
    },
    methods: {
        updateIndex(index){
            this.SelectedIndex = index - 1;
            this.pais = this.Pais;
        }
    }
};
</script>