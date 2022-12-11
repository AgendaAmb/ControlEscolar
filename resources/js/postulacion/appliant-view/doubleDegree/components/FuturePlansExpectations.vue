<template>
    <b-card-body>
        <div class="form-group">
            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>Wich pathh are you planning to pursue in the future?</p>
                    </label>
                    <select v-model="PursueFuture" class="form-control">
                        <option value="" selected>Choose an option</option>
                        <option v-for="item in purpuseFutureList " :key="item" :value="item">
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
                    <textarea class="form-control" rows="4" v-model="ExplainPursueFuture" placeholder="..." />
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start mt-0 mb-3" style="width:100%;">
            <div class="col-md-2 col-xs-3 align-items-center " style="width:100%; max-height: 45px !important;">
                <img @click="updateFuturePlansExpectations" :src="images_btn.guardar" alt=""
                    style=" max-height: 45px !important;">
            </div>
            <div class="col-md-10 col-xs-9 mx-3">
                <label>
                    <p><strong>Only save Future plans and expecations</strong></p>
                </label>
            </div>
        </div>
    </b-card-body>
</template>
  
<script>
export default {
    name: "future-plans-expectations",

    props: {
        images_btn: Array,

        // id del expediente.
        archive_id: Number,

        pursue_future: {
            type: String,
            default: '',
        },

        explain_pursue_future: {
            type: String,
            default: ""
        },

    },

    data: function () {
        return {
            errores: {},
            purpuseFutureList: ['Consulting Services', 'Coorporate Career', 'Development Cooperation', 'Social Oriented Work', 'Research and Investigation', 'Phd Studies', 'Others'],
        };
    },

    computed: {
        styleBtnAccordionSection() {
            var color = "rgba(0,96,175,255)";

            return {
                backgroundColor: color,
                color: 'rgb(244, 244, 244)',
                border: 'none',
                alignItems: 'center',
                width: '100%!important',
                display: 'flex'
            }
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
        }

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

        //Funcion para un futuro guardar datos permanentes
        updateFuturePlansExpectations(evento) {
            this.newFuturePlansExpectations(evento, "Completo");
        },

        newFuturePlansExpectations() {
            axios
                .post("/controlescolar/solicitud/newFuturePlansExpectations", {
                    id: this.id,
                    archive_id: this.archive_id,
                })
                .then((response) => {
                    //Llama al padre para que elimine el item de la lista de experiencia laboral
                    this.$emit("delete-item", this.index - 1);
                    Swal.fire({
                        title: "Éxito al eliminar registro",
                        text: response.data.message, // Imprime el mensaje del controlador
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Continuar",
                    });
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error al eliminar registro",
                        showCancelButton: false,
                        icon: "error",
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