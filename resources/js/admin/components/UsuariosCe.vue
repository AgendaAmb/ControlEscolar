<template>
    <div class="row">
        <div class="col-12 my-5">
            <ejs-grid :data-source="data" class="table" :rowTemplate="rowTemplate" width="100%"> 
                <e-columns>
                    <e-column field="id" headerText="RPE" textAlign="Center" width="20%"></e-column>
                    <e-column field="roles" headerText="Roles" textAlign="Center" width="20%"></e-column>
                    <e-column field="academic_areas" headerText="Áreas académicas" textAlign="Center" width="20%"></e-column>
                    <e-column field="academic_entities" headerText="Entidades académicas" textAlign="Center" width="20%"></e-column>
                    <e-column field="academic_entities" headerText="Acciones" textAlign="Center" width="20%"></e-column>
                </e-columns>
            </ejs-grid>
            <button class="mt-5 d-block btn btn-primary" data-toggle="modal" data-target="#NuevoUsuario"> Agregar usuario. </button>
        </div>
    </div>
</template>

<script>
import UsuariosCeRowTemplate from './UsuariosCeRowTemplate.vue';

export default {
    name: 'usuarios-ce',

    data() {
        return {
            data: [],

            rowTemplate() {
                return {
                    template: UsuariosCeRowTemplate
                };
            }
        }
    },

    mounted() {
        axios.get("/controlescolar/admin/workers")
        .then((response) => {
            var users = response.data.data;

            Vue.set(this, 'data', users);
        })
        .catch((error) => {

        });
    },
}
</script>