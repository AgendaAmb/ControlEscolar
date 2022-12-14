<template>

    <!-- Accordion -->
    <b-card-body>
        <div class="form-group row">
            <checkbox-personalize v-for="(cho, index) in options_financing" :key="index" :label.sync="cho.label" :value.sync="cho.value"
                :id="index" @actualizaLista="actualizaLista"></checkbox-personalize>
        </div>

        <div class="row my-2">
            <div class="col-4 " style="width:100%; max-height: 45px !important;">
                <img @click="updateFinancingStudies" :src="images_btn.guardar" alt=""
                    style=" max-height: 45px !important;">
            </div>
            <div class="col-8">
                <label>
                    <p><strong>Only save Financing studies</strong></p>
                </label>
            </div>
        </div>
    </b-card-body>
</template>
  
<script>
import CheckboxPersonalize from './CheckboxPersonalize.vue';
export default {
    name: "financing-studies",

    components: { CheckboxPersonalize },

    props: {
        id: {
            type: Number,
            default: -1,
        },
        archive_id: {
            type: Number,
            default: 0,
        },
        financing_options: {
            default: "",
            type: String,
        }
    },

    data: function () {
        return {
            images_btn: [],
            fechaobtencion: "",
            errores: {},
            options_financing: [
                {label: 'Self-funded', value: 'Self-funded'} ,
                {label: 'Salary will be paid', value: 'Salary will be paid'} ,
                {label: 'Goberment Study Grant', value: 'Goberment Study Grant'} ,
                {label: 'I intend to apply for a CONACYT or DAAD scholarship', value: 'I intend to apply for a CONACYT or DAAD scholarship'} ,
                {label: 'I intented to apply for an external scholarship', value: 'I intented to apply for an external scholarship'} ,
                {label: 'Other', value: 'Other'} ,
            ],
            financing_options_list: [],
        };
    },

    created() {
        if (this.financing_options != null) {
            for (let index = 0; index < array.length; index++) {
                const element = array[index];
                
            }
            this.financing_options_list = Object.keys(this.financing_options).map((key) => [key, this.financing_options[key]]);
        }

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

    },

    methods: {

        updateFinancingStudies() {
            console.log(this.financing_options_list);
            axios
                .post("/controlescolar/solicitud/enrem/financingStudies/update", {
                    id: this.id,
                    archive_id: this.archive_id,
                    financing_options:JSON.stringify(this.financing_options_list)
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


        actualizaLista(label, value, res) {
            let index = -1;

            // no data, insert
            if (this.financing_options_list.length <= 0 && res) {
                this.financing_options_list.push([label, value]);
            } else {

                // data exist, check the index
                this.financing_options_list.forEach(function (value, i) {

                    if (value[0].toLowerCase() === label.toLowerCase()) {
                        index = i;
                        console.log('lo encontre ');
                    }
                });

                // pop
                if (!res) {
                    if (index >= 0) {
                        this.financing_options_list.splice(index, 1);
                    }
                    // push
                } else {
                    if (index < 0) {
                        this.financing_options_list.push([label, value]);
                    }

                }
            }


        },
    },
};
</script>