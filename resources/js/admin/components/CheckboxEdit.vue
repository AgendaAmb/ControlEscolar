<template>
  <div class="col">
    <b-form-checkbox switch v-model="Checked" size="lg">
      <p class="h5">{{ local_name }}</p>
    </b-form-checkbox>
  </div>
</template>


<script>
export default {
  name: "checkbox-edit",

  props: {
    id: {
      type: Number,
      default: null,
    },

    name: {
      type: String,
      default: null,
    },
    pivot: {
      type: Object,
      default: null,
    },

    index: {
      type: Number,
      default: null,
    },

    array_data: {
      type: Array,
      default: [],
    },

    tipo: {
      type: String,
      default: "roles"
    },
  },

  data() {
    return {
      check: false,
      first_time: 0,
      local_name: "",
    };
  },

  created() {
    switch (this.name) {
      case 'admin':
        this.local_name = 'Administrador';
        break;
      case 'aspirante_extranjero':
        this.local_name = 'Aspirante Extranjero';
        break;
      case 'aspirante_foraneo':
        this.local_name = 'Aspirante Foraneo';
        break;
      case 'aspirante_local':
        this.local_name = 'Aspirante Local';
        break;
      case 'comite_academico':
        this.local_name = 'Comité Academico';
        break;
      case 'control_escolar':
        this.local_name = 'Control Escolar';
        break;
      case 'coordinador':
        this.local_name = 'Coordinador';
        break;
      case 'personal_apoyo':
        this.local_name = 'Personal de Apoyo';
        break;
      case 'profesor_colaborador':
        this.local_name = 'Profesor colaborador';
        break;
      case 'profesor_nb':
        this.local_name = 'Profesor Nucleo Básico';
        break;
      case 'UASLP_FACULTAD DE CIENCIAS QUÍMICAS':
        this.local_name = 'Facultad de Ciencias Químicas';
        break;
      case 'UASLP_FACULTAD DE INGENIERÍA':
        this.local_name = 'Faculdata de Ingeniería';
        break;
      case 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS':
        this.local_name = 'Instituto de investigación de zonas desérticas';
        break;
      case 'UASLP_FACULTAD DE AGRONOMÍA':
        this.local_name = 'Facultad de Agronomía';
        break;
      case 'UASLP_COORDINACIÓN ACADÉMICA REGIÓN ALTIPLANO':
        this.local_name = 'Coordinación Académica (Altiplano)';
        break;
      case 'UASLP_CIACYT':
        this.local_name = 'CIACYT';
        break;
      case 'UASLP_FACULTAD DE MEDICINA':
        this.local_name = 'Facultad de Medicina';
        break;
      case 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES':
        this.local_name = 'Facultad de Ciencias Sociales y Humanidades';
        break;
      case 'FACULTAD DE PSICOLOGÍA':
        this.local_name = 'Facultad de Psicología';
        break;
      case 'UASLP_FACULTAD DE INGENIERÍA':
        this.local_name = 'Administrador';
        break;
      case 'UASLP_UNIDAD ACADÉMICA MULTIDISCIPLINARIA ZONA HUASTECA':
        this.local_name = 'Unidad Académica Multidisciplinaria (Huasteca)';
        break;
      case 'UASLP_FACULTAD DE DERECHO':
        this.local_name = 'Facultad de Derecho';
        break;
      case 'UASLP_FACULTAD DEL HÁBITAT':
        this.local_name = 'Facultad del Hábitad';
        break;
      default:
        this.local_name = this.name;
        break;
    }

    let temp = this.name;

    // compare if the checkbox is already selected or not
    let res = false;
    this.array_data.forEach(function (value, i) {
      if (value['name'].toLowerCase() === temp.toLowerCase()) {
        res = true;
      }
    });

    this.check = res;
  },


  computed: {
    Checked: {
      get() {
        return this.check;
      },

      set(newVal) {
        this.$emit("actualizaLista", this.name, newVal, this.tipo);
        // console.log('nombre: ' + this.local_name + ' valor: ' + newVal + ' lista: ' + this.tipo);
        this.check = newVal;
        // console.log('name: ', this.name, ' value:', this.check );
      },
    },
  },
};
</script>