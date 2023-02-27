<template>
  <div class="col-12">
    <div class="row my-3">
      <!-- Nombre y notas -->
      <div class="form-group col-lg-9 col-md-9 col-xs-7 my-auto">
        <h5 class="mt-2">
          <strong>Everything answer?</strong>
        </h5>
        <ul>
          <li>
            <p>Downloand your archive file</p>
          </li>
          <li>
            <p>Sign and scan it to upload again here</p>
          </li>
          <li>
            <p>You can repeat if something is wrong</p>
          </li>
        </ul>

        <template v-if="checkUpload() > 0" class="my-1">
          <p>State:</p>
          <p class="text-success">Uploaded</p>
        </template>
        <template v-else class="my-1">
          <p>State:</p>
          <p class="text-danger">Not upload</p>
        </template>

      </div>

      <div class="form-group col-lg-3 col-md-3 col-xs-5 align-items-center p-2">

        <div class="row my-1">
          <label class="my-1">
            <a :href="'/controlescolar/solicitud/enrem/seeFileAnsweredToSign/' + archive_id + '/'" target="_blank"
              style=" height: 45px; width:100%;">
              <img :src="images_btn.descargar" style="max-height: 45px !important;">
            </a>
          </label>
        </div>

        <div class="row my-1">
          <label>
            <img :src="images_btn.seleccionar" alt="" style=" max-height: 45px !important;">
            <input type="file" class="form-control d-none" style="max-height: 45px !important; width: 100%"
              @change="cargaDocumento">
          </label>
        </div>

        <div v-if="checkUpload() > 0" class="row my-2">
          <div class="row">
            <label >
            <p class="h5">See your results</p>
          </label>
          </div>
          

          <div class="row my-1">
            <label>
              <a :href="'/controlescolar/solicitud/enrem/expediente/' + location" style=" height: 45px; width:100%;"
                target="_blank">
                <img :src="images_btn.ver" alt="" style="max-height: 45px !important;">
              </a>
            </label>
          </div>

          <div class="row my-1">
            <label>
              <input style=" max-height: 45px !important;" type="image" :src="images_btn.descargar" @click="downloandFile(location)">
            </label>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "required-document-file-signed",

  props: {
    archive_id: {
      type: Number,
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
    errores: Object,


  },


  data() {
    return {
      state: 0,
      images_btn: [],
      datosValidos: {},
      textStateUpload: "",
      academiLetterCommitment: "",
      index: {
        type: Number,
        default: -1,
      },
    };
  },

  created() {
    axios
      .get("/controlescolar/solicitud/getAllButtonImage")
      .then((response) => {
        this.images_btn = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
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

  },

  methods: {

    downloandFile(location) {
      axios({
        url: location, // File URL Goes Here
        method: 'GET',
        responseType: 'blob',
      }).then((res) => {
        var FILE = window.URL.createObjectURL(new Blob([res.data]));

        var docUrl = document.createElement('x');
        docUrl.href = FILE;
        docUrl.setAttribute('download', 'file.pdf');
        document.body.appendChild(docUrl);
        docUrl.click();
      });
    },

    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        this.state = 1;
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