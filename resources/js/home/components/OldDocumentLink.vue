<template>
    <b-table striped hover head-variant="blue" id="my-table" :items="filteredList" :fields="fields"
                            :per-page="perPage" :current-page="currentPage" class="text-center h3">
    </b-table>
</template>

<script>
    export default{
        name: 'old-document-link',

        props:{
            id:{
                type: Number,
                default: -1
            },

            name:{
                type:String,
                default:'none'
            }
        },

        data(){

        },

        methods:{
           
        }
    }
</script>