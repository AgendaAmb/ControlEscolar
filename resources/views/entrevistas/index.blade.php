@extends('layouts.app')

@section('headerPicture')
<img class="img-fluid mt-4" src="{{ asset('storage/headers/ENREM-SUPERIOR.png') }}" width="600px">
@endsection

@section('main')
<div class="row my-5">
    <div class="col-12">
        <table class="table table-borderless text-center">
            <thead class="thead-dark table-borderless">
                <tr>
                    <th scope="col"> No. de expediente </th>
                    <th scope="col"> Nombre del aspirante </th>
                    <th scope="col"> Carta de intención otorgada por </th>
                    <th scope="col" colspan="2"> Fecha de entrevista </th>
                    <th scope="col" colspan="5"> Profesores </th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"> Día </th>
                    <th scope="col"> Hora </th>
                    <th scope="col"> Evaluación </th>
                    <th scope="col"> Prevención </th>
                    <th scope="col"> Recursos Naturales </th>
                    <th scope="col"> Gestión ambiental </th>
                    <th scope="col"> Salud Ambiental </th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">2</th>
                <td> Aspirante </td>
                <td> Thornton </td>
                <td> @fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td> Larry</td>
                <td> the Bird</td>
                <td> @twitter</td>
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