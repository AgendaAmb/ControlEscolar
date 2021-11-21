<template>
    <tr class="text-center">
        <td>{{ data.id }}</td>
        <td>
            <ul>
                <li v-for="role in data.roles" :key="role.id">{{ role.name }}</li>
            </ul>
        </td>
        <td>
            <ul>
                <li v-for="area in data.academic_areas" :key="area.id">{{area.name}}</li>
            </ul>
        </td>
        <td>
            <ul>
                <li v-for="entity in data.academic_entities" :key="entity.id">{{entity.name}}</li>
            </ul>
        </td>
        <td>
            <button @click="modificaTrabajador" class="btn btn-primary"> Modificar </button>
            <button @click="eliminaTrabajador" class="btn btn-danger"> Eliminar </button>
        </td>
    </tr>
</template>

<script>
export default {
    name: 'usuarios-ce-row-template',

    data() {
        return {
            data: {},
        }
    },

    methods: {
        /**
         * Envía una notificación para modificar al usuario
         */
        modificaTrabajador(){
            this.$emit('updateWorker', {
                id: data.id,
                type: data.type
            });
        },

        /**
         * Envía una notificación para eliminar al trabajador
         */
        eliminaTrabajador(){
            this.$emit('deleteWorker', {
                id: data.id,
                type: data.type
            });
        }
    }
}
</script>