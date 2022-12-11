<template>

    <!-- Accordion -->
    <b-card-body class="row">
        <div class="form-group">
            <checkbox-personalize v-for="(cho, index) in hear_options" :key="index" :label="cho" :value="cho"
                :id="index" @actualizaLista="actualizaLista"></checkbox-personalize>
        </div>

        <div class="row justify-content-start my-2">
            <div class="col-4 align-items-center " style="width:100%; max-height: 45px !important;">
                <img @click="updateHearAboutProgram" :src="images_btn.guardar" alt=""
                    style=" max-height: 45px !important;">
            </div>
            <div class="col-8">
                <label>
                    <p><strong>Only save Future plans and expecations</strong></p>
                </label>
            </div>
        </div>
    </b-card-body>

</template>
  
<script>
import CheckboxPersonalize from './CheckboxPersonalize.vue';

export default {
    name: "hear-about-program",
    components: { CheckboxPersonalize },
    props: {

        // id del expediente.
        archive_id: Number,

        id: Number,

        how_hear: {
            type:JSON,
            default:null
        }
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

    

    data: function () {
        return {
            images_btn:[],
            fechaobtencion: "",
            errores: {},
            datosValidos: {},
            // universidades: [],
            hear_options: [
                'DAAD Brochure',
                'CONACYT Information',
                'Current Student',
                'Alumni',
                'Online research (please keyword)',
                'Media (which)',
                'Fair or Conference (name and year)',
                'Master portal pages (name)',
                'From my university',
                'Other',
            ],



            escolaridades: ["Bachelor's Degree", "Master's Degree", "Diplom", "Magister", "Specialization"],
            estatusEstudios_PMPCA: ["Grado obtenido", "Título o grado en proceso"],
            gradiationMode: ['Thesis Investigation - Thesis Title', 'Graduation Courses & Examination - Courses Underta', 'Practical Work - Field & Institution'],
            estatusEstudios_otros: [
                "Pasante",
                "Grado obtenido",
                "Título o grado en proceso",
            ],
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
    },


    methods: {

        updateHearAboutProgram(){
            axios
                .post("/controlescolar/solicitud/hearAboutProgram/update", {
                    id: this.index,
                    archive_id: this.archive_id,
                    how_hear: this.how_hear
                  
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
            this.financing_options_list.forEach(function (value, i) {

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
                    this.financing_options_list.splice(index, 1);
                }
            } else {
                if (index < 0) {
                    if (label === 'Other')
                        this.financing_options_list.push([label, value]);
                }

            }
        },
    },
};
</script>