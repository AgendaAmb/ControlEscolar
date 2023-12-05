<template>
    <b-card-body>
        <div class="form-group">
            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>
                            <strong> Project idea: </strong>Identify a potential
                            area of research you want to pursue during your
                            master thesis that matches the areas at PMPCA and
                            the NRM program at ITT whit your own skills as well as
                            your future professional interests.
                        </p>
                    </label>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>Potential title/Title of potential research idea</p>
                    </label>
                    <textarea
                        class="form-control"
                        rows="4"
                        v-model="ProyectIdea"
                        placeholder="..."
                    />
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>Keywords (3)</p>
                    </label>
                    <textarea
                        class="form-control"
                        rows="4"
                        v-model="Keywords "
                        placeholder="..."
                    />
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>
                            <strong> Professor: </strong> Identify two potential
                            Professor or Senior Researchers, one from ITT and
                            one from PMPCA, who are doing research in a field
                            closely related to your potential research idea
                            (project idea)
                        </p>
                    </label>
                </div>

                <div class="col-12">
                    <p class="h4">Please refer to the following links:</p>

                    <ul class="my-2">
                        <li>
                            <p>
                                <a
                                    href="https://ambiental.uaslp.mx/pmpca/areas/detalles?area=1"
                                    target="_blank"
                                    >PMPCA:</a
                                >
                                http://ambiental.uaslp.mx/pmpca/ (in Profesores
                                y Areas de especializacion)
                            </p>
                        </li>
                        <li>
                            <p>
                                <a
                                    href="http://www.enrem-master.info/about-enrem/lecturers"
                                    target="_blank"
                                    >ITT:</a
                                >
                                http://www.enrem-master.info/about-enrem/lecturers
                                (in Lecturers TH KÖLN - ITT Professors and
                                Senior Researchers)
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-12">
                    <label>
                        <p>
                            <strong
                                >Research Area at both Universities:
                            </strong>
                            In accordance with your research idea and the
                            identified professor (senior researcher) for your
                            research idea select a research area from PMPCA and
                            ITT (BOTH) that mostly relates.
                        </p>
                    </label>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-4 col-sm-12">
                    <p class="h4">Country</p>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <p class="h4">Mexíco</p>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <p class="h4">Germany</p>
                </div>
            </div>

       <div class="row my-1">
                <div class="col-lg-4 col-sm-12">
                    <label for="">
                        <p>Research Area</p>
                    </label>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <select v-model="ResearchAreaMexico" class="form-control">
                       
                        <option
                            v-for="item in researchAreaMexico"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <select v-model="ResearchAreaGerman" class="form-control">
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in researchAreaGerman"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
            </div>
            

        <div class="row my-1">
                <div class="col-lg-4 col-sm-12">
                    <label>
                        <p>Professor (Senior Researchers)</p>
                    </label>
                </div>
                

                <div v-if="selectedIsPrevencion() === true" class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchMexico"
                        class="form-control"
                        name="profesor" 
                        id="profesor"
                    >
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in profesoresPreventionandControl"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
                <div v-else-if="selectedIsRenewable() === true" class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchMexico"
                        class="form-control"
                    >
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in profesoresRenewableNaturalResources"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
                <div v-else-if="selectedIsEnviromentalA() === true" class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchMexico"
                        class="form-control"
                    >
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in profesoresEnviromentalAssessment"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
                <div v-else-if="selectedIsEnviromentalM() === true" class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchMexico"
                        class="form-control"
                    >
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in profesoresEnviromentalManagement"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
                <div v-else-if="selectedIsIntegrated() === true" class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchMexico"
                        class="form-control"
                    >
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in profesoresIntegratedEnviromentalHealth"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>
                <div v-else-if="selectedIsnada() === true" class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchMexico"
                        class="form-control"
                    >
                        <option value="" selected>Choose an option</option>
                        <option value="" >..</option>
                        
                    </select>
                </div>
                <div  class="col-lg-4 col-sm-6">
                    <select
                        v-model="ProfessorResearchGerman"
                        class="form-control"
                    >
                        <option value="" selected>Choose an option</option>
                        <option
                            v-for="item in professorsGerman"
                            :key="item"
                            :value="item"
                        >
                            {{ item }}
                        </option>
                    </select>
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <label>
                        <p>
                            <strong>Elective modules: </strong> Refer to the
                            following link:
                            http://www.enrem-master.info/about-enrem/content
                            (Module Catalogue ENREM) Which elective modules
                            offered in the ENREM Master program would you take
                            to develop your research idea?
                        </p>
                    </label>
                </div>
            </div>

            <div class="row my-1">
                <div class="col-lg-4 col-sm-12">
                    <label for="">
                        <p>Second semester PMPCA (2 elective modules)</p>
                    </label>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <input
                        v-model="ElectiveModulesPMPCAMexico"
                        type="text"
                        class="form-control"
                    />
                </div>

                <div class="col-lg-4 col-sm-6">
                    <input
                        v-model="ElectiveModulesPMPCAGerman"
                        type="text"
                        class="form-control"
                    />
                </div>
            </div>

            <div class="row my-1">
                <div class="col-lg-4 col-sm-12">
                    <label>
                        <p>Third semester ITT (2 elective modules)</p>
                    </label>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <input
                        v-model="ElectiveModulesITTMexico"
                        type="text"
                        class="form-control"
                    />
                </div>

                <div class="col-lg-4 col-sm-6">
                    <input
                        v-model="ElectiveModulesITTGerman"
                        type="text"
                        class="form-control"
                    />
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row my-2">
                <div class="col-lg-2 col-sm-4">
                    <button class="uaslp-btn" @click="updateFieldsOfInterest">
                        <font-awesome-icon icon="fa-solid fa-floppy-disk" />
                        <span>Save</span>
                    </button>
                    <!-- <img @click="updateFieldsOfInterest" :src="images_btn.guardar" alt=""
                        style=" max-height: 45px !important;"> -->
                </div>
                <div class="col-lg-10 col-sm-8">
                    <label>
                        <p class="h5">
                            <strong>Note:Only the section´s data will be saved</strong>
                        </p>
                    </label>
                </div>
            </div>
        </div>
    </b-card-body>
</template>

<script>
export default {
    name: "fields-of-interest",

    props: {
        //Index de la escolaridad
        archive_id: Number,
        id: Number,
        proyect_idea: {
            type: String,
            default: "",
        },

        keywords_proyect_idea: {
            type: String,
            default: "",
        },

        research_area_mexico: {
            type: String,
            default: "",
        },

        research_area_german: {
            type: String,
            default: "",
        },

        professor_research_mexico: {
            type: String,
            default: "",
        },

        professor_research_german: {
            type: String,
            default: "",
        },

        elective_modules_PMPCA_german: {
            type: String,
            default: "",
        },

        elective_modules_PMPCA_mexico: {
            type: String,
            default: "",
        },

        elective_modules_ITT_german: {
            type: String,
            default: "",
        },

        elective_modules_ITT_mexico: {
            type: String,
            default: "",
        },
    },

    data: function () {
        return {
            images_btn: [],
            errores: {},
            professorsGerman: [
                "Prof. Dr. Sabine Schlüter",
                "Prof. Dr. Johannes Hamhaber",
                "Prof. Dr. Udo Nehren",
                "Prof. Dr. Lars Ribbe",
                "Prof. Dr. Jackson Roehrig",
                "Prof. Dr. Ramchandra Bhandari",
                "Dr. Claudia Raedig",
                "Dr. Georg Lamberty",
                "Dr. Rui Costa Pedroso",
                "Dr. Alexandra Nauditt",
            ],
            profesoresRenewableNaturalResources:[
                    "Dra. Gisela Aguilar Benítez",
                    "Dr. Gregorio Álvarez Fuentes",
                    "Dr. José Arturo De Nova Vázquez",
                    "Dr. Héctor Martín Durán García",
                    "Dr. José Luis Flores Flores",
                    "Dr. Javier Fortanelli Martínez",
                     "Dra. Erika García Chávez",
                    "Dr. Juan Carlos García López",
                    "Dr. Bertha Irene Juárez Flores",
                    "Dr. Carlos Alfonso Muñoz Robles",
                    "Dr. Hugo Magdaleno Ramírez Tobías",
                    "Dr. Juan Antonio Reyes Agüero",
                    "Dra. Laura Yáñez Espinosa",
            ],
            profesoresEnviromentalAssessment:[
                   "Dr. Marcos Algara Siller",
                   "Dr. Alfredo Ávila Galarza",
                   "Dr. Luis Armando Bernal Jácome",
                   "Dr. Antonio Cardona Benavides",
                   "Dr. Guillermo Javier Castro Larragoitia",
                   "Dr. Israel Razo Soto",
            ],
            profesoresEnviromentalManagement:[
                "Dr. Carlos Contreras Servín",
                "Dra. María Guadalupe Galindo Mendoza",
                "Dra. Patricia Julio Miranda",
                "Dr. Leonardo Ernesto Márquez Mireles",
                "Dr. Álvaro Gerardo Palacio Aponte",
                "Dr. Humberto Reyes Hernández",
                "Dra. Anuschka Van´t Hooft",
                "Dr. Valente Vázquez Solís",
            ],
            profesoresIntegratedEnviromentalHealth:[
                "Dr. José Antonio Ávalos Lozano",
                "Dra. Jaqueline Calderón Hernández",
                "Dra. Virginia Gabriela Cilia López",
                "Dra. Ana Cristina Cubillas Tejeda",
                "Dr. Fernando Díaz-Barriga Martínez",
                "Dra. Gabriela Domínguez Cortinas",
                "Dr. Guillermo Espinosa Reyes",
                "Dr. Rogelio Flores Ramírez",
                "Dra. Donají Josefina González Mille",
                "Dr. César Ilizaliturri Hernández",
                "Dr. José de Jesús Mejía Saavedra",
                "Dr. Francisco Javier Pérez Vázquez",
                "Dra. Silvia Romero Contreras",
                "Dr. Moisés Roberto Vallejo Pérez",
                "Dra. Leticia Guadalupe Yáñez Estrada",
            ],
            profesoresPreventionandControl:[
                "Dra. Ma. Catalina Alfaro de la Torre",
                "Dr. Roberto Briones Gallardo",
                "Dra. Candy Carranza Álvarez",
                "Dra. Elsa Cervantes González",
                "Dra. Paola Elizabeth Díaz Flores",
                "Dr. Nahúm Andrés Medellín Castillo",
                "Dr. Israel Rodríguez Torres",
                "Dr. Luis Manuel Rosales Colunga",
            ],
            professorsMexico: [
                "MA. CATALINA DE LA TORRE ALFARO",
                "FERNANDO BARRIGA MARTINEZ DIAZ",
                "JOSE DE JESUS SAAVEDRA MEJIA",
                "MARICELA DIAZ DE LEON RODRIGUEZ",
                "JAVIER MARTINEZ FORTANELLI",
                "ANA CRISTINA TEJEDA CUBILLAS",
                "HUMBERTO HERNANDEZ REYES",
                "JUAN ANTONIO AGUERO REYES",
                "ALFREDO GALARZA AVILA",
                "SILVIA CONTRERAS ROMERO",
                "LUIS ARMANDO JACOME BERNAL",
                "MARIA EUGENIA GARCIA ALMENDAREZ",
                "ERIKA CHAVEZ GARCIA",
                "MARCOS SILLER ALGARA",
                "ISRAEL TORRES RODRIGUEZ",
                "GUILLERMO JAVIER LARRAGOITIA CASTRO",
                "ANUSCHKA JOHANNA MARIA 'T HOOFT  VAN",
                "JOSE LUIS FLORES FLORES",
                "PAOLA ELIZABETH FLORES DIAZ",
                "VALENTE SOLIS VAZQUEZ",
                "LEONARDO ERNESTO MIRELES MARQUEZ",
                "JUAN CARLOS LOPEZ GARCIA",
                "LAURA ESPINOSA YAÑEZ",
                "GUILLERMO REYES ESPINOSA",
                "PATRICIA MIRANDA JULIO",
                "GREGORIO FUENTES ALVAREZ",
                "ISRAEL SOTO RAZO",
                "CESAR ARTURO HERNANDEZ ILIZALITURRI",
                "JOSE ARTURO NOVA VAZQUEZ DE",
            ],
            researchAreaMexico: [
                 " Choose an option",
                "Renewable Natural Resources",
                "Enviromental Assessment",
                "Enviromental Management",
                "Integrated Enviromental Health",
                "Prevention and Control",
            ],
            researchAreaGerman: [
                "NRM focus Land Management",
                "NRM focs Regional Management",
                "NRM fous Water Management",
                "NRM focus Energy Management",
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

        // implement later, this need to be fix
        // axios
        //     .get("/controlescolar/admin/getNameWorkers")
        //     .then((response) => {
        //         this.professorsMexico = response.data.data;
        //         console.log(response.data.data);
        //     })
        //     .catch((error) => {
        //         console.log(error);
        //     });
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

        Keywords: {
            get() {
                return this.keywords_proyect_idea;
            },
            set(newValue) {
                this.$emit("update:keywords_proyect_idea", newValue);
            },
        },

        ResearchAreaMexico: {
            get() {
                return this.research_area_mexico;
            },
            set(newValue) {
                this.$emit("update:research_area_mexico", newValue);
            },
        },

        ProyectIdea: {
            get() {
                return this.proyect_idea;
            },
            set(newVal) {
                this.$emit("update:proyect_idea", newVal);
            },
        },

        ResearchAreaGerman: {
            get() {
                return this.research_area_german;
            },
            set(newVal) {
                this.$emit("update:research_area_german", newVal);
            },
        },

        ProfessorResearchMexico: {
            get() {
                return this.professor_research_mexico;
            },
            set(newVal) {
                this.$emit("update:professor_research_mexico", newVal);
            },
        },

        ProfessorResearchGerman: {
            get() {
                return this.professor_research_german;
            },
            set(newVal) {
                this.$emit("update:professor_research_german", newVal);
            },
        },

        ElectiveModulesPMPCAGerman: {
            get() {
                return this.elective_modules_PMPCA_german;
            },
            set(newVal) {
                this.$emit("update:elective_modules_PMPCA_german", newVal);
            },
        },

        ElectiveModulesPMPCAMexico: {
            get() {
                return this.elective_modules_PMPCA_mexico;
            },
            set(newVal) {
                this.$emit("update:elective_modules_PMPCA_mexico", newVal);
            },
        },

        ElectiveModulesITTGerman: {
            get() {
                return this.elective_modules_ITT_german;
            },
            set(newVal) {
                this.$emit("update:elective_modules_ITT_german", newVal);
            },
        },

        ElectiveModulesITTMexico: {
            get() {
                return this.elective_modules_ITT_mexico;
            },
            set(newVal) {
                this.$emit("update:elective_modules_ITT_mexico", newVal);
            },
        },
    },

    methods: {
        updateFieldsOfInterest() {
            axios
                .post(
                    "/controlescolar/solicitud/enrem/fieldsOfInterest/update",
                    {
                        id: this.id,
                        archive_id: this.archive_id,
                        proyect_idea: this.proyect_idea,
                        keywords_proyect_idea: this.keywords_proyect_idea,
                        research_area_mexico: this.research_area_mexico,
                        research_area_german: this.research_area_german,
                        professor_research_mexico:
                            this.professor_research_mexico,
                        professor_research_german:
                            this.professor_research_german,
                        elective_modules_PMPCA_german:
                            this.elective_modules_PMPCA_german,
                        elective_modules_PMPCA_mexico:
                            this.elective_modules_PMPCA_mexico,
                        elective_modules_ITT_german:
                            this.elective_modules_ITT_german,
                        elective_modules_ITT_mexico:
                            this.elective_modules_ITT_mexico,
                    }
                )
                .then((response) => {
                    Swal.fire({
                        title: "The data introduced in this section was saved.",
                        icon: "success",
                        text: "Please continue filling out the  other sections",
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
        selectedIsPrevencion() {
            if (this.research_area_mexico === "Prevention and Control") {
                return true;
            }
            return false;
        },
        selectedIsRenewable() {
            if (this.research_area_mexico === "Renewable Natural Resources") {
                return true;
            }
            return false;
        },
        selectedIsEnviromentalA() {
            if (this.research_area_mexico === "Enviromental Assessment") {
                return true;
            }
            return false;
        },
        selectedIsEnviromentalM() {
            if (this.research_area_mexico === "Enviromental Management") {
                return true;
            }
            return false;
        },
        selectedIsIntegrated() {
            if (this.research_area_mexico === "Integrated Enviromental Health") {
                return true;
            }
            return false;
        },
        selectedIsnada() {
            return true;
        },
        

        objectForError(key) {
            return {
                "is-invalid": this.estaEnError(key),
            };
        },
    },
};
</script>
