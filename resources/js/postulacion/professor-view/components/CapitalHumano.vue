<template>
<details>
  <summary class="d-flex justify-content-end">
        <div class="col-9 justify-content-start">
          <h5 class="align-middle mb-5 d-block font-weight-bold">
          Capital Humano {{index+1}}
          </h5>
        </div>
        <div class="col-3 justify-content-end" >
          <button  @click="eliminaCapitalHumano" class="btn btn-danger" style="height:45px;">Eliminar Capital Humano</button>
        </div>
      </summary>

  <div class="row">
    <div class="form-group col-md-4">
      <label> Nombre del curso: </label>
      <input type="text" class="form-control" v-model="CourseName">
    </div>

    <div class="form-group col-md-4">
      <label> Fecha: </label>
      <input type="date" class="form-control" v-model="AssistedAt">
    </div>

    <div class="form-group col-md-4">
      <label> Nivel de escolaridad: </label>
      <input type="text" class="form-control" v-model="ScolarshipLevel">
    </div>

    <div class="col-12 my-3">
      <button @click="guardaCapitalHumano" class="mx-2 btn btn-primary"> Guardar cambios </button>
    </div>
  </div>
  </details>
</template>


<script>
export default {
  name: "capital-humano",

  props: {
    // id del capital humano.
    id: Number,

    //Index
    index: Number,

    // id del expediente.
    archive_id: Number,

    // Estado de control.
    state: String,

    // Nombre del curso.
    course_name: String,

    // Fecha del curso.
    assisted_at: String,

    // Nivel de escolaridad.
    scolarship_level: String
  },

  data(){
    return {
      errores: {}
    };
  },

  computed: {
    CourseName: {
      get(){
        return this.course_name;
      },
      set(newVal){
        this.$emit('update:course_name', newVal);
      }
    },
    AssistedAt: {
      get(){
        return this.assisted_at;
      },
      set(newVal){
        this.$emit('update:assisted_at', newVal);
      }
    },
    ScolarshipLevel: {
      get(){
        return this.scolarship_level;
      },
      set(newVal){
        this.$emit('update:scolarship_level', newVal);
      }
    }
  },

  methods: {

    guardaCapitalHumano(evento){
      this.enviaCapitalHumano(evento, 'Completo');
    },
  
    enviaCapitalHumano(evento, estado){
      this.errores = {};

      axios.post('/controlescolar/solicitud/updateHumanCapital', {

        id: this.id,
        archive_id: this.archive_id,
        state: estado,
        course_name: this.course_name,
        assisted_at: this.assisted_at,
        scolarship_level: this.scolarship_level,

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
    }
  },
  
     eliminaCapitalHumano(){
      axios.post('/controlescolar/solicitud/deleteHumanCapital', {
        id: this.id,
        archive_id: this.archive_id
      }).then(response =>{
        
            //Llama al padre para que elimine el item de la lista de experiencia laboral
            this.$emit('delete-item',this.index-1);

          Swal.fire({
              title: "Éxito al eliminar Capital Humano",
              text: response.data.message, // Imprime el mensaje del controlador
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Continuar",
            });

      }).catch(error=>{
          Swal.fire({
              title: "Error al eliminar Capital Humano",
              showCancelButton: false,
              icon: "error",
            });
      }); 
    },
};
</script>