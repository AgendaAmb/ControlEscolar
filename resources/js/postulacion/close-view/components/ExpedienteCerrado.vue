<template>
    <div class="row">
        <div class="col-12">
            <p class="display-5">
                <!-- El expediente del usuario {{appliant.name + ' ' + appliant.middlename + ' ' + appliant.surname}}  -->
                Este expediente ya ha sido evaluado
            </p>
            <p class="display-5"><strong>Nombre del aspirante: </strong> {{user.name + ' ' + user.middlename + ' ' + user.surname}}</p>
             <p class="display-5"><strong>Clave unica: </strong> {{appliant.id}}</p>
        </div>

        <div class="col-12 my-2">
                <p class="h5">Cambiar estado de expediente</p>
         <button
            @click="CambiarEstadoExpediente('Incompleto')"
            class="btn btn-success"
            style="height: 45px; width: 150px"
          >
            <strong>Aceptar</strong>
          </button>
        </div>  
    </div>
</template>

<script>
export default {
    name:"expediente-cerrado",
    props:{
        archive_id: {
            type:Number,
            default: null,
        },

        appliant:{
            type:Object,
            default:null
        }
    },

    data() {
    return {
      name_status: null,
    };
  },

    methods:{
        CambiarEstadoExpediente(status){

       switch (status) {
      case "Incompleto":
        id_status= 1;
        break;
      case "En espera de revisión":
          id_status= 2;
        break;
      case "Por Actualizar":
          id_status= 3;
        break;
      case "¡Documentos nuevos!":
          id_status= 4;
        break;
        case "Completo":
            id_status= 5;
        break;
        case "No cumple":
            id_status= 6;
        break;
        default:
            id_status= 1;
          break;

    }

      if(status != null){
         Swal.fire({
          title: "¿Estas seguro de realizar el cambio?",
          text: "Actulizar el expediente por '" + status +"'" ,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
          axios
            .post("/controlescolar/solicitud/updateStatusArchive", {
              
              // Status id to change the state
              archive_id: this.archive_id,
              status : id_status,
              
            })
            .then((response) => {
              Swal.fire({
                title: "El expediente del postulante ha sido modificado",
                text: "Se le informara al alumno de dicha verificación de documentos",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar",
              }).then((result) => {
                window.location.href = "/controlescolar/solicitud/";
              });
              
            })
            .catch((error) => {
              console.log(error);
              Swal.fire({
                title: "Error al actualizar",
                showCancelButton: false,
                icon: "error",
              });
            });
        }
        });
      }
      
    }
    },


}
</script>