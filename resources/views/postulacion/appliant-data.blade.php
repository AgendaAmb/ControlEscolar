<x-slot name="profile_picture"></x-slot>
<x-slot name="identidad_usuario">
    <x-form-input id="curp" type="text" class="col-12 mt-3" readonly> CURP: </x-form-input>
    <x-form-input id="name" type="text" class="col-12 mt-3" readonly> Nombre(s): </x-form-input>
    <x-form-input id="middlename" type="text" class="col-md-6 mt-3" readonly> Primer Apellido: </x-form-input>
    <x-form-input id="surname" type="text" class="col-md-6 mt-3" readonly> Segundo Apellido: </x-form-input>
</x-slot>
<x-slot name="datos_personales">
    <x-form-input id="fechaNacimiento" type="date" class="form-group col-xl-4" readonly> Fecha de Nacimiento: </x-form-input>
    <x-form-input id="genero" class="form-group col-lg-6 col-xl-4" readonly> Género: </x-form-input>
    <x-form-input id="paisResidencia" class="form-group col-lg-6 col-xl-4" readonly> País de residencia: </x-form-input>
    <x-form-input id="paisNacimiento" class="form-group col-lg-6 col-xl-4" readonly> País de nacimiento: </x-form-input>
    <x-form-input id="edoNacimiento" class="form-group col-lg-6 col-xl-4" readonly> Estado de nacimiento: </x-form-input>
    <x-form-input id="telContacto" type="tel" class="form-group col-lg-4" readonly> Teléfono de contacto: </x-form-input>
    <x-form-input id="email" type="email" class="form-group col-lg-4 col-xl-6" readonly> Correo electrónico: </x-form-input>
    <x-form-input id="emailAlt" type="email" class="form-group col-lg-4 col-xl-6" readonly> Correo de contacto alterno: </x-form-input>
</x-slot>