<template>
  <div class="row my-2 mx-2">
    <div class="col-12" v-if="oldDocumentsEmpty() === true">
      <h1 class="">
        Hola {{user.name}}
      </h1>
      <h1 class="display-5">
        Bienvenid@ a Control Escolar
      </h1>
    </div>

    <div class="col-12 my-2" v-if="oldDocumentsEmpty() === true">
      <p class="h4"> Tu información : </p>

      <p class="h5"><strong>Nombre completo: </strong> {{user.name + ' ' + user.middlename + ' ' + user.surname}}</p>
      <p class="h5"><strong>Clave unica / RPE: </strong> {{user.id}}</p>

    </div>

    <!-- See all the old documents -->
    <div class="col-12" v-if="oldDocumentsEmpty() === true">
      <div class="row" v-for="(rol, index) in user_roles" v-bind="rol" v-bind:key="`${index}-${rol.id}-RolUsuario`"
        :index="index">
        <div v-if="isAdmin(rol.name) === true">
          <b-btn pill variant="primary" v-on:click="seeOldDocuments()">
            <b-icon icon="file-earmark" aria-hidden="true"></b-icon> Ver Documentos antiguos
          </b-btn>

          <b-btn pill variant="primary" v-on:click="seeOldDocumentsIMAREC()">
            <b-icon icon="file-earmark" aria-hidden="true"></b-icon> Ver Documentos antiguos IMAREC
          </b-btn>

        </div>
      </div>
    </div>

    <!-- Display the link for all the  -->
    <div class="col-12" v-if="oldDocumentsEmpty() === false && imagesToShowEmpty()===true">
      <b-btn class="my-3" pill variant="primary" v-on:click="downloandAllDocuments()">
        <b-icon icon="file-earmark" aria-hidden="true"></b-icon> Descargar todos los documentos
      </b-btn>
      <b-btn class="my-3" pill variant="primary" v-on:click="downloandAllDocumentsIMAREC()">
        <b-icon icon="file-earmark" aria-hidden="true"></b-icon> Descargar todos los documentos IMAREC
      </b-btn>
      <b-table striped hover head-variant="blue" id="my-table" :items="old_documents" :fields="fields"
        :per-page="perPage" :current-page="currentPage" class="text-center h3">
        <template v-slot:cell(Id_Documento)="{ item }">
          <span>
            <p class="h6">{{ item.idSolicitud }}</p>
          </span>
        </template>

        <template v-slot:cell(Nombre_Documento)="{ item }">
          <span>
            <p class="h6">{{ item.IdTipoArchivo}}</p>
          </span>
        </template>fieldsImages

        <template v-slot:cell(Ver_Documento)="{ item }">
          <!-- <span>
            <a :href="getLinkToDocument(item.ClaveDocumento)" target="_blank">Ver documento</a>
          </span> -->

          <b-button id="btn-downloand" variant="primary"
            v-on:click="getDocumentToDownloandIMAREC(item.idSolicitud, item.IdTipoArchivo, 'IMAREC')">
            <p>Descargar</p>
          </b-button>
        </template>
      </b-table>
      <!-- Pagination bottom -->
      <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" class="my-4" align="fill">
        <template #first-text>
          <b-icon icon="chevron-double-left" aria-hidden="true"></b-icon>
        </template>
        <template #prev-text>
          <b-icon icon="chevron-left" aria-hidden="true"></b-icon>
        </template>
        <template #next-text>
          <b-icon icon="chevron-right" aria-hidden="true"></b-icon>
        </template>
        <template #last-text>
          <b-icon icon="chevron-double-right" aria-hidden="true"></b-icon>
        </template>
      </b-pagination>
    </div>

    <div v-if="imagesToShowEmpty() === false">
      <b-table striped hover head-variant="blue" id="my-table-images" :items="imagesToShow" :fields="fieldsImages"
        :per-page="perPageImage" :current-page="currentPageImage" class="text-center h3">
        <template v-slot:cell(Name)="{ item }">
          <p class="h6">{{ item.name }}</p>
        </template>
        <template v-slot:cell(Data)="{ item }">
          <img :src="item.data" :alt="item.name" style='display:block; width:100px;height:100px;' />
        </template>
      </b-table>


    </div>

  </div>
</template>

<script>
import swal from "sweetalert2";
import OldDocumentLink from "./OldDocumentLink.vue";
window.Swal = swal;
export default {
  name: 'candidate-data',

  components: {
    OldDocumentLink
  },

  computed: {

    rows() {
      // let list = [];

      // this.old_documents.filter(user => {
      //   if (user.id.toString().toLowerCase().includes(this.search.toLowerCase())) {
      //     list.push(user);
      //   }
      // })

      // if (list.length <= 0) {
      //   list = this.data;
      // }

      // return list.length;

      return this.old_documents.length;
    }
  },

  props: {
    user: {
      type: Object,
      default: null,
    },
    user_roles: {
      type: Array,
      default: []
    }
  },

  data() {
    return {
      old_documents: [],
      imagesToShow: [],
      one_old_document: null,
      perPage: 10,
      currentPage: 1,
      perPageImage: 10,
      currentPageImage: 1,
      fields: [
        {
          key: 'Id_Documento',
          label: 'Id Documento',
          sortable: true
        },
        {
          key: 'Nombre_Documento',
          label: 'Nombre Documento',
          sortable: true
        },
        {
          key: 'Ver_Documento',
          label: 'Ver Documento',
          sortable: true,
        },

      ],

      fieldsImages: [
        {
          key: 'Name',
          label: 'Nombre',
          sortable: true
        },
        {
          key: 'Data',
          label: 'Imagen',
          sortable: true
        },
      ],

    }
  },

  methods: {

    downloandAllDocumentsIMAREC() {
      for (let i = 0; i < this.old_documents.length; i++) {
        this.getDocumentToDownloandIMAREC(this.old_documents[i].idSolicitud, this.old_documents[i].IdTipoArchivo, 'IMAREC');
        // this.getDocumentToDownloand(this.old_documents[i].idSolicitud, 'OLD_CONTROL_ESCOLAR');
      }
    },

    downloandAllDocuments() {
      for (let i = 0; i < this.old_documents.length; i++) {
        this.getDocumentToDownloand(this.old_documents[i].ClaveDocumento, 'OLD_CONTROL_ESCOLAR');
      }
    },


    DescargarDocumento(data) {
      var byteCharacters = atob(data.base64);
      var byteNumbers = new Array(byteCharacters.length);

      for (var i = 0; i < byteCharacters.length; i++) {
        byteNumbers[i] = byteCharacters.charCodeAt(i);
      }

      var byteArray = new Uint8Array(byteNumbers);
      var blob = new Blob([byteArray], { type: data.type });
      blob.name = data.name;
      blob.base64 = data.base64;
      var blobUrl = URL.createObjectURL(blob);

      const link = document.createElement("a");
      link.href = blobUrl;
      link.download = data.name;

      document.body.appendChild(link);

      link.dispatchEvent(
        new MouseEvent("click", {
          bubbles: true,
          cancelable: true,
          view: window,
        })
      );
      document.body.removeChild(link);
    },
    hexToBase64(str) {
      return btoa(String.fromCharCode.apply(null,
        str.replace(/\r|\n/g, "").replace(/([\da-fA-F]{2}) ?/g, "0x$1 ").replace(/ +$/, "").split(" "))
      );
    },

    getDocumentToDownloandIMAREC(idSolicitud, IdTipoArchivo, nameDatabase) {

      console.log(idSolicitud);
      console.log(IdTipoArchivo);
      console.log(nameDatabase);
      axios
        .get("/controlescolar/oldControlEscolar/viewOldDocumentIMAREC/idSolicitud/" + idSolicitud + '/idTipoArchivo/' + IdTipoArchivo + '/database/' + nameDatabase)
        .then((response) => {

          // console.log(response.data);

          // Transform hexadecimal string to base64 string
          // var hex = response.data.Datos;

          // hex = hex.substring(2, hex.length);

          // // let data_base64 = btoa(String.fromCharCode.apply(null,
          // //   hex.replace(/\r|\n/g, "").replace(/([\da-fA-F]{2}) ?/g, "0x$1 ").replace(/ +$/, "").split(" "))
          // // );
          // let binary = '';
          // for (let i = 0; i < hex.length; i++) {
          //   binary += String.fromCharCode(hex.charCodeAt(i) & 0xff);
          // }
          // // let data_base64 = btoa(hex.match(/\w{2}/g).map(function(a){return String.fromCharCode(parseInt(a, 16));} ).join(""));
          // let data_base64 = btoa(binary);
          let data_base64 = response.data.Datos;

          // c //este es ya el base64
          // if not is an image
          // let data_base64 = this.hexToBase64(response.data.Datos);
          let byteCharacters = atob(data_base64);
          let byteNumber = new Array(byteCharacters.length);
          for (let i = 0; i < byteCharacters.length; i++) {
            byteNumber[i] = byteCharacters.charCodeAt(i);
          }
          let byteArray = new Uint8Array(byteNumber);
          let blob = new Blob([byteArray], { type: response.data.mimetype });
          blob.name = 'Solicitud ' + response.data.IdSolicitud + '  | TipoArchivo ' + response.data.IdTipoArchivo;
          blob.base64 = data_base64;
          var blobUrl = URL.createObjectURL(blob);
          console.log(blob);
          const link = document.createElement("a");
          link.href = blobUrl;
          link.download = 'Solicitud ' + response.data.IdSolicitud + '  | TipoArchivo ' + response.data.IdTipoArchivo;

          document.body.appendChild(link);

          link.dispatchEvent(
            new MouseEvent("click", {
              bubbles: true,
              cancelable: true,
              view: window,
            })
          );
          document.body.removeChild(link);

          // var a = document.createElement('a');
          // a.href = "img.png";
          // a.download = "output.png";
          // document.body.appendChild(a);
          // a.click();
          // document.body.removeChild(a);

        })
        .catch((error) => {
          console.log(error);
        });
    },

    getDocumentToDownloand(idDocumento, nameDatabase) {
      axios
        .get("/controlescolar/oldControlEscolar/viewOldDocument/" + idDocumento + '/database/' + nameDatabase)
        .then((response) => {

          // DATA BASE 64
          var data_base64 = null;

          if (nameDatabase === 'OLD_CONTROL_ESCOLAR') {
            data_base64 = response.data.Contenido;
            data_base64.name = response.data.Nombre
          }

          let byteCharacters = atob(data_base64);
          let byteNumber = new Array(byteCharacters.length);
          for (let i = 0; i < byteCharacters.length; i++) {
            byteNumber[i] = byteCharacters.charCodeAt(i);
          }
          let byteArray = new Uint8Array(byteNumber);

          // console.log(byteArray);
          // blob
          let blob = new Blob([byteArray], { type: "application/pdf" });
          blob.name = response.data.Nombre;
          blob.base64 = response.data.Contenido;
          console.log(blob);

          let blobURL = URL.createObjectURL(blob);
          const link = document.createElement("a");
          link.href = blobURL;
          link.download = blob.name
          document.body.appendChild(link);
          link.dispatchEvent(
            new MouseEvent('click', {
              bubbles: true,
              cancelable: true,
              view: window
            })
          );
          document.body.removeChild(link)
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getDocumentToDownloand(idDocumento) {
      axios
        .get("/controlescolar/oldControlEscolar/viewOldDocument/" + idDocumento)
        .then((response) => {

          let byteCharacters = atob(response.data.Contenido);
          let byteNumber = new Array(byteCharacters.length);
          for (let i = 0; i < byteCharacters.length; i++) {
            byteNumber[i] = byteCharacters.charCodeAt(i);
          }
          let byteArray = new Uint8Array(byteNumber);

          // console.log(byteArray);
          // blob
          let blob = new Blob([byteArray], { type: "application/pdf" });
          blob.name = response.data.Nombre;
          blob.base64 = response.data.Contenido;
          console.log(blob);

          let blobURL = URL.createObjectURL(blob);
          const link = document.createElement("a");
          link.href = blobURL;
          link.download = response.data.Nombre;
          document.body.appendChild(link);
          link.dispatchEvent(
            new MouseEvent('click', {
              bubbles: true,
              cancelable: true,
              view: window
            })
          );
          document.body.removeChild(link)
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getLinkToDocument(idDocumento) {
      return '/controlescolar/oldControlEscolar/viewOldDocument/' + idDocumento;
    },

    oldDocumentsEmpty() {
      let res = false;
      if (this.old_documents.length <= 0) {
        res = true;
      }
      return res;
    },

    imagesToShowEmpty() {
      let res = false;
      if (this.imagesToShow.length <= 0) {
        res = true;
      }
      return res;
    },

    isAdmin(rol) {
      let res = false;
      if (rol === 'admin') {
        res = true;
      }
      return res;
    },

    seeOldDocumentsIMAREC() {
      axios
        .get("/controlescolar/oldControlEscolar/listOldDocumentsIMAREC")
        .then((response) => {
          // give a collection of all documents
          this.old_documents = response.data;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },


    seeOldDocuments() {
      axios
        .get("/controlescolar/oldControlEscolar/listOldDocuments")
        .then((response) => {
          // give a collection of all documents
          this.old_documents = response.data;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }
}
</script>