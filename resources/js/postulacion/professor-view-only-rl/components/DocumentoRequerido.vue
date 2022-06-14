<template>
  <div v-if="isIntentionLetter() === true" class="col-12">
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

        <!-- Carta Compromiso y manifiesto -->
        <p v-if="isLetterCommitment()===true" class="mt-3 mb-1 d-block">
          <strong>
            Observaciones: Descargar carta
            <!-- Maestrias PMPCA -->
            <a
              v-if="alias_academic_program === 'maestria' ||alias_academic_program === 'enrem'"
              href="https://ambiental.uaslp.mx/pmpca/docs/CartaCompromiso_MCA.docx"
              target="_blank"
              >dando clic aquí</a
            >
            <!-- Maestria imarec -->
            <a
              v-else-if="alias_academic_program === 'imarec'"
              href="https://ambiental.uaslp.mx/imarec/docs/CartaCompromiso_IMaREC.docx"
              target="_blank"
              >dando clic aquí</a
            >
            <!-- Doctorado PMPCA  -->
            <a
              v-else
              href="https://ambiental.uaslp.mx/pmpca/docs/CartaCompromiso_DCA.docx"
              target="_blank"
              >dando clic aquí</a
            >
          </strong>
        </p>

        <!-- Solo hay algo en notas por lo que se adjunta -->
        <p v-else-if="notes !== null" class="mt-3 mb-1 d-block">
          <strong> Observaciones: <span v-html="notes"></span></strong>
        </p>

        <p class="mt-3 mb-1 d-block">
          <strong> Etiqueta: </strong> {{ label }}
        </p>
        <p class="my-0 d-block"><strong> Ejemplo: </strong> {{ example }}</p>
      </div>
     

      <div  class="form-group col-3 my-auto">
        <a
          v-if="checkUpload() === true"
          class="verArchivo d-block my-2 ml-auto"
          :href="'expediente/' + location"
          target="_blank"
        >
          Ver Archivo</a
        >
        <label v-if="isIntentionLetter() === true" class="cargarArchivo d-block ml-auto my-auto">
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
    requiredForAcademicProgram() {
      console.log(this.name + ': '+ this.alias_academic_program);

      let res = true;
      // console.log("id: "+this.id+" nombre: "+this.name);
     
      if (this.alias_academic_program === "maestria"  ) {
        switch (this.name) {
          case "5.- Título de preparatoria":
            res = false;
            break;
          case "5C.- Carta de pasantía":
            res = false;
            break;
          case "9.- Application":
            res = false;
            break;
          case "9A.- Application DAAD":
            res = false;
            break;
          case "14.- Propuesta de proyecto avalada por el profesor postulante":
            res = false;
            break;
            case "16.- Proof Experience Document":
            res = false;
            break;
          case "17.- ConfirmationEMP":
            res = false;
            break;
          case "18.- FormatoEuropass":
            res = false;
            break;
        }
      }
      // Documents for imarec
      else if (this.alias_academic_program === "imarec"  ) {
        switch (this.name) {
          case "5.- Título de preparatoria":
            res = false;
            break;
            case "5B.- Título de Maestria o acta de examen":
            res = false;
            break;
             case "6B.- Certificado de materias de la maestría":
            res = false;
            break;
            case "7B.- Constancia de promedio de la maestría.":
            res = false;
            break;
            case "8B.- Cédula de la maestría":
            res = false;
            break;
          case "9.- Application":
            res = false;
            break;
          case "9A.- Application DAAD":
            res = false;
            break;
          case "14.- Propuesta de proyecto avalada por el profesor postulante":
            res = false;
            break;
            case "16.- Proof Experience Document":
            res = false;
            break;
          case "17.- ConfirmationEMP":
            res = false;
            break;
          case "18.- FormatoEuropass":
            res = false;
            break;
        }
      }
      //Documents for doctorado
      else if (this.alias_academic_program === "doctorado"  ) {
        switch (this.name) {
          case "5.- Título de preparatoria":
            res = false;
            break;
          case "5C.- Carta de pasantía":
            res = false;
            break;
          case "9.- Application":
            res = false;
            break;
          case "9A.- Application DAAD":
            res = false;
            break;
        
            case "16.- Proof Experience Document":
            res = false;
            break;
          case "17.- ConfirmationEMP":
            res = false;
            break;
          case "18.- FormatoEuropass":
            res = false;
            break;
        }
      }

      //Documents for doctorado
      else if (this.alias_academic_program === "enrem"  ) {
        switch (this.name) {
          // case "14.- Propuesta de proyecto avalada por el profesor postulante":
          //   res = false;
          //   break;
          case "5C.- Carta de pasantía":
            res = false;
            break;
          case "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)":
            res = false;
            break;
          case "13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)":
            res = false;
            break;
           
        }
      }

      // return the answer accordin to academic program and name of the required document
      

      return res;
    },

    isLetterCommitment() {
      if (
        this.name === "11.- Carta compromiso y de manifestación de lineamientos (firmada y escaneada)") {
        return true;
      }
      //return a value
      return false;
    },

    isIntentionLetter() {
      //If return 0 is intention letter of professor
       
      if (this.name === "12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)")  {
        console.log(this.name);
        return true;
      }
      return false;
    },

    isProffesor() {
      let roles = [];
      axios
        .post("/controlescolar/solicitud/getRol", {
          viewer_id: this.viewer_id,
        })
        .then((response) => {
          roles = response.data.roles;
        })
        .catch((error) => {
          roles = error.data.roles;
        });

        console.log("roles" + roles);
        if(roles.length > 0){
          roles.forEach(rol => {
            if(rol.toString() === "profesor_nb" || rol.toString() === "profesor_colaborador" ){
              return true;
            }
          });
        }

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