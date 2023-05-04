<template>
    <div class="row align-items-center">
        <div class="grid-center">
            <h1>{{ `${this.localProgramName}` }}</h1>
        </div>
        <!-- Tittle and add or asign new data to User -->
        <div
            class="container-fluid"
            :class="{ invisible: !dataNotEmpty() }"
            v-if="dataNotEmpty()"
        >
            <div
                class="d-flex my-2 justify-content-center user-search"
                style="height: 45px !important"
            >
                <b-input-group
                    size="lg"
                    class="col-12"
                    style="height: 100% !important"
                >
                    <b-form-input
                        style="height: 45px !important"
                        type="search"
                        v-model="search"
                        placeholder="Buscar nombre"
                        oninput="this.value = this.value.toUpperCase()"
                    >
                    </b-form-input>
                    <b-input-group-append
                        is-text
                        style="height: 45px !important"
                    >
                        <b-icon
                            icon="search"
                            aria-hidden="true"
                            role="button"
                            onclick="console.log(this.data)"
                        ></b-icon>
                    </b-input-group-append>
                </b-input-group>
            </div>
            <div class="d-flex my-2 justify-content-center">
                <div class="col-12">
                    <div class="overflow-auto">
                        <b-table
                            striped
                            hover
                            head-variant="blue"
                            id="my-table"
                            :items="filteredList"
                            :fields="fields"
                            :per-page="perPage"
                            :current-page="currentPage"
                            class="text-center h3"
                        >
                            <template v-slot:cell(No_Expediente)="{ item }">
                                <span>
                                    <p class="h6">{{ item.id }}</p>
                                </span>
                            </template>

                            <template v-slot:cell(Periodo)="{ item }">
                                <span
                                    v-if="
                                        item.academic_program !=
                                        'Doctorado en ciencias ambientales'
                                    "
                                >
                                    <p class="h6">
                                        {{
                                            item.announcement_from[0] +
                                            item.announcement_from[1] +
                                            item.announcement_from[2] +
                                            item.announcement_from[3]
                                        }}
                                        -
                                        {{
                                            item.announcement_to[0] +
                                            item.announcement_to[1] +
                                            item.announcement_to[2] +
                                            item.announcement_to[3]
                                        }}
                                    </p>
                                </span>
                                <span
                                    v-else-if="item.announcement_from[6] == 1"
                                >
                                    <p class="h6">
                                        {{
                                            item.announcement_from[0] +
                                            item.announcement_from[1] +
                                            item.announcement_from[2] +
                                            item.announcement_from[3]
                                        }}
                                        - I
                                    </p>
                                </span>

                                <span v-else>
                                    <p class="h6">
                                        {{
                                            item.announcement_from[0] +
                                            item.announcement_from[1] +
                                            item.announcement_from[2] +
                                            item.announcement_from[3]
                                        }}
                                        - II
                                    </p>
                                </span>
                            </template>

                            <template v-slot:cell(Nombre)="{ item }">
                                <span>
                                    <p class="h6">
                                        {{ item.name.toUpperCase() }}
                                    </p>
                                </span>
                            </template>

                            <template v-slot:cell(Estado)="{ item }">
                                <div
                                    :class="classObjectFor(item.status)"
                                    role="alert"
                                >
                                    {{ getNameStatus(item.status) }}
                                </div>
                            </template>

                            <template v-slot:cell(Expediente)="{ item }">
                                <a
                                    :href="`/controlescolar/solicitud/expediente/${item.id}`"
                                    target="_blank"
                                    >Mostrar expediente</a
                                >
                            </template>
                        </b-table>

                        <!-- Paginatinn bottom -->
                        <b-pagination
                            v-model="currentPage"
                            :total-rows="rows"
                            :per-page="perPage"
                            class="my-4"
                            align="fill"
                        >
                            <template #first-text>
                                <b-icon
                                    icon="chevron-double-left"
                                    aria-hidden="true"
                                ></b-icon>
                            </template>
                            <template #prev-text>
                                <b-icon
                                    icon="chevron-left"
                                    aria-hidden="true"
                                ></b-icon>
                            </template>
                            <template #next-text>
                                <b-icon
                                    icon="chevron-right"
                                    aria-hidden="true"
                                ></b-icon>
                            </template>
                            <template #last-text>
                                <b-icon
                                    icon="chevron-double-right"
                                    aria-hidden="true"
                                ></b-icon>
                            </template>
                        </b-pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.invisible {
    visibility: hidden;
}
</style>

<script>
export default {
    // Nombre del componente
    name: "archives",

    mounted() {},

    // Propiedas.
    props: {
        data: {
            type: [Object, Array],
        },

        programName: {
            type: String,
            default: "",
        },

        // Columnas de la tabla.
        columns: {
            type: Array,
            default() {
                return [
                    "No. expediente",
                    "Periodo",
                    "Nombre completo",
                    "Estado",
                    "Expediente",
                ];
            },
        },
    },

    computed: {
        filterByName() {
            this.localProgramName = this.programName;
            let list = [];

            let { data: dataReceived } = this.data;
            dataReceived.filter((user) =>
                user.name
                    .toString()
                    .toLowerCase()
                    .includes(this.search.toLowerCase())
            );
        },
        filteredList() {
            this.localProgramName = this.programName;
            let list = [];

            let { data: dataReceived } = this.data;
            dataReceived.filter((user) => {
                //console.log("User", user);
                if (
                    user.name
                        .toString()
                        .toLowerCase()
                        .includes(this.search.toLowerCase())
                ) {
                    list.push(user);
                }

                /*  if (
          user.name.toLowerCase().includes(this.search.toLowerCase())
        ) {
          list.push(user);
          //console.log(user.name);
        } */
            });

            if (list.length <= 0) {
                list = dataReceived;
            }

            return list;
        },

        rows() {
            let list = [];

            this.data.data.filter((user) => {
                list.push(user);
                if (
                    user.name
                        .toString()
                        .toLowerCase()
                        .includes(this.search.toLowerCase())
                ) {
                    list.push(user);
                }
            });

            if (list.length <= 0) {
                list = this.data.data;
            }

            return list.length;
        },
    },

    methods: {
        dataNotEmpty() {
            let res = false;
            try {
                if (this.data.data.length > 0) {
                    res = true;
                }
            } catch (e) {
                console.log("Error con la lectura de los alumnos", e);
            } finally {
                return res;
            }
        },

        classObjectFor(status) {
            let color = null;
            switch (status) {
                case 1:
                    color = "alert alert-secondary";
                    break;
                case 2:
                    color = "alert alert-warning";
                    break;
                case 3:
                    color = "alert alert-info";
                    break;
                case 4:
                    color = "alert alert-primary";
                    break;
                case 5:
                    color = "alert alert-success";
                    break;
                case 6:
                    color = "alert alert-danger";
                    break;
                case 7:
                    color = "alert alert-light";
                    break;
                default:
                    color = "alert alert-secondary";
                    break;
            }

            return color;
        },

        getNameStatus(status) {
            let name_status = "";
            switch (status) {
                case 1:
                    name_status = "Incompleto";
                    break;
                case 2:
                    name_status = "En espera de revisión";
                    break;
                case 3:
                    name_status = "Por Actualizar";
                    break;
                case 4:
                    name_status = "¡Documentos nuevos!";
                    break;
                case 5:
                    name_status = "Completo";
                    break;
                case 6:
                    name_status = "No cumple";
                    break;
                case 7:
                    name_status = "Condicionado";
                    break;
                default:
                    name_status = "Incompleto";
                    break;
            }

            return name_status;
        },
    },

    data() {
        return {
            search: "",
            perPage: 10,
            currentPage: 1,
            fields: [
                {
                    key: "No_Expediente",
                    label: "No Expediente",
                    sortable: true,
                },
                {
                    key: "Periodo",
                    sortable: true,
                },
                {
                    key: "Nombre",
                    label: "Nombre",
                    sortable: true,
                },

                {
                    key: "Estado",
                    sortable: false,
                },
                {
                    key: "Expediente",
                    sortable: false,
                },
            ],
            localProgramName: this.programName,

            rowTemplate() {
                return {
                    template: UsuariosCeRowTemplate,
                };
            },
        };
    },
};
</script>
<style scoped>
.grid-center {
    margin-top: 30px;
    display: grid !important;
    place-items: center !important;
}
.grid-center > * {
    display: grid !important;
    place-items: center !important;
}
</style>
