<template>
    <!-- Accordion -->
    <div class="row">
        <div class="row my-2">
            <div class="col-12">
                <label>
                    <p>Is the ENREM master program your first choice?</p>
                </label>
                <select v-model="FirstChoise" class="form-control">
                    <option value="" selected>Choose an option</option>
                    <option v-for="item in booleanChoises" :key="item" :value="item">
                        {{ item }}
                    </option>
                </select>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12">
                <label>
                    <p>Let us know why - or why not:</p>
                </label>
                <textarea class="form-control" rows="4" v-model="ReasonsChoise" placeholder="..." />
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12">
                <label>
                    <p>Which other University and Master Program came on your short list?</p>
                </label>
                <textarea class="form-control" rows="4" v-model="OtherChoises" placeholder="..." />
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12">
                <label class="h3">Why did you decide to study the ENREM master's degree? (Multiple choice is
                    possible)</label>
                <checkbox-personalize v-for="(cho, index) in choises_list" :key="index" :label="cho" :value="cho" :id="index"  @actualizaLista="actualizaLista"></checkbox-personalize>
            </div>
        </div>


        <div class="row justify-content-start my-4" style="width:100%;">
            <div class="col-md-2 col-xs-3 align-items-center " style="width:100%; max-height: 45px !important;">
                <img @click="updateEnvironmentRelatedSkills" :src="images_btn.guardar" alt=""
                    style=" max-height: 45px !important;">
            </div>
            <div class="col-md-10 col-xs-9 mx-3">
                <label>
                    <p><strong>Only save Reasons to Choise</strong></p>
                </label>
            </div>
        </div>
    </div>
</template>
  
<script>

import CheckboxPersonalize from './CheckboxPersonalize.vue';

export default {
    name: "reasons-to-choise",

    props: {
        // Images of buttons
        images_btn: Array,
        // id del expediente.
        archive_id: Number,
        // variables
        first_choise: {
            default: "",
            type: String
        },

        reasons_choise: {
            default: "",
            type: String
        },

        other_choises: {
            default: "",
            type: String
        },

        // default and other (specify)
        selected_choises: {
            default: null,
            type: JSON,
        }
    },

    created() {
        this.selected_choises_list = Object.keys(this.selected_choises).map((key) => [key, this.selected_choises[key]]);
    },

    components: {
        CheckboxPersonalize,
    },

    data: function () {
        return {
            fechaobtencion: "",
            errores: {},
            datosValidos: {},

            booleanChoises: ['Yes', 'No'],
            // universidades: [],
            choises_list: [
                "Course of study / focus of content",
                "Studying and living in Mexico and Germany",
                "Obtain two degree in two years",
                "Possibility for scholarship",
                "Other"
            ],
            selected_choises_list: [],
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



        DigitalSignature: {
            get() {
                return this.digital_signature;
            },
            set(newVal) {
                this.$emit("update:digital_signature", newVal);
            },
        },

        FirstChoise: {
            get() {
                return this.first_choise;
            },
            set(newVal) {
                this.$emit("update:first_choise", newVal);
            },
        },

        ReasonsChoise: {
            get() {
                return this.reasons_choise;
            },
            set(newVal) {
                this.$emit("update:reasons_choise", newVal);
            },
        },

        OtherChoises: {
            get() {
                return this.other_choises;
            },
            set(newVal) {
                this.$emit("update:other_choises", newVal);
            },
        },
    },


    methods: {
        // Name is the list 
        // res is the boolean value, push or pop
        actualizaLista(label, value ,res) {

            let index = -1;
            this.selected_choises_list.forEach(function (value, i) {

                if (value != null) {
                    if (value[0].toLowerCase() === label.toLowerCase()) {
                        index = i;
                        console.log('lo encontre ');
                    }
                }

            });


            if (!res) {
                // pop
                // El dato encontrado se elimina de la lista de seleccionados
                if (index >= 0) {
                    this.selected_choises_list.splice(index, 1);
                }
            } else {
                if(index < 0) {
                    if(label === 'Other')
                    this.selected_choises_list.push([label,value]);
                }
                
            }
        },

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

        updateEnvironmentRelatedSkills(evento) {
            this.sendEnvironmentRelatedSkills(evento, "Completo");
        },

        sendEnvironmentRelatedSkills(evento, estado) {
            this.errores = {};
            axios
                .post("/controlescolar/solicitud/updateAppliantLanguage", {
                    id: this.id,
                    archive_id: this.archive_id,
                    state: estado,
                    language: this.language,
                    institution: this.institution,
                    score: this.score,
                    presented_at: this.presented_at,
                    valid_from: this.valid_from,
                    valid_to: this.valid_to,
                    language_domain: this.language_domain,
                    conversational_level: this.conversational_level,
                    reading_level: this.reading_level,
                    writing_level: this.writing_level,
                    kind_of_exam: this.kind_of_exam,
                    exam_presented: this.exam_presented,
                })
                .then((response) => {
                    // El resultado fue exitoso.
                    Object.keys(response.data).forEach((dataKey) => {
                        var event = "update:" + dataKey;
                        this.$emit(event, response.data[dataKey]);
                    });

                    Swal.fire({
                        title: "Los datos se han actualizado correctamente",
                        text: "El idioma seleccionado se ha guardado, podras hacer cambios mientras la postulación este disponible",
                        icon: "success",
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonColor: "#3085d6",
                        cancelButtonText: "Continuar",
                    });
                })
                .catch((error) => {
                    Swal.fire({
                        title: "Error al actualizar datos",
                        text: error.response.data["message"],
                        showCancelButton: false,
                        icon: "error",
                    });
                });
                
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
    
    },
};
</script>