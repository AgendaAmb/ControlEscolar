<template>
  <div class="row">
    <h4 class="form-group col-12 my-5"> 1.- Agregar puesto</h4>
    <input-solicitud clase="form-group col-md-6" v-model="puestoLaboral.empresa"> Institución / Empresa: </input-solicitud>
    <div class="form-group col-md-6">
      <label> En este puesto me desempeñé como: </label>
        <select v-model="puestoLaboral.tipoPuesto" class="form-control">
          <option value="" selected>Escoge una opción</option>
          <option value="Catedrático"> Catedrático </option>
          <option value="Investigador"> Investigador </option>
          <option value="Otro"> Otro </option>
      </select>
    </div>

    <h5 class="form-group col-12 mt-5 mb-4"><strong> Periodo laboral </strong></h5>
    <div class="col-12 my-4">
      <div class="row">
        <input-solicitud tipo="date" clase="form-group col-md-6" v-model="puestoLaboral.fechaInicio"> Desde: </input-solicitud>
        <input-solicitud tipo="date" clase="form-group col-md-6" v-model="puestoLaboral.fechaFin"> Hasta: </input-solicitud>
      </div>
      <div class="row">
        <input-solicitud clase="form-group col-md-6" v-model="puestoLaboral.areaConocimiento"> Área de conocimiento: </input-solicitud>
        <input-solicitud clase="form-group col-md-6" v-model="puestoLaboral.campo"> Campo: </input-solicitud>
      </div>
    </div>

    <div class="form-group my-3 col-xl-6">
      <h5><strong> Nombre del puesto: </strong></h5>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" v-model="puestoLaboral.nombrePuesto"></textarea>
    </div>
    <div class="form-group my-3 col-xl-6">
      <h5><strong> Logros: </strong></h5>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" v-model="puestoLaboral.logros"></textarea>
    </div>

    <documento-requerido :documento="puestoLaboral.probatorioEmpleo"></documento-requerido>
    <documento-requerido :documento="puestoLaboral.certificadoEmpleo"></documento-requerido>
  </div>
</template>


<script>
class PuestoLaboral
{
  /**
   * Construye el objeto, que representa el puesto laboral.
   * 
   * @param string tipoPuesto
   * @param string tipoPuesto
   * @param string tipoPuesto
   * @param Date tipoPuesto
   * @param Date fechaFin
   * @param string areaConocimiento
   * @param string campo
   */
  constructor(
    tipoPuesto = '', 
    empresa = '', 
    nombrePuesto = '', 
    descripcion = '', 
    fechaInicio = Date, 
    fechaFin = Date,
    areaConocimiento = '',
    campo = '',
    logros = ''
  )
  {
    this.tipoPuesto = tipoPuesto;
    this.empresa = empresa;
    this.nombrePuesto = nombrePuesto;
    this.descripcion = descripcion;
    this.fechaInicio = fechaInicio;
    this.fechaFin = fechaFin;
    this.areaConocimiento = areaConocimiento;
    this.campo = campo;
    this.logros = logros;

    this.probatorioEmpleo = {
      nombre: '17A.- Certificate(s) of Employment/Internship',          
      etiqueta: '17A_ProofExperience_iniciales',
      ejemplo: '17A_ProofExperience_CJG'
    };

    this.certificadoEmpleo = {
      nombre: '17B.- Confirmation of employment',          
      etiqueta: '17B_ConfirmationEmp_iniciales',
      ejemplo: '17B_ConfirmationEmp_CJG'
    };
  }
}

import DocumentoRequerido from './DocumentoRequerido.vue';
import InputSolicitud from './InputSolicitud.vue';

export default {
  name: "experiencia-laboral",
  components: { DocumentoRequerido, InputSolicitud },

  data() {
    return {
      puestoLaboral: new PuestoLaboral()
    };
  }
};
</script>