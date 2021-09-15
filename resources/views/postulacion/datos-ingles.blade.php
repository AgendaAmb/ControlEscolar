<x-form-select id="ExamenIngles" class="form-group col-md-6" v-for="option in EnglishExams" v-on:change="cambiaExamenIngles($event.target.selectedIndex)"> 
    <x-slot name="slot"> Examen de inglés que presentaste: </x-slot> 
    <x-slot name="error" v-if="'ExamenIngles' in Errores"> @{{ Errores['ExamenIngles'][0] }} </x-slot> 
</x-form-select>

<x-form-select id="TipoExamenIngles" class="form-group col-md-6" v-for="option in EnglishExamTypes" v-on:change="cambiaTipoExamenIngles($event.target.selectedIndex)">
    <x-slot name="slot"> Tipo de examen de inglés: </x-slot> 
    <x-slot name="error" v-if="'TipoExamenIngles' in Errores"> @{{ Errores['TipoExamenIngles'][0] }} </x-slot> 
</x-form-select>

<x-form-input id="fechaExamenIngles" class="form-group col-md-6" type="date"> 
    <x-slot name="slot"> Fecha de aplicación de tu examen de inglés: </x-slot>
    <x-slot name="error" v-if="'fechaExamenIngles' in Errores"> @{{ Errores['fechaExamenIngles'][0] }} </x-slot> 
</x-form-input> 

<x-form-input id="puntajeExamenIngles" class="form-group col-md-6"> 
    <x-slot name="slot"> Puntaje obtenido: </x-slot>
    <x-slot name="error" v-if="'puntajeExamenIngles' in Errores"> @{{ Errores['puntajeExamenIngles'][0] }} </x-slot> 
</x-form-input> 