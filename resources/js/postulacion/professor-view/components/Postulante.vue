<template>
  <div class="form-row my-4">
    <div class="col-12">
      <div class="row">
        <div class="col-md-5 col-lg-6 col-xl-3 my-2"></div>
        <div class="form-group col-md-7 col-lg-6 col-xl-9">
          <div class="row">
            <div class="form-group col-12">
              <label> CURP:</label>
              <input v-model="curp" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-12">
              <label> Nombre(s): </label>
              <input v-model="name" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
              <label> Primer Apellido: </label>
              <input v-model="middlename" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
              <label> Segundo Apellido: </label>
              <input v-model="surname" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="form-group col-xl-4">
          <label> Fecha de nacimiento </label>
          <input v-model="birth_date" type="date" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Género: </label>
          <input v-model="gender" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Estado civil: </label>
          <input v-model="civic_state" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> País de nacimiento: </label>
          <input v-model="birth_country" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> Estado de nacimiento: </label>
          <input v-model="birth_state" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> País de residencia: </label>
          <input v-model="residence_country" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-3">
          <label> Teléfono de contacto: </label>
          <input v-model="phone_number" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6">
          <label> Correo electrónico: </label>
          <input v-model="email" type="text" class="form-control" readonly>
        </div>
        <div class="form-group col-lg-6">
          <label> Correo de contacto alterno: </label>
          <input v-model="altern_email" type="text" class="form-control" readonly>
        </div>
      </div>
    </div>

    <documento-requerido v-for="documento in Documentos" :key="documento.name"
      :archivo.sync="documento.archivo" 
      :location.sync="documento.pivot.location" archives
      :errores.sync = "documento.errores"
      @enviaDocumento = "cargaDocumento" 
      v-bind="documento">
    </documento-requerido>
  </div>
</template>

<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";

export default {
  props: {
    // Id del expediente
    archive_id: Number,

    // Curp del postulante
    curp: String,

    // Nombre del postulante.
    name: String,

    // Primer apellido del postulante.
    middlename: String,

    // Segundo apellido del postulante.
    surname: String,

    // Fecha de nacimiento.
    birth_date: String,

    // Género.
    gender: String,

    // Estado civil.
    civic_state: String,

    // Estado de nacimiento.
    birth_state: String,

    // País de nacimiento.
    birth_country: String,

    // País de residencia.
    residence_country: String,

    // Teléfono de contacto.
    phone_number: String,

    // Correo del postulante.
    email: String,

    // Correo alterno del postulante.
    altern_email: String,

    // Documentos personales
    documentos: Array,
  },
  components: { DocumentoRequerido },
  name: "postulante",

  computed: {
    Documentos: {
      get(){
        return this.documentos;
      },
      set(newVal){
        this.$emit('update:documentos', newVal);
      }
    }
  },

  methods:{
    cargaDocumento(requiredDocument, file) {
      
      var formData = new FormData();
      formData.append('archive_id', this.archive_id);
      formData.append('requiredDocumentId', requiredDocument.id);
      formData.append('file', file);

      axios({
        method: 'post',
        url: '/controlescolar/solicitud/updateArchivePersonalDocument',
        data: formData,
        headers: {
          'Accept' : 'application/json',
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
        requiredDocument.datosValidos.file = '¡Archivo subido exitosamente!';
        requiredDocument.Location = response.data.location;        
        
      }).catch(error => {
        var errores = error.response.data['errors'];
        requiredDocument.Errores = { 
          file: 'file' in errores ? errores.file[0] : null,
          id: 'requiredDocumentId' in errores ? errores.requiredDocumentId[0] : null,
        };
      });
    },
  }
};
</script>