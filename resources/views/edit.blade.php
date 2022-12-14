@extends('layouts.app')
@section('title', 'Register User Edit')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<!-- <script src="C:/xampp/htdocs/ProjectoRealDifApp/DifApp/resources/js/create.js"></script> -->
<form class="form-group" method="POST" action="{{action('ListasController@update', $listaEscuela->id)}}" enctype="multipart/form-data">
@method('PUT')
    <div clas='form-group'>
    @csrf
        <label for=''>Nombre:</label>
            <input type='text'name="Nombre" class='form-control' value="{{$listaEscuela->Nombre}}" maxlength="100"> <br>
            
            <label for=''>CURP:</label>
            <input type='text'name="CURP" class='form-control' value="{{$listaEscuela->CURP}}" maxlength="18"> <br>
            
            <label for=''>No.Control:</label>
            <input type='text'name="No_Control" class='form-control' value="{{$listaEscuela->No_Control}}" maxlength="16"> <br>
            
            <label for=''>Materia:</label>
            <input type='text'name="Materia" class='form-control' value="{{$listaEscuela->Materia}}" maxlength="12"> <br>
            
            <label for=''>Promedio:</label>
            <input type='text'name="Promedio" class='form-control' value="{{$listaEscuela->Promedio}}" maxlength="2"> <br>
            
            <label for=''>Observaciones:</label>
            <input type='text'name="Observaciones" class='form-control' value="{{$listaEscuela->Observaciones}}" maxlength="200"> <br>

            <label for="">Avatar:</label>
            <input type="file" name="Avatar" value="{{$listaEscuela->Avatar}}">

        </div>
        <button type='submit'class='btn btn-danger'>
        Guardar</button>
</form>
@endsection
