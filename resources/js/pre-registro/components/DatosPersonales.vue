<template>
  <div class="form-row my-3">
    <!-- Encabezado de datos personales -->
    <h5 class="form-group col-12 modal-title" id="exampleModalLabel"> Datos personales </h5>
    <div class="form-group col-lg-6">
      <!-- CURP -->
      <label class="mt-3"> CURP </label>
      <input type="text" :class="inputClassFor('curp')" v-model="Curp" :readonly="NoCurp === true && Readonly">
      <div class="form-check">
        <input id="curp" type="checkbox" class="form-check-input" v-model="NoCurp" :true-value="true" :false-value="false">
        <label for="curp" class="form-check-label"> No tengo curp </label>
      </div>
      <div v-if="'curp' in errores" class="invalid-feedback">{{errores.curp}}</div>
    </div>
    <div class="col-lg-12"></div>
    <div class="form-group col-12">
      <!-- Nombres -->
      <label class="mt-3"> Nombres </label>
      <input type="text" :class="inputClassFor('name')" v-model="Name" :readonly="readonly">
      <div v-if="'name' in errores" class="invalid-feedback">{{errores.name}}</div>
    </div>

    <div class="col-lg-12"></div>
    <div class="col-md-6">
      <!-- Apellido paterno -->
      <label class=" mt-3"> Apellido paterno </label>
      <input type="text" :class="inputClassFor('first_surname')" v-model="FirstSurname" :readonly="readonly">
      <div v-if="'first_surname' in errores" class="invalid-feedback">{{errores.first_surname}}</div>
    </div>

    <!-- Apellido materno -->
    <div class="col-md-6">
      <label class="d-block mt-3"> Apellido materno </label>
      <input type="text" :class="inputClassFor('last_surname')" v-model="LastSurname" :readonly="readonly">
      <div v-if="'last_surname' in errores" class="invalid-feedback">{{errores.last_surname}}</div>
    </div>

    <!-- Fecha de nacimiento -->
    <div class="col-lg-6 mt-3">
      <label class="mt-3"> Fecha de nacimiento </label>
      <input type="date" :class="inputClassFor('birth_date')" v-model="BirthDate">
      <div v-if="'birth_date' in errores" class="invalid-feedback">{{errores.birth_date}}</div>
    </div>
    
    <!-- Ocupación -->
    <div class="col-lg-6 mt-3">
      <label class="mt-3"> Ocupación </label>
      <input type="text" :class="inputClassFor('ocupation')" v-model="Ocupation" :readonly="Readonly">
      <div v-if="'ocupation' in errores" class="invalid-feedback">{{errores.ocupation}}</div>
    </div>

    <!-- Género -->
    <div class="col-lg-6 mt-3">
      <label> Género </label>
      <select v-model="Gender" :class="inputClassFor('gender')" :readonly="Readonly" :disabled="Readonly">
        <option value="" selected>Escoge una opción</option>
        <option value="Masculino"> Masculino </option>
        <option value="Femenino"> Femenino </option>
        <option value="Otros"> Otro </option>
        <option value="No especificar"> No especificar </option>
      </select>
      <div v-if="'gender' in errores" class="invalid-feedback">{{errores.gender}}</div>
    </div>

    <!-- Estado civil -->
    <div class="col-lg-6 mt-3">
      <label> Estado civil </label>
      <select v-model="CivicState" :class="inputClassFor('civic_state')">
        <option value="" selected>Escoge una opción</option>
        <option value="Soltero"> Soltero </option>
        <option value="Casado"> Casado </option>
        <option value="Divorciado"> Divorciado </option>
        <option value="Viudo"> Viudo </option>
        <option value="Otro"> Otro </option>
      </select>
      <div v-if="'civic_state' in errores" class="invalid-feedback">{{errores.civic_state}}</div>
    </div>

    <!-- Otro género -->
    <div v-if="Gender === 'Otros'" class="col-lg-6 mt-3">
      <label> Coloca el otro género </label>
      <input type="text" :class="inputClassFor('other_gender')" :readonly="Readonly"> 
      <div v-if="'gender' in errores" class="invalid-feedback">{{errores.gender}}</div>
    </div>

    <!-- Otro estado civil -->
    <div v-if="CivicState === 'Otro'" class="col-lg-6 mt-3">
      <label> Coloca el otro estado civil </label>
      <input type="text" :class="inputClassFor('other_civic_state')" v-model="OtherGender" :readonly="Readonly">
      <div v-if="'other_gender' in errores" class="invalid-feedback">{{errores.other_gender}}</div>
    </div>

    <div class="col-12"></div>

    <!-- País de nacimiento -->
    <div class="col-lg-6 mt-3">
      <label class="mt-3"> País de nacimiento </label>
      <select v-model="BirthCountry" :class="inputClassFor('birth_country')"  @change="escogePais">
        <option value="" selected> Escoge un país </option>
        <option v-for="country in countries" :key="country.id" :value="country.name"> {{country.name}} </option>
      </select>
      <div v-if="'birth_country' in errores" class="invalid-feedback">{{errores.birth_country}}</div>
    </div>

    <!-- Estado de nacimiento -->
    <div class="col-lg-6 mt-3">
      <label class="mt-3"> Estado de nacimiento </label>
      <select v-model="BirthState" :class="inputClassFor('birth_state')">
        <option value="" selected> Escoge un país </option>
        <option v-for="state in states" :key="state.id" :value="state.name"> {{state.name}} </option>
      </select>
      <div v-if="'birth_state' in errores" class="invalid-feedback">{{errores.birth_state}}</div>
    </div>
    
    <!-- País de residencia -->
    <div class="col-lg-6 mt-3">
      <label class="mt-3"> País de residencia </label>
      <select v-model="ResidenceCountry" :class="inputClassFor('residence_country')">
        <option value="" selected> Escoge un país </option>
        <option v-for="country in countries" :key="country.id" :value="country.name"> {{country.name}} </option>
      </select>
      <div v-if="'residence_country' in errores" class="invalid-feedback">{{errores.residence_country}}</div>
    </div>

    <!-- Código postal -->
    <div class="col-lg-6 mt-3">
      <label class="mt-3"> Código postal </label>
      <input type="number" :class="inputClassFor('zip_code')" v-model.number="ZipCode" :readonly="Readonly">
      <div v-if="'zip_code' in errores" class="invalid-feedback">{{errores.zip_code}}</div>
    </div>

    <!-- Teléfono de contacto -->
    <div class="col-md-6 col-lg-3 mt-3">
      <label class="mt-3"> Teléfono de contacto </label>
      <input type="number" :class="inputClassFor('phone_number')" v-model.number="PhoneNumber" :readonly="Readonly">
      <div v-if="'phone_number' in errores" class="invalid-feedback">{{errores.phone_number}}</div>
    </div>
    
    <!-- Etnia -->
    <div class="col-md-6 col-lg-3 mt-3">
      <label class="mt-3"> Etnia </label>
      <input type="text" :class="inputClassFor('ethnicity')" v-model="Ethnicity" :readonly="Readonly">
      <div v-if="'ethnicity' in errores" class="invalid-feedback">{{errores.ethnicity}}</div>
    </div>

    <!-- El postulante es discapacitado -->
    <div class="col-md-6 col-lg-3 mt-3">
      <label class="mt-3"> ¿Tienes alguna discapacidad? </label>
      <select v-model="IsDisabled" :class="inputClassFor('is_disabled')" :readonly="Readonly" :disabled="Readonly">
        <option :value="true"> Si </option>
        <option :value="false" selected> No </option>
      </select>
      <div v-if="'is_disabled' in errores" class="invalid-feedback">{{errores.is_disabled}}</div>
    </div>
    
    <!-- Detalles de la discapacidad -->
    <div v-if="IsDisabled === true" class="col-md-6 col-lg-3 mt-3">
      <label class="mt-3"> ¿Cuál? </label>
      <input v-model="Disability" type="text" :class="inputClassFor('disability')" :readonly="Readonly">
      <div v-if="'disability' in errores" class="invalid-feedback">{{errores.disability}}</div>
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
    // Tipo usuario.
    tipo_usuario: String,
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
    // Errores
    errores: Object,
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
    },

    Readonly: {
      get(){
        return this.readonly && this.tipo_usuario === 'Comunidad AA';
      }
    }
  },

  methods: {
    escogePais(evento) {
      Vue.set(this, 'states', this.countries[evento.target.selectedIndex - 1].states);
    },

    inputClassFor(model){
      return {
        'form-control': true,
        'is-invalid': model in this.errores
      }
    }
  }
};
</script>