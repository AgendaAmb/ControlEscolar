<template>
  <div class="row align-items-start">
    <div class="col mb-1">
      <strong>Correo No.{{ index }} :</strong>
    </div>
    <!-- Campo para rellenar el correo -->
    <input
      type="text"
      class="form-control mb-2"
      :class="inputClassFor(checkUpload())"
      v-model="myEmail"
      :readonly="checkUpload() == 1"
    />
    <div class="col">
      <!-- Se corrobora el estado del archivo (cambiar a numerico )-->
      <template v-if="checkUpload() === 1">
        <i>Estado:</i> <i class="text-success">Completado</i>
      </template>
      <template v-else-if="checkUpload() === 0">
        <i>Estado:</i> <i class="text-warning">Esperando respuesta</i>
      </template>
      <!-- <template v-else>
        <i>Estado:</i> <i class="text-danger">No se ha enviado correo</i>
      </template> -->

      <div v-if="checkUpload() != 1" class="form-group mt-3">
        <button
          @click="enviarCorreoCartaRecomendacion()"
          class="btn btn-primary"
        >
          Enviar correo
        </button>
      </div>

      <div v-else class="form-group col-3 my-auto">
        <a
          v-if="checkUpload() === true"
          class="verArchivo d-block my-2 ml-auto"
          :href="location"
          target="_blank"
        ></a>
        <label class="cargarArchivo d-block ml-auto my-auto">
          <input
            type="file"
            class="form-control d-none"
            @change="cargaDocumento"
          />
        </label>
        <div
          v-if="'file' in Errores"
          class="invalid-feedback d-block text-right"
        >
          <p class="h6">{{ Errores.file }}</p>
        </div>

        <div
          v-if="'file' in datosValidos"
          class="valid-feedback d-block text-right"
        >
          <p class="h6">{{ datosValidos.file }}</p>
        </div>
      </div>
    </div>
  </div>
</template>


<style scoped>
.verArchivo {
  background: url(/storage/archive-buttons/ver.png);
  background-size: 90px 40px;
  background-repeat: no-repeat;
  width: 90px;
  height: 40px;
}
</style>


<script>
import swal from "sweetalert2";
window.Swal = swal;

export default {
  name: "valida-carta-recomendacion",

  data() {
    return {
      emailToSent: String,
      values: {
        1: true,
        0: false,
        2: false,
      },
    };
  },

  props: {
    email: {
      type: String,
      default: "example@example.com",
    },

    recommendation_letter: {
      type: Object,
      default: null,
    },

    archive_recommendation_letter: {
      type: Object,
      default: null,
    },

    index: Number,
    appliant: Object,
    academic_program: Object,
    errors: Array,
  },

  computed: {
    myEmail: {
      get() {
        this.emailToSent = this.email;
        return this.email;
      },
      set(newVal) {
        this.$emit("update:email", newVal);
        this.emailToSent = newVal;
      },
    },
  },

  methods: {
    inputClassFor(value) {
      return {
        "form-control": true,
        // "is-invalid": (errors.values())?true:false,
      };
    },

    // -1  : Correo no enviado
    //  0  : En espera de respuesta del externo
    //  1  : Completado

    checkUpload() {
      let res = 2;
      // console.log("hola");
      // console.log(this.recommendation_letter );
      if (this.recommendation_letter != null) {
        console.log("object");
        if (this.recommendation_letter["email_evaluator"]) {
          //Correo ya se envio
          res = 0;

          if (this.archive_recommendation_letter != null) {
            if (this.archive_recommendation_letter["location"]) {
              //La carta ha sido contestadad
              res = 1;
            }
          }
        }
      }
      return res;
    },

    enviarCorreoCartaRecomendacion() {
      // //cadena no es similar a las existentes o  es nueva | INSERTAR
      // if(!res){

      let request;

      //Ya existe carta de recomendacion
      if (this.recommendation_letter != null) {
        request = {
          email: this.emailToSent,
          appliant: this.appliant,
          recommendation_letter: this.recommendation_letter,
          academic_program: this.academic_program,
          letter_created: 1,
        };
      } else {
        // No existe carta se necesita crear
        request = {
          email: this.emailToSent,
          appliant: this.appliant,
          academic_program: this.academic_program,
          letter_created: 0,
        };
      }

      axios
        .post(
          "/controlescolar/solicitud/sentEmailRecommendationLetter",
          request
        )
        .then((response) => {
          // console.log(response.data);
          // if(this.$recommendation_letter== null){
          //   this.$recommendation_letter = {
          //     email_evaluator : this.emailToSent,
          //   };
          // }
          // alert(response.data);
          if (response.data == "Exito, el correo ha sido enviado") {
            Swal.fire({
              title: "El correo se ha enviado correctamente",
              text: "Ahora solo queda esperar a que la persona responda el formulario",
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Aceptar",
            })
            }else{
              Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Error al enviar carta',
              text: response.data,
              showCancelButton: true,
              cancelButtonColor: "#d33",
              cancelButtonText: "Entendido",
            })
            }
        })
        .catch((error) => {

          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: error.data,
             showCancelButton: true,
             cancelButtonColor: "#d33",
             cancelButtonText: "Entendido",
          })
          // alert('Ha ocurrido un error, intenta mas tarde');
          console.log(error);
        });
      // }
    },
  },
};
</script>