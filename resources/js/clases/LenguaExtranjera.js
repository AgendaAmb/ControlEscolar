import DocumentoPostulacion from "./DocumentoPostulacion.js";

export default class LenguaExtranjeraModel {

    constructor(
        institucion = '', 
        idioma= '',
        examenIngles = '',
        tipoExamenIngles = '',
        otroIdioma = '',
        fechaAplicacion = null,
        vigenciaDesde = null,
        vigenciaHasta = null,
        puntuacion = 0,
        docprobatorio = {
            nombre: '13.- Certificado de idioma',
            etiqueta: '13_Certf_Año_iniciales(Apellidos,Nombres) ',
            ejemplo: '13_Certf_2021_CJG '
        }){

        this.institucion = institucion;
        this.idioma = idioma;
        this.examenIngles = examenIngles;
        this.tipoExamenIngles = tipoExamenIngles;
        this.otroIdioma = otroIdioma;
        this.fechaAplicacion = fechaAplicacion;
        this.vigenciaDesde = vigenciaDesde;
        this.vigenciaHasta = vigenciaHasta;
        this.puntuacion = puntuacion;
        this.docprobatorio = Object.create(new DocumentoPostulacion(), docprobatorio);
    }
}