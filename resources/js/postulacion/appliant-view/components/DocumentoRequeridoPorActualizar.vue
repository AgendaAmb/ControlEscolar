<template>
  <div v-if="isInList() === true" class="col-12">
    <div class="row my-3">
      <!-- Nombre y notas -->
      <div class="form-group col-9 col-md-9 col-xs-7 my-auto">
        <h5 class="mt-4 d-block">
          <strong> {{ name }} </strong>
          <template v-if="checkUpload() === 2">
            <i>Estado:</i> <i class="text-success">Documento Nuevo</i>
          </template>
          <template v-else-if="checkUpload() === 1">
            <i>Estado:</i> <i class="text-success">Subido</i>
          </template>
          <template v-else>
            <i>Estado:</i> <i class="text-danger">Sin subir</i>
          </template>
        </h5>

        <p v-if="notes !== null" class="mt-3 mb-1 d-block">
          <strong> Observaciones: <span v-html="notes"></span></strong>
        </p>

        <p class="mt-3 mb-1 d-block">
          <strong> Etiqueta: </strong> {{ label }}
        </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }}</p>
      </div>

      <div
        class="
          form-group
          col-3 col-md-3 col-xs-5
          justify-content-center
          my-auto
        "
      >
        <a
          :href="'/controlescolar/solicitud/expediente/' + location"
          v-if="checkUpload() > 0"
          class="btn btn-primary"
          style="width: 100%"
          target="_blank"
        >
          Ver Archivo</a
        >
        <label class="btn btn-primary d-block ml-auto my-2">
          Subir Documento
          <input
            type="file"
            class="form-control d-none"
            @change="cargaDocumento"
          />
        </label>
      </div>
    </div>
  </div>
</template>

<style scoped>
.cargarArchivo {
  background-color: #3490dc;
  border-radius: 10px;
  text-align: center;
  border: none;
  font-weight: bold;
  color: white;
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 70%;
  height: 30px;
}
.verArchivo {
  background-color: #3490dc;
  font-weight: bold;
  text-align: center;
  color: white;
  border-radius: 10px;
  border: none;
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 70%;
  height: 30px;
}
</style>


<script>
export default {
  name: "documento-requerido-porActualizar",

  props: {
    user_id: {
      type: Number,
      default: -1,
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

    letters_Commitment: {
      type: Array,
      default: null,
    },

    alias_academic_program: {
      type: String,
      default: null,
    },

    index_carta: {
      type: Number,
      default: 0,
    },

    require_documents_to_update: {
      type: Array,
      default: [],
    },

    index_require_documents_to_update: {
      type: Array,
      default: null,
    },

    list_type: {
      type: String,
      default: null,
    },

    errores: Object,
  },

  data() {
    return {
      state: 0,
      updload_here: false,
      datosValidos: {},
      textStateUpload: "",
      academiLetterCommitment: "",
      index: {
        type: Number,
        default: -1,
      },
    };
  },

  computed: {
    Archivo: {
      get() {
        return this.archivo;
      },
      set(newValue) {
        this.$emit("update:archivo", newValue);
      },
    },
    Location: {
      get() {
        return this.location;
      },
      set(newValue) {
        this.$emit("update:location", newValue);
      },
    },
    Errores: {
      get() {
        return this.errores;
      },
      set(newValue) {
        this.$emit("update:errores", newValue);
      },
    },
  },

  methods: {
    isInList() {
      let res = false;

      if (
        this.list_type != null &&
        (this.list_type === "academic" ||
          this.list_type === "language" ||
          this.list_type === "working")
      ) {

        console.log(this.list_type);
        for (let i = 0; i < this.require_documents_to_update.length; i++) {
          if (this.require_documents_to_update[i] === this.id) {
            // console.log("encontro documento");
            console.log(this.name);
            res = true;
            if (this.index_require_documents_to_update.length > 0) {
              this.index = this.index_require_documents_to_update[i];
            }
          }
        }
      } else {
        this.require_documents_to_update.forEach((element) => {
          if (element === this.id) {
            // console.log("encontro documento");
            console.log(this.name);
            res = true;
          }
        });
      }

      return res;
    },

    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        if (this.updload_here != true) {
          this.state = 1;
        } else {
          this.state = 2;
        }
      } else {
        this.state = 0;
      }

      return this.state;
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

      this.$emit(
        "enviaDocumento",
        this,
        e.target.files[0],
        this.list_type,
        this.index
      );
      this.state = 2;
      this.updload_here = true;
    },
  },
};
</script>