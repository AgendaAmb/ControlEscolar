<template>
  <div class="form-group col-11 col-sm-6 col-lg-5 mb-auto">
    <label> Ingresa tu correo electrónico </label>
    <input type="search" :class="inputClassFor('correo_registro')" v-model="CorreoRegistro">
    <a class="py-2 btn btn btn-outline-light search-button position-relative d-inline-block" 
      @click="miPortalUser"
      data-toggle="tooltip" 
      data-placement="right" 
      title="Buscar mi información">
      <i class="fas fa-search"></i>
    </a>
  </div>
</template>

<script>


export default {
  name: "datos-mi-portal",

  props: {
    // Usuario de la UASLP.
    correo_registro: String,

    // Facultad de adscripción.
    facultad: String,

    // Errores.
    errores: Object,
  },

  computed: {
    CorreoRegistro: {
      get(){
        return this.correo_registro;
      },
      set(newVal){
        this.$emit('update:correo_registro', newVal);
      }
    },

    Facultad: {
      get(){
        return this.facultad;
      },
      set(newVal){
        this.$emit('update:facultad', newVal);
      }
    },
  },

  methods:{
    miPortalUser(){
      var data = {
        "email":this.CorreoRegistro
      }

      axios.post('/controlescolar/users/miPortalUser',data)
      .then(response => {
        this.spinnerVisible = false;
        var res = response['data'][0];
        this.$emit('miPortalUserUpdated', res);

      }).catch((err) => { 
        this.spinnerVisible = false;
      });
    },

    inputClassFor(model){
      return {
        'form-control': true,
        'w-75': true,
        'd-inline-block': true,
        'is-invalid': model in this.errores
      }
    }
  }
};
</script>