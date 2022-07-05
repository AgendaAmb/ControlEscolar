<template>
    <div class="col-12 col-lg-6 col-xl-5 my-3">
        <a  @click="$emit('click', id)">
            <img :src="program_photo" width="400px">
        </a>
    </div>
</template>

<script>
export default {
    name: 'academic-program',
    props: {
        // Id del programa académico.
        id: Number,

        // Foto del programa académico.
        photo: String,

        name:String,
    },

    data(){
        return {
            program_photo: null,
        }
    },
    
    created() {
    console.log(this.name);
    axios
      .get("/controlescolar/solicitud/getImageAcademicProgram",{
        params:{
            academic_program : this.name
        }
      })
      .then((response) => {
        // console.log('recibiendo imagenes' + response.data);
        this.program_photo = response.data;
        // console.log('imagenes buttons: ' + this.images.ver);
      })
      .catch((error) => {
        console.log(error);
      });
  },
}
</script>
