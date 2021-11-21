<template>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th v-for="(column, index) in columns" :key="index">{{column}}</th>
                </tr>
            </thead>
            <tbody>
                <slot></slot>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
</template>

<script>
export default {
    // Nombre del componente
    name: 'archives',

    // Propiedas. 
    props: {
        
        // Columnas de la tabla.
        columns: {
            type: Array,
            default() {
                return [
                    'Número de expediente',
                    'Nombre completo', 
                    'Programa académico',
                    'Expediente'
                ];
            }
        }
    }
}
</script>