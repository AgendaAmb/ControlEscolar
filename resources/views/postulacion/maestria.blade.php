@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/PMPCA-SUPERIOR.png') }}" width="600px">
@endsection

@section('container-class', 'class=container')

@section('main')
<x-student-appliance style="background-color:#0060AE; height: 1px;" action="{{ route('solicitud.actualizaSolicitud') }}" v-on:submit.prevent="actualizaSolicitud">
    
    <x-slot name="profile_picture">

    </x-slot>
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

    <x-slot name="datos_solicitud">
        <x-form-input id="tituloObtenido" class="form-group col-12"> 
            <x-slot name="slot"> Grado de estudios (como se muestra en el documento probatorio): </x-slot>
            <x-slot name="error">
                <div v-if="'tituloObtenido' in Errores" class="invalid-feedback"> 
                    @{{ Errores['tituloObtenido'][0] }} 
                </div>
            </x-slot> 
        </x-form-input> 

        <x-form-select id="PaisEstudios" class="form-group col-md-6" 
            v-for="option in Countries" 
            v-on:change="cambiaPaisEstudios($event.target.selectedIndex)"> 

            <x-slot name="slot"> País donde realizaste tus estudios: </x-slot> 
            <x-slot name="error">
                <div v-if="'PaisEstudios' in Errores" class="invalid-feedback"> 
                    @{{ Errores['PaisEstudios'][0] }} 
                </div>
            </x-slot> 
        </x-form-select>

        <x-form-select id="UniversidadProcedencia" class="form-group col-md-6" 
            v-for="option in CountryUniversities" 
            v-on:change="cambiaUniversidadProcedencia($event.target.selectedIndex)"> 

            <x-slot name="slot"> Universidad de procedencia: </x-slot> 
            <x-slot name="error">
                <div v-if="'UniversidadProcedencia' in Errores" class="invalid-feedback"> 
                    @{{ Errores['UniversidadProcedencia'][0] }} 
                </div>
            </x-slot> 
        </x-form-select>
        
        <x-form-input id="FechaAprobacion" class="form-group col-md-6" type="date"> 
            <x-slot name="slot">  Fecha de aprobación de tu examen profesional: </x-slot>
            <x-slot name="error">
                <div v-if="'FechaAprobacion' in Errores" class="invalid-feedback"> 
                    @{{ Errores['FechaAprobacion'][0] }} 
                </div>
            </x-slot> 
        </x-form-input> 
        
        <div class="form-group col-12 my-0"></div>

        <x-form-input id="calificacionMinima" class="form-group col-md-6"> Calificación mínima aprobatoria: </x-form-input>
        <x-form-input id="calificacionMaxima" class="form-group col-md-6"> Calificación máxima aprobatoria: </x-form-input>
        <x-form-input id="promedio" class="form-group col-md-6"> Promedio obtenido: </x-form-input>
        <x-form-input id="PuntajeEXANI" class="form-group col-md-6"> Puntaje EXANI III: </x-form-input>

        <div class="col-12"></div>

        <x-form-select id="ExamenIngles" class="form-group col-md-6" 
            v-for="option in EnglishExams" 
            v-on:change="cambiaExamenIngles($event.target.selectedIndex)"> 

            <x-slot name="slot"> Examen de inglés que presentaste: </x-slot> 
            <x-slot name="error">
                <div v-if="'ExamenIngles' in Errores" class="invalid-feedback"> 
                    @{{ Errores['ExamenIngles'][0] }} 
                </div>
            </x-slot> 
        </x-form-select>

        <x-form-select id="TipoExamenIngles" class="form-group col-md-6" 
            v-for="option in EnglishExamTypes" 
            v-on:change="cambiaTipoExamenIngles($event.target.selectedIndex)">

            <x-slot name="slot"> Tipo de examen de inglés: </x-slot> 
            <x-slot name="error">
                <div v-if="'TipoExamenIngles' in Errores" class="invalid-feedback"> 
                    @{{ Errores['TipoExamenIngles'][0] }} 
                </div>
            </x-slot> 
        </x-form-select>

        <x-form-input id="fechaExamenIngles" class="form-group col-md-6" type="date"> 
            <x-slot name="slot"> Fecha de aplicación de tu examen de inglés: </x-slot>
            <x-slot name="error">
                <div v-if="'fechaExamenIngles' in Errores" class="invalid-feedback"> 
                    @{{ Errores['fechaExamenIngles'][0] }} 
                </div>
            </x-slot> 
        </x-form-input> 
        
        <x-form-input id="puntajeExamenIngles" class="form-group col-md-6"> 
            <x-slot name="slot"> Puntaje obtenido: </x-slot>
            <x-slot name="error">
                <div v-if="'puntajeExamenIngles' in Errores" class="invalid-feedback"> 
                    @{{ Errores['puntajeExamenIngles'][0] }} 
                </div>
            </x-slot> 
        </x-form-input> 
    </x-slot>

    <x-slot name="informacion_personal">
        <x-required-document v-for="document in personal_documents">
            <x-slot name="selectFile" v-on:change="cargarArchivo($event, document)"></x-slot>
        </x-required-document>
    </x-slot>

    <x-slot name="informacion_academica">
        <x-required-document v-for="document in academic_documents">
            <x-slot name="selectFile" v-on:change="cargarArchivo($event, document)"></x-slot>
        </x-required-document>
    </x-slot>

    <x-slot name="formatos_ingreso">
        <x-required-document v-for="document in entrance_documents">
            <x-slot name="selectFile" v-on:change="cargarArchivo($event, document)"></x-slot>
        </x-required-document>
    </x-slot>

    <x-slot name="documentos_curriculares">
        <x-required-document v-for="document in curricular_documents">
            <x-slot name="selectFile" v-on:change="cargarArchivo($event, document)"></x-slot>
        </x-required-document>
    </x-slot>
</x-student-appliance>


@endsection
@push('variables')
<script>

const academicProgram = @json($academic_program);
const personalDocuments = @json($personal_documents);
const academicDocuments = @json($academic_documents);
const entranceDocuments = @json($entrance_documents);
const curricularDocuments = @json($curricular_documents);
</script>
@endpush