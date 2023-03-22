<template>
  <!-- Accordion -->
  <b-card-body class="row">
    <div class="form-group">
      <checkbox-personalize
        v-for="(cho, index) in hear_options"
        :key="index"
        :label.sync="cho.label"
        :value.sync="cho.value"
        :id="index"
        :array_selected.sync="financing_options_list"
        @actualizaLista="actualizaLista"
      ></checkbox-personalize>
    </div>

    <div class="col-12">
      <div class="row justify-content-start my-2">
        <div class="col-lg-2 col-sm-4 align-items-center">
          <button class="uaslp-btn" @click="updateHearAboutProgram">
            <span class="material-icons-outlined">save</span>
            <span>Guardar</span>
          </button>
          <!-- <img @click="updateHearAboutProgram" :src="images_btn.guardar" alt=""
                        style=" max-height: 45px !important;"> -->
        </div>
        <div class="col-lg-10 col-sm-8">
          <label>
            <p class="h5">
              <strong>Only save Future plans and expecations</strong>
            </p>
          </label>
        </div>
      </div>
    </div>
  </b-card-body>
</template>

<script>
import CheckboxPersonalize from "./CheckboxPersonalize.vue";

export default {
  name: "hear-about-program",
  components: { CheckboxPersonalize },
  props: {
    // id del expediente.
    archive_id: Number,

    id: Number,

    how_hear: {
      type: String,
      default: "",
    },
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

    if (this.how_hear != null) {
      this.financing_options_list = JSON.parse(this.how_hear);
    }
  },

  data: function () {
    return {
      images_btn: [],
      fechaobtencion: "",
      errores: {},
      datosValidos: {},
      // universidades: [],
      hear_options: [
        { label: "DAAD Brochure", value: "DAAD Brochure" },
        { label: "CONACYT Information", value: "CONACYT Information" },
        { label: "Current Student", value: "Current Student" },
        { label: "Alumni", value: "Alumni" },
        {
          label: "Online research (please keyword)",
          value: "Online research (please keyword)",
        },
        { label: "Media (which)", value: "Media (which)" },
        {
          label: "Fair or Conference (name and year)",
          value: "Fair or Conference (name and year)",
        },
        {
          label: "Master portal pages (name)",
          value: "Master portal pages (name)",
        },
        { label: "From my university", value: "From my university" },
        { label: "Other", value: "Other" },
      ],
      financing_options_list: [],
      escolaridades: [
        "Bachelor's Degree",
        "Master's Degree",
        "Diplom",
        "Magister",
        "Specialization",
      ],
      estatusEstudios_PMPCA: ["Grado obtenido", "Título o grado en proceso"],
      gradiationMode: [
        "Thesis Investigation - Thesis Title",
        "Graduation Courses & Examination - Courses Underta",
        "Practical Work - Field & Institution",
      ],
      estatusEstudios_otros: [
        "Pasante",
        "Grado obtenido",
        "Título o grado en proceso",
      ],
    };
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
  },

  methods: {
    updateHearAboutProgram() {
      console.log(this.financing_options_list);
      axios
        .post("/controlescolar/solicitud/enrem/hearAboutProgram/update", {
          id: this.id,
          archive_id: this.archive_id,
          how_hear: JSON.stringify(this.financing_options_list),
        })
        .then((response) => {
          Swal.fire({
            title: response.data.message,
            icon: "success",
            text: "Continue filling others sections",
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

    actualizaLista(label, value, res) {
      let index = -1;

      // no data, insert
      if (this.financing_options_list.length <= 0 && res) {
        this.financing_options_list.push({ label: label, value: value });
      } else {
        // data exist, check the index
        this.financing_options_list.forEach(function (value, i) {
          if (value.label.toLowerCase() === label.toLowerCase()) {
            index = i;
            console.log("lo encontre ");
          }
        });

        // pop
        if (!res) {
          if (index >= 0) {
            this.financing_options_list.splice(index, 1);
          }
          // push
        } else {
          if (index < 0) {
            this.financing_options_list.push({ label: label, value: value });
          }
        }
      }
    },
  },
};
</script>
