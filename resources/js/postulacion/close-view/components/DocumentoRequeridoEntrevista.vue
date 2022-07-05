<template>
  <div v-if="requiredForAcademicProgram() === true" class="col-12">
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

        <p class="mt-3 mb-1 d-block">
          <strong> Etiqueta: </strong> {{ label }}
        </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }}</p>
      </div>

      <div class="form-group col-3 align-items-center p-2">
        <div v-if="checkUpload() === true" class="d-flex justify-content-center  my-1"
          style="max-height: 45px; width: 100%">
          <label>
            <a :href="'expediente/' + location" style=" height: 45px; width:100%;" target="_blank">
              <img :src="images_btn['ver']" alt="" style="width:100%; max-height: 45px !important;">
            </a>
          </label>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "documento-requerido-entrevista",

  props: {
    images_btn: {
      type: Array,
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
  },

  data() {
    return {
      errores: {},
      datosValidos: {},
      textStateUpload: "",
      academiLetterCommitment: "",
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
        this.errores = newValue;
        this.$emit("update:errores", newValue);
      },
    },
  },

  methods: {
    requiredForAcademicProgram() {
      console.log(this.name + ": " + this.location);

      let res = true;
      // console.log("id: "+this.id+" nombre: "+this.name);

      if (
        this.alias_academic_program === "maestria" ||
        this.alias_academic_program === "imarec" ||
        this.alias_academic_program === "enrem"
      ) {
        switch (this.name) {
          case "21.- Presentacion de entrevista (Doctorado)":
            res = false;
            break;
        }
      }
      // //Documents for doctorado
      // else if (this.alias_academic_program === "doctorado"  ) {
      //   switch (this.name) {
      //     case "20.- Ensayo de entrevista (Maestria)":
      //       res = false;
      //       break;
      //   }
      // }

      return res;
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