<template>
  <div class="row">
    <h4 class="form-group col-12 my-5"> 1.- Agregar puesto</h4>
    <div class="form-group col-md-6 my-auto">
      <h5 class="d-block my-3"> En este puesto me desempeñé como: </h5>
      <div class="form-check">
        <input class="form-check-input" type="radio" v-model="puestoLaboral.tipoPuesto" value="Catedrático">
        <label class="form-check-label">
          Catedrático
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" v-model="puestoLaboral.tipoPuesto" value="Investigador">
        <label class="form-check-label">
          Investigador
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" v-model="puestoLaboral.tipoPuesto" value="Otro">
        <label class="form-check-label">
          Otro
        </label>
      </div>
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

    <div class="form-group my-3 col-md-8">
      <h5><strong> Nombre del puesto: </strong></h5>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>
    <div class="form-group my-3 col-md-8">
      <h5><strong> Logros: </strong></h5>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>
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
    campo = ''
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