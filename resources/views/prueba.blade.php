@extends('layouts.app')

@section('main')
<div class="row justify-content-center">
    <div class="form-group col-md-12 text-center">
    </div>
</div>

<div class="mt-5 row text-center justify-content-center">
    <academic-program-card image="{{ asset('storage/academic-programs/doctorado-01.png') }}"></academic-program-card>
    <academic-program-card image="{{ asset('storage/academic-programs/maestria-nacional-01.png') }}"></academic-program-card>
    <academic-program-card image="{{ asset('storage/academic-programs/maestria-internacional-01.png') }}"></academic-program-card>
    <academic-program-card image="{{ asset('storage/academic-programs/imarec-01.png') }}"></academic-program-card>
</div>

<modal-registro>
    <yes-no-select @changed="perteneceUASLPChanged" id="PerteneceUASLP" label="¿Perteneces a la UASLP?">
        <form-input id="emailR" input_type="text" clase="form-group col-10" 
                    v-if="PerteneceUASLP === 'Si'" :changed.sync="emailR">
            Ingresa tu RPE/clave única de alumno ó correo Institucional
        </form-input>
       
        <input type="hidden" name="Dependencia" v-model="Facultad" v-if="PerteneceUASLP === 'Si'">
        
        <div class="form-group col-md-2 col-sm-2 col-2" v-if="PerteneceUASLP === 'Si'">
            <a class="btn btn btn-outline-light mt-md-2 mt-md-4" v-on:click="uaslpUser"
                data-toggle="tooltip" data-placement="right" title="Buscar mi información"
                v-if="!spinnerVisible"><i class="fas fa-search"></i></a>
            <button class="btn btn-light mt-md-2 mt-md-4" type="button" disabled v-if="spinnerVisible">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="sr-only">Cargando...</span>
            </button>
        </div>

        <form-input id="emailR" input_type="email" clase="form-group col-md-12" 
                    v-if="PerteneceUASLP === 'No'" :changed.sync="emailR">
            Ingresa un correo electrónico
        </form-input>

        <form-input id="Password" input_type="password" clase="form-group col-md-6" 
                    v-if="PerteneceUASLP === 'No'" :changed.sync="Password">
            Contraseña
        </form-input>

        <form-input id="PasswordR" input_type="password" clase="form-group col-md-6" 
                    v-if="PerteneceUASLP === 'No'" :changed.sync="PasswordR">
            Repite tu Contraseña
        </form-input>

        <span class="text-danger" role="alert" v-if="Errores[1].Visible">
            @{{Errores[1].Mensaje}}
        </span>
    </yes-no-select>

    <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
    <div class="form-row">

        <form-input id="Curp" input_type="text" clase="form-group col-md-12" 
                    v-if="PaisNacimiento === 'México'" :changed.sync="Curp" :input-style="">
            CURP
        </form-input>

        <div class="form-group col-md-12 was-validated">
            <label for="nombres">Nombre(s)</label>
            <input type="text" class="form-control" id="Nombres" v-model="Nombres" required name="Nombres"
                style="text-transform: capitalize;">
        </div>

        <div class="form-group col-md-6 was-validated">
            <label for="ApellidoP">Apellido paterno</label>
            <input type="text" class="form-control" id="ApellidoP" v-model="ApellidoP" required
                    name="ApellidoP" style="text-transform: capitalize;">
        </div>
        <div class="form-group col-md-6  was-validated">
            <label for="ApellidoM">Apellido materno</label>
            <input type="text" class="form-control" id="ApellidoM" v-model="ApellidoM" required
                    name="ApellidoM" style="text-transform: capitalize;">
        </div>

        <div class="form-group col-md-3">
            <label for="Edad">Edad</label>
            <input type="number" name="Edad" id="Edad" v-model="Edad" class="form-control" min="1" max="100" required>
        </div>

        <gender :changed.sync="Genero" ></gender>
        <countries label="País de residencia" v-bind:countries="Countries" :changed.sync="PaisResidencia"></countries>
        <countries label="País de nacimiento" v-bind:countries="Countries" :changed.sync="PaisNacimiento"></countries>
        <country-state label="Estado de nacimiento"></country-state>
        
        <div class="form-group col-md-6 was-validated">
            <label for="inputCity">Teléfono de contacto</label>
            <input type="tel" class="form-control" id="Tel" required name="Tel" autocomplete="Tel">
        </div>
        <div class="col-md-6 ">
            <label for="CP">Codigo Postal</label>
            <input type="number" class="form-control" id="CP" required name="CP" v-model="CP">
        </div>
        <div class="col-4">
            <label for="isDiscapacidad">¿Tienes alguna
                discapacidad?</label>
            <select id="isDiscapacidad" class="form-control" v-model="isDiscapacidad" required
                name="isDiscapacidad">
                <option disabled value="">Opción</option>
                <option value="Si" id="Si">Si</option>
                <option value="No" id="No">No</option>
            </select>
        </div>
        <div class="col-4">
            <label for="GEtnico">Grupo étnico</label>
            <input type="text" name="GEtnico" class="form-control" id="GEtnico" v-model="GEtnico"
                placeholder="Grupo étnico (Zapoteco, Pame, etc)">
        </div>
        <div class="col-md-4" v-if="isDiscapacidad=='Si'">
            <label for="Discapacidad">De ser afirmativivo,¿Cúal?</label>
            <input type="text" class="form-control" id="Discapacidad" required name="Discapacidad" v-model="Discapacidad">
        </div>
        <div class="form-group col-12 my-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Al enviar la información confirmo que he leido y acepto el <a
                        href="http://transparencia.uaslp.mx/avisodeprivacidad" style="color: #fecc56;;"> aviso
                        de privacidad.</a>
                </label>
            </div>
            <div class="modal-footer justify-content-start my-3">
                <button id="submit" type="submit" class="btn btn-primary"
                    style="background-color: #0160AE">Registrar</button>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</modal-registro>

@endsection
