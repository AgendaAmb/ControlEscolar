<template>
  <div class="row">
    <h4 class="form-group col-12 my-1"> </h4>
    <div class="form-group col-md-4">
      <label> Tipo de publicación: </label>
        <select v-model="Type" class="form-control">
          <option :value="null" selected>Escoge una opción</option>
          <option value="articles"> Publicación de artículos </option>
          <option value="published_books"> Publicación de libros </option>
          <option value="published_chapters"> Capítulos publicados </option>
          <option value="technical_reports"> Reportes técnicos </option>
          <option value="working_memories"> Memorias de trabajo </option>
          <option value="working_documents"> Documentos de trabajo </option>
          <option value="reviews"> Reseñas </option>
      </select>
    </div>

    <div class="form-group col-md-12">
      <publicacion-articulo v-if="tipos[Type] === 'Publicación de artículos'"
        :title.sync="Title"
        :magazine_name.sync="MagazineName"
        :publish_date.sync="PublishDate">

        <!-- Otros autores del artículos -->
        <autor-articulo v-for="author in Authors"
          v-bind="author"
          v-bind:key="author.id"
          :name.sync="author.name"
          @agregaAutor="agregaAutor"
          @actualizaAutor="actualizaAutor">
        </autor-articulo>
      </publicacion-articulo>

      <publicacion-capitulo v-else-if="tipos[Type] === 'Capítulos publicados'"
        :titulo-capitulo.sync="Title"
        :nombre-articulo.sync="ArticleName"
        :ano-publicacion.sync="PublishDate" >
      </publicacion-capitulo>

      <publicacion-libro v-else-if="tipos[Type] === 'Publicación de libros'"
        :titulo-libro.sync="Title"
        :ano-publicacion.sync="PublishDate">
      </publicacion-libro>

      <reporte-tecnico v-else-if="tipos[Type] === 'Reportes técnicos'"
        :title.sync="Title"
        :institulo.sync="Institution"
        :publish_date.sync="PublishDate">
      </reporte-tecnico>

      <memoria-trabajo v-else-if="tipos[Type] === 'Memorias de trabajo'"
        :title.sync="Title"
        :post_title.sync="PostTitle"
        :publish_date.sync="PublishDate">
      </memoria-trabajo>

      <documento-trabajo v-else-if="tipos[Type] === 'Documentos de trabajo'"
        :title.sync="Title"
        :post_title.sync="PostTitle"
        :publish_date.sync="PublishDate">
      </documento-trabajo>

      <resenia v-else-if="tipos[Type] === 'Reseñas'"
        :title.sync="Title"
        :post_title.sync="PostTitle"
        :publish_date.sync="PublishDate">
      </resenia>
    </div>

    <div v-if="Type !== null" class="col-12 my-3">
      <button @click="agregaProduccionCientifica" class="btn btn-success"> Agregar </button>
      <button @click="actualizaProduccionCientifica" class="mx-2 btn btn-primary"> Guardar </button>
    </div>
  </div>
</template>


<script>

import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';
import AutorArticulo from './produccion-cientifica/AutorArticulo.vue';
import DocumentoTrabajo from './produccion-cientifica/DocumentoTrabajo.vue';
import MemoriaTrabajo from './produccion-cientifica/MemoriaTrabajo.vue';
import PublicacionArticulo from './produccion-cientifica/PublicacionArticulo.vue';
import PublicacionCapitulo from './produccion-cientifica/PublicacionCapitulo.vue';
import PublicacionLibro from './produccion-cientifica/PublicacionLibro.vue';
import ReporteTecnico from './produccion-cientifica/ReporteTecnico.vue';
import Resenia from './produccion-cientifica/Resenia.vue';

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
    Resenia
  },

  props: {
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
    post_title: String,

    // Autores de la producción científica.
    authors: Array,
  },

  computed: {
    State: {
      get(){
        return this.state;
      },
      set(newVal){
        this.$emit("update:state", newVal);
      }
    },
    Type: {
      get(){
        return this.type;
      }, 
      set(newVal){
        this.$emit("update:type", newVal);
      }
    },
    Title: {
      get(){
        return this.title;
      }, 
      set(newVal){
        this.$emit("update:title", newVal);
      }
    },
    PublishDate: {
      get(){
        return this.publish_date;
      }, 
      set(newVal){
        this.$emit("update:publish_date", newVal);
      }
    },
    MagazineName: {
      get(){
        return this.magazine_name;
      }, 
      set(newVal){
        this.$emit("update:magazine_name", newVal);
      }
    },
    ArticleName: {
      get(){
        return this.article_name;
      }, 
      set(newVal){
        this.$emit("update:article_name", newVal);
      }
    },
    Institution: {
      get(){
        return this.institution;
      }, 
      set(newVal){
        this.$emit("update:institution", newVal);
      }
    },
    PostTitle: {
      get(){
        return this.post_title;
      }, 
      set(newVal){
        this.$emit("update:post_title", newVal);
      }
    },
    Authors: {
      get(){
        return this.authors;
      }, 
      set(newVal){
        this.$emit("update:authors", newVal);
      }
    }
  },

  data() {
    return {
      errores: {},
      tipos: {
        articles: 'Publicación de artículos',
        published_books: 'Publicación de libros',
        published_chapters: 'Capítulos publicados',
        technical_reports: 'Reportes técnicos',
        working_documents: 'Documentos de trabajo',
        working_memories: 'Memorias de trabajo',
        reviews: 'Reseñas',
      }
    };
  },

  mounted(){
    this.Authors.push({
      id: -1,
      scientific_production_id: this.id,
      name: null
    });
  },

  methods: {
    agregaProduccionCientifica(evento) {
      this.enviaProduccionCientifica(evento, 'Completo');
    },

    actualizaProduccionCientifica(evento){
      this.enviaProduccionCientifica(evento, 'Incompleto');
    },

    enviaProduccionCientifica(evento, estado){
      this.errores = {};

      axios.post('/controlescolar/solicitud/updateScientificProduction', {
        
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
        post_title: this.post_title,

      }).then(response => {
        Object.keys(response.data).forEach(dataKey => {
          var event = 'update:' + dataKey;
          this.$emit(event, response.data[dataKey]);
        });
 
      }).catch(error => {
        this.State = 'Incompleto';
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    },

    agregaAutor(nuevoAutor){

       axios.post('/controlescolar/solicitud/addScientificProductionAuthor', {
        scientific_production_id: this.id,
        archive_id: this.archive_id,
        type: this.type,
        name: nuevoAutor.Name
      }).then(response => {
      
        Vue.set(this.Authors, this.Authors.length - 1, response.data)
        this.Authors.push({
          id: -1,
          scientific_production_id: this.id,
          name: null
        });
      }).catch(error => {
      });
    },

    actualizaAutor(autor){

       axios.post('/controlescolar/solicitud/updateScientificProductionAuthor', {
        id: autor.id, 
        scientific_production_id: this.id,
        archive_id: this.archive_id,
        type: this.type,
        name: autor.Name
      }).then(response => {
        Object.keys(response.data).forEach(dataKey => {
          var event = 'update:' + dataKey;
          autor.$emit(event, response.data[dataKey]);
        });
      }).catch(error => {
      });
    }
  }
};
</script>