<template>
  <div class="form-row my-4">
    <div class="form-group col-6">
      <label> School certificade: </label>
      <select v-model="SchoolCertificade" class="form-control">
        <option value="" selected>Choose an option</option>
        <option value="Upper secondary">Upper secondary</option>
        <option value="Baccalaureat">Baccalaureat</option>
        <option value="Bachiller">Bachiller</option>
        <option value="High school">High school</option>
        <option value="Abitur">Abitur</option>
        <option value="Other">Other</option>
      </select>
    </div>
    <div class="form-group col-6">
      <label> Final score: </label>
      <input v-model.number="FinalScore" type="number" class="form-control" />
    </div>

    <div class="form-group col-12">
      <label> Name of institution: </label>
      <input v-model="NameOfInstitution" type="text" class="form-control" />
    </div>

    <div class="form-group col-lg-4 col-sm-12">
      <label> From: </label>
      <input v-model="From" type="date" class="form-control" />
    </div>

    <div class="form-group col-lg-4 col-sm-12">
      <label> To: </label>
      <input v-model="To" type="date" class="form-control" />
    </div>

    <div class="form-group col-lg-4 col-sm-12">
      <label> City/Country: </label>
      <select v-model="CityCountry" class="form-control">
        <option value="" selected>Choose country</option>
        <option
          v-for="country in countries"
          :key="country.id"
          :value="country.name"
        >
          {{ country.name }}
        </option>
      </select>
    </div>

    <div class="col-12">
      <div class="row my-2 justify-content-start">
        <div class="col-lg-2 col-sm-4">
          <button class="uaslp-btn" @click="updateSecondaryEducation">
            <span class="material-icons-outlined">save</span>
            <span>Guardar</span>
          </button>
          <!-- <img @click="updateSecondaryEducation" :src="images_btn.guardar" alt=""
          style=" max-height: 45px !important;"> -->
        </div>
        <div class="col-lg-10 col-sm-8">
          <label>
            <p class="h5">
              <strong>Note: That's only save secondary education</strong>
            </p>
          </label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "secondary-education",
  props: {
    id: {
      type: Number,
      default: 0,
    },

    index: {
      type: Number,
      default: 0,
    },

    archive_id: {
      type: Number,
      default: 0,
    },
    school_certificade: {
      type: String,
      default: "",
    },
    final_score: {
      type: Number,
      default: 0,
    },
    name_of_institution: {
      type: String,
      default: "",
    },
    from: {
      type: String,
      default: null,
    },
    to: {
      type: String,
      default: null,
    },
    city_country: {
      type: String,
      default: "",
    },
  },

  data() {
    return {
      countries: [],
      images_btn: [],
    };
  },

  mounted: function () {
    this.$nextTick(function () {
      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/countries/universities")
        .then((response) => {
          this.countries = response.data;
        });
    });
  },

  computed: {
    SchoolCertificade: {
      get() {
        return this.school_certificade;
      },
      set(newVal) {
        this.$emit("update:school_certificade", newVal);
      },
    },
    FinalScore: {
      get() {
        return this.final_score;
      },
      set(newVal) {
        this.$emit("update:final_score", newVal);
      },
    },
    NameOfInstitution: {
      get() {
        return this.name_of_institution;
      },
      set(newVal) {
        this.$emit("update:name_of_institution", newVal);
      },
    },
    From: {
      get() {
        return this.from;
      },
      set(newVal) {
        this.$emit("update:from", newVal);
      },
    },
    To: {
      get() {
        return this.to;
      },
      set(newVal) {
        this.$emit("update:to", newVal);
      },
    },
    CityCountry: {
      get() {
        return this.city_country;
      },
      set(newVal) {
        this.$emit("update:city_country", newVal);
      },
    },
  },

  created() {
    //get personal documents

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
  },

  methods: {
    updateSecondaryEducation() {
      let formData = new FormData();
      formData.append("archive_id", this.archive_id);
      formData.append("id", this.id);
      formData.append("school_certificade", this.school_certificade);
      formData.append("final_score", this.final_score);
      formData.append("name_of_institution", this.name_of_institution);
      formData.append("from", this.from);
      formData.append("to", this.to);
      formData.append("city_country", this.city_country);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/enrem/secondaryEducation/update",
        data: formData,
        headers: {
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
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
  },
};
</script>
