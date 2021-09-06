<template>
    <div class="col-12 mt-5">
        <div class="row justify-content-left">
            <form-input id="FechaInicio" clase="form-group col-md-4" input_type="date"> 
                De (dd/mm/yyyy): 
            </form-input>
            <form-input id="FechaFin" clase="form-group col-md-4" input_type="date"> 
                Hasta (dd/mm/yyyy): 
            </form-input>
            <form-input id="FechaAprobacion" clase="form-group col-md-4" input_type="text"> 
                Tipo de experiencia: 
            </form-input>

            <form-input id="FechaAprobacion" clase="form-group col-md-12" input_type="text"> 
                Puesto: 
            </form-input>

            <form-input id="FechaAprobacion" clase="form-group col-md-8" input_type="text"> 
                Organización: 
            </form-input>

            <form-input id="FechaAprobacion" clase="form-group col-md-4" input_type="text"> 
                País: 
            </form-input>

            <div class="col-md-12">
                <label for="Descripcion" class="d-block"> Responsabilidades </label>
                <textarea id="Descripcion" class="w-100" name="Descripcion"></textarea>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'appliant-data',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>