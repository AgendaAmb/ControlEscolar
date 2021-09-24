export default class PostulanteModel {

    constructor(
        curp = null,
        nombres = null,
        apPaterno = null,
        apMaterno = null,
        fechaNacimiento = null,
        genero = null,
        estadoCivil = null,
        paisNacimiento = null,
        estadoNacimiento = null,
        paisResidencia = null,
        telefonoContacto = null,
        correoContacto = null,
        correoAlterno = null,
        documentosPersonales = []){

        this.curp = curp;
        this.nombres = nombres;
        this.apPaterno = apPaterno;
        this.apMaterno = apMaterno;
        this.fechaNacimiento = fechaNacimiento;
        this.genero = genero;
        this.estadoCivil = estadoCivil;
        this.paisNacimiento = paisNacimiento;
        this.estadoNacimiento = estadoNacimiento;
        this.paisResidencia = paisResidencia;
        this.correoContacto = correoContacto;
        this.telefonoContacto = telefonoContacto;
        this.correoAlterno = correoAlterno;
        this.documentosPersonales = documentosPersonales;
    }
}