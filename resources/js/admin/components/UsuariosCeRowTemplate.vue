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
        <td></td>
    </tr>
</template>

<script>
export default {
    name: 'usuarios-ce-row-template',

    data() {
        return {
            data: {},
        }
    }
}
</script>