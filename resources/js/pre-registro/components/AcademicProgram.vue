<template>
    <div class="col-12 col-lg-6 col-xl-5 my-3">
        <a data-toggle="modal" data-target="#Registro" @click="$emit('click', id)">
            <img :src="photo" width="400px">
        </a>
    </div>
</template>

<script>
export default {
    name: 'academic-program',
    props: {
        // Id del programa académico.
        id: Number,

        // Foto del programa académico.
        photo: String
    }
}
</script>
