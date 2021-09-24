export default class DocumentoPostulacion {
    constructor(nombre, etiqueta, ejemplo, observaciones = null, archivo = null, url = null){
        this.nombre = nombre;
        this.observaciones = observaciones;
        this.etiqueta = etiqueta;
        this.ejemplo = ejemplo;
        this.archivo = archivo;
        this.url = url;
    }

    static create(object){
        
        var newObject = new DocumentoPostulacion(object.nombre, object.etiqueta, object.ejemplo);

        newObject.observaciones = object.observaciones ?? null;
        newObject.archivo = object.archivo ?? null;
        newObject.url = object.utl ?? null;

        return newObject;
    }
}