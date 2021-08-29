<template>
    <div class="col-12 col-lg-6 col-xl-5 my-3">
        <a data-toggle="modal" data-target="#Registro">
            <img v-bind:src="image" width="400px">
        </a>
    </div>
</template>

<script>
    export default {
        props: ['image'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>