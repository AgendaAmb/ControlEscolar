@extends('layouts.app')
@section('main')

<h1>Bienvenido</h1>
<h4>{{$user['name']}} {{$user['middlename']}} {{$user['surname']}} {{$user['id']}}</h4>

@endsection
