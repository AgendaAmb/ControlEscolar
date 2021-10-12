<template>
  <div class="form-group col-11 col-sm-6 col-lg-5 mb-auto">
    <input type="hidden" name="Dependencia" v-model="Facultad">
    <label> Ingresa tu RPE/clave única de alumno ó correo Institucional </label>
    <input type="search" :class="inputClassFor('clave_uaslp')" v-model="ClaveUaslp">
    <a class="py-2 btn btn btn-outline-light search-button position-relative d-inline-block" 
      @click="uaslpUser"
      data-toggle="tooltip" 
      data-placement="right" 
      title="Buscar mi información">
      <i class="fas fa-search"></i>
    </a>
  </div>
</template>

<script>


export default {
  name: "datos-uaslp",

  props: {
    // Usuario de la UASLP.
    clave_uaslp: String,

    // Facultad de adscripción.
    facultad: String,

    // Errores.
    errores: Object,
  },

  computed: {
    ClaveUaslp: {
      get(){
        return this.clave_uaslp;
      },
      set(newVal){
        this.$emit('update:clave_uaslp', newVal);
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
    uaslpUser(){
      var data = {
        "username":this.ClaveUaslp
      }

      axios.post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user',data)
      .then(response => {
        this.spinnerVisible = false;
        var res = response['data']['data'];
        this.$emit('uaslpUserUpdated', res);

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