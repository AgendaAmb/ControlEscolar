import DocumentoPostulacion from "./DocumentoPostulacion.js";

export default class RequisitosIngresoModel {

    /**
     * Documentos de ingreso.
     */
    documentos = [
        DocumentoPostulacion.create({
            nombre: "12.- EXANI III (No aplica para estudiantes extranjeros)",
            etiqueta: "12_Exani_Año_iniciales(Apellidos,Nombres)",
            ejemplo: "12_Exani_2021_CJG"
        }),
        DocumentoPostulacion.create({
            nombre:"19.- Propuesta de proyecto", 
            etiqueta:"19_Proyecto_Año_iniciales(Apellidos,Nombres)",
            ejemplo:"19_Proyecto_2021_CJG"
        })
    ];
}