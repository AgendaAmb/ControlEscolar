<template>
    <div class="form-group col-md-3 was-validated">
        <label for="Genero">Género</label>
        <select id="Genero" class="form-control" v-model="Genero" required name="Genero" @change="$emit('update:changed', Genero)">
            <option disabled value="">Género</option>
            <option value="Masculino" id="M">Masculino</option>
            <option value="Femenino" id="F">Femenino</option>
            <option value="Otro" id="Otro">Otro</option>
            <option value="NoEspecificar" id="NE">No Especificar</option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'genders',
    data() {
        return {
            Genero: '',
        }
    },
    computed: {
        genero: {
            get: function() {
                return this.Genero;
            },
            set: function(value) {
                this.Genero = value;
            }
        },
    },
};
</script>