export default class SolicitudPostulanteModel {

    constructor(
        postulante = null, 
        gradosAcademicos = [], 
        requisitosIngreso = {}, 
        lenguasExtranjeras = [], 
        produccionesCientificas = [], 
        capitalesHumanos = []){

        this.postulante = postulante;
        this.gradosAcademicos = gradosAcademicos;
        this.requisitosIngreso = requisitosIngreso;
        this.lenguasExtranjeras = lenguasExtranjeras;
        this.produccionesCientificas = produccionesCientificas;
        this.capitalesHumanos = capitalesHumanos;
    }
}