<template>
  <div class="col-12">
    <div class="row my-3">
      
      <div class="form-group col-9 my-auto">
        <h5 class="mt-4 d-block"><strong> {{ name }} </strong>
          <template v-if="checkUpload() === true">
            <i>Estado:</i> <i class="text-success">Subido</i>
          </template>
          <template v-else>
            <i>Estado:</i> <i class="text-danger">Sin subir</i>
          </template> 
        </h5>

        <!-- We have something in notes and its a letter -->
        <p v-if="isLetterCommitment() === true " class="mt-3 mb-1 d-block"><strong> Observaciones: Descargar <a :href="notes+academiLetterCommitment" target="_blank">dando clic aquí</a></strong></p>
        <!-- We have only something in notes -->
        <p v-else-if="notes !== null" class="mt-3 mb-1 d-block"><strong> Observaciones: <span v-html="notes"></span></strong></p>
        
        <p class="mt-3 mb-1 d-block"><strong> Etiqueta: </strong> {{ label }} </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }} </p>
      </div>


      <!-- Es carta de intención  -->
      <div v-if="isIntentionLetter() === true " class="form-group col-3 my-auto">
        <a v-if="checkUpload() === true" class=" verArchivo d-block my-2 ml-auto" :href="'expediente/' + location" target="_blank"> Ver Archivo</a>
        <!-- Tendra que subir los archios -->
        <label class=" cargarArchivo d-block ml-auto my-auto">
          Subir Documento
          <input type="file" class="form-control d-none" @change="cargaDocumento">
        </label>
      </div>

      <div v-else class="form-group col-3 my-auto">    
        <a v-if="checkUpload() === true" class=" verArchivo d-block my-2 ml-auto" :href="'expediente/' + location" target="_blank"> Ver Archivo</a>
      </div>   

    </div>
  </div>
</template>

<style scoped>

/* 

 <a v-if="checkUpload() === true" class="verArchivo d-block my-2 ml-auto" :href="location" target="_blank"></a>
        <label class="cargarArchivo d-block ml-auto my-auto">
          <input type="file" class="form-control d-none" @change="cargaDocumento">
        </label>
        
        */
/* .cargarArchivo {
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
} */

.cargarArchivo {
  background-color: #3490dc;
  border-radius: 10px;
  text-align: center;
  border: none;
  font-weight: bold;
  color: white;
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 70%;
  height: 30px;
}
.verArchivo {
  background-color: #3490dc;
  font-weight: bold;
  text-align: center;
  color: white;
  border-radius: 10px;
  border: none;
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 70%;
  height: 30px;
}
</style>

<script>
export default {
  name: "documento-requerido",

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
    }
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


    isLetterCommitment(){
      
      if(this.name.localeCompare('11.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)') == 0){
     
        //Set index in something wrong
        this.academiLetterCommitment = 'DCA.docx';
        
        //Have notes and its letter commit array full
        if(this.notes !== null ){
          //we recieve also the alias of academic program and compare
          if(this.alias_academic_program != null ){
            switch (this.academic_program.alias) {
              case "maestria":
                this.academiLetterCommitment = 'DCA.docx';
                break;
              case "enrem":
                this.academiLetterCommitment = 'DCA.docx';
                break;
              case "doctorado":
                this.academiLetterCommitment = 'MCA.docx';
                break;
              case "imarec":
                this.academiLetterCommitment = 'IMaREC.docx';
                break;
            }
          }
        }else{
          return false;
        }
        //return a value 
        return true;
      }

      return
    },

    isIntentionLetter(){
      //If return 0 is intention letter of professor
      if(this.name.localeCompare('12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)') == 0){
        return true;
      }
      return false;
    },

    isStudentOrNot(){
      if(this.user_id != this.viewer_id){
        return false;
      }
      return true;
    },

    checkUpload()  {
      if(this.location !== null && this.location !== undefined){
        return true;
      }else{
        return false;
      }
    },
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