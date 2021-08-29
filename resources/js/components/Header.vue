<template>
    <header class="container-fluid">
        <div class="row text-center justify-content-center">
            <div class="col-12 franjaEncabezado"></div>
            <div class="col-12 franjaPrograma"></div>
            <div class="col-12">
                <slot></slot>
            </div>
        </div>
    </header> 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
