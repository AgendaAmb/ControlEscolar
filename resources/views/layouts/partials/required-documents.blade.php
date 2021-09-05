<template v-slot:personal_documents>
    <required-document v-for="document in personal_documents" 
        :key="document.name" :name="document.name" :label="document.label" 
        :example="document.example">
    </required-document>
</template>

<template v-slot:academic_documents>
    <required-document v-for="document in academic_documents" 
        :key="document.name" :name="document.name" :label="document.label" 
        :example="document.example">
    </required-document>
</template>

<template v-slot:entrance_documents>
    <required-document v-for="document in entrance_documents" 
        :key="document.name" :name="document.name" :label="document.label" 
        :example="document.example">
    </required-document>
</template>

<template v-slot:curricular_documents>
    <required-document v-for="document in curricular_documents" 
        :key="document.name" :name="document.name" :label="document.label" 
        :example="document.example"></required-document>
</template>