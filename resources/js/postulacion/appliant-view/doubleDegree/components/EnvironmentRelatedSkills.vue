<template>
    <div class="form-row my-2">
        <div class="col-12">
            <label>
                <p>
                    Practical experience, Software, Equipment handling, Field
                    work, Sampling, etc
                </p>
            </label>
            <textarea
                class="form-control"
                rows="10"
                v-model="MessageReview"
                placeholder="..."
            />
        </div>

        <div class="col-12">
            <div class="row justify-content-center my-4">
                <div class="col-lg-2 col-lg-4">
                    <button class="uaslp-btn" @click="updateEnvironmentSkills">
                        <font-awesome-icon icon="fa-solid fa-floppy-disk" />
                        <span>Save</span>
                    </button>
                    <!-- <img @click="updateEnvironmentSkills" :src="images_btn.guardar" alt=""
                        style=" max-height: 45px !important;"> -->
                </div>
                <div class="col-lg-10 col-sm-8">
                    <label>
                        <p class="h5">
                            <strong
                                >Note:Only the section´s data will be saved</strong
                            >
                        </p>
                    </label>
                </div>
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
            default: 0,
        },

        message_review: {
            type: String,
            default: "",
        },

        id: {
            type: Number,
            default: 0,
        },
    },

    data() {
        return {
            images_btn: [],
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
                .post(
                    "/controlescolar/solicitud/enrem/environmentSkills/update",
                    {
                        id: this.id,
                        archive_id: this.archive_id,
                        message_review: this.message_review,
                    }
                )
                .then((response) => {
                    Swal.fire({
                        title: "The data introducec in this section was saved.",
                        icon: "success",
                        text: "Please continue filling out the other sections",
                        showCancelButton: false,
                    });
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error trying to save information",
                        icon: "error",
                        text: "Try later",
                        showCancelButton: false,
                    });
                });
        },
    },
};
</script>
