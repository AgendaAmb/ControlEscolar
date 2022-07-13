<template>
  <details class="mt-1">
    <summary class="d-flex justify-content-start align-items-center my-2">
      <div class="col-12">
        <h5 v-if="tipos[Type] != null" class="font-weight-bold">
          {{ tipos[Type] + " " + index }}
        </h5>

        <h5 v-else class="font-weight-bold">Publicación {{ index }}</h5>
      </div>
    </summary>

    <div class="row mx-2">
      <div class="form-group col-md-4">
        <label> Tipo de publicación: </label>
        <select v-model="Type" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option value="articles">Publicación de artículos</option>
          <option value="published_books">Publicación de libros</option>
          <option value="published_chapters">Capítulos publicados</option>
          <option value="technical_reports">Reportes técnicos</option>
          <option value="working_memories">Memorias de trabajo</option>
          <option value="working_documents">Documentos de trabajo</option>
          <option value="reviews_cp">Reseñas</option>
        </select>
      </div>

      <div class="form-group col-md-12">
        <publicacion-articulo v-if="tipos[Type] === 'Publicación de artículos'" :title.sync="Title"
          :magazine_name.sync="MagazineName" :publish_date.sync="PublishDate">
          <!-- Otros autores del artículos -->
          <autor-articulo v-for="(author, index) in Authors" v-bind="author" :index="index" v-bind:key="author.id"
            :name.sync="author.name" @agregaAutor="agregaAutor" @actualizaAutor="actualizaAutor"
            @eliminaAutor="eliminaAutor">
          </autor-articulo>
        </publicacion-articulo>

        <publicacion-capitulo v-else-if="tipos[Type] === 'Capítulos publicados'" :titulo-capitulo.sync="Title"
          :nombre-articulo.sync="ArticleName" :ano-publicacion.sync="PublishDate">
          <!-- Otros autores del artículos -->
          <autor-articulo v-for="(author, index) in Authors" v-bind="author" :index="index" v-bind:key="author.id"
            :name.sync="author.name" @agregaAutor="agregaAutor" @actualizaAutor="actualizaAutor"
            @eliminaAutor="eliminaAutor">
          </autor-articulo>
        </publicacion-capitulo>

        <publicacion-libro v-else-if="tipos[Type] === 'Publicación de libros'" :titulo-libro.sync="Title"
          :ano-publicacion.sync="PublishDate">
          <!-- Otros autores del artículos -->
          <autor-articulo v-for="(author, index) in Authors" v-bind="author" :index="index" v-bind:key="author.id"
            :name.sync="author.name" @agregaAutor="agregaAutor" @actualizaAutor="actualizaAutor"
            @eliminaAutor="eliminaAutor">
          </autor-articulo>
        </publicacion-libro>

        <reporte-tecnico v-else-if="tipos[Type] === 'Reportes técnicos'" :title.sync="Title"
          :institution.sync="Institution" :publish_date.sync="PublishDate">
        </reporte-tecnico>

        <memoria-trabajo v-else-if="tipos[Type] === 'Memorias de trabajo'" :title.sync="Title"
          :post_title_memory.sync="PostTitleMemory" :publish_date.sync="PublishDate">
        </memoria-trabajo>

        <documento-trabajo v-else-if="tipos[Type] === 'Documentos de trabajo'" :title.sync="Title"
          :post_title_document.sync="PostTitleDocument" :publish_date.sync="PublishDate">
        </documento-trabajo>

        <resenia v-else-if="tipos[Type] === 'Reseñas'" :title.sync="Title" :post_title_review.sync="PostTitleReview"
          :publish_date.sync="PublishDate">
        </resenia>
      </div>


    </div>
    <!-- <documento-requerido
      v-for="documento in RequiredDocuments"
      :key="documento.name"
      :archivo.sync="documento.archivo"
      :location.sync="documento.pivot.location"
      :errores.sync="documento.errores"
      :alias_academic_program="alias_academic_program"
      v-bind="documento"
      @enviaDocumento="cargaDocumento"
    >
    </documento-requerido> -->
    <hr class="d-block mt-2" :style="ColorStrip" />
  </details>
</template>


<script>
import DocumentoRequerido from "./DocumentoRequerido.vue";
import InputSolicitud from "./InputSolicitud.vue";
import AutorArticulo from "./produccion-cientifica/AutorArticulo.vue";
import DocumentoTrabajo from "./produccion-cientifica/DocumentoTrabajo.vue";
import MemoriaTrabajo from "./produccion-cientifica/MemoriaTrabajo.vue";
import PublicacionArticulo from "./produccion-cientifica/PublicacionArticulo.vue";
import PublicacionCapitulo from "./produccion-cientifica/PublicacionCapitulo.vue";
import PublicacionLibro from "./produccion-cientifica/PublicacionLibro.vue";
import ReporteTecnico from "./produccion-cientifica/ReporteTecnico.vue";
import Resenia from "./produccion-cientifica/Resenia.vue";

export default {
  name: "produccion-cientifica",
  components: {
    DocumentoRequerido,
    InputSolicitud,
    PublicacionArticulo,
    PublicacionCapitulo,
    PublicacionLibro,
    ReporteTecnico,
    MemoriaTrabajo,
    DocumentoTrabajo,
    AutorArticulo,
    Resenia,
  },

  props: {
    //Index
    index: Number,

    // Documentos requeridos
    required_documents: Array,

    images_btn: Object,


    // Id de la producción científica.
    id: Number,

    // Id del expediente.
    archive_id: Number,

    // Estado de control
    state: String,

    // Tipo de producción científica.
    type: String,

    // Título.
    title: String,

    // Fecha de publicación.
    publish_date: String,

    // Nombre de la revista.
    magazine_name: String,

    // Nombre de la revista.
    article_name: String,

    // Nombre de la institución.
    institution: String,

    // Nombre de la publicación.
    post_title_memory: {
      type: String,
    },

    // Nombre de la publicación.
    post_title_review: {
      type: String,
    },

    // Nombre de la publicación.
    post_title_document: {
      type: String,
    },

    // Autores de la producción científica.
    authors: Array,
  },

  computed: {
    RequiredDocuments: {
      get() {
        return this.required_documents;
      },
      set(newVal) {
        this.$emit("update:required_documents", newVal);
      },
    },
    State: {
      get() {
        return this.state;
      },
      set(newVal) {
        this.$emit("update:state", newVal);
      },
    },
    Type: {
      get() {
        return this.type;
      },
      set(newVal) {
        this.$emit("update:type", newVal);
      },
    },
    Title: {
      get() {
        return this.title;
      },
      set(newVal) {
        this.$emit("update:title", newVal);
      },
    },
    PublishDate: {
      get() {
        return this.publish_date;
      },
      set(newVal) {
        this.$emit("update:publish_date", newVal);
      },
    },
    MagazineName: {
      get() {
        return this.magazine_name;
      },
      set(newVal) {
        this.$emit("update:magazine_name", newVal);
      },
    },
    ArticleName: {
      get() {
        return this.article_name;
      },
      set(newVal) {
        this.$emit("update:article_name", newVal);
      },
    },
    Institution: {
      get() {
        return this.institution;
      },
      set(newVal) {
        this.$emit("update:institution", newVal);
      },
    },
    PostTitleReview: {
      get() {
        return this.post_title_review;
      },
      set(newVal) {
        this.$emit("update:post_title_review", newVal);
      },
    },

    PostTitleDocument: {
      get() {
        return this.post_title_document;
      },
      set(newVal) {
        this.$emit("update:post_title_document", newVal);
      },
    },

    PostTitleMemory: {
      get() {
        return this.post_title_memory;
      },
      set(newVal) {
        this.$emit("update:post_title_memory", newVal);
      },
    },
    Authors: {
      get() {
        return this.authors;
      },
      set(newVal) {
        this.$emit("update:authors", newVal);
      },
    },
  },

  data() {
    return {
      errores: {},
      tipos: {
        articles: "Publicación de artículos",
        published_books: "Publicación de libros",
        published_chapters: "Capítulos publicados",
        technical_reports: "Reportes técnicos",
        working_documents: "Documentos de trabajo",
        working_memories: "Memorias de trabajo",
        reviews_cp: "Reseñas",
      },
    };
  },

  mounted() {
    this.Authors.push({
      id: -1,
      scientific_production_id: this.id,
      name: null,
    });
  },

  methods: {
    ColorStrip() {
      var color = "#FFFFFF";

      switch (this.academic_program.alias) {
        case "maestria":
          color = "#0598BC";
          break;
        case "doctorado":
          color = "#FECC50";
          break;
        case "enrem":
          color = "#FF384D";
          break;
        case "imarec":
          color = "#118943";
          break;
      }

      return {
        backgroundColor: color,
        height: "1px",
      };
    },

    guardaProduccionCientifica(evento) {
      this.enviaProduccionCientifica(evento, "Completo");
    },

    eliminaProduccionCientifica() {
      axios
        .post("/controlescolar/solicitud/deleteScientificProduction", {
          id: this.id,
          archive_id: this.archive_id,
        })
        .then((response) => {
          //Llama al padre para que elimine el item de la lista de experiencia laboral
          this.$emit("delete-item", this.index - 1);

          Swal.fire({
            title: "Éxito al eliminar Producción cientifica",
            text: response.data.message, // Imprime el mensaje del controlador
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
          });
        })
        .catch((error) => {
          Swal.fire({
            title: "Error al eliminar Experiencia laboral",
            showCancelButton: false,
            icon: "error",
          });
        });
    },

    enviaProduccionCientifica(evento, estado) {
      this.errores = {};

      axios
        .post("/controlescolar/solicitud/updateScientificProduction", {
          id: this.id,
          archive_id: this.archive_id,
          state: estado,
          language: this.language,
          type: this.type,
          title: this.title,
          publish_date: this.publish_date,
          magazine_name: this.magazine_name,
          article_name: this.article_name,
          institution: this.institution,
          post_title_review: this.post_title_review,
          post_title_memory: this.post_title_memory,
          post_title_document: this.post_title_document,
        })
        .then((response) => {
          // Object.keys(response.data).forEach((dataKey) => {
          //   var event = "update:" + dataKey;
          //   this.$emit(event, response.data[dataKey]);
          // });

          Swal.fire({
            title: "Los datos se han actualizado correctamente",
            text: "La producción cientifica seleccionada de tu expediente ha sido modificado, podras hacer cambios mientras la postulación este disponible",
            icon: "success",
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonColor: "#3085d6",
            cancelButtonText: "Continuar",
          });
        })
        .catch((error) => {
          Swal.fire({
            title: "Error al actualizar datos",
            text: error.response.data["message"],
            showCancelButton: false,
            icon: "error",
          });
        });
    },
    eliminaAutor(autor) {
      axios
        .post("/controlescolar/solicitud/deleteScientificProductionAuthor", {
          id: autor.id,
          scientific_production_id: this.id,
          archive_id: this.archive_id,
          type: this.type,
          name: autor.Name,
        })
        .then((response) => {
          this.Authors.splice(autor.index, 1);
        })
        .catch((error) => { });
    },

    agregaAutor(nuevoAutor) {
      axios
        .post("/controlescolar/solicitud/addScientificProductionAuthor", {
          scientific_production_id: this.id,
          archive_id: this.archive_id,
          type: this.type,
          name: nuevoAutor.Name,
        })
        .then((response) => {
          Vue.set(this.Authors, this.Authors.length - 1, response.data);
          this.Authors.push({
            id: -1,
            scientific_production_id: this.id,
            name: null,
          });
        })
        .catch((error) => { });
    },

    actualizaAutor(autor) {
      axios
        .post("/controlescolar/solicitud/updateScientificProductionAuthor", {
          id: autor.id,
          scientific_production_id: this.id,
          archive_id: this.archive_id,
          type: this.type,
          name: autor.Name,
        })
        .then((response) => {
          Object.keys(response.data).forEach((dataKey) => {
            var event = "update:" + dataKey;
            autor.$emit(event, response.data[dataKey]);
          });
        })
        .catch((error) => { });
    },
  },
};
</script>