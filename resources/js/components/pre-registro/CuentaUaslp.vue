<template>
  <div class="form-row">
    <input type="hidden" name="Dependencia" v-model="Facultad">
    <div class="form-group col-12"></div>

    <div class="form-group col-4">
      <label> Ingresa tu RPE/clave única de alumno ó correo Institucional </label>
      <input type="text" class="form-control" v-model="EmailR">
    </div>
    <div class="form-group col-2">
      <a class="btn btn btn-outline-light search-button" 
          v-on:click="uaslpUser"
          data-toggle="tooltip" data-placement="right" title="Buscar mi información"
          v-if="!spinnerVisible">
                
        <i class="fas fa-search"></i>
      </a>

      <button v-if="spinnerVisible" class="btn btn-light" type="button" disabled>
        <span class="spinner-border spinner-border-sm search-button" role="status" aria-hidden="true"></span>
        <span class="sr-only">Cargando...</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "cuenta-uaslp",

  props: {
    facultad: String,
    emailR: String,
  },

  data() {
    return {
      spinnerVisible: false
    }
  },

  computed: {
    Facultad: {
      get(){
        return this.facultad;
      },
      set(newVal){
        this.$emit('update:facultad', newVal);
      }
    },
    EmailR: {
      get(){
        return this.emailR;
      },
      set(newVal){
        this.$emit('update:emailR', newVal);
      }
    },
  },

  methods:{
    uaslpUser: function(){
      var data = {
        "username":this.EmailR
      }

      axios.post('https://ambiental.uaslp.mx/apiagenda/api/users/uaslp-user',data)
      .then(response => {
        this.spinnerVisible = false;
        var res = response['data']['data'];

        this.Facultad = res.Dependencia;
        this.EmailR = res.email;
        this.$emit('uaslpUserUpdated', res);

      }).catch((err) => { 
        this.spinnerVisible = false;
      });
    },
  }
};
</script>