@extends('layouts.app')
@section('main')

<h1>Bienvenido</h1>
<h4>{{$user['name']}} {{$user['middlename']}} {{$user['surname']}} </h4>
<h5>Clave unica:  {{$user['id']}}</h5>

@endsection
