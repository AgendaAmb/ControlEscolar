<template>
    <details open>
        <summary
            class="btn row d-flex align-items-center justify-content-center my-2"
            :style="styleBtnAccordionSection"
        >
            <div class="col-lg-8 col-md-6 col-xs-12">
                <b-icon icon="arrow-up" class="mx-2" font-scale="2.0"></b-icon>
                <span
                    class="h5 font-weight-bold"
                    style="width: auto !important"
                >
                    Working Experience {{ index }}</span
                >
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <button
                    class="uaslp-btn uaslp-red"
                    @click="eliminaExperienciaLaboral"
                >
                    <font-awesome-icon icon="fa-solid fa-trash-can" />

                    <span>Delete</span>
                </button>

                <!-- <b-button
          @click="eliminaExperienciaLaboral"
          pill
          class="d-flex justify-content-start align-items-center"
          style="height: 45px !important"
          variant="danger"
        >
          <b-icon icon="trash-fill" class="mx-2" font-scale="2.5"></b-icon>
          <p class="h5 my-2">Delete</p>
        </b-button> -->
            </div>
        </summary>
        <!-- Accordion -->
        <b-card-body>
            <!-- Content -->
            <div
                class="d-flex justify-content-start align-items-center my-2"
                style="width: 100%"
            >
                <div class="col-12">
                    <!-- First row FROM | TO | TYPE OF EXPERIENCE -->
                    <div class="row my-2">
                        <div class="form-group col-md-4">
                            <label> From: </label>
                            <input
                                v-model="From"
                                type="date"
                                class="form-control"
                            />
                        </div>

                        <div class="form-group col-md-4">
                            <label> To: </label>
                            <input
                                v-model="To"
                                type="date"
                                class="form-control"
                            />
                        </div>

                        <div class="form-group col-md-4">
                            <label> Type of experience: </label>
                            <input
                                v-model="KnowledgeArea"
                                type="text"
                                class="form-control"
                                placeholder="job,internship,entrepeneurshi,...."
                            />
                        </div>
                    </div>

                    <!-- Position -->
                    <div class="row my-2">
                        <div class="form-group col-md-12">
                            <label>Position: </label>
                            <input
                                v-model="WorkingPosition"
                                type="text"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <!-- Organization | Country -->
                    <div class="row my-2">
                        <div class="col-lg-8 col-sm-12">
                            <label>Organization: </label>
                            <input
                                v-model="Institution"
                                type="text"
                                class="form-control"
                            />
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <label>Country:</label>
                            <select
                                v-model="State"
                                class="form-control"
                                @change="escogePais"
                            >
                                <option value="" selected>
                                    Choose a country
                                </option>
                                <option
                                    v-for="country in countries"
                                    :key="country.id"
                                    :value="country.name"
                                >
                                    {{ country.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Main responsabilities -->
                    <div class="row my-2">
                        <div class="col-12">
                            <label>Main responsabilities: </label>
                            <textarea
                                class="form-control"
                                rows="4"
                                v-model="WorkingPositionDescription"
                                placeholder="Detail your main responsibilities at work ..."
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Content -->
            <div class="col-12">
                <div class="row justify-content-start my-2">
                    <div class="col-lg-2 col-sm-4 align-items-center">
                        <button
                            class="uaslp-btn"
                            @click="updateWorkingExperiences"
                        >
                            <font-awesome-icon icon="fa-solid fa-floppy-disk" />
                            <span>Save</span>
                        </button>

                        <!-- <img @click="updateWorkingExperiences" :src="images_btn.guardar" alt=""
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
        </b-card-body>
    </details>
</template>

<script>
export default {
    name: "working-experience",

    props: {
        from: {
            type: String,
            default: null,
        },

        to: {
            type: String,
            default: null,
        },

        knowledge_area: {
            type: String,
            default: "",
        },

        working_position: {
            type: String,
            default: "",
        },

        institution: {
            type: String,
            default: "",
        },

        state: {
            type: String,
            default: "",
        },

        working_position_description: {
            type: String,
            default: "",
        },

        index: {
            type: Number,
            default: 0,
        },

        id: {
            type: Number,
            default: 0,
        },
    },

    data() {
        return {
            countries: [],
            errores: {},
            images_btn: [],
        };
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

    mounted: function () {
        this.$nextTick(function () {
            axios
                .get(
                    "https://ambiental.uaslp.mx/apiagenda/api/countries/states"
                )
                .then((response) => {
                    this.countries = response.data;
                });
        });
    },

    computed: {
        styleBtnAccordionSection() {
            var color = "rgba(0,96,175,255)";

            return {
                backgroundColor: color,
                color: "rgb(244, 244, 244)",
                border: "none",
                alignItems: "center",
                width: "100%!important",
                display: "flex",
            };
        },

        From: {
            get() {
                return this.from;
            },
            set(newVal) {
                this.$emit("update:from", newVal);
            },
        },

        To: {
            get() {
                return this.to;
            },
            set(newVal) {
                this.$emit("update:to", newVal);
            },
        },

        KnowledgeArea: {
            get() {
                return this.knowledge_area;
            },
            set(newVal) {
                this.$emit("update:knowledge_area", newVal);
            },
        },

        WorkingPosition: {
            get() {
                return this.working_position;
            },
            set(newVal) {
                this.$emit("update:working_position", newVal);
            },
        },

        Institution: {
            get() {
                return this.institution;
            },
            set(newVal) {
                this.$emit("update:institution", newVal);
            },
        },

        State: {
            get() {
                return this.state;
            },
            set(newVal) {
                this.$emit("update:state", newVal);
            },
        },

        WorkingPositionDescription: {
            get() {
                return this.working_position_description;
            },
            set(newVal) {
                this.$emit("update:working_position_description", newVal);
            },
        },
    },

    // Methods
    methods: {
        escogePais(evento) {
            Vue.set(
                this,
                "states",
                this.countries[evento.target.selectedIndex - 1].states
            );
        },

        ColorStrip() {
            var color = "#FFFFFF";

            switch (this.academic_program.alias) {
                case "maestria":
                    color = "#0598BC";
                    break;
                case "doctorado":
                    color = "#FECC50";
                    break;
                case "enrem":
                    color = "#FF384D";
                    break;
                case "imarec":
                    color = "#118943";
                    break;
            }

            return {
                backgroundColor: color,
                height: "1px",
            };
        },

        eliminaExperienciaLaboral() {
            axios
                .post("/controlescolar/solicitud/deleteWorkingExperience", {
                    id: this.id,
                    archive_id: this.archive_id,
                })
                .then((response) => {
                    //Llama al padre para que elimine el item de la lista de experiencia laboral
                    this.$emit("delete-item", this.index - 1);

                    Swal.fire({
                        title: "Éxito al eliminar Experiencia laboral",
                        text: response.data.message, // Imprime el mensaje del controlador
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Continuar",
                    });
                })
                .catch((error) => {
                    Swal.fire({
                        title: "There was an error trying to delete the section. Please try again later",
                        showCancelButton: false,
                        icon: "error",
                    });
                });
        },

        updateWorkingExperiences() {
            axios
                .post(
                    "/controlescolar/solicitud/enrem/workingExperiences/update",
                    {
                        id: this.id,
                        archive_id: this.archive_id,
                        from: this.from,
                        to: this.to,
                        knowledge_area: this.knowledge_area,
                        working_position: this.working_position,
                        institution: this.institution,
                        state: this.state,
                        working_position_description:
                            this.working_position_description,
                    }
                )
                .then((response) => {
                    Swal.fire({
                        title: "The data introduced in this section was saved.",
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

        estaEnError(key) {
            return key in this.errores;
        },

        classObjectFor(key) {
            return {
                "form-control": true,
                "is-invalid": this.estaEnError(key),
            };
        },
    },
};
</script>
