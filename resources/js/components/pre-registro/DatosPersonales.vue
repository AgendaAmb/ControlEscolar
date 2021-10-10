<template>
  <div class="form-row my-3">
    <!-- Encabezado de datos personales -->
    <h5 class="form-group col-12 modal-title" id="exampleModalLabel"> Datos personales </h5>
    <div class="form-group col-lg-6 mb-auto">
      <!-- CURP -->
      <label class="d-block mt-3"> CURP </label>
      <input type="text" class="d-block form-control mb-3" v-model="Curp" :readonly="NoCurp === true">
      <div class="form-check">
        <input id="curp" type="checkbox" class="form-check-input" v-model="NoCurp" :true-value="true" :false-value="false">
        <label for="curp" class="form-check-label"> No tengo curp </label>
      </div>
    </div>
    <div class="col-lg-12"></div>
    <div class="form-group col-12 mb-auto">
      <!-- Nombres -->
      <label class="mt-3"> Nombres </label>
      <input type="text" class="form-control" v-model="Name" :readonly="readonly">
    </div>

    <div class="col-lg-12"></div>
    <div class="col-md-6 mt-auto">
      <!-- Apellido paterno -->
      <label class=" mt-3"> Apellido paterno </label>
      <input type="text" class="form-control" v-model="FirstSurname" :readonly="readonly">
    </div>

    <!-- Apellido materno -->
    <div class="col-md-6 mt-auto">
      <label class="d-block mt-3"> Apellido materno </label>
      <input type="text" class="form-control" v-model="LastSurname" :readonly="readonly">
    </div>

    <!-- Fecha de nacimiento -->
    <div class="col-lg-6 mt-auto">
      <label class="mt-3"> Fecha de nacimiento </label>
      <input type="date" class="form-control" v-model="BirthDate">
    </div>
    
    <!-- Ocupación -->
    <div class="col-lg-6 mt-auto">
      <label class="mt-3"> Ocupación </label>
      <input type="text" class="form-control" v-model="Ocupation">
    </div>

    <!-- Género -->
    <div class="col-lg-6 mt-3">
      <label> Género </label>
      <select v-model="Gender" class="form-control">
        <option value="" selected>Escoge una opción</option>
        <option value="Masculino"> Masculino </option>
        <option value="Femenino"> Femenino </option>
        <option value="Otro"> Otro </option>
        <option value="No especificar"> No especificar </option>
      </select>
    </div>

    <!-- Estado civil -->
    <div class="col-lg-6 mt-3">
      <label> Estado civil </label>
      <select v-model="CivicState" class="form-control">
        <option value="" selected>Escoge una opción</option>
        <option value="Soltero"> Soltero </option>
        <option value="Casado"> Casado </option>
        <option value="Divorciado"> Divorciado </option>
        <option value="Viudo"> Viudo </option>
        <option value="Otro"> Otro </option>
      </select>
    </div>

    <!-- Otro género -->
    <div v-if="Gender === 'Otro'" class="col-lg-6 mt-3 mr-auto">
      <label> Coloca el otro género </label>
      <input type="text" class="form-control">
    </div>

    <!-- Otro estado civil -->
    <div v-if="CivicState === 'Otro'" class="col-lg-6 mt-3 ml-auto">
      <label> Coloca el otro estado civil </label>
      <input type="text" class="form-control" v-model="OtherGender">
    </div>

    <div class="col-12"></div>

    <!-- País de nacimiento -->
    <div class="col-lg-6 mt-auto">
      <label class="mt-3"> País de nacimiento </label>
      <select v-model="BirthCountry" class="form-control" @change="escogePais">
        <option value="" selected> Escoge un país </option>
        <option v-for="country in countries" :key="country.id" :value="country.name"> {{country.name}} </option>
      </select>
    </div>

    <!-- Estado de nacimiento -->
    <div class="col-lg-6 mt-auto">
      <label class="mt-3"> Estado de nacimiento </label>
      <select v-model="BirthState" class="form-control">
        <option value="" selected> Escoge un país </option>
        <option v-for="state in states" :key="state.id" :value="state.name"> {{state.name}} </option>
      </select>
    </div>
    
    <!-- País de residencia -->
    <div class="col-lg-6 mt-auto">
      <label class="mt-3"> País de residencia </label>
      <select v-model="ResidenceCountry" class="form-control">
        <option value="" selected> Escoge un país </option>
        <option v-for="country in countries" :key="country.id" :value="country.name"> {{country.name}} </option>
      </select>
    </div>

    <!-- Código postal -->
    <div class="col-lg-6 mt-auto">
      <label class="mt-3"> Código postal </label>
      <input type="number" class="form-control" v-model.number="ZipCode">
    </div>

    <!-- Teléfono de contacto -->
    <div class="col-md-6 col-lg-3 mt-auto">
      <label class="mt-3"> Teléfono de contacto </label>
      <input type="number" class="form-control" v-model.number="PhoneNumber">
    </div>
    
    <!-- Etnia -->
    <div class="col-md-6 col-lg-3 mt-auto">
      <label class="mt-3"> Etnia </label>
      <input type="text" class="form-control" v-model="Ethnicity">
    </div>

    <!-- El postulante es discapacitado -->
    <div class="col-md-6 col-lg-3">
      <label class="mt-3"> ¿Tienes alguna discapacidad? </label>
      <select v-model="IsDisabled" class="form-control">
        <option :value="true"> Si </option>
        <option :value="false" selected> No </option>
      </select>
    </div>
    
    <!-- Detalles de la discapacidad -->
    <div v-if="IsDisabled === true" class="col-md-6 col-lg-3 mt-auto">
      <label class="mt-3"> ¿Cuál? </label>
      <input v-model="Disability" type="text" class="form-control">
    </div>

    <!-- Aviso de privacidad -->
    <div class="form-group col-12 my-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" required>
        <label class="form-check-label" for="gridCheck">
          Al enviar la información confirmo que he leído y acepto el 
          <a href="http://transparencia.uaslp.mx/avisodeprivacidad" style="color: #fecc56;;"> aviso de privacidad.</a>
        </label>
      </div>
      <div class="modal-footer justify-content-start my-3 px-0">
        <button id="submit" type="submit" class="btn btn-primary" style="background-color: #0160AE">Registrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "datos-personales",

  props: {
    // CURP.
    curp: String,

    // No tengo curp.
    no_curp: Boolean,

    // Nombres.
    name: String,

    // Primer apellido.
    first_surname: String,

    // Segundo apellido.
    last_surname: String,

    // País de residencia.
    residence_country: String,

    // Género.
    gender: String,

    // Otro género.
    other_gender: String,

    // Estado civil.
    civic_state: String,

    // Otro estado civil.
    other_civic_state: String,

    // Fecha de nacimiento.
    birth_date: String,

    // Ocupación.
    ocupation: String,

    // País de nacimiento.
    birth_country: String,

    // Estado de nacimiento.
    birth_state: String,

    // Código postal.
    zip_code: Number,

    // Teléfono de contacto.
    phone_number: Number,

    // Etnia del postulante.
    ethnicity: String,

    // El postulante está discapacitado.
    is_disabled: Boolean,

    // Discapacidad del postulante.
    disability: String,

    // Países.
    countries: Array,

    // Readonly.
    readonly: Boolean,
  },

  data() {
    return {
      states: []
    }
  },

  computed: {
    Curp: {
      get () {
        return this.curp;
      },
      set (newVal){
        this.$emit('update:curp', newVal);
      }
    },

    NoCurp: {
      get () {
        return this.no_curp;
      },
      set (newVal){
        this.$emit('update:no_curp', newVal);
      }
    },

    Name: {
      get(){
        return this.name;
      },
      set(newVal){
        this.$emit('update:name', newVal);
      }
    },

    FirstSurname: {
      get(){
        return this.first_surname;
      },
      set(newVal){
        this.$emit('update:first_surname', newVal);
      }
    },

    LastSurname: {
      get(){
        return this.last_surname;
      },
      set(newVal){
        this.$emit('update:last_surname', newVal);
      }
    },

    BirthDate: {
      get(){
        return this.birth_date;
      },
      set(newVal){
        this.$emit('update:birth_date', newVal);
      }
    },

    Ocupation: {
      get(){
        return this.ocupation;
      },
      set(newVal){
        this.$emit('update:ocupation', newVal);
      }
    },

    Gender: {
      get(){
        return this.gender;
      },
      set(newVal){
        this.$emit('update:gender', newVal);
      }
    },

    OtherGender: {
      get(){
        return this.other_gender;
      },
      set(newVal){
        this.$emit('update:other_gender', newVal);
      }
    },

    CivicState: {
      get(){
        return this.civic_state;
      },
      set(newVal){
        this.$emit('update:civic_state', newVal);
      }
    },

    OtherCivicState: {
      get(){
        return this.other_civic_state;
      },
      set(newVal){
        this.$emit('update:other_civic_state', newVal);
      }
    },

    BirthCountry: {
      get(){
        return this.birth_country;
      },
      set(newVal){
        this.$emit('update:birth_country', newVal);
      }
    },

    BirthState: {
      get(){
        return this.birth_state;
      },
      set(newVal){
        this.$emit('update:birth_state', newVal);
      }
    },

    ResidenceCountry: {
      get(){
        return this.residence_country;
      },
      set(newVal){
        this.$emit('update:residence_country', newVal);
      }
    },

    ZipCode: {
      get(){
        return this.zip_code; 
      },
      set(newVal){
        this.$emit('update:zip_code', newVal);
      }
    },

    PhoneNumber: {
      get(){
        return this.phone_number; 
      },
      set(newVal){
        this.$emit('update:phone_number', newVal);
      }
    },

    Ethnicity: {
      get(){
        return this.ethnicity; 
      },
      set(newVal){
        this.$emit('update:ethnicity', newVal);
      }
    },

    IsDisabled: {
      get(){
        return this.is_disabled; 
      },
      set(newVal){
        this.$emit('update:is_disabled', newVal);
      }
    },

    Disability: {
      get(){
        return this.disability; 
      },
      set(newVal){
        this.$emit('update:disability', newVal);
      }
    }
  },

  methods: {
    escogePais(evento) {
      this.states = this.countries[evento.target.selectedIndex - 1].states;
    }
  }
};
</script>