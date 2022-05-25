<template>
    <div class="row my-2 mx-2">

      <div class="col-12">
        <h1 class="display-5">
          Hola {{user.name}}
        </h1>
        <h1 class="display-5">
          Bienvenid@ a Control Escolar
        </h1>
      </div>
       
       <div class="col-12 my-2">
          <p class="h4"> Tu información : </p>

          <p class="h5"><strong>Nombre completo: </strong> {{user.name + ' ' + user.middlename + ' ' + user.surname}}</p>
          <p class="h5"><strong>Clave unica / RPE: </strong> {{user.id}}</p>

       </div>

        
        
    </div>
</template>

<script>
import swal from "sweetalert2";
window.Swal = swal;
export default {
    name: 'candidate-data',

    props:{
      user: {
        type: Array,
        default: null,
      }
    },

    // created(){
    //      Swal.fire({
    //         title: "¡El tiempo se agota!",
    //         text: 'Te recordamos que el expediente esta por cerrar',
    //         icon: "warning",
    //         showCancelButton: false,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Enterado",
    //       });
    // }
}
</script>