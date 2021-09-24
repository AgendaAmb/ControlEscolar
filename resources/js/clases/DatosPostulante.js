import DocumentoPostulacion from "./DocumentoPostulacion.js";

export default class DatosPostulante {

    docActaNacimiento = DocumentoPostulacion.create({
        nombre: '1.- Acta de nacimiento.',
        etiqueta: '01_ActaNac_AñoDeSolicitud_iniciales(Apellidos,Nombres)',
        ejemplo: '01_Promedio_2021_CJG'
    });

    docCurp = DocumentoPostulacion.create({
        nombre: '2.- CURP expedido por la RENAPO.',
        observaciones: 'Puedes generarlo, dando clic a <a href="https://www.gob.mx/curp/" target="_blank"> este vínculo </a>',
        etiqueta: '02_CURP_añodesolicitud_iniciales',
        ejemplo: '02_CURP_2021_CJG'
    });

    docIne = DocumentoPostulacion.create({
        nombre: '3.- Credencial de elector INE en ampliación tamaño carta.',
        etiqueta: '03_INE_añodesolicitud_iniciales',
        ejemplo: '03_INE_2021_CJG'
      });

    docPasaporte = DocumentoPostulacion.create({
        nombre: '4.- Primera página del pasaporte.',          
        etiqueta: '04_Pasaporte_añodesolicitud_iniciales',
        ejemplo: '04_Pasaporte_2021_CJG'
    });
}