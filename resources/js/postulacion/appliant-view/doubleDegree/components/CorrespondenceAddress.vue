<template>
  <div class="form my-4">
    <div class="row">
      <div class="col-12">
        <p class="h2">
          <strong>{{ title }}</strong>
        </p>
      </div>

      <div class="form-group col-12">
        <label> Care of (C/O): </label>
        <input v-model="CareOf" type="text" class="form-control" />
      </div>
      <div class="form-group col-8">
        <label> Street: </label>
        <input v-model="Street" type="text" class="form-control" />
      </div>

      <div class="form-group col-4">
        <label> Number: </label>
        <input
          v-model.number="NumberAddress"
          type="number"
          class="form-control"
        />
      </div>

      <div class="form-group col-12">
        <label> Country: </label>
        <select
          v-model="StateCountry"
          class="form-control"
          @change="escogePais"
        >
          <option value="" selected>Choose a country</option>
          <option
            v-for="country in countries"
            :key="country.id"
            :value="country.name"
          >
            {{ country.name }}
          </option>
        </select>
      </div>

      <div class="form-group col-6">
        <label> City: </label>
        <select v-if="states.length > 0" v-model="City" class="form-control">
          <option value="" selected>Choose an option</option>
          <option v-for="state in states" :key="state.id" :value="state.name">
            {{ state.name }}
          </option>
        </select>

        <select v-else v-model="City" class="form-control"></select>
      </div>

      <div class="form-group col-6">
        <label> Postal code: </label>
        <input v-model="PostalCode" type="text" class="form-control" />
      </div>

      <div class="form-group col-12">
        <label> Telephone: </label>
        <input v-model.number="Telephone" type="number" class="form-control" />
      </div>

      <div class="form-group col-12">
        <label> Mobile phone: </label>
        <input
          v-model.number="MobilePhone"
          type="number"
          class="form-control"
        />
      </div>
    </div>

    <div class="row my-2 justify-content-start">
      <div class="col-lg-2 col-sm-4">
        <button class="uaslp-btn" @click="updateCorrespondenceAddress">
          <span class="material-icons-outlined">save</span>
          <span>Guardar</span>
        </button>
        <!-- <img @click="updateCorrespondenceAddress" :src="images_btn['guardar']" alt=""
          style=" max-height: 45px !important;"> -->
      </div>
      <div class="col-lg-10 col-sm-8">
        <label>
          <p class="h5"><strong>Note: That's only save address </strong></p>
        </label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "correspondence-address",

  props: {
    id: Number,
    // Id del expediente
    archive_id: Number,

    index: Number,

    care_of: String,

    street: String,

    number_address: Number,

    city: String,

    postal_code: String,

    state_country: String,

    telephone: Number,

    mobile_phone: Number,
  },

  computed: {
    CareOf: {
      get() {
        return this.care_of;
      },
      set(newVal) {
        this.$emit("update:care_of", newVal);
      },
    },

    Street: {
      get() {
        return this.street;
      },
      set(newVal) {
        this.$emit("update:street", newVal);
      },
    },
    PostalCode: {
      get() {
        return this.postal_code;
      },
      set(newVal) {
        this.$emit("update:postal_code", newVal);
      },
    },

    NumberAddress: {
      get() {
        return this.number_address;
      },
      set(newVal) {
        this.$emit("update:number_address", newVal);
      },
    },

    City: {
      get() {
        return this.city;
      },
      set(newVal) {
        this.$emit("update:city", newVal);
      },
    },

    StateCountry: {
      get() {
        return this.state_country;
      },
      set(newVal) {
        this.$emit("update:state_country", newVal);
      },
    },

    Telephone: {
      get() {
        return this.telephone;
      },
      set(newVal) {
        this.$emit("update:telephone", newVal);
      },
    },

    MobilePhone: {
      get() {
        return this.mobile_phone;
      },
      set(newVal) {
        this.$emit("update:mobile_phone", newVal);
      },
    },
  },

  // mounted: function () {
  //   this.$nextTick(function () {
  //     axios
  //       .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
  //       .then((response) => {
  //         this.countries = response.data;
  //       });
  //   });
  // },

  data() {
    return {
      title: {
        type: String,
        default: "",
      },
      countries: [],
      states: [],
      images_btn: [],
    };
  },

  created() {
    if (this.index && this.index > 1) {
      this.title = "Current Address (if different from permanent address)";
    } else {
      this.title = "Permanent Address";
    }

    axios
      .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
      .then((response) => {
        this.countries = response.data;
        if (this.state_country != null) {
          response.data.forEach((element) => {
            // console.log(element.name);
            if (element.name === this.state_country) {
              this.states = element.states;
            }
          });
        }
      });

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
    updateCorrespondenceAddress() {
      let formData = new FormData();
      formData.append("archive_id", this.archive_id);
      formData.append("id", this.id);
      formData.append("care_of", this.care_of);
      formData.append("street", this.street);
      formData.append("number_address", this.number_address);
      formData.append("city", this.city);
      formData.append("postal_code", this.postal_code);
      formData.append("state_country", this.state_country);
      formData.append("telephone", this.telephone);
      formData.append("mobile_phone", this.mobile_phone);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/enrem/address/update",
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

    escogePais(evento) {
      this.states = this.countries[evento.target.selectedIndex].states;
      // Vue.set(
      //   this,
      //   "states",
      //   this.countries[evento.target.selectedIndex - 1].states
      // );
    },
  },
};
</script>
