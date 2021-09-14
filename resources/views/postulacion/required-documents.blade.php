<x-slot name="informacion_personal">
    <x-required-document class="row mb-3" v-for="document in personal_documents" v-on:change="cargarArchivo($event, document)" v-bind:id="'document[' + document.id + ']'">
        <x-slot name="viewFile" v-if="TemporalDocuments[document.id] !== null">
            <x-view-file-button v-bind:id="'document[' + document.id + ']'" v-bind:href="TemporalDocuments[document.id]" />
        </x-slot>
        <x-slot name="selectFile">
            <x-select-file-button v-bind:for="'document[' + document.id + ']'" />
        </x-slot>
    </x-required-document>
</x-slot>

<x-slot name="informacion_academica">
    <x-required-document class="row mb-3" v-for="document in academic_documents" v-on:change="cargarArchivo($event, document)" v-bind:id="'document[' + document.id + ']'">
        <x-slot name="viewFile" v-if="TemporalDocuments[document.id] !== null">
            <x-view-file-button v-bind:id="'document[' + document.id + ']'" v-bind:href="TemporalDocuments[document.id]" />
        </x-slot>
        <x-slot name="selectFile">
            <x-select-file-button v-bind:for="'document[' + document.id + ']'" />
        </x-slot>
    </x-required-document>
</x-slot>

<x-slot name="formatos_ingreso">
    <x-required-document class="row mb-3" v-for="document in entrance_documents" v-on:change="cargarArchivo($event, document)" v-bind:id="'document[' + document.id + ']'">
        <x-slot name="viewFile" v-if="TemporalDocuments[document.id] !== null">
            <x-view-file-button v-bind:id="'document[' + document.id + ']'" v-bind:href="TemporalDocuments[document.id]" />
        </x-slot>
        <x-slot name="selectFile" v-if="document.intention_letter === 0">
            <x-select-file-button v-bind:for="'document[' + document.id + ']'" />
        </x-slot>
    </x-required-document>
</x-slot>

<x-slot name="documentos_curriculares">
    <x-required-document class="row mb-3" v-for="document in curricular_documents" v-on:change="cargarArchivo($event, document)" v-bind:id="'document[' + document.id + ']'">
        <x-slot name="viewFile" v-if="TemporalDocuments[document.id] !== null">
            <x-view-file-button v-bind:id="'document[' + document.id + ']'" v-bind:href="TemporalDocuments[document.id]" />
        </x-slot>
        <x-slot name="selectFile" v-if="document.recommendation_letter === 0">
            <x-select-file-button v-bind:for="'document[' + document.id + ']'" />
        </x-slot>
    </x-required-document>
</x-slot>