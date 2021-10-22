<template>
    <div class="row">
        <div class="col-12 my-5">
            <ejs-grid :data-source="data" class="table" :rowTemplate="rowTemplate" width="100%"> 
                <e-columns>
                    <e-column field="description" headerText="" textAlign="Center" width="20%"></e-column>
                    <e-column headerText="Excelente" textAlign="Center" width="20%"></e-column>
                    <e-column headerText="Muy bien" textAlign="Center" width="20%"></e-column>
                    <e-column headerText="Bien" textAlign="Center" width="20%"></e-column>
                    <e-column headerText="Deficiente" textAlign="Center" width="20%"></e-column>
                </e-columns>
            </ejs-grid>
            <button class="mt-5 d-block btn btn-primary" data-toggle="modal" data-target="#NuevoUsuario"> Agregar usuario. </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'rubrica',
    
    data() {
        return {
            data: {},
            
        };
    },
}
</script>
