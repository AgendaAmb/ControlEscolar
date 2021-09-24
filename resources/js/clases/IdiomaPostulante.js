import DocumentoPostulacion from "./DocumentoPostulacion.js";

export default class IdiomaPostulante {

    docprobatorio = DocumentoPostulacion.create({
        nombre: '13.- Certificado de idioma',
        etiqueta: '13_Certf_Año_iniciales(Apellidos,Nombres) ',
        ejemplo: '13_Certf_2021_CJG '
    });

    constructor(
        institucion = '', 
        idioma= '',
        examenIngles = '',
        tipoExamenIngles = '',
        otroIdioma = '',
        fechaAplicacion = null,
        vigenciaDesde = null,
        vigenciaHasta = null,
        puntuacion = 0){

        this.institucion = institucion;
        this.idioma = idioma;
        this.examenIngles = examenIngles;
        this.tipoExamenIngles = tipoExamenIngles;
        this.otroIdioma = otroIdioma;
        this.fechaAplicacion = fechaAplicacion;
        this.vigenciaDesde = vigenciaDesde;
        this.vigenciaHasta = vigenciaHasta;
        this.puntuacion = puntuacion;
    }
}