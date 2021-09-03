@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}" width="600px">
@endsection

@section('main')
<div class="row my-5">
    <div class="col-12">
        <table class="table table-bordered text-center">
            <thead class="tablaEntrevistas-header">
                <tr>
                    <th class="align-middle" scope="col" rowspan="2"> No. de expediente </th>
                    <th class="align-middle" scope="col" rowspan="2"> Nombre del aspirante </th>
                    <th class="align-middle" scope="col" rowspan="2"> Carta de intención otorgada por </th>
                    <th class="align-middle" scope="col" colspan="2" style="border: none;"> Fecha de entrevista </th>
                    <th class="align-middle" scope="col" colspan="5" style="border-bottom: none"> Profesores </th>
                </tr>
                <tr>
                    <th scope="col" style="border: none;"> Día </th>
                    <th scope="col" style="border: none;"> Hora </th>
                    <th scope="col"> Evaluación </th>
                    <th scope="col"> Prevención </th>
                    <th scope="col"> Recursos Naturales </th>
                    <th scope="col"> Gestión ambiental </th>
                    <th scope="col"> Salud Ambiental </th>
                </tr>
            </thead>
            <tbody class="tablaEntrevistas-body">
                <tr>
                    <th scope="row">2</th>
                    <td> Aspirante </td>
                    <td> Thornton </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td> Larry</td>
                    <td> the Bird</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection


@push('vuejs')
<script>

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    
    el: '#app',
    data: {
       
    },
});
</script>
@endpush