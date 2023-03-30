<template>
  <div
    class="modal fade"
    id="NuevoUsuario"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div
        class="px-2 modal-content px-xl-5 px-lg-5 px-md-4 px-sm-3"
        style="background-color: #b0bec5"
      >
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Nuevo trabajador</h2>
          <b-icon
            data-dismiss="modal"
            scale="3"
            aria-label="Close"
            icon="x-circle"
          ></b-icon>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="registraUsuario">
            <div class="row">
              <div class="col-md-4">
                <label> Coloca el RPE </label>
                <input type="text" class="form-control" v-model="id" />
              </div>
            </div>
            <div class="row">
              <div class="mt-5 col-lg-6 col-xl-3">
                <p class="h3">Roles</p>
                <checkbox-edit
                  v-for="(role, index) in roles"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_roles"
                  :tipo="'roles'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <p class="h3">Áreas académicas</p>
                <checkbox-edit
                  v-for="(role, index) in academic_areas"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_academic_areas"
                  :tipo="'academic_areas'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <p class="h3">Entidades académicas</p>

                <checkbox-edit
                  v-for="(role, index) in academic_entities"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_academic_entities"
                  :tipo="'academic_entities'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>

              <div class="mt-5 col-lg-6 col-xl-3">
                <p class="h3">Programas académicos</p>
                <checkbox-edit
                  v-for="(role, index) in academic_comittes"
                  :key="role.id"
                  :name="role.name"
                  :id="role.id"
                  :pivot="role.pivot"
                  :index="index"
                  :array_data="selected_academic_comittes"
                  :tipo="'academic_comittes'"
                  @actualizaLista="actualizaLista"
                ></checkbox-edit>
              </div>
            </div>
          </form>
        </div>
        <div class="px-0 my-3 modal-footer justify-content-start">
          <button
            id="submit"
            type="submit"
            class="btn btn-primary"
            style="background-color: #0160ae"
            @click="registraUsuario"
          >
            Registrar
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CheckboxEdit from "./CheckboxEdit.vue";

export default {
  name: "nuevo-usuario",
  components: {
    CheckboxEdit,
  },

  props: {
    // Roles de usuario.
    roles: Array,

    // Áreas académicas.
    academic_areas: Array,

    // Entidades académicas.
    academic_entities: Array,

    // Comités académicas.
    academic_comittes: Array,
  },

  data() {
    return {
      id: null,
      selected_roles: [],
      selected_academic_areas: [],
      selected_academic_entities: [],
      selected_academic_comittes: [],
    };
  },

  methods: {
    actualizaLista(name, res, tipo) {
      console.log(name);
      console.log(res);
      console.log(tipo);
    },

    getName(name) {
      let local_name = "";
      switch (name) {
        case "admin":
          local_name = "Administrador";
          break;
        case "aspirante_extranjero":
          local_name = "Aspirante Extranjero";
          break;
        case "aspirante_foraneo":
          local_name = "Aspirante Local";
          break;
        case "comite_academico":
          local_name = "Comité Academico";
          break;
        case "control_escolar":
          local_name = "Control Escolar";
          break;
        case "coordinador":
          local_name = "Coordinador";
          break;
        case "personal_apoyo":
          local_name = "Personal de Apoyo";
          break;
        case "profesor_colaborador":
          local_name = "Profesor colaborador";
          break;
        case "profesor_nb":
          local_name = "Profesor Nucleo Básico";
          break;
        case "UASLP_FACULTAD DE CIENCIAS QUÍMICAS":
          local_name = "Facultad de Ciencias Químicas";
          break;
        case "UASLP_FACULTAD DE INGENIERÍA":
          local_name = "Faculdata de Ingeniería";
          break;
        case "UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS":
          local_name = "Instituto de investigación de zonas desérticas";
          break;
        case "UASLP_FACULTAD DE AGRONOMÍA":
          local_name = "Facultad de Agronomía";
          break;
        case "UASLP_COORDINACIÓN ACADÉMICA REGIÓN ALTIPLANO":
          local_name = "Coordinación Académica (Altiplano)";
          break;
        case "UASLP_CIACYT":
          local_name = "CIACYT";
          break;
        case "UASLP_FACULTAD DE MEDICINA":
          local_name = "Facultad de Medicina";
          break;
        case "UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES":
          local_name = "Facultad de Ciencias Sociales y Humanidades";
          break;
        case "FACULTAD DE PSICOLOGÍA":
          local_name = "Facultad de Psicología";
          break;
        case "UASLP_FACULTAD DE INGENIERÍA":
          local_name = "Administrador";
          break;
        case "UASLP_UNIDAD ACADÉMICA MULTIDISCIPLINARIA ZONA HUASTECA":
          local_name = "Unidad Académica Multidisciplinaria (Huasteca)";
          break;
        case "UASLP_FACULTAD DE DERECHO":
          local_name = "Facultad de Derecho";
          break;
        case "UASLP_FACULTAD DEL HÁBITAT":
          local_name = "Facultad del Hábitad";
          break;
        default:
          local_name = this.name;
          break;
      }

      return name;
    },

    registraUsuario() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
      });

      axios
        .post("/controlescolar/admin/newWorker", {
          id: this.id,
          type: "workers",
          selected_roles: this.selected_roles,
          selected_academic_areas: this.selected_academic_areas,
          selected_academic_entities: this.selected_academic_entities,
          selected_academic_comittes: this.selected_academic_comittes,
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Usuario agregado",
          });
        })
        .catch((error) => {
          Toast.fire({
            icon: "error",
            title: "El usuario no existe",
          });
        });
    },
  },
};
</script>
