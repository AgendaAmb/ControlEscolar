<template>
    <b-card-body>
        <div class="form-group">
            <div class="row my-2">
                <div class="col-6">
                    <label>Type</label>
                    <select v-model="TypeRL" class="form-control">
                        <option value="" selected>Choose an option</option>
                        <option v-for="item in typesRecommendationLetter " :key="item" :value="item">
                            {{ item }}
                        </option>
                    </select>
                </div>
                <div class="col-6">
                    <label>Date</label>
                    <input v-model="DateRL" type="date" class="form-control">
                </div>
            </div>

            <div class="row my-1">
                <div class="col-12">
                    <label>Full name</label>
                    <input v-model="FullName" type="text" class="form-control">
                </div>
            </div>

            <div class="row my-1">
                <div class="col-12">
                    <label>Position</label>
                    <input v-model="PositionRL" type="text" class="form-control">
                </div>
            </div>

            <div class="row my-1">
                <div class="col-12">
                    <label>Organization</label>
                    <input v-model="OrganizationRL" type="text" class="form-control">
                </div>
            </div>

            <div class="row my-1">
                <div class="col-12">
                    <label>Telephone</label>
                    <input v-model="TelephoneRL" type="number" class="form-control">
                </div>
            </div>

            <div class="row my-1">
                <div class="col-12">
                    <label>Email</label>
                    <input v-model="EmailRL" type="email" class="form-control">
                </div>
            </div>
        </div>
    </b-card-body>

</template>
  
<script>
export default {
    name: "letters-of-recommendation",

    props: {
        images_btn: {
            type: Array,
            default: [],
        },
        archive_id: {
            type: Number,
            default: 0,
        },
        type: {
            type: String,
            default: "",
        },
        date: {
            type: String,
            default: null,
        },
        title: {
            type: String,
            default: "",
        },
        position: {
            type: String,
            default: "",
        },
        organization: {
            type: String,
            default: "",
        },
        telephone: {
            type: Number,
            default: 0,
        },
        full_name: {
            type: String,
            default: "",
        },
        exam_presented: {
            type: String,
            default: "",
        },
    },

    data: function () {
        return {
            fechaobtencion: "",
            errores: {},
            typesRecommendationLetter: [],
            options_financing: ['Self-funded', 'Salary will be paid', 'Goberment Study Grant', 'I intend to apply for a CONACYT or DAAD scholarship', 'I intented to apply for an external scholarship', 'Other'],
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

        TypeRL: {
            get() {
                return this.type;
            },
            set(newVal) {
                this.$emit('update:type', newVal);
            }
        },


        DateRL: {
            get() {
                return this.date;
            },
            set(newVal) {
                this.$emit('update:date', newVal);
            }
        },

        FullName: {
            get() {
                return this.full_name;
            },
            set(newVal) {
                this.$emit('update:full_name', newVal);
            }
        },

        PositionRL: {
            get() {
                return this.position;
            },
            set(newVal) {
                this.$emit('update:position', newVal);
            }
        },

        OrganizationRL: {
            get() {
                return this.organization;
            },
            set(newVal) {
                this.$emit('update:organization', newVal);
            }
        },

        TelephoneRL: {
            get() {
                return this.telephone;
            },
            set(newVal) {
                this.$emit('update:telephone', newVal);
            }
        },

        EmailRL: {
            get() {
                return this.email;
            },
            set(newVal) {
                this.$emit('update:email', newVal);
            }
        },
    },


    methods: {
        //Funcion para un futuro guardar datos permanentes
        actualizaHistorialAcademico(evento) {
            this.enviaHistorialAcademico(evento, "Completo");
        },



    },
};
</script>