<template>
    <div class="modal fade " id="Registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3 px-2" style="background-color: #8b96a8">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Registro</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <slot></slot>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['label'],
};
</script>