<template>
  <div class="col-12">
    <div class="row my-3">
      <!-- Nombre y notas -->
      <div class="form-group col-lg-9 col-md-9 col-xs-7 my-auto">
        <h5 class="mt-2">
          <strong>Final instruccions</strong>
        </h5>
         
              
                <div class="form-check">
                     <input  class="form-check-input" type="checkbox" value="" id="check1"  required
                     onclick="dowload.disabled = !this.checked">
                       <label class="form-check-label">
                          I hereby state that all the above information is true and correct.
                        </label>
                </div>
            
            
                <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="check2"  onclick="boton2.disabled = !this.checked" >
                       <label class="form-check-label" >
                           I will regularly check my email address, even the spam file, since all official
                           communications will be through this medium. 
                        </label>
                  </div>
             
         
        <p>If you have finished filling out all the above sections, please: </p>
        <ul>
         
          <li>
            <p>1. Download your application file</p>
          </li>
          <li>
            <p>2. Sign it </p>
          </li>
          <li>
            <p>3. Upload it (someting went wrong,you may try again).</p>
          </li>
          <li>
            <p>4. Send the application form with all the required documents in a zip file to the following email
                  addresses:  
                  pmpca@uaslp.mx, info-enrem@itt.fh-koeln.de. </p>
          </li>
          <li>
            <p>5. Wait for futher instructions. </p>
          </li>
          
          
        </ul>
        <p>Thank you for you application, we wish you the best of luck and succes ! </p>

        <template v-if="checkUpload() > 0" class="my-1">
          <p>State:</p>
          <p class="text-success">Uploaded</p>
        </template>
        <template v-else class="my-1">
          <p>State:</p>
          <p class="text-danger">Not upload</p>
        </template>
      </div>
      <div
       class="form-group col-lg-3 col-md-3 col-xs-5 align-items-center p-2 flex-center"
      >
        <div    class="row my-1">
          <label class="my-1">
            <a
              :href="
                '/controlescolar/solicitud/enrem/seeFileAnsweredToSign/' +
                archive_id +
                '/'
              "
              target="_blank"
              style="height: 45px; width: 100%"
            >
              <button  class="uaslp-btn" id="dowload" name="dowload" disabled >
                <font-awesome-icon icon="fa-solid fa-download" />
                <span>Download</span>
              </button>
            </a>
          </label>
        </div>
       
        <div  class="row my-1">
          <label>
            <button class="uaslp-btn" @click="handleDocument" name="boton2" id="boton2" disabled>
              <font-awesome-icon icon="fa-solid fa-upload" />
              <input
                type="file"
                ref="fileInput"
                class="form-control d-none"
                @change="cargaDocumento"
              />
              <span>Upload</span>
            </button>
          </label>
        </div>

        <div v-if="checkUpload() > 0" class="row my-2 flex-center">
          <div class="row">
            <label>
              <p class="h5">See your results</p>
            </label>
          </div>

          <div class="row my-1">
            <label>
              <a
                :href="'/controlescolar/solicitud/enrem/expediente/' + location"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button  class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>View</span>
                </button>
              </a>
            </label>
          </div>

          <div class="row my-1">
            <label>
              <!-- <input
                style="max-height: 45px !important"
                type="image"
                :src="images_btn.descargar"
                @click="downloandFile(location)"
              /> -->
              <button class="uaslp-btn" @click="downloandFile(location)">
                <font-awesome-icon icon="fa-solid fa-paper-plane" />
                <span>Send</span>
              </button>
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
      check:0,
      /* images_btn: [], */
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
    /* axios
      .get("/controlescolar/solicitud/getAllButtonImage")
      .then((response) => {
        this.images_btn = response.data;
      })
      .catch((error) => {
        console.log(error);
      }); */
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
    estaActivo() {
           
        },
    handleDocument() {
      this.$refs.fileInput.click();
    },
    habilita(){

       document.getElementsByName('dowload').disabled = false;


    },

    downloandFile(location) {
      axios({
        url: location, // File URL Goes Here
        method: "GET",
        responseType: "blob",
      }).then((res) => {
        var FILE = window.URL.createObjectURL(new Blob([res.data]));

        var docUrl = document.createElement("x");
        docUrl.href = FILE;
        docUrl.setAttribute("download", "file.pdf");
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
    checkSelect() {
      if (document.getElementById('check1').checked && docmument.getElementById('check2').checked)
       {
            this.check =1;    
        }else{
          this.check =0;
        }
        return this.check

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
