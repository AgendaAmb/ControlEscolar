<template>
    <tr>
        <th scope="row">{{index}}</th>
        <th scope="row">Desde : {{announcement_from }} <br> Hasta : {{announcement_to}}</th>
        <td>{{name}}</td>
        <td>{{academic_program}}</td>
        <td>
            <a :href="location"> Ver expediente </a>
        </td>
    </tr>
</template>

<script>
export default {
    // Nombre del componente
    name: 'archive',

    // Propiedas. 
    props: {

        index:{
            type:Number,
            default:0,
        },
        
        // Id del expediente.
        id: {
            type: Number,
            default: -1
        },

        // Fecha inicio postulacion
        announcement_from: {
            type: Date,
            default: null
        },

        // Fecha de terminacion postulacion
        announcement_to: {
            type: Date,
            default: null
        },

        name: {
            type: String,
            default: ''
        },

        academic_program: {
            type: String,
            default: ''
        },

        location: {
            type: String,
            default: ''
        }
    }
}
</script>