<template>

<details>
      <summary class="d-flex justify-content-start align-items-center my-2">
      <div class="col-12">
        <h4 class="font-weight-bold">Experiencia Laboral {{ index }}</h4>
      </div>
     
    </summary>

  <div class="row">
    <h4 class="form-group col-12 my-2"></h4>
    <div class="form-group col-md-6">
      <label> Institución / Empresa:  </label>
      <input v-model="Institution" type="text" :class="classObjectFor('institution')" :readonly="true">

      <div v-if="estaEnError('institution')" class="invalid-feedback">{{errores.institution}}</div>
    </div>    
    <div class="form-group col-md-6">
      <label> En este puesto me desempeñé como: </label>
       <input v-model="WorkingPosition" type="text" :class="classObjectFor('working_position')" :readonly="true">

      <div v-if="estaEnError('working_position')" class="invalid-feedback">{{errores.working_position}}</div>
    </div>

    <h5 class="form-group col-12 mt-2 mb-2"><strong> Periodo laboral </strong></h5>
    <div class="col-12 my-4">
      <div class="row">
        <div class="form-group col-md-6">
          <label> Desde: </label>
          <input v-model="From" type="date" :class="classObjectFor('from')" :readonly="true">

          <div v-if="estaEnError('from')" class="invalid-feedback">{{errores.from}}</div>
        </div>
        <div class="form-group col-md-6">
          <label> Hasta: </label>
          <input v-model="To" type="date" :class="classObjectFor('to')"  :readonly="true">

          <div v-if="estaEnError('to')" class="invalid-feedback">{{errores.to}}</div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label> Área de conocimiento: </label>
          <input v-model="KnowledgeArea" type="text" :class="classObjectFor('knowledge_area')"  :readonly="true">

          <div v-if="estaEnError('knowledge_area')" class="invalid-feedback">{{errores.knowledge_area}}</div>
        </div>

        <div class="form-group col-md-6">
          <label> Campo: </label>
          <input v-model="Field" type="text" :class="classObjectFor('field')"  :readonly="true">

          <div v-if="estaEnError('field')" class="invalid-feedback">{{errores.field}}</div>
        </div>
      </div>
    </div>

    <div class="form-group my-3 col-xl-6">
      <h5><strong> Descripción del puesto: </strong></h5>
      <textarea rows="5" v-model="WorkingPositionDescription" :class="classObjectFor('working_position_description')" :readonly="true"></textarea>

      <div v-if="estaEnError('working_position_description')" class="invalid-feedback">{{errores.working_position_description}}</div>
    </div>
    <div class="form-group my-3 col-xl-6">
      <h5><strong> Logros: </strong></h5>
      <textarea rows="5" v-model="Achievements" :class="classObjectFor('achievements')" :readonly="true"></textarea>
      <div v-if="estaEnError('achievements')" class="invalid-feedback">{{errores.achievements}}</div>
    </div>

    
  </div>
    <hr class="d-block" :style="ColorStrip" />
  </details>
</template>


<script>
import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  name: "experiencia-laboral",

  props: {
    index: Number,
    alias_academic_program:String,
    images_btn:Array,
    id: Number,
    archive_id:Number,
    state: String,
    institution:String, 
    working_position:String, 
    from:String, 
    to:String,
    knowledge_area:String,
    field:String,
    working_position_description:String,
    achievements:String
  },

  components: { DocumentoRequerido, InputSolicitud },
  
  data(){
    return {
      errores: {}
    }
  },

  computed: {
    ColorStrip: {
      get() {
        var color = "#FFFFFF";

        switch (this.alias_academic_program) {
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
    },

    State: {
      get(){
        return this.state;
      },
      set(newVal){
        this.$emit('update:state', newVal);
      }
    },  

    Institution: {
      get(){
        return this.institution;
      },
      set(newVal){
        this.$emit('update:institution', newVal);
      }
    },  

    WorkingPosition:{
      get(){
        return this.working_position;
      },
      set(newVal){
        this.$emit('update:working_position', newVal);
      }
    }, 

    From: {
      get(){
        return this.from;
      },
      set(newVal){
        this.$emit('update:from', newVal);
      }
    }, 

    To: {
      get(){
        return this.to;
      },
      set(newVal){
        this.$emit('update:to', newVal);
      }
    }, 

    KnowledgeArea: {
      get(){
        return this.knowledge_area;
      },
      set(newVal){
        this.$emit('update:knowledge_area', newVal);
      }
    }, 

    Field: {
      get(){
        return this.field;
      },
      set(newVal){
        this.$emit('update:field', newVal);
      }
    }, 

    WorkingPositionDescription: {
      get(){
        return this.working_position_description;
      },
      set(newVal){
        this.$emit('update:working_position_description', newVal);
      }
    }, 

    Field: {
      get(){
        return this.field;
      },
      set(newVal){
        this.$emit('update:field', newVal);
      }
    },

    Achievements: {
      get(){
        return this.achievements;
      },
      set(newVal){
        this.$emit('update:achievements', newVal);
      }
    }
  },
  methods: {
    
    guardaExperienciaLaboral(evento){
      this.enviaExperienciaLaboral(evento, 'Completo');
    },

    eliminaExperienciaLaboral(){
      axios.post('/controlescolar/solicitud/deleteWorkingExperience', {
        id: this.id,
        archive_id: this.archive_id
      }).then(response =>{
        
            //Llama al padre para que elimine el item de la lista de experiencia laboral
            this.$emit('delete-item',this.index-1);

          Swal.fire({
              title: "Éxito al eliminar Experiencia laboral",
              text: response.data.message, // Imprime el mensaje del controlador
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Continuar",
            });

      }).catch(error=>{
          Swal.fire({
              title: "Error al eliminar Experiencia laboral",
              showCancelButton: false,
              icon: "error",
            });
      }); 
    },

    enviaExperienciaLaboral(evento, estado){
      this.errores = {};

      axios.post('/controlescolar/solicitud/updateWorkingExperience', {
        
        id: this.id,
        archive_id: this.archive_id,
        state: estado,
        institution: this.institution, 
        working_position: this.working_position, 
        from: this.from, 
        to: this.to,
        knowledge_area: this.knowledge_area,
        field: this.field,
        working_position_description: this.working_position_description,
        achievements: this.achievements

      }).then(response => {
        this.State = response.data.state;
        this.Institution = response.data.institution;
        this.WorkingPosition = response.data.working_position;
        this.From = response.data.from;
        this.To = response.data.to;
        this.KnowledgeArea = response.data.knowledge_area;
        this.Field = response.data.field;
        this.working_position = response.data.working_position;

      }).catch(error => {
        this.State = 'Incompleto';
        var errores = error.response.data['errors'];

        Object.keys(errores).forEach(key => {
          Vue.set(this.errores, key, errores[key][0]);
        });
      });
    },

    estaEnError(key){
      return key in this.errores;
    },

    classObjectFor(key){
      return {
        'form-control': true,
        'is-invalid': this.estaEnError(key)
      }
    }
  }
};
</script>