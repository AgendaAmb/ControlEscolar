<template>
  <div class="form-row my-3">
    <h5 class="form-group col-12 modal-title" id="exampleModalLabel">Datos Personales</h5>
    <div class="form-group col-lg-7 col-xl-6">
      <div class="form-row my-3">
        <div class="form-group col-12">
          <label> Nombres </label>
          <input type="text" class="form-control" v-model="Nombres">
        </div>
        <div class="form-group col-6">
          <label> Apellido paterno </label>
          <input type="text" class="form-control" v-model="ApPaterno">
        </div>
        <div class="form-group col-6">
          <label> Apellido materno </label>
          <input type="text" class="form-control" v-model="ApMaterno">
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5 col-xl-6">
      <div class="form-row my-3">
        <div class="form-group col-6">
          <label> Edad </label>
          <input type="number" class="form-control" v-model="Edad">
        </div>
        <div class="form-group col-6">
          <label> Estado civil </label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group col-6">
          <label> Género </label>
          <select v-model="Genero" class="form-control">
            <option value="" selected>Escoge una opción</option>
            <option value="Masculino"> Masculino </option>
            <option value="Femenino"> Femenino </option>
            <option value="Otros"> Otros </option>
            <option value="No especificar"> No especificar </option>
          </select>
        </div>

        <!--
        <div v-if="Genero === 'Otros'" class="form-group col-lg-4 col-xl-3">
          <label> ¿Cuál? </label>
          <input type="text" class="form-control" v-model="OtroGenero">
        </div>-->
      </div>
    </div>
    
<!--
    <div class="form-group col-sm-5 col-lg-2 col-xl-1">
      <label> Edad </label>
      <input type="number" class="form-control" v-model="Edad">
    </div>

    <div class="form-group col-sm-7 col-lg-3 col-xl-2">
      <label> Género </label>
      <select v-model="Genero" class="form-control">
        <option value="" selected>Escoge una opción</option>
        <option value="Masculino"> Masculino </option>
        <option value="Femenino"> Femenino </option>
        <option value="Otros"> Otros </option>
        <option value="No especificar"> No especificar </option>
      </select>
    </div>-->
  </div>
</template>

<script>


export default {
  name: "datos-personales",

  props: {
    nombres: String,
    apPaterno: String,
    apMaterno: String,
    edad: String,
    genero: String,
    otroGenero: String,
  },

  computed: {
    Nombres: {
      get(){
        return this.nombres;
      },
      set(newVal){
        this.$emit('update:nombres', newVal);
      }
    },
    ApPaterno: {
      get(){
        return this.apPaterno;
      },
      set(newVal){
        this.$emit('update:apPaterno', newVal);
      }
    },
    ApMaterno: {
      get(){
        return this.apMaterno;
      },
      set(newVal){
        this.$emit('update:apMaterno', newVal);
      }
    },
    Edad: {
      get(){
        return this.edad;
      },
      set(newVal){
        this.$emit('update:edad', newVal);
      }
    },
    Genero: {
      get(){
        return this.genero;
      },
      set(newVal){
        this.$emit('update:genero', newVal);
      }
    },
    OtroGenero: {
      get(){
        return this.otroGenero;
      },
      set(newVal){
        this.$emit('update:otroGenero', newVal);
      }
    },
  },
};
</script>