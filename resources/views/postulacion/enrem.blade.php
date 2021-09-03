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
                name:"1.- Birth Certificate",
                label: "01_BirthCert_iniciales",
                example: '01_BirthCert_CJG'
            },{
                name:"2.- CURP",
                label: '02_CURP_añodesolicitud_iniciales',
                example: '02_CURP_2021_CJG'
            },{
                name:"3.- INE",
                label: '03_INE_añodesolicitud_iniciales',
                example: '03_INE_2021_CJG'
            },{
                name:"4.- Passport",
                label: '04_Pasaporte_añodesolicitud_iniciales',
                example: '04_Pasaporte_2021_CJG'
            },{
                name:"5.- High School Certificate",
                label: '05_HighSchool_iniciales',
                example: '05_HighSchool_2021_CJG'
            },{
                name:"5A.- Bachelor Degree",
                label: '05A_DegreeBachelor_iniciales',
                example: '05A_DegreeBachelor_CJG'
            },{
                name:"6.- Bachelor Transcript",
                label: '06A_TranscriptBachelor_iniciales',
                example: '06A_TranscriptBachelor_CJG'
            },{
                name:"7.- Final Grade Average of Bachelor Degree",
                label: '07A_PromBachelor_iniciales',
                example: '07A_PromBachelor_CJG'
            },{
                name:"8.- Professional License",
                label: '08A_ProfessionalLicense_iniciales',
                example: '08A_ProfessionalLicense_CJG'
            },{
                name:"9.- DAAD Application Form",
                label: '09A_DAAD_iniciales',
                example: '09A_DAAD_CJG'
            },{
                name:"13A.- Proof of English Proficiency",
                label: '13A_English_iniciales',
                example: '13A_English_CJG'
            },{
                name:"13B.- Proof of Spanish Proficiency",
                label: '13B_Spanish_iniciales',
                example: '13B_English_CJG'
            },{
                name:"13C.- Proof of German Proficiency",
                label: '13C_German_iniciales',
                example: '13C_German_CJG'
            },{
                name:"16.- Currículum Vítae con los documentos probatorios (formato líbre)",
                label: '16_CV_añodesolicitud_iniciales',
                example: '16_CV_2021_CJG'
            },{
                name:"17A.- Certificate(s) of Employment/Internship",
                label: '17A_ProofExperience_iniciales',
                example: '17A_ProofExperience_CJG'
            },{
                name:"17B.- Confirmation of employment",
                label: '17B_ConfirmationEmp_iniciales',
                example: '17B_ConfirmationEmp_CJG'
            },{
                name:"18A.- Recommendation Letter",
                label: '18A_Recommendation_01_añodesolicitud_iniciales',
                example: '18A_Recommendation_01_2021_CJG'
            },{
                name:"18B.- Recommendation Letter",
                label: '18B_Recommendation_02_añodesolicitud_iniciales',
                example: '18B_Recommendation_02_2021_CJG'
            },
        ],
    },
});
</script>
@endpush