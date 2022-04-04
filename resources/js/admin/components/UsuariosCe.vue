<template>
    <div class="row align-items-center">
        <div class="col-6 d-flex flex-column my-auto  align-items-center">
            <h3 class="ml-2">Administración de usuarios</h3>
        </div>

        <div class="col-6 d-flex flex-column my-auto align-items-center">
              <button class="btn btn-success w-50" data-toggle="modal" data-target="#NuevoUsuario"> Agregar usuario. </button>
        </div>

        <div class="col-12 mt-5">
            <ejs-grid :data-source="data" class="table" :rowTemplate="rowTemplate" width="100%"> 
                <e-columns>
                    <e-column field="id" headerText="RPE" textAlign="Center" width="10%"></e-column>
                    <e-column field="roles" headerText="Roles" textAlign="Center" width="15%"></e-column>
                    <e-column field="academic_areas" headerText="Áreas académicas" textAlign="Center" width="15%"></e-column>
                    <e-column field="academic_entities" headerText="Entidades académicas" textAlign="Center" width="30%"></e-column>
                    <e-column field="academic_entities" headerText="Acciones" textAlign="Center" width="30%"></e-column>
                </e-columns>
            </ejs-grid>
            
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