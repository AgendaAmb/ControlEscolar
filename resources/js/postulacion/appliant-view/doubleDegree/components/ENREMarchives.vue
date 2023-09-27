<template>
  <div style="margin-left: 150px">
    <div class="col-12">
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 01 ENREM Application</strong>
          </p>
          <p class="my-2 d-block">
            <strong>
              ENREM application form for Study place (must be signed)
            </strong>
            Complete application form (PDF) in English ENREM application form
            for Study place (must be signed) Complete application form (PDF) in
            English Note: Some browser pdf viewers will not support this form.
            Please, first save the file to your computer and then open on your
            computer in order to fill it out.
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <label>
              <a
                :href="'https://www.enrem-master.info/images/pdf/ENREM-Application-2023_V1.pdf'"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>Download</span>
                </button>
              </a>
            </label>
          </div>

          <div
            class="d-flex justify-content-center"
            style="max-height: 45px !important; width: 100%"
          >
            <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
            <label>
              <button class="uaslp-btn" @click="handleDocument">
                <font-awesome-icon icon="fa-solid fa-upload" />
                <input
                  type="file"
                  ref="fileInput"
                  class="form-control d-none"
                  @change="cargaDocumento"
                />
                <span>Upload</span>
              </button>
              <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
            </label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>
              01A ApplicationDAAD (additional for DAAD-Scholarships)
            </strong>
          </p>
          <p class="my-2 d-block">
            <strong> DAAD Application Form</strong>
            - Complete the application form digitally in English, not by hand -
            On page 2, point 7., you must list all EPOS master programs you have
            applied for (to start in the current year) * For application to
            DAAD-Scholarship you must be submitted both Application Forms (ENREM
            and DAAD)
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <label>
              <a
                :href="'https://www2.daad.de/medien/deutschland/stipendien/formulare/forschungsstipendium_en.pdf'"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>Download</span>
                </button>
              </a>
            </label>
          </div>

          <div
            class="d-flex justify-content-center"
            style="max-height: 45px !important; width: 100%"
          >
            <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
            <label>
              <button class="uaslp-btn" @click="handleDocument">
                <font-awesome-icon icon="fa-solid fa-upload" />
                <input
                  type="file"
                  ref="fileInput"
                  class="form-control d-none"
                  @change="cargaDocumento"
                />
                <span>Upload</span>
              </button>
              <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
            </label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>
              01B ChecklistDAAD (additional for DAAD-Scholarships)</strong
            >
          </p>
          <p class="my-2 d-block">
            <strong> DAAD EPOS Checklist </strong>
            Additional document, if you are applying for a DAAD EPOS scholarship
            - The checklist must be completed, hand signed and dated on page 2
            as indicated: location & date of signature, name, signature
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <label>
              <a
                :href="'https://www.enrem-master.info/images/pdf/ENREM-Application-2023_V1.pdf'"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>Download</span>
                </button>
              </a>
            </label>
          </div>

          <div
            class="d-flex justify-content-center"
            style="max-height: 45px !important; width: 100%"
          >
            <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
            <label>
              <button class="uaslp-btn" @click="handleDocument">
                <font-awesome-icon icon="fa-solid fa-upload" />
                <input
                  type="file"
                  ref="fileInput"
                  class="form-control d-none"
                  @change="cargaDocumento"
                />
                <span>Upload</span>
              </button>
              <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "enrem-archives",

  props: {

  },

  data() {
    return {
      errores: {},
      datosValidos: {},
      textStateUpload: "",
      academiLetterCommitment: "",
      images: null,
    };
  },

  computed: {
    styleBtn() {
      return {
        backgroundColor: "rgba(0,96,175,255)",
        color: "rgb(244, 244, 244)",
        border: "none",
        alignItems: "center",
        height: "100%",
      };
    },
  },

  // created() {
  //   // console.log(this.language);
  //   axios
  //     .get("/controlescolar/solicitud/getAllButtonImage")
  //     .then((response) => {
  //       // console.log('recibiendo imagenes' + response.data.ver);
  //       this.images = response.data;
  //       // console.log('imagenes buttons: ' + this.images.ver);
  //     })
  //     .catch((error) => {
  //       console.log(error);
  //     });
  // },

  methods: {
    handleDocument() {
      this.$refs.fileInput.click();
    },
    bkgCargarArchivo(type) {
      // console.log(this.language);
      axios
        .get("/controlescolar/solicitud/getButtonImage", {
          params: {
            type: type,
          },
        })
        .then((response) => {
          // console.log('hola' + response.data);
          return response.data;
        })
        .catch((error) => {
          // console.log(error);
          return null;
        });
    },
    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        return true;
      } else {
        return false;
      }
    },
    cargaDocumento(e) {
      let file = e.target.files[0];
      let name = file.name;
      this.Errores = {};

      if (file.type !== "application/pdf") {
        this.Errores = {
          file: "El archivo debe tener formato PDF.",
        };
        return false;
      }

      var formData = new FormData();
      formData.append("archive_id", 1);
      formData.append("requiredDocumentId", 1);
      formData.append("file", file);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/updateArchivePersonalDocument",
        data: formData,
        headers: {
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      })
        .then((response) => {
         
        })
        .catch((error) => {
        
        });
    },
  },
};
</script>
