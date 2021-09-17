<div class="{{ $attributes->get('class') }}" @if($attributes->has('v-for')) v-for="{{ $attributes->get('v-for') }}" @endif>
    
    <h5 class="col-md-9 my-4"><strong> Escolaridad </strong></h5>
    <x-form-input id="GradoAcademico.nivelEscolaridad" class="form-group col-md-4"> Nivel de escolaridad: </x-form-input>
    {{--  <x-form-input id="GradoAcademico.titulo" class="form-group col-md-8"> Título: </x-form-input>
    <x-form-input id="GradoAcademico.estatus" class="form-group col-md-4"> Estatus: </x-form-input>
    <x-form-input id="GradoAcademico.paisEstudios" class="form-group col-md-4"> País de estudios: </x-form-input>
    <x-form-input id="GradoAcademico.institucion" class="form-group col-md-4"> Institución: </x-form-input>

    <h5 class="col-md-9 my-4"><strong> Área de conocimiento </strong></h5>
    <x-form-input id="GradoAcademico.areaConocimiento" class="form-group col-md-4"> Área: </x-form-input>
    <x-form-input id="GradoAcademico.campo" class="form-group col-md-4"> Campo: </x-form-input>
    <x-form-input id="GradoAcademico.disciplina" class="form-group col-md-4"> Disciplina: </x-form-input>
    <x-form-input id="GradoAcademico.subdisciplina" class="form-group col-md-4"> Subdisciplina: </x-form-input>
    --}}
</div>