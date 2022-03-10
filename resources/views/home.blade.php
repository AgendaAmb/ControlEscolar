@extends('layouts.app')
@section('main')

<h1>Bienvenido</h1>
<h4>{{$user['name']}} {{$user['middlename']}} {{$user['surname']}}</h4>

@endsection
