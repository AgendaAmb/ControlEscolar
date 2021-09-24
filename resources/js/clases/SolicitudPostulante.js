import CapitalHumanoModel from "./CapitalHumano";
import GradoAcademicoModel from "./GradoAcademico";
import LenguaExtranjeraModel from "./LenguaExtranjera";
import PostulanteModel from "./Postulante";
import RequisitosIngresoModel from "./RequisitosIngreso";


export default class SolicitudPostulanteModel {

    constructor(
        postulante = {}, 
        gradosAcademicos = [],  
        requisitosIngreso = {},
        lenguasExtranjeras = [],
        produccionesCientificas = [],
        capitalesHumanos = []){

        this.postulante = Object.create(new PostulanteModel(), postulante);
        this.requisitosIngreso = Object.create(new RequisitosIngresoModel(), requisitosIngreso);

        this.gradosAcademicos = gradosAcademicos.map(grado => {
            return Object.create(new GradoAcademicoModel(), grado);
        });

        this.lenguasExtranjeras = lenguasExtranjeras.map(lengua => {
            return Object.create(new LenguaExtranjeraModel(), lengua);
        });

        this.produccionesCientificas = produccionesCientificas;

        this.capitalesHumanos = capitalesHumanos.map(capital => {
            return Object.create(new CapitalHumanoModel(), lengua);
        });
    }

    static create(object){
        return Object.create(new PostulanteModel(), object);
    }
}