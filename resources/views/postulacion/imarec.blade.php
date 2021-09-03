@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/IMAREC-SUPERIOR.png') }}" width="600px">
@endsection

@section('main')
<div class="row justify-content-center">
    <div class="form-group col-md-12 text-center">
    </div>
</div>

<div class="mt-5 row text-center justify-content-center">
    <div class="form-group col-md-12"> 
        <h4 class="mt-4"> Datos Personales </h4>
    </div>

    <div class="col-md-5 col-lg-6 col-xl-3 my-2">
        <label for="fotoPerfil"> Foto de Perfil </label>
    </div>
    <div class="form-group col-md-7 col-lg-6 col-xl-9 text-left">
        <div class="row justify-content-center"> 
            <div class="col-12 mt-3">
                <label for="curp"> CURP: </label>
                <input id="curp" name="curp" type="text" class="form-control " value="MADA970710MSPRMN00" readonly="">
                
            </div> 
            <div class="col-12 mt-3">
                <label for="nombre"> Nombre(s): </label>
                <input id="nombre" name="nombre" type="text" class="form-control " value="ANA VALERIA" readonly="">
                
            </div> 
                <div class="col-md-12 col-xl-6 mt-3">
                <label for="appaterno"> Primer Apellido: </label>
                <input id="appaterno" name="appaterno" type="text" class="form-control " value="MARTINEZ" readonly="">
                
            </div>            
            <div class="col-md-12 col-xl-6 mt-3">
                <label for="apmaterno"> Segundo Apellido: </label>
                <input id="apmaterno" name="apmaterno" type="text" class="form-control " value="DIMAS" readonly="">    
            </div> 
        </div>
    </div>
    <div class="form-group col-md-12 col-xl-4">
        <label for="fechaNacimiento"> Fecha de Nacimiento: </label>
        <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control " value="1997-07-10" readonly="">
        
    </div>
    <div class="form-group col-lg-6 col-xl-4">
        <label for="genero"> Género: </label>
        <input id="genero" name="genero" type="text" class="form-control " value="Femenino" readonly="">
        
    </div>
    <div class="form-group col-lg-6 col-xl-4">
        <label for="paisResidencia"> País de residencia: </label>
        <input id="paisResidencia" name="paisResidencia" type="text" class="form-control " value="México" readonly="">
        
    </div>
    <div class="form-group col-lg-6 col-xl-4">
        <label for="paisNacimiento"> País de nacimiento: </label>
        <input id="paisNacimiento" name="paisNacimiento" type="text" class="form-control " value="México" readonly="">
        
    </div>
    <div class="form-group col-lg-6 col-xl-4">
        <label for="estadoNacimiento"> Estado de nacimiento: </label>
        <input id="estadoNacimiento" name="estadoNacimiento" type="text" class="form-control " value="San Luis Potosí" readonly="">
        
    </div>
    <div class="form-group col-lg-4">
        <label for="tel"> Teléfono de contacto: </label>
        <input id="tel" name="tel" type="text" class="form-control " value="4961309559" readonly="">
            
    </div>
    <div class="form-group col-lg-4 col-xl-6">
        <label for="correo"> Correo electrónico: </label>
        <input id="correo" name="correo" type="text" class="form-control " value="valee_anaa@hotmail.com" readonly="">
        
    </div>
    <div class="form-group col-lg-4 col-xl-6">
        <label for="correoalt"> Correo de contacto alterno: </label>
        <input id="correoalt" name="correoalt" type="text" class="form-control " value="vamar9798@gmail.com" readonly="">
            
    </div>
</div>
    <hr class="col-12">
    <required-document v-for="document in documents" :name="document.name" :label="document.label" :example="document.example"></required-document>
@endsection

@push('vuejs')
<script>

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    
    el: '#app',
    data: {
        documents: [{
                name:"Acta de nacimiento",
                label: "ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
                example: 'ActaNac_2021_CJG'
            },{
                name:"CURP en Ampliación tamaño carta",
                label: 'CURP_añodesolicitud_iniciales',
                example: 'CURP_2021_CJG'
            },{
                name:"Credencial de elector INE en ampliación tamaño carta",
                label: 'INE_añodesolicitud_iniciales',
                example: 'INE_2021_CJG'
            },{
                name:"Primera página del pasaporte",
                label: 'Pasaporte_añodesolicitud_iniciales',
                example: 'Pasaporte_2021_CJG'
            },{
                name:"Título de licenciatura",
                label: 'TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: 'TitLicenciatula_2021_CJG'
            },{
                name:"Certificado de materias de la licenciatura",
                label: 'CertLic_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: 'CertfLic_2021_CJG'
            },{
                name:"Cédula de la licenciatura (aplica solo para estudios realizados en México)",
                label: 'Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: 'Cédula_2021_CJG'
            },{
                name:"Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)",
                label: 'EXANIIII_añodesolicitud_iniciales',
                example: 'EXANIIII_2021_CJG'
            },{
                name:"Certificado de idioma inglés vigente",
                label: 'Inglés_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: 'Inglés_2021_CJG'
            },{
                name:"Certificado de idioma español",
                label: 'Español_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: 'Español_2021_CJG'
            },{
                name:"Carta de intención de un profesor del núcleo básico del PMPCA",
                label: 'Intencion_añodesolicitud_iniciales',
                example: 'Intencion_2021_CJG'
            },{
                name:"Currículum Vítae con los documentos probatorios (formato líbre)",
                label: 'CV_añodesolicitud_iniciales',
                example: 'CV_2021_CJG'
            },{
                name:"Carta de recomendación",
                label: 'Recomendación_01_añodesolicitud_iniciales',
                example: 'Recomendación_01_2021_CJG'
            },
        ],
    },
});
</script>
@endpush