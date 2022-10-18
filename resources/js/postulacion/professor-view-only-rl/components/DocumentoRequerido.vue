<template>
  <!-- If intention letter the professor can upload  -->
  <div v-if="isIntentionLetter() === true" class="col-12">
    <!-- Row Content -->
    <div class="row my-3">
      <div class="form-group col-9 my-auto">
        <h5 class="mt-4 d-block">
          <strong> {{ name }} </strong>
          <template v-if="checkUpload() === true">
            <i>Estado:</i> <i class="text-success">Subido</i>
          </template>
          <template v-else>
            <i>Estado:</i> <i class="text-danger">Sin subir</i>
          </template>
        </h5>
      </div>

      <!-- Buttons Actions -->
      <div class="form-group col-3 align-items-center p-2">
        <div v-if="checkUpload() === true" class="d-flex justify-content-center  my-1"
          style="max-height: 45px; width: 100%">
          <label>
            <a :href="'../../../controlescolar/solicitud/expediente/' + location"  style=" height: 45px; width:100%;" target="_blank">
              <img :src="images_btn.ver" alt="" style="width:100%; max-height: 45px !important;">
            </a>
          </label>
        </div>

        <div class="d-flex justify-content-center my-1"
          style="max-height:45px !important; width: 100%">
          <label>
            <img :src="images_btn.seleccionar" alt="" style=" max-height: 45px !important;">
            <input type="file" class="form-control d-none" style="max-height: 45px !important; width: 100%"
              @change="cargaDocumento">
          </label>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "documento-requerido",

  props: {
    user_id: {
      type: Number,
      default: -1,
    },

    images_btn:{
      type: Object,
      default: {},
    },

    viewer_id: {
      type: Number,
      default: -1,
    },

    id: {
      type: Number,
    },

    name: {
      type: String,
    },

    notes: {
      type: String,
    },

    label: {
      type: String,
    },

    example: {
      type: String,
    },

    archivo: {
      type: File,
    },

    location: {
      type: String,
    },


    alias_academic_program: {
      type: String,
      default: null,
    },

    index_carta: {
      type: Number,
      default: 0,
    },

    exanni_score: {
      type: Number,
      default: -1,
    },
  },

  computed: {

    Archivo: {
      get() {
        return this.archivo;
      },
      set(newValue) {
        this.$emit('update:archivo', newValue);
      }
    },
    Location: {
      get() {
        return this.location;
      },
      set(newValue) {
        this.$emit('update:location', newValue);
      }
    },
    Errores: {
      get() {
        return this.errores;
      },
      set(newValue) {
        this.errores = newValue;
        this.$emit('update:errores', newValue);
      }
    }
  },



  methods: {
    isIntentionLetter() {
      if (this.name === "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)") {
        return true;
      }
      console.log(this.name);
      return false;
    },

    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        return true;
      } else {
        return false;
      }
    },
    cargaDocumento(e) {
      var name = e.target.files[0].name;
      this.Errores = {};

      if (!name.endsWith(".pdf")) {
        this.Errores = {
          file: "El archivo debe de contener formato pdf.",
        };
        return false;
      }

      this.$emit("enviaDocumento", this, e.target.files[0]);
    },
  },
};
</script>