<template>
  <div class="form-row my-2">

    <div class="col-12">
      <p class="h2"><strong>{{ title }}</strong></p>
    </div>

    <div class="form-group col-12">
      <label> Care of (C/O): </label>
      <input v-model="CareOf" type="text" class="form-control">
    </div>
    <div class="form-group col-8">
      <label> Street: </label>
      <input v-model="Street" type="text" class="form-control">
    </div>

    <div class="form-group col-4">
      <label> Number: </label>
      <input v-model="NumberAddress" type="number" class="form-control">
    </div>

    <div class="form-group col-6">
      <label> City: </label>
      <select v-model="City" class="form-control">
        <option value="" selected>Escoge un estado</option>
        <option v-for="state in states" :key="state.id" :value="state.name">
          {{ state.name }}
        </option>
      </select>
    </div>

    <div class="form-group col-6">
      <label> Postal code: </label>
      <input v-model="PostalCode" type="text" class="form-control">
    </div>


    <div class="form-group col-12">
      <label> Country: </label>
      <label> Nationality</label>
      <select v-model="StateCountry" class="form-control" @change="escogePais">
        <option value="" selected>Choose a country</option>
        <option v-for="country in countries" :key="country.id" :value="country.name">
          {{ country.name }}
        </option>
      </select>
    </div>

    <div class="form-group col-12">
      <label> Telephone: </label>
      <input v-model="Telephone" type="text" class="form-control">
    </div>

    <div class="form-group col-12">
      <label> Mobile phone: </label>
      <input v-model="MobilePhone" type="text" class="form-control">
    </div>

  </div>
</template>

<script>


export default {
  name: "correspondence-address",

  props: {
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
        this.$emit('update:care_of', newVal);
      }
    },

    Street: {
      get() {
        return this.street;
      },
      set(newVal) {
        this.$emit('update:street', newVal);
      }
    },
    PostalCode: {
      get() {
        return this.postal_code;
      },
      set(newVal) {
        this.$emit('update:postal_code', newVal);
      }
    },

    NumberAddress: {
      get() {
        return this.number_address;
      },
      set(newVal) {
        this.$emit('update:number_address', newVal);
      }
    },

    City: {
      get() {
        return this.city;
      },
      set(newVal) {
        this.$emit('update:city', newVal);
      }
    },

    StateCountry: {
      get() {
        return this.state_country;
      },
      set(newVal) {
        this.$emit('update:state_country', newVal);
      }
    },

    Telephone: {
      get() {
        return this.telephone;
      },
      set(newVal) {
        this.$emit('update:telephone', newVal);
      }
    },

    MobilePhone: {
      get() {
        return this.mobile_phone;
      },
      set(newVal) {
        this.$emit('update:mobile_phone', newVal);
      }
    },

  },

  mounted: function () {
    this.$nextTick(function () {
      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
        .then((response) => {
          this.countries = response.data;
        });
    });
  },

  data() {
    return {
      title: {
        type: String,
        default: ""
      },
      countries: [],
      states: [],

    }
  },

  created() {

    if (this.index && this.index > 1) {
      this.title = 'Current Address (if different from permanent address)';
    } else {
      this.title = 'Permanent Address';
    }

    //get personal documents
    axios
      .get("/controlescolar/solicitud/getPersonalRequiredDocuments", {
        params: {
          archive_id: this.archive_id
        }
      })
      .then((response) => {
        if (response.data != null) {
          this.documentos = response.data;
        }
        console.log(this.documentos);
      })
      .catch((error) => {
        console.log(error);
      });
  },



  methods: {

    escogePais() {
      Vue.set(
        this,
        "states",
        this.countries[evento.target.selectedIndex - 1].states
      );
    },

    cargaDocumento(requiredDocument, file) {

      var formData = new FormData();
      formData.append('archive_id', this.archive_id);
      formData.append('requiredDocumentId', requiredDocument.id);
      formData.append('file', file);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/updateArchivePersonalDocument',
        data: formData,
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        requiredDocument.datosValidos.file = '¡Archivo subido exitosamente!';
        requiredDocument.Location = response.data.location;

      }).catch(error => {
        var errores = error.response.data['errors'];
        requiredDocument.Errores = {
          file: 'file' in errores ? errores.file[0] : null,
          id: 'requiredDocumentId' in errores ? errores.requiredDocumentId[0] : null,
        };
      });
    },
  }
};
</script>