@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/DOCTORADO-SUPERIOR.png') }}" width="600px">
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
<div class="row">
    <hr class="col-md-12" style="background-color: #0598BC; height:1px;">
    <h4 class="col-md-9 my-4"> Datos Solicitud </h4>
    <div class="form-group col-12">
        <label for="tituloObtenido"> Grado de estudios (como se muestra en el documento probatorio): </label>
        <input id="tituloObtenido" name="tituloObtenido" type="text" class="form-control ">
    </div>        

    <countries id="PaisEstudios" clase="form-group col-md-6 was-validated" label="País donde realizaste tus estudios"></countries>
       
    <div class="form-group col-12 col-md-6">
        <label for="universidad"> Universidad de procedencia: </label>
    </div>     

    <div class="form-group col-12 col-md-6">
        <label for="FechaAprobacion"> Fecha de aprobación de tu examen profesional </label>
        <input id="FechaAprobacion" name="FechaAprobacion" type="date" class="form-control ">
    </div>    

    <div class="form-group col-12 col-md-6">
        <label for="cvu"> Número de CVU: </label>
        <input id="cvu" name="cvu" type="text" class="form-control ">
    </div>  

    <div class="form-group col-12 col-md-6">
        <label for="calificacionMinima"> Calificación mínima aprobatoria: </label>
        <input id="calificacionMinima" name="calificacionMinima" type="text" class="form-control ">
    </div>        
    <div class="form-group col-12 col-md-6">
        <label for="calificacionMaxima"> Calificación máxima aprobatoria: </label>
        <input id="calificacionMaxima" name="calificacionMaxima" type="text" class="form-control ">
    </div>    
    <div class="form-group col-12 col-md-6">
        <label for="promedio"> Promedio obtenido: </label>
        <input id="promedio" name="promedio" type="text" class="form-control ">
    </div>        
        
    <div class="form-group col-12 col-md-6">
        <label for="PuntajeEXANI"> Puntaje EXANI III: </label>
        <input id="PuntajeEXANI" name="PuntajeEXANI" type="text" class="form-control ">
    </div>
    <div class="col-12"></div>

    <div class="form-group col-12 col-md-6">
        <label for="examenIngles"> Examen de inglés: </label>
    
        <select id="examenIngles" name="examenIngles" class="d-block form-control ">
            <option value="" selected="true"> Escoge el examen de inglés que presentaste </option>
            <option value="3"> Cambridge </option>
            <option value="2"> IELTS </option>
            <option value="1"> TOEFL </option>
        </select>
    </div>        
    <div class="form-group col-12 col-md-6">
        <label for="tipoExamenIngles"> Tipo de examen de inglés: </label>
        <select id="tipoExamenIngles" name="tipoExamenIngles" class="d-block form-control ">
            <option value="" selected="true"> Escoge el tipo de examen </option>
        </select>
    </div>    
    <div class="form-group col-12 col-md-6">
        <label for="FechaExamenIngles"> Fecha de aplicación de tu examen de inglés </label>
        <input id="FechaExamenIngles" name="FechaExamenIngles" type="date" class="form-control ">
    </div>   
    <div class="form-group col-12 col-md-6">
        <label for="puntajeExamen"> Puntaje obtenido </label>
        <input id="puntajeExamen" name="puntajeExamen" type="text" class="form-control ">
    </div>
    <hr class="col-md-12" style="background-color: #0598BC; height:1px;">
</div>
    
<div class="row mt-5 mb-0">
    <h4 class="col-md-9"><strong> Información personal </strong></h4>
</div>

<required-document v-for="document in personal_documents" :key="document.name" :name="document.name" :label="document.label" :example="document.example"></required-document>

<div class="row mt-5 mb-0">
    <h4 class="col-md-9"><strong> Información académica </strong></h4>
</div>

<required-document v-for="document in academic_documents" :key="document.name" :name="document.name" :label="document.label" :example="document.example"></required-document>

<div class="row mt-5 mb-0">
    <h4 class="col-md-9"><strong>  Formatos de ingreso </strong></h4>
</div>

<required-document v-for="document in entrance_documents" :key="document.name" :name="document.name" :label="document.label" :example="document.example"></required-document>

<div class="row mt-5 mb-0">
    <h4 class="col-md-9"><strong> Documentos curriculares </strong></h4>
</div>
<required-document v-for="document in curricular_documents" :key="document.name" :name="document.name" :label="document.label" :example="document.example"></required-document>    
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
        personal_documents: [{
                name:"1.- Acta de nacimiento",
                label: "01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
                example: '01_ActaNac_2021_CJG'
            },{
                name:"2.- CURP en Ampliación tamaño carta",
                label: '02_CURP_añodesolicitud_iniciales',
                example: '02_CURP_2021_CJG'
            },{
                name:"3.- Credencial de elector INE en ampliación tamaño carta",
                label: '03_INE_añodesolicitud_iniciales',
                example: '03_INE_2021_CJG'
            },{
                name:"4.- Primera página del pasaporte",
                label: '04_Pasaporte_añodesolicitud_iniciales',
                example: '04_Pasaporte_2021_CJG'
        }],

        academic_documents: [{
                name:"5.- Título de maestría o acta de examen",
                label: '05B_TítuloMat_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '05B_TítuloMat_2021_CJG'
            },{
                name:"6.- Certificado de materias de la maestría",
                label: '06B_CertMast_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '06B_CertfMast_2021_CJG'
            },{
                name:"7.- Certificado de promedio de la maestría",
                label: '07B_PromedioMae_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '07B_PromedioMae_2021_CJG'
            },{
                name:"8.- Cédula de la maestría (aplica solo para estudios realizados en México)",
                label: '08B_Cédula_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '08B_Cédula_2021_CJG'
        }],

        entrance_documents:[{
                name:"12.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros)",
                label: '12B_EXANIIII_añodesolicitud_iniciales',
                example: '12B_EXANIIII_2021_CJG'
            },{
                name:"13A.- Certificado de idioma inglés vigente",
                label: '13A_Inglés_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '13A_Inglés_2021_CJG'
            },{
                name:"13B.-Certificado de idioma español",
                label: '13B_Español_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
                example: '13B_Español_2021_CJG'
            },{
                name:"14.- Carta de intención de un profesor del núcleo básico del PMPCA",
                label: '14_Intencion_añodesolicitud_iniciales',
                example: '14_Intencion_2021_CJG'
            },{
                name:"15.- Propuesta de proyecto avalada por el profesor postulante",
                label: '15_Proyecto_iniciales',
                example: '15_Proyecto_CJG'
        }],


        curricular_documents: [{
                name:"16.- Currículum Vítae con los documentos probatorios (formato líbre)",
                label: '16_CV_añodesolicitud_iniciales',
                example: '16_CV_2021_CJG'
            },{
                name:"18A.- Carta de recomendación",
                label: '18A_Recomendación_01_añodesolicitud_iniciales',
                example: '18A_Recomendación_01_2021_CJG'
            },{
                name:"18B.- Carta de recomendación",
                label: '18B_Recomendación_02_añodesolicitud_iniciales',
                example: '18B_Recomendación_02_2021_CJG'
            },
        ],
    },
});
</script>
@endpush