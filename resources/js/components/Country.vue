<template>
    <div class="form-group col-md-6 was-validated">
        <label for="Pais"> {{ label }} </label>
        <select id="Pais" class="form-control" v-model="Pais" @change="$emit('update:changed', Pais)" name="Pais">
          <option disabled value="" selected>País</option>
          <option v-for="country in countries" :key="country.id" :value="country.name">{{ country.name }}</option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'countries',
    props: ['label'],
    mounted: function () {

        // Recupera el listado de países.
        this.$nextTick(function () {
      
            axios.get('https://ambiental.uaslp.mx/apiagenda/api/countries')
            .then(response => this.countries = response.data);
        });
    },
    data() {
        return {
            Pais: this.Pais,
            Countries: [],
        }
    },
    computed: {
        pais: {
            get: function() {
                return this.Pais;
            },
            set: function(value) {
                this.Pais = value;
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
};
</script>