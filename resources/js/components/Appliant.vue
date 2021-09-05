<template>
    <div class="mt-5 row justify-content-left">
        <div class="col-md-5 col-lg-6 col-xl-3 my-2">
            <label for="fotoPerfil"> Foto de Perfil </label>
            <slot name="profile_picture"></slot>
        </div>
        <div class="form-group col-md-7 col-lg-6 col-xl-9 text-left">
            <div class="row justify-content-center"> 
                <slot name="identity"></slot>
            </div>
        </div>

        <slot name="personal_data"></slot>
    </div>
</template>

<script>
    export default {
        name: 'appliant-data',
        props: [ 'color' ],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>