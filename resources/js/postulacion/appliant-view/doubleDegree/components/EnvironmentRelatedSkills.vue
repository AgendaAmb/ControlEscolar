<template>
    <div class="form-row my-2">
        <div class="col-12">
            <label>
                <p>Practical experience, Software, Equipment handling, Field work, Sampling, etc</p>
            </label>
            <textarea class="form-control" rows="10" v-model="MessageReview" placeholder="..." />
        </div>

        <div class="row justify-content-start my-2" >
                <div class="col-4" style="width:100%; max-height: 45px !important;">
                    <img @click="updateEnvironmentSkills" :src="images_btn.guardar" alt=""
                        style=" max-height: 45px !important;">
                </div>
                <div class="col-8">
                    <label>
                        <p class="h4"><strong>This only save Environment Related Skills</strong></p>
                    </label>
                </div>
            </div>
    </div>
</template>
  
<script>
export default {
    name: "environment-related-skills",

    props: {
        archive_id: {
            type: Number,
            default: 0
        },

        message_review: {
            type: String,
            default: "",
        },

        id: {
            type: Number,
            default: 0,
        }
    },

    data() {
        return {
            images_btn:[],
        };
    },

    computed: {
        MessageReview: {
            get() {
                return this.message_review;
            },
            set(newVal) {
                this.$emit("update:message_review", newVal);
            },
        },
    },

    created() {
        // console.log(this.language);
        axios
            .get("/controlescolar/solicitud/getAllButtonImage")
            .then((response) => {
                // console.log('recibiendo imagenes' + response.data.ver);
                this.images_btn = response.data;
                // console.log('imagenes buttons: ' + this.images.ver);
            })
            .catch((error) => {
                console.log(error);
            });
    },

    methods: {
        
        updateEnvironmentSkills() {
            axios
                .post("/controlescolar/solicitud/EnvironmentSkills/update", {
                    id: this.index,
                    archive_id: this.archive_id,
                    message_review:this.message_review
                }).then(response => {
                    Swal.fire({
                        title: response.data.message,
                        icon: 'success',
                        text: 'Continue filling others sections',
                        showCancelButton: false,
                    });
                }).catch(error => {
                    Swal.fire({
                        title: 'Error trying to save information',
                        icon: 'error',
                        text: 'Try later',
                        showCancelButton: false,
                    });
                });
        },

    },
};
</script>