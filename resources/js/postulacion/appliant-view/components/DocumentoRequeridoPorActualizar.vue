<template>
  <div v-if="isInList()===true" class="col-12">
    <div class="row my-3">
      <!-- Nombre y notas -->
      <div class="form-group col-9 my-auto">
        <h5 class="mt-4 d-block">
          <strong> {{ name }} </strong>
          <template v-if="checkUpload() === true">
            <i>Estado:</i> <i class="text-success">Subido</i>
          </template>
          <template v-else>
            <i>Estado:</i> <i class="text-danger">Sin subir</i>
          </template>
        </h5>
        
        <p v-if="notes !== null" class="mt-3 mb-1 d-block">
          <strong> Observaciones: <span v-html="notes"></span></strong>
        </p>

        <p class="mt-3 mb-1 d-block">
          <strong> Etiqueta: </strong> {{ label }}
        </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }}</p>
      </div>
      

      <div class="form-group col-3 my-auto">
        <a
          v-if="checkUpload() === true"
          class="verArchivo d-block my-2 ml-auto"
          :href="location"
          target="_blank"
        >
          Ver Archivo</a
        >
        <label v-if="isIntentionLetter() === false" class="cargarArchivo d-block ml-auto my-auto">
          Subir Documento
          <input
            type="file"
            class="form-control d-none"
            @change="cargaDocumento"
          />
        </label>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "documento-requerido-porActualizar",

  props: {

    user_id:{
      type:Number,
      default: -1,
    },

    viewer_id:{
      type:Number,
      default: -1,
    },

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
    },
    
    letters_Commitment: {
      type: Array,
      default: null
    },

    alias_academic_program:{
      type: String,
      default: null,
    },

    index_carta:{
      type: Number,
      default:0,
    },

    require_documents_to_update:{
        type: Array,
        default: [],
    },



  },

  data() {
    return {
      errores: {},
      datosValidos: {},
      textStateUpload: '',
      academiLetterCommitment: '',
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

      isInList(){
          this.require_documents_to_update.forEach(element => {
              if(element == this.id){
                  return true;
              }
          });

          return false;
      },

    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        return true;
      } else {
        return false;
      }
    },
    cargaDocumento(e) {
      var name = e.target.files[0].name;
      this.Errores = {};

      if (!name.endsWith(".pdf")) {
        this.Errores = {
          file: "El archivo debe de contener formato pdf.",
        };
        return false;
      }

      this.$emit("enviaDocumento", this, e.target.files[0]);
    },
  },
};
</script>