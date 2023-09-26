<template>
  <div class="form-row my-4 c-center">
    <div class="col-12">
      <div class="row">
        <div class="col-md-5 col-lg-6 col-xl-3 my-2">
          <!-- Aqui va la foto -->
        </div>
        <div class="form-group col-md-7 col-lg-6 col-xl-9">
          <div class="row">
            <div class="form-group col-12">
              <label> CURP:</label>
              <input v-model="curp" type="text" class="form-control" readonly />
            </div>
            <div class="form-group col-12">
              <label> Nombre(s): </label>
              <input v-model="name" type="text" class="form-control" readonly />
            </div>
            <div class="form-group col-md-6">
              <label> Primer Apellido: </label>
              <input
                v-model="middlename"
                type="text"
                class="form-control"
                readonly
              />
            </div>
            <div class="form-group col-md-6">
              <label> Segundo Apellido: </label>
              <input
                v-model="surname"
                type="text"
                class="form-control"
                readonly
              />
            </div>
          </div>
        </div>
        <div class="form-group col-xl-4">
          <label> Fecha de nacimiento </label>
          <input
            v-model="birth_date"
            type="date"
            class="form-control"
            readonly
          />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Género: </label>
          <input v-model="gender" type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Estado civil: </label>
          <input
            v-model="marital_state"
            type="text"
            class="form-control"
            readonly
          />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> País de nacimiento: </label>
          <input
            v-model="birth_country"
            type="text"
            class="form-control"
            readonly
          />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Estado de nacimiento: </label>
          <input
            v-model="birth_state"
            type="text"
            class="form-control"
            readonly
          />
        </div>
        <div class="form-group col-lg-6 col-xl-4">
          <label> Teléfono de contacto: </label>
          <input
            v-model="phone_number"
            type="text"
            class="form-control"
            readonly
          />
        </div>
        <div class="form-group col-lg-6">
          <label> Correo electrónico: </label>
          <input v-model="email" type="text" class="form-control" readonly />
        </div>
        <div class="form-group col-lg-6">
          <label> Correo de contacto alterno: </label>
          <input
            v-model="altern_email"
            type="text"
            class="form-control"
            readonly
          />
        </div>
        <h3>Domicilio de residencia</h3>
        <div class="form-group col-lg-3">
          <label> Pais: </label>
          <input
            type="text"
            class="form-control"
          />
        </div>
        <div class="form-group col-lg-3">
          <label> Estado: </label>
          <input
         
            type="text"
            class="form-control"
          />
        </div>
        <div class="form-group col-lg-3">
          <label> Municipio: </label>
          <input
          
            type="text"
            class="form-control"
           
          />
        </div>
        <div class="form-group col-lg-3">
          <label> Codigo Postal: </label>
          <input
          
            type="text"
            class="form-control"
          
          />
        </div>
      </div>
      <div class="col-12">
        <div class="row">
      <div class="form-group col-lg-3">
          <label> Calle: </label>
          <input
            
            type="text"
            class="form-control"
          
          />
        </div>
        <div class="form-group col-lg-3">
          <label> Numero exterior: </label>
          <input
          
            type="text"
            class="form-control"
            
          />
        </div>
        <div class="form-group col-lg-3">
          <label> Numero interior (opcional): </label>
          <input
            
            type="text"
            class="form-control"
            
          />
        </div>
        <div class="form-group col-lg-3">
          <label> Colonia: </label>
          <input
            type="text"
            class="form-control"
          />
        </div>
      </div>
      </div>
      <button
                        class="uaslp-btn"
                        
                    >
                        <font-awesome-icon icon="fa-solid fa-floppy-disk" />
                        <span>Guardar</span>
                    </button>
    </div>

    <div class="row mt-4">
      <h3>Documentos</h3>
      <documento-requerido
        v-for="documento in Documentos"
        :key="documento.name"
        :archivo.sync="documento.archivo"
        :location.sync="documento.pivot.location"
        :errores.sync="documento.errores"
        :images_btn="images_btn"
        :alias_academic_program.sync="alias_academic_program"
        @enviaDocumento="cargaDocumento"
        v-bind="documento"
      >
      </documento-requerido>
    </div>
  </div>
</template>

<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";

export default {
  props: {
    //v bind for appliant data from control escolar
    // Estado civil.
    marital_state: String,

    images_btn: Object,

    //v bind for appliant data from portal
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

    alias_academic_program: String,
  },
  components: { DocumentoRequerido },
  name: "postulante",

  computed: {
    Documentos: {
      get() {
        return this.documentos;
      },
      set(newVal) {
        this.$emit("update:documentos", newVal);
      },
    },
  },

  data() {
    return {
      // Documentos personales
      documentos: {
        type: Array,
        default: null,
      },
    };
  },

  created() {
    //get personal documents
    axios
      .get("/controlescolar/solicitud/getPersonalRequiredDocuments", {
        params: {
          archive_id: this.archive_id,
        },
      })
      .then((response) => {
        if (response.data != null) {
          this.documentos = response.data;
        }
        console.log(this.documentos);
      })
      .catch((error) => {
        console.log(error);
      });
  },

  methods: {
    cargaDocumento(requiredDocument, file) {
      var formData = new FormData();
      formData.append("archive_id", this.archive_id);
      formData.append("requiredDocumentId", requiredDocument.id);
      formData.append("file", file);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/updateArchivePersonalDocument",
        data: formData,
        headers: {
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      })
        .then((response) => {
          requiredDocument.datosValidos.file = "¡Archivo subido exitosamente!";
          requiredDocument.Location = response.data.location;
        })
        .catch((error) => {
          var errores = error.response.data["errors"];
          requiredDocument.Errores = {
            file: "file" in errores ? errores.file[0] : null,
            id:
              "requiredDocumentId" in errores
                ? errores.requiredDocumentId[0]
                : null,
          };
        });
    },
  },
};
</script>
