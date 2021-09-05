<appliant-data>
    <template v-slot:identity>
        <form-input id="curp" input_type="text" clase="col-12 mt-3" :readonly="true"> CURP: </form-input>
        <form-input id="name" input_type="text" clase="col-12 mt-3" :readonly="true"> Nombre(s): </form-input>
        <form-input id="middlename" input_type="text" clase="col-md-6 mt-3" :readonly="true"> Primer Apellido: </form-input>
        <form-input id="surname" input_type="text" clase="col-md-6 mt-3" :readonly="true"> Segundo Apellido: </form-input>
    </template>
    <template v-slot:personal_data>
        <form-input id="fechaNacimiento" input_type="date" clase="form-group col-xl-4" :readonly="true"> Fecha de Nacimiento: </form-input>
        <form-input id="genero" clase="form-group col-lg-6 col-xl-4" :readonly="true"> Género: </form-input>
        <form-input id="paisResidencia" clase="form-group col-lg-6 col-xl-4" :readonly="true"> País de residencia: </form-input>
        <form-input id="paisNacimiento" clase="form-group col-lg-6 col-xl-4" :readonly="true"> País de nacimiento: </form-input>
        <form-input id="edoNacimiento" clase="form-group col-lg-6 col-xl-4" :readonly="true"> Estado de nacimiento: </form-input>
        <form-input id="telContacto" input_type="tel" clase="form-group col-lg-4" :readonly="true"> Teléfono de contacto: </form-input>
        <form-input id="email" input_type="email" clase="form-group col-lg-4 col-xl-6" :readonly="true"> Correo electrónico: </form-input>
        <form-input id="emailAlt" input_type="email" clase="form-group col-lg-4 col-xl-6" :readonly="true"> Correo de contacto alterno: </form-input>
    </template>
</appliant-data>