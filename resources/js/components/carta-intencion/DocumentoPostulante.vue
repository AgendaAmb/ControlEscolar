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
        <a class="verArchivo d-block my-2 ml-auto" href="#"></a>
      </div>
    </div>
  </div>
</template>

<style scoped>

.verArchivo {
  background: url(/controlescolar/storage/archive-buttons/ver.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}
</style>

<script>
export default {
  name: "documento-postulante",

  props: {
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
     
    url: {
      type: String
    }
  },

  data() {
    return {
      errores: {},
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
    Url: {
      get () {
        return this.url;
      },
      set (newValue){
        this.$emit('update:url', newValue);
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

  
};
</script>