<template>
  <!-- Accordion -->
  <div class="row">
    <div class="row my-2">
      <div class="col-12">
        <label>
          <p>Is the ENREM master program your first choice?</p>
        </label>
        <select v-model="FirstChoise" class="form-control">
          <option value="" selected>Choose an option</option>
          <option v-for="item in booleanChoises" :key="item" :value="item">
            {{ item }}
          </option>
        </select>
      </div>
    </div>

    <div class="row my-2">
      <div class="col-12">
        <label>
          <p>Let us know why - or why not:</p>
        </label>
        <textarea
          class="form-control"
          rows="4"
          v-model="ReasonsChoise"
          placeholder="..."
        />
      </div>
    </div>

    <div class="row my-2">
      <div class="col-12">
        <label>
          <p>
            Which other University and Master Program came on your short list?
          </p>
        </label>
        <textarea
          class="form-control"
          rows="4"
          v-model="OtherChoises"
          placeholder="..."
        />
      </div>
    </div>

    <div class="row my-2">
      <div class="col-12">
        <label class="h3"
          >Why did you decide to study the ENREM master's degree? (Multiple
          choice is possible)</label
        >
        <checkbox-personalize
          v-for="(cho, index) in choises_list"
          :key="index"
          :label="cho.label"
          :value="cho.value"
          :id="index"
          :array_selected.sync="selected_choises_list"
          @actualizaLista="actualizaLista"
        ></checkbox-personalize>
      </div>
    </div>

    <div class="col">
      <div class="row justify-content-start my-4">
        <div class="col-lg-2 col-sm-4 align-items-center">
          <button class="uaslp-btn" @click="updateReasonsToChoise">
            <span class="material-icons-outlined">save</span>
            <span>Guardar</span>
          </button>
          <!-- <img @click="updateReasonsToChoise" :src="images_btn.guardar" alt=""
                        style=" max-height: 45px !important;"> -->
        </div>
        <div class="col-lg-10 col-sm-2">
          <label>
            <p class="h5"><strong>Only save Reasons to Choise</strong></p>
          </label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CheckboxPersonalize from "./CheckboxPersonalize.vue";

export default {
  name: "reasons-to-choise",

  props: {
    id: Number,
    // id del expediente.
    archive_id: Number,
    // variables
    first_choise: {
      default: "",
      type: String,
    },

    reasons_choise: {
      default: "",
      type: String,
    },

    other_choises: {
      default: "",
      type: String,
    },

    // default and other (specify)
    selected_choises: {
      default: "",
      type: String,
    },
  },

  created() {
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
    if (this.selected_choises != null) {
      this.selected_choises_list = JSON.parse(this.selected_choises);
    }
  },

  components: {
    CheckboxPersonalize,
  },

  data: function () {
    return {
      fechaobtencion: "",
      errores: {},
      datosValidos: {},
      images_btn: [],

      booleanChoises: ["Yes", "No"],
      // universidades: [],
      choises_list: [
        {
          label: "Course of study / focus of content",
          value: "Course of study / focus of content",
        },
        {
          label: "Studying and living in Mexico and Germany",
          value: "Studying and living in Mexico and Germany",
        },
        {
          label: "Obtain two degree in two years",
          value: "Obtain two degree in two years",
        },
        {
          label: "Possibility for scholarship",
          value: "Possibility for scholarship",
        },
        { label: "Other", value: "Other" },
      ],
      selected_choises_list: [],
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

    DigitalSignature: {
      get() {
        return this.digital_signature;
      },
      set(newVal) {
        this.$emit("update:digital_signature", newVal);
      },
    },

    FirstChoise: {
      get() {
        return this.first_choise;
      },
      set(newVal) {
        this.$emit("update:first_choise", newVal);
      },
    },

    ReasonsChoise: {
      get() {
        return this.reasons_choise;
      },
      set(newVal) {
        this.$emit("update:reasons_choise", newVal);
      },
    },

    OtherChoises: {
      get() {
        return this.other_choises;
      },
      set(newVal) {
        this.$emit("update:other_choises", newVal);
      },
    },
  },

  methods: {
    // Name is the list
    // res is the boolean value, push or pop

    actualizaLista(label, value, res) {
      let index = -1;

      // no data, insert
      if (this.selected_choises_list.length <= 0 && res) {
        this.selected_choises_list.push({ label: label, value: value });
      } else {
        // data exist, check the index
        this.selected_choises_list.forEach(function (value, i) {
          if (value.label.toLowerCase() === label.toLowerCase()) {
            index = i;
            console.log("lo encontre ");
          }
        });

        // pop
        if (!res) {
          if (index >= 0) {
            this.selected_choises_list.splice(index, 1);
          }
          // push
        } else {
          if (index < 0) {
            this.selected_choises_list.push({ label: label, value: value });
          }
        }
      }
    },

    countryHasValue() {
      //country is not empty
      if (this.country != null) {
        //Find the index
        this.paises.forEach(function (pais) {
          if (pais.name === this.country) {
            this.Universidades = pais.universities;
          }
        });
      }

      return true;
    },

    updateEnvironmentRelatedSkills(evento) {
      this.sendEnvironmentRelatedSkills(evento, "Completo");
    },

    updateReasonsToChoise() {
      axios
        .post("/controlescolar/solicitud/enrem/reasonsToChoise/update", {
          id: this.id,
          archive_id: this.archive_id,
          first_choise: this.first_choise,
          reasons_choise: this.reasons_choise,
          others_choises: this.other_choises,
          selected_choises: JSON.stringify(this.selected_choises_list),
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

    selectOrNotDegreeType() {
      let res = true;
      let answer = this.alias_academic_program.localCompare("doctorado"); //compare string

      //alias no es doctorado por lo que es una maestria
      if (answer != 0) {
        this.degree_type = "Licenciatura"; //Solo licenciatura
        res = false; //retorno falso
      }

      return res;
    },

    escogePais(evento) {
      this.Universidades =
        this.paises[evento.target.selectedIndex - 1].universities;
    },
  },
};
</script>
