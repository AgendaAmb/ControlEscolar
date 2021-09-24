import DocumentoPostulacion from "./DocumentoPostulacion.js";

export default class GradoPostulante {

    escolaridad = '';
    titulo = '';
    estatus = '';
    cedula = '';
    fechaobtencion = '';
    calmin = '';
    calmax = '';
    promedio = '';


    /**
     * Títulos de la licenciatura o la maestría.
     */
    #docTituloLic = DocumentoPostulacion.create({
        nombre: "5A.- Título de licenciatura o acta de examen.",
        etiqueta: "05A_TitLicenciatula_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
        ejemplo: "05A_TitLicenciatula_2021_CJG"
    });

    #docTituloMast = DocumentoPostulacion.create({
        nombre: "5B.- Título de la maestría o acta de examen.",
        etiqueta: "05B_TitMast_AñoDeSolicitud_iniciales(Apellidos,Nombres)",
        ejemplo: "05B_TitMast_2021_CJG"
    });

    /**
     * Certificados de la licenciatura o la maestría.
     */
    #docCertificadoLic = DocumentoPostulacion.create({
        nombre:"6A.- Certificado de promedio de la licenciatura",
        etiqueta:"06A_Certf_Año_iniciales(Apellidos,Nombres)",
        ejemplo:"06A_Certf_2021_CJG"
    });

    #docCertificadoMast = DocumentoPostulacion.create({
        nombre:"6B.- Certificado de promedio de la maestría",
        etiqueta:"06B_Certf_Año_iniciales(Apellidos,Nombres)",
        ejemplo:"06B_Certf_2021_CJG"
    });


    #docConstanciaLic = DocumentoPostulacion.create({
        nombre: "7A.- Constancia de promedio de la licenciatura",
        etiqueta: "07A_PromedioLic_Año_iniciales(Apellidos,Nombres)",
        ejemplo: "07A_Promedio_2021_CJG"
    });

    #docConstanciaMast = DocumentoPostulacion.create({
        nombre: "7B.- Constancia de promedio",
        etiqueta: "07B_Promedio_Año_iniciales(Apellidos,Nombres)",
        ejemplo: "07B_Promedio_2021_CJG"
    });
        
    

    doccedula = DocumentoPostulacion.create({
        nombre:"8.- Cédula profesional", 
        etiqueta:"08_Cédula_Año_iniciales(Apellidos,Nombres)",
        ejemplo:"08_Cédula_2021_CJG"
    });








    
    /**
     * Obtiene el documento, correspondiente al título de estudios, en 
     * base al tipo de título escogido. 
     */
    get doctitulo(){
        if (this.escolaridad === 'Maestría') 
            return this.#docTituloMast;

        return this.#docTituloLic;
    }

    /**
     * Obtiene el documento, correspondiente al título de estudios, en 
     * base al tipo de título escogido. 
     */
     get doccertificado(){
        if (this.escolaridad === 'Maestría') 
            return this.#docCertificadoLic;

        return this.#docCertificadoMast;
    }

    /**
     * Obtiene el documento, correspondiente a la constancia de promedio, 
     * en base al tipo de título escogido.
     */
    get docconstancia(){
        if (this.escolaridad === 'Maestría') {
            return this.#docConstanciaMast;
        }

        return this.#docConstanciaLic;
    }
}