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
      <input v-model="FinalScore" type="number" class="form-control">
    </div>

    <div class="form-group col-12">
      <label> Name of institution: </label>
      <input v-model="NameOfInstitution" type="text" class="form-control">
    </div>

    <div class="form-group col-lg-4 col-sm-12">
      <label> From: </label>
      <input v-model="From" type="date" class="form-control">
    </div>

    <div class="form-group col-lg-4 col-sm-12">
      <label> To: </label>
      <input v-model="To" type="date" class="form-control">
    </div>

    <div class="form-group col-lg-4 col-sm-12">
      <label> City/Country: </label>
      <select
          v-model="CityCountry"
          class="form-control"
        >
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


  </div>
</template>
  
<script>

export default {

  name: "secondary-education",
  props: {
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
      type: Date,
      default: null,
    },
    to: {
      type: Date,
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
    }
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
        this.$emit('update:school_certificade', newVal);
      }
    },
    FinalScore: {
      get() {
        return this.final_score;
      },
      set(newVal) {
        this.$emit('update:final_score', newVal);
      }
    },
    NameOfInstitution: {
      get() {
        return this.name_of_institution;
      },
      set(newVal) {
        this.$emit('update:name_of_institution', newVal);
      }
    },
    From: {
      get() {
        return this.from;
      },
      set(newVal) {
        this.$emit('update:from', newVal);
      }
    },
    To: {
      get() {
        return this.to;
      },
      set(newVal) {
        this.$emit('update:to', newVal);
      }
    },
    CityCountry: {
      get() {
        return this.city_country;
      },
      set(newVal) {
        this.$emit('update:city_country', newVal);
      }
    },
  },

  

  created() {
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