<template>
    <div class="row">
        <div class="col-lg-12 col-xl-9 my-3">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="mt-3 mb-0"> {{name}} </h5>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12 col-lg-8">
                    <p class="my-2">
                        <strong> Etiqueta: </strong>
                        {{label}}
                    </p>
                </div>
                <div class="col-md-12 col-lg-4">
                    <p class="my-2">
                        <strong> Ejemplo: </strong>
                        {{example}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3 text-right my-auto">
            <a v-if="view_document_url !== null" v-bind:href="view_document_url" target="_blank" class="d-block my-3 text-dark text-decoration-none">   
                <slot name="view_document_image"></slot>
            </a>
            <a v-if="download_document_url !== null" v-bind:href="download_document_url" target="_blank" class="d-block my-3 text-dark text-decoration-none">   
                <slot name="download_document_image"></slot>
            </a>
            <a class="d-block my-3 text-dark text-decoration-none">   
                <slot name="upload_document_image"></slot>
            </a>
            <a href="#" class="my-3 px-4 btn btn-danger"> Eliminar </a>  
            <p v-if="document_name !== null"><small><strong> {{document_name}} </strong></small></p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name','label','example','view_document_url', 'download_document_url', 'document_name'],
        mounted() {
            console.log('Se ha añadido el documento requerido')
        }
    }
</script>