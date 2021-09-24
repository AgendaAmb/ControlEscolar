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


    /**
     * Constancias de promedio de la licenciatura o la maestría.
     */
    #docConstanciaLic = DocumentoPostulacion.create({
        nombre: "7A.- Constancia de promedio de la licenciatura",
        etiqueta: "07A_PromedioLic_Año_iniciales(Apellidos,Nombres)",
        ejemplo: "07A_Promedio_2021_CJG"
    });

    #docConstanciaMast = DocumentoPostulacion.create({
        nombre: "7B.- Constancia de promedio de la maestría",
        etiqueta: "07B_Promedio_Año_iniciales(Apellidos,Nombres)",
        ejemplo: "07B_Promedio_2021_CJG"
    });

    /**
     * Cédula profesional de la licenciatura o maestría.
     */
    #docCedulaLic = DocumentoPostulacion.create({
        nombre:"8A.- Cédula profesional de la licenciatura", 
        etiqueta:"08A_Cédula_Año_iniciales(Apellidos,Nombres)",
        ejemplo:"08A_Cédula_2021_CJG"
    });

    #docCedulaMast = DocumentoPostulacion.create({
        nombre:"8B.- Cédula profesional de la maestría", 
        etiqueta:"08B_Cédula_Año_iniciales(Apellidos,Nombres)",
        ejemplo:"08B_Cédula_2021_CJG"
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
            return this.#docCertificadoMast;

        return this.#docCertificadoLic;
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


    /**
     * Obtiene el documento, correspondiente a la cédula profesional, 
     * en base al tipo de título escogido.
     */
     get doccedula(){
        if (this.escolaridad === 'Maestría') {
            return this.#docCedulaMast;
        }

        return this.#docCedulaLic;
    }
}