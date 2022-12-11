<template>

    <!-- Accordion -->
    <b-card-body class="row">
        <div class="form-group">
            <checkbox-personalize v-for="(cho, index) in hear_options" :key="index" :label="cho" :value="cho"
                :id="index" @actualizaLista="actualizaLista"></checkbox-personalize>
        </div>
    </b-card-body>

</template>
  
<script>
import CheckboxPersonalize from './CheckboxPersonalize.vue';

export default {
    name: "hear-about-program",
    components: { CheckboxPersonalize },
    props: {
        images_btn: Object,

        // id del expediente.
        archive_id: Number,


    },

    

    data: function () {
        return {
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