import DocumentoPostulacion from "./DocumentoPostulacion.js";

export default class GradoAcademicoModel {

    constructor(
        escolaridad = '',
        titulo = '',
        estatus = '',
        cedula = '',
        fechaobtencion = '',
        calmin = '',
        calmax = '',
        promedio = '',
        documentos = []
    ){
        this.escolaridad = escolaridad;
        this.titulo = titulo;
        this.estatus = estatus;
        this.cedula = cedula;
        this.fechaobtencion = fechaobtencion;
        this.calmin = calmin;
        this.calmax = calmax;
        this.promedio = promedio;
        this.documentos = documentos;
    }

    /**
     * Documentos de la licenciatura.
     */
    docsLicenciatura = [
        /*DocumentoPostulacion.create({
            nombre: "5A.- Título de licenciatura o acta de examen.",
            etiqueta: "05A_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
            ejemplo: "05A_TitLicenciatula_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre:"6A.- Certificado de promedio de la licenciatura",
            etiqueta:"06A_Certf_Año_iniciales(Apellidos,Nombres)",
            ejemplo:"06A_Certf_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre: "7A.- Constancia de promedio de la licenciatura",
            etiqueta: "07A_PromedioLic_Año_iniciales(Apellidos,Nombres)",
            ejemplo: "07A_Promedio_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre:"8A.- Cédula profesional de la licenciatura", 
            etiqueta:"08A_Cédula_Año_iniciales(Apellidos,Nombres)",
            ejemplo:"08A_Cédula_2021_CJG"
        })*/
    ];

    /**
     * Documentos de la maestría
     *//*
    docsMaestria = [
        DocumentoPostulacion.create({
            nombre: "5B.- Título de la maestría o acta de examen.",
            etiqueta: "05B_TitMast_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
            ejemplo: "05B_TitMast_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre:"6B.- Certificado de promedio de la maestría",
            etiqueta:"06B_Certf_Año_iniciales(Apellidos,Nombres)",
            ejemplo:"06B_Certf_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre: "7B.- Constancia de promedio de la maestría",
            etiqueta: "07B_Promedio_Año_iniciales(Apellidos,Nombres)",
            ejemplo: "07B_Promedio_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre:"8B.- Cédula profesional de la maestría", 
            etiqueta:"08B_Cédula_Año_iniciales(Apellidos,Nombres)",
            ejemplo:"08B_Cédula_2021_CJG"
        })
    ];*/

    /**
     * Obtiene el documento, correspondiente al título de estudios, en 
     * base al tipo de título escogido. 
     */
    /*
    get documentos(){
        if (this.escolaridad === 'Maestría') {
            return this.docsMaestria;
        }
        else if (this.escolaridad === 'Licenciatura') {
            return this.docsLicenciatura;
        }

        return [];
    }*/

}