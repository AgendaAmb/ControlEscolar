<template>
    <tr>
        <th scope="row">{{id}}</th>
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
        
        // Id del expediente.
        id: {
            type: Number,
            default: -1
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