@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/ENREM-SUPERIOR.png') }}" width="600px">
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
                name:"Birth Certificate",
                label: "BirthCert_iniciales",
                example: 'BirthCert_CJG'
            },{
                name:"CURP",
                label: 'CURP_añodesolicitud_iniciales',
                example: 'CURP_2021_CJG'
            },{
                name:"INE",
                label: 'INE_añodesolicitud_iniciales',
                example: 'INE_2021_CJG'
            },{
                name:"Passport",
                label: 'Pasaporte_añodesolicitud_iniciales',
                example: 'Pasaporte_2021_CJG'
            },{
                name:"High School Certificate",
                label: 'HighSchool_iniciales',
                example: 'HighSchool_2021_CJG'
            },{
                name:"Bachelor Degree",
                label: 'DegreeBachelor_iniciales',
                example: 'DegreeBachelor_CJG'
            },{
                name:"Professional License",
                label: 'ProfessionalLicense_iniciales',
                example: 'ProfessionalLicense_CJG'
            },{
                name:"DAAD Application Form",
                label: 'DAAD_iniciales',
                example: 'DAAD_CJG'
            },{
                name:"Proof of English Proficiency",
                label: 'English_iniciales',
                example: 'English_CJG'
            },{
                name:"Proof of Spanish Proficiency",
                label: 'Spanish_iniciales',
                example: 'English_CJG'
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