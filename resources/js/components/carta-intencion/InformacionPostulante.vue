<template>
  <div class="row my-3">
    <documento-requerido :documento="informacionpersonal.docacta"></documento-requerido>
    <documento-requerido :documento="informacionpersonal.doccurp"></documento-requerido>
    <documento-requerido :documento="informacionpersonal.docine"></documento-requerido>
    <documento-requerido :documento="informacionpersonal.docpasaporte"></documento-requerido>
  </div>
</template>


<script>
import DocumentoRequerido from '../carta-intencion/DocumentoRequerido.vue';
export default {
  components: { DocumentoRequerido },
  name: "informacion-postulante",

  data: function () {
    return {
      informacionpersonal: {
        docacta: {
          nombre: '1.- Acta de nacimiento.',
          etiqueta: '01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
          ejemplo: '01_Promedio_2021_CJG'
        },
        doccurp: {
          nombre: '2.- CURP en Ampliación tamaño carta.',
          etiqueta: '02_CURP_añodesolicitud_iniciales',
          ejemplo: '02_CURP_2021_CJG'
        },
        docine: {
          nombre: '3.- Credencial de elector INE en ampliación tamaño carta.',
          etiqueta: '03_INE_añodesolicitud_iniciales',
          ejemplo: '03_INE_2021_CJG'
        },
        docpasaporte: {
          nombre: '4.- Primera página del pasaporte.',          
          etiqueta: '04_Pasaporte_añodesolicitud_iniciales',
          ejemplo: '04_Pasaporte_2021_CJG'
        }
      }
    };
  },

  computed: {
    
  },
};
</script>