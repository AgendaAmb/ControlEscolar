<template>
  <div class="col-12">
    <div class="row my-3">
      <div class="form-group col-9 my-auto">
        <h5 class="mt-4 d-block"><strong> {{ name }} </strong></h5>
        <p v-if="notes !== null" class="mt-3 mb-1 d-block"><strong> Observaciones: <span v-html="notes"></span></strong></p>

        <p class="mt-3 mb-1 d-block"><strong> Etiqueta: </strong> {{ label }} </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }} </p>
      </div>
      <div class="form-group col-3 my-auto"> 
        <a v-if="location !== null && location !== undefined" class="verArchivo d-block my-2 ml-auto" :href="location" target="_blank"></a>
        <label class="cargarArchivo d-block ml-auto my-auto">
          <input type="file" class="form-control d-none" @change="cargaDocumento">
        </label>
        <div v-if="'file' in Errores" class="invalid-feedback d-block text-right"> 
          <p class="h6">{{ Errores.file }} </p>
        </div>

        <div v-if="'file' in datosValidos" class="valid-feedback d-block text-right"> 
          <p class="h6">{{ datosValidos.file }} </p>
        </div>
      </div>    
    </div>
  </div>
</template>

<style scoped>
.cargarArchivo {
  background: url(/storage/archive-buttons/seleccionar.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}

.verArchivo {
  background: url(/storage/archive-buttons/ver.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}
</style>

<script>
export default {
  name: "documento-requerido",

  props: {
    id: {
      type: Number,
    },
    name: {
      type: String
    },

    notes: {
      type: String
    },

    label: {
      type: String
    },

    example: {
      type: String
    },

    archivo: {
      type: File      
    },
     
    location: {
      type: String
    }
  },

  data() {
    return {
      errores: {},
      datosValidos: {}
    };
  },

  computed: {
    Archivo:{ 
      get () {
        return this.archivo;
      },
      set (newValue){
        this.$emit('update:archivo', newValue);
      }
    },
    Location: {
      get () {
        return this.location;
      },
      set (newValue){
        this.$emit('update:location', newValue);
      }
    },
    Errores: {
      get () {
        return this.errores;
      },
      set (newValue){
        this.errores = newValue;
        this.$emit('update:errores', newValue);
      }
    }
  },

  methods: {
    cargaDocumento(e) {
      
      var name = e.target.files[0].name;
      this.Errores = {};


      if (!name.endsWith('.pdf')) {
        this.Errores = { 
          file:'El archivo debe de contener formato pdf.'
        };
        return false;
      }

      this.$emit('enviaDocumento', this, e.target.files[0]);
    },
  },
};
</script>