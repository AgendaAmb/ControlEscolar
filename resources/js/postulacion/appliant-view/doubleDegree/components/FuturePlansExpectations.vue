<template>
    <b-card-body>
        <div class="form-group">
            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>
                            Wich path are you planning to pursue in the future?
                        </p>
                    </label>
                    <select v-model="PursueFuture" class="form-control">
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in purpuseFutureList"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>Describe:</p>
                    </label>
                    <textarea
                        class="form-control"
                        rows="4"
                        v-model="ExplainPursueFuture"
                        placeholder="..."
                    />
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-start my-2">
                <div class="col-lg-2 col-sm-4 align-items-center">
                    <button
                        class="uaslp-btn"
                        @click="updateFuturePlansExpectations"
                    >
                        <font-awesome-icon icon="fa-solid fa-floppy-disk" />
                        <span>Save</span>
                    </button>
                    <!-- <img @click="updateFuturePlansExpectations" :src="images_btn.guardar" alt=""
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
</template>

<script>
export default {
    name: "future-plans-expectations",

    props: {
        // id del expediente.
        archive_id: Number,

        id: Number,

        pursue_future: {
            type: String,
            default: "",
        },

        explain_pursue_future: {
            type: String,
            default: "",
        },
    },

    data: function () {
        return {
            images_btn: [],
            errores: {},
            purpuseFutureList: [
                "Consulting Services",
                "Coorporate Career",
                "Development Cooperation",
                "Social Oriented Work",
                "Research and Investigation",
                "PhD Studies",
                "Others",
            ],
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

        ColorStrip() {
            var color = "#FFFFFF";

            switch (this.alias_academic_program) {
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

        PursueFuture: {
            get() {
                return this.pursue_future;
            },
            set(newVal) {
                this.$emit("update:pursue_future", newVal);
            },
        },

        ExplainPursueFuture: {
            get() {
                return this.explain_pursue_future;
            },
            set(newVal) {
                this.$emit("update:explain_pursue_future", newVal);
            },
        },
    },

    methods: {
        countryHasValue() {
            //country is not empty
            if (this.country != null) {
                //Find the index
                this.paises.forEach(function (pais) {
                    if (pais.name === this.country) {
                        this.Universidades = pais.universities;
                    }
                });
            }

            return true;
        },

        selectOrNotDegreeType() {
            let res = true;
            let answer = this.alias_academic_program.localCompare("doctorado"); //compare string

            //alias no es doctorado por lo que es una maestria
            if (answer != 0) {
                this.degree_type = "Licenciatura"; //Solo licenciatura
                res = false; //retorno falso
            }

            return res;
        },

        escogePais(evento) {
            this.Universidades =
                this.paises[evento.target.selectedIndex - 1].universities;
        },

        updateFuturePlansExpectations() {
            axios
                .post(
                    "/controlescolar/solicitud/enrem/futurePlansExpectations/update",
                    {
                        id: this.id,
                        archive_id: this.archive_id,
                        pursue_future: this.pursue_future,
                        explain_pursue_future: this.explain_pursue_future,
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

        objectForError(key) {
            return {
                "is-invalid": this.estaEnError(key),
            };
        },
    },
};
</script>
