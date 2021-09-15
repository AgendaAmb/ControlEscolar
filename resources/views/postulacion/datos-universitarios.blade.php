<x-form-input id="tituloObtenido" class="form-group col-md-6"> 
    <x-slot name="slot"> Grado de estudios (como se muestra en el documento probatorio): </x-slot>
    <x-slot name="error" v-if="'tituloObtenido' in Errores"> @{{ Errores['tituloObtenido'][0] }} </x-slot> 
</x-form-input> 

<x-form-input id="cedulaProfesional" class="form-group col-md-6"> 
    <x-slot name="slot"> Número de cédula profesional: </x-slot>
    <x-slot name="error" v-if="'cedulaProfesional' in Errores"> @{{ Errores['cedulaProfesional'][0] }} </x-slot> 
</x-form-input> 

<x-form-select id="PaisEstudios" class="form-group col-md-6" v-for="option in Countries" v-on:change="cambiaPaisEstudios($event.target.selectedIndex)"> 
    <x-slot name="slot"> País donde realizaste tus estudios: </x-slot> 
    <x-slot name="error" v-if="'PaisEstudios' in Errores"> @{{ Errores['PaisEstudios'][0] }} </x-slot> 
</x-form-select>

<x-form-select id="UniversidadProcedencia" class="form-group col-md-6" v-for="option in CountryUniversities" v-on:change="cambiaUniversidadProcedencia($event.target.selectedIndex)"> 
    <x-slot name="slot"> Universidad de procedencia: </x-slot> 
    <x-slot name="error"> @{{ Errores['UniversidadProcedencia'][0] }} </x-slot> 
</x-form-select>

<x-form-input id="FechaAprobacion" class="form-group col-md-6" type="date"> 
    <x-slot name="slot">  Fecha de aprobación de tu examen profesional: </x-slot>
    <x-slot name="error" v-if="'FechaAprobacion' in Errores"> @{{ Errores['FechaAprobacion'][0] }} </x-slot> 
</x-form-input> 

@if ($academic_program !== null && $academic_program->alias === 'doctorado')
<x-form-input id="CVU" class="form-group col-md-6"> 
    <x-slot name="slot">  Número de CVU: </x-slot>
    <x-slot name="error" v-if="'CVU' in Errores"> @{{ Errores['CVU'][0] }} </x-slot> 
</x-form-input>
@endif