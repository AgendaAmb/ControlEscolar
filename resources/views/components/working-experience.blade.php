<div class="col-12 mt-5" {{ $attributes->whereStartsWith('v-for')}}>
    <div class="row justify-content-left">
        <x-form-input id="ExperienciaLaboral.FechaInicio" class="form-group col-md-4" type="date"> De (dd/mm/yyyy): </x-form-input>
        <x-form-input id="ExperienciaLaboral.FechaFin" class="form-group col-md-4" type="date"> Hasta (dd/mm/yyyy): </x-form-input>
        <x-form-input id="ExperienciaLaboral.TipoAprobacion" class="form-group col-md-4" type="date"> Tipo de experiencia:  </x-form-input>
        <x-form-input id="ExperienciaLaboral.Puesto" class="form-group col-md-12"> Tipo de experiencia:  </x-form-input>
        <x-form-input id="ExperienciaLaboral.Organizacion" class="form-group col-md-8"> Tipo de experiencia:  </x-form-input>
        <x-form-input id="ExperienciaLaboral.Pais" class="form-group col-md-4"> País: </x-form-input>

        <div class="col-md-12">
            <label for="ExperienciaLaboral[Descripcion]" class="d-block"> Responsabilidades </label>
            <textarea id="ExperienciaLaboral[Descripcion]" class="w-100" name="ExperienciaLaboral[Descripcion]" v-model="ExperienciaLaboral[Descripcion]"></textarea>
        </div>
    </div>
</div>