<template>
  <div class="form-row my-4">
    <div class="col-12">
      <div class="row my-1">
        <div class="col-sm-6 col-xl-3 align-middle ">
          <img class="img-fluid rounded" src="https://www.w3schools.com/images/w3schools_green.jpg">
        </div>
        <div class="form-group col-sm-6 col-xl-9">
          <div class="row my-1">
            <div class="form-group col-12">
              <label> First Name(s): </label>
              <input v-model="Name" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-12">
              <label> Last Name(s): </label>
              <input v-model="Surname" type="text" class="form-control" readonly>
            </div>
          </div>

          <div class="row my-1">
            <div class="form-group col-lg-4 col-sm-6">
              <label> Gender: </label>
              <select v-model="Gender" class="form-control">
                <option value="" selected>Escoge una opción</option>
                <option value="Masculino">Male</option>
                <option value="Femenino">Female</option>
                <option value="Otros">Other</option>
                <option value="Rather not answer">Rather not answer</option>
              </select>
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label> Civic State: </label>
              <select v-model="CivicState" class="form-control">
                <option value="" selected>Escoge una opción</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label> No. of children: </label>
              <input v-model.number="NoChildren" type="number" class="form-control">
            </div>
          </div>


          <div class="row my-1">
            <div class="form-group col-xl-6">
              <label> Date of birth </label>
              <input type="date" class="form-control" v-model="BirthDate" />
            </div>


            <div class="form-group col-lg-6">
              <label> Place of birth: </label>
              <select v-model="BirthCountry" class="form-control">
                <option value="" selected>Choose a country</option>
                <option v-for="country in countries" :key="country.id" :value="country.name">
                  {{ country.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="row my-1">
            <div class="form-group col-xl-6">
              <label> Nationality</label>
              <select v-model="Nationality" class="form-control">
                <option value="" selected>Choose a country</option>
                <option v-for="country_na in countries_nationality" :key="country_na.id" :value="country_na.name">
                  {{ country_na.name }}
                </option>
              </select>
            </div>


            <div class="form-group col-lg-6">
              <label> Country of residense: </label>
              <select v-model="ResidenseCountry" class="form-control">
                <option value="" selected>Choose a country</option>
                <option v-for="country in countries" :key="country.id" :value="country.name">
                  {{ country.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="row my-1">
            <div class="form-group col-lg-6">
              <label> Email: </label>
              <input v-model="email" type="text" class="form-control" readonly>
            </div>

            <div class="form-group col-lg-6">
              <label> Altern Email: </label>
              <input v-model="AlternEmail" type="text" class="form-control" readonly>
            </div>

            <div class="form-group col-lg-12">
              <label> Phone number: </label>
              <input v-model="PhoneNumber" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>

      
    </div>

    <div class="col-12">
      <div class="row justify-content-start my-2">
        <div class="col-4 align-items-center " style="width:100%; max-height: 45px !important;">
          <img @click="updatePersonalData" :src="images_btn['guardar']" alt=""
              style=" max-height: 45px !important;">
        </div>
        <div class="col-8">
          <label>
              <p class="h4"><strong>This only save Personal Information</strong></p>
          </label>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
import swal from "sweetalert2";
window.Swal = swal;
export default {
  name: "personal-data",
  props: {

    // INPUTS
    // Nombre del postulante.
    name: String,

    // Primer apellido del postulante.
    middlename: String,

    // Segundo apellido del postulante.
    surname: String,

    // Género.
    gender: String,

    // civic state
    marital_state: {
      type: String,
      default: ""
    },

    // Only for double titulation
    // Numero de hijos
    no_children: Number,

    // Fecha de nacimiento.
    birth_date: String,

    // País de nacimiento.
    birth_country: String,

    // Only for double titulation
    // Nacionalidad
    nationality: String,

    // País de residencia.
    residence_country: String,

    // Correo del postulante.
    email: String,

    // Correo alterno del postulante.
    altern_email: String,

    // Teléfono de contacto.
    phone_number: String,

    archive_id: Number,

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
  },

  mounted(){
    // ! Mounted 
  },


  computed: {


    Name: {
      get() {
        return this.name;
      },
      set(newVal) {
        this.$emit('update:name', newVal);
      }
    },

    Middlename: {
      get() {
        return this.middlename;
      },
      set(newVal) {
        this.$emit('update:middlename', newVal);
      }
    },

    Surname: {
      get() {
        return this.surname;
      },
      set(newVal) {
        this.$emit('update:surname', newVal);
      }
    },

    Gender: {
      get() {
        return this.gender;
      },
      set(newVal) {
        this.$emit('update:gender', newVal);
      }
    },

    CivicState: {
      get() {
        return this.marital_state;
      },
      set(newVal) {
        this.$emit('update:marital_state', newVal);
      }
    },

    NoChildren: {
      get() {
        return this.no_children;
      },
      set(newVal) {
        this.$emit('update:no_children', newVal);
      }
    },

    BirthDate: {
      get() {
        return this.birth_date;
      },
      set(newVal) {
        this.$emit('update:birth_date', newVal);
      }
    },


    BirthDate: {
      get() {
        return this.birth_date;
      },
      set(newVal) {
        this.$emit('update:birth_date', newVal);
      }
    },

    BirthCountry: {
      get() {
        return this.birth_country;
      },
      set(newVal) {
        this.$emit('update:birth_country', newVal);
      }
    },

    Nationality: {
      get() {
        return this.nationality;
      },
      set(newVal) {
        this.$emit('update:nationality', newVal);
      }
    },

    ResidenseCountry: {
      get() {
        return this.residence_country;
      },
      set(newVal) {
        this.$emit('update:residence_country', newVal);
      }
    },

    Email: {
      get() {
        return this.email;
      },
      set(newVal) {
        this.$emit('update:email', newVal);
      }
    },

    AlternEmail: {
      get() {
        return this.altern_email;
      },
      set(newVal) {
        this.$emit('update:altern_email', newVal);
      }
    },

    PhoneNumber: {
      get() {
        return this.phone_number;
      },
      set(newVal) {
        this.$emit('update:phone_number', newVal);
      }
    },





  },

  mounted: function () {
    this.$nextTick(function () {
      axios
        .get("https://ambiental.uaslp.mx/apiagenda/api/countries/states")
        .then((response) => {
          this.countries = response.data;
          this.countries_nationality  = response.data;
        });
    });
  },

  data() {
    return {
      // Documentos personales
      countries: [],
      countries_nationality: [],
      images_btn: []
    }
  },

  // created() {
    // //get personal documents
    // axios
    //   .get("/controlescolar/solicitud/getPersonalRequiredDocuments", {
    //     params: {
    //       archive_id: this.archive_id
    //     }
    //   })
    //   .then((response) => {
    //     if (response.data != null) {
    //       this.documentos = response.data;
    //     }
    //     console.log(this.documentos);
    //   })
    //   .catch((error) => {
    //     console.log(error);
    //   });
  // },

  methods: {

    // Display the key/value pairs
    displayFormData(formData){
      for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
      }
    },

    updatePersonalData() {
      let formData = new FormData();
      let title = "";
      let icon = "";
      let msg = "";
      formData.append('archive_id', this.archive_id);
      formData.append('name', this.name);
      formData.append('middlename', this.middlename);
      formData.append('surname', this.surname);
      formData.append('gender', this.gender);
      formData.append('marital_state', this.marital_state);
      formData.append('no_children', this.no_children);
      formData.append('birth_date', this.birth_date);
      formData.append('birth_country', this.birth_country);
      formData.append('nationality', this.nationality);
      formData.append('residense_country', this.residense_country);
      formData.append('email', this.email);
      formData.append('altern_email', this.altern_email);
      formData.append('phone_number', this.phone_number);

      // this.displayFormData(formData);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/enrem/updatePersonalData',
        data: formData,
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        console.log(response.data.message);
      }).catch(error => {
        console.log(response.data.message);
      });

      Swal.fire({
        title: title,
        icon: icon,
        text: msg,
        showCancelButton: true,
        cancelButtonColor: "#d33",
        cancelButtonText: "Entendido",
      });
    },


    uploadDataAppliant() {
      let msg = "";
      let title = "";
      let icon = "success";

    },
  }
};
</script>